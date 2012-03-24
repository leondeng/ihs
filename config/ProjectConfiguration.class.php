<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('ioMenuPlugin');
    
    if (sfConfig::get('sf_environment') === 'prod') {
      $this->setWebDir($this->getRootDir().'/public_html/ihs');
    }
  }

}
