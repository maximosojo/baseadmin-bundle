<?php

namespace Maximosojo\Bundle\BaseAdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * BaseAdminBundle
 * 
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
class BaseAdminBundle extends Bundle
{
	public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}