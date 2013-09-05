<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

/**
 * This class is used to configure the project.
 *
 * @package    stimuLearning
 * @subpackage config
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ProjectConfiguration extends sfProjectConfiguration
{
    /**
     * Insert in this method all the project configurations that you need.
     *
     * @return void
     */
    public function setup()
    {
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('sfFormExtraPlugin');
        $this->enablePlugins('sfJqueryReloadedPlugin');
        $this->enablePlugins('sfAdminThemejRollerPlugin');
    }
}
