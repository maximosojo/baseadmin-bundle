<?php

namespace Maximosojo\Bundle\BaseAdminBundle\Service\EasyAdminBundle;

use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;

final class AdminContextService implements AdminContextServiceInterface
{
    private $adminContextProvider;

    public function __construct(AdminContextProvider $adminContextProvider)
    {
        $this->adminContextProvider = $adminContextProvider;
    }

    public function someMethod()
    {
        $context = $this->adminContextProvider->getContext();
    }
}