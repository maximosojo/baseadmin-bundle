<?php

namespace Maximosojo\Bundle\BaseAdminBundle\Service\EasyAdminBundle;

use Maximosojo\Bundle\BaseAdminBundle\Model\EasyAdminBuilderInterface;

final class EasyAdminBuilderService implements EasyAdminBuilderServiceInterface
{
    private $builder;

    public function setBuilder(EasyAdminBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function getBuilder()
    {
        return $this->builder;
    }
}