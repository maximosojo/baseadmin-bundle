<?php 

namespace Maximosojo\Bundle\BaseAdminBundle\Model;

use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

/**
 * 
 * EasyAdminBuilder
 * 
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
class EasyAdminBuilder implements EasyAdminBuilderInterface
{
    public const EASYADMIN_THEME_CORK = 'easyadmin_theme_cork';

    protected function buildAssets(string $theme = null): Assets
    {
        $assets = Assets::new();

        switch ($theme) {
            case self::EASYADMIN_THEME_CORK:
                // CSS Cork
                $assets->addCssFile('bundles/baseadmin/theme/cork/bootstrap/css/bootstrap.css');
                $assets->addCssFile('bundles/baseadmin/theme/cork/assets/css/loader.css');
                $assets->addCssFile('bundles/baseadmin/theme/cork/assets/css/plugins.css');
                // JS Cork
                $assets->addJsFile('bundles/baseadmin/theme/cork/jquery/jquery-3.1.1.min.js');
                $assets->addJsFile('bundles/baseadmin/theme/cork/bootstrap/js/popper.min.js');
                $assets->addJsFile('bundles/baseadmin/theme/cork/bootstrap/js/bootstrap.min.js');
                $assets->addJsFile('bundles/baseadmin/theme/cork/plugins/perfect-scrollbar/perfect-scrollbar.min.js');
                $assets->addJsFile('bundles/baseadmin/theme/cork/assets/js/loader.js');
                $assets->addJsFile('bundles/baseadmin/theme/cork/assets/js/app.js');
                break;
        }
        
        return $assets;
    }
}