<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
//     $this->enablePlugins('sfDoctrinePlugin');
//     $this->enablePlugins('ioMenuPlugin');
    $this->enableAllPluginsExcept(array(
        'sfPropelPlugin'
    ));

    sfWidgetFormSchema::setDefaultFormFormatterName('ihs');

    sfConfig::set('sf_thumbnail_dir', sfConfig::get('sf_upload_dir').'/thumbnails');
    sfConfig::set('app_sf_guard_plugin_allow_login_with_email', false);
  }

}
