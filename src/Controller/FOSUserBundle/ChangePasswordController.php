<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Maximosojo\Bundle\BaseAdminBundle\Controller\FOSUserBundle;

use FOS\UserBundle\CompatibilityUtil;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Maximosojo\Bundle\BaseAdminBundle\Controller\EasyAdminBundle\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Controller\DashboardControllerInterface;

/**
 * Controller managing the password change.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 *
 * @final
 */
class ChangePasswordController extends AbstractDashboardController implements DashboardControllerInterface
{
    private $eventDispatcher;
    private $formFactory;
    private $userManager;

    public function __construct(EventDispatcherInterface $eventDispatcher, FactoryInterface $formFactory, UserManagerInterface $userManager)
    {
        $this->eventDispatcher = CompatibilityUtil::upgradeEventDispatcher($eventDispatcher);
        $this->formFactory = $formFactory;
        $this->userManager = $userManager;
    }

    /**
     * Change user password.
     */
    #[Route('/profile/change-password', methods: ['GET|POST'], name: 'fos_user_change_password')]
    public function changePasswordAction(Request $request): Response
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            // throw new AccessDeniedException('This user does not have access to this section.');
            return new RedirectResponse($this->generateUrl('fos_user_security_login'));
        }

        $event = new GetResponseUserEvent($user, $request);
        $this->eventDispatcher->dispatch($event, FOSUserEvents::CHANGE_PASSWORD_INITIALIZE);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $this->formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = new FormEvent($form, $request);
            $this->eventDispatcher->dispatch($event, FOSUserEvents::CHANGE_PASSWORD_SUCCESS);

            $this->userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_profile_show');
                $response = new RedirectResponse($url);
            }

            $this->eventDispatcher->dispatch(new FilterUserResponseEvent($user, $request, $response), FOSUserEvents::CHANGE_PASSWORD_COMPLETED);

            return $response;
        }

        return $this->render('@FOSUser/ChangePassword/change_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
