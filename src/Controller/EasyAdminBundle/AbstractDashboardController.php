<?php

namespace Maximosojo\Bundle\BaseAdminBundle\Controller\EasyAdminBundle;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController as BaseAbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;

abstract class AbstractDashboardController extends BaseAbstractDashboardController
{
    private $easyAdminBuilderService;

    public function configureAssets(): Assets
    {
        return $this->easyAdminBuilderService->getBuilder()->configureAssets();
    }

    public function configureDashboard(): Dashboard
    {
        return $this->easyAdminBuilderService->getBuilder()->configureDashboard();
    }

    public function configureCrud(): Crud
    {
        return $this->easyAdminBuilderService->getBuilder()->configureCrud();
    }

    public function configureMenuItems(): iterable
    {
        return $this->easyAdminBuilderService->getBuilder()->configureMenuItems();
    }

    #[\Symfony\Contracts\Service\Attribute\Required]
    public function setBuilderService(\Maximosojo\Bundle\BaseAdminBundle\Service\EasyAdminBundle\EasyAdminBuilderServiceInterface $easyAdminBuilderService)
    {
        $this->easyAdminBuilderService = $easyAdminBuilderService;
    }
}