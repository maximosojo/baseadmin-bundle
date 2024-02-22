<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Maximosojo\Bundle\BaseAdminBundle\Model\User;

use Maximosojo\Bundle\BaseAdminBundle\Model\User\GroupInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
abstract class ModelGroup implements GroupInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * Nombre
     * @var string
     */
    #[ORM\Column(type: 'string', length: 180)]
    protected $name;

    /**
     * Informacion extra
     * @var string
     */
    #[ORM\Column(type: 'array')]
    protected $roles = [];

    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        if (!$this->hasRole($role)) {
            $this->roles[] = strtoupper($role);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function hasRole($role)
    {
        return in_array(strtoupper($role), $this->roles, true);
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * {@inheritdoc}
     */
    public function removeRole($role)
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }
}
