<?php

namespace Maximosojo\Bundle\BaseAdminBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * BaseAdminExtension
 * 
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
class BaseAdminExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loaderYml = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        // Registra servicios
        $loaderYml->load('services.yaml');
    }
}