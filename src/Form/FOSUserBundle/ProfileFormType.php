<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Maximosojo\Bundle\BaseAdminBundle\Form\FOSUserBundle;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints\NotBlank;
use FOS\UserBundle\Form\Type\ProfileFormType as FOSProfileFormType;

/**
 * @final
 */
class ProfileFormType extends AbstractType
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->buildUserForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => $this->class,
            'csrf_token_id' => 'profile',
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'fos_user_profile';
    }

    /**
     * Builds the embedded form representing the user.
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['label' => 'label.firstname'])
            ->add('lastname', TextType::class, ['label' => 'label.lastname'])
            ->add('username', TextType::class, ['label' => 'label.username'])
            ->add('email', EmailType::class, ['label' => 'label.email'])
        ;
    }
}