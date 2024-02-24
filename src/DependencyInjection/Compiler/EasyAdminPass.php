<?php

namespace Maximosojo\Bundle\BaseAdminBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Carga builder de easyadmin
 *
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
class EasyAdminPass implements CompilerPassInterface 
{
    public function process(ContainerBuilder $container) 
    {
        $definition = $container->getDefinition('maximosojo_baseadmin.service.easyadmin_builder_service');
        $tags = $container->findTaggedServiceIds('easyadmin_builder.builder');
        
        foreach ($tags as $id => $attributes) {
            $itemDefinition = $container->getDefinition($id);
            $definition->addMethodCall('setBuilder',array($itemDefinition));
        }
    }
}
