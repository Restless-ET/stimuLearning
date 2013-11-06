<?php

/**
 * Scenario filter form.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ScenarioFormFilter extends BaseScenarioFormFilter
{
    /**
     * Configures the filter form
     *
     * @return nothing
     */
    public function configure()
    {
        if (!sfContext::getInstance()->getUser()->hasCredential('admin')) {
            //$this->setDefault('user_id', sfContext::getInstance()->getUser()->getAttribute('id'));
        }
    }
}
