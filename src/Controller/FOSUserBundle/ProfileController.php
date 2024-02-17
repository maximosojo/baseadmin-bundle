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

use FOS\UserBundle\Controller\ProfileController as BaseProfileController;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\CompatibilityUtil;

/**
 * Controller managing the user profile.
 *
 * @author Christophe Coevoet <stof@notk.org>
 *
 * @final
 */
class ProfileController extends BaseProfileController
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
     * Show
     * 
     * @author Máximo Sojo <maxsojo13@gmail.com>
     * 
     * @return Response
     */
    public function showAction(): Response
    {
        return parent::showAction();
    }
}
