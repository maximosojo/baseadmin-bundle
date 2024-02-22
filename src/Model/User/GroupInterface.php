<?php

namespace Maximosojo\Bundle\BaseAdminBundle\Model\User;

/**
 * GroupInterface
 * 
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
interface GroupInterface
{
    /**
     * @param string $role
     *
     * @return static
     */
    public function addRole($role);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($role);

    /**
     * @return array
     */
    public function getRoles();

    /**
     * @param string $role
     *
     * @return static
     */
    public function removeRole($role);

    /**
     * @param string $name
     *
     * @return static
     */
    public function setName($name);

    /**
     * @param array $roles
     *
     * @return static
     */
    public function setRoles(array $roles);
}
