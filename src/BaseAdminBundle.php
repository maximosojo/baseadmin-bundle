<?php

namespace Maximosojo\Bundle\BaseAdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Maximosojo\Bundle\BaseAdminBundle\DependencyInjection\Compiler\EasyAdminPass;

/**
 * BaseAdminBundle
 * 
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
class BaseAdminBundle extends Bundle
{
    public function build(ContainerBuilder $container) 
    {
        parent::build($container);
        $container->addCompilerPass(new EasyAdminPass());
    }

	public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}