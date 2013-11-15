<?php

require_once dirname(__FILE__).'/../lib/architectureGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/architectureGeneratorHelper.class.php';

/**
 * architecture actions.
 *
 * @package    stimuLearning
 * @subpackage architecture
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ArchitectureActions extends autoArchitectureActions
{
    /**
     * Override index action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeIndex(sfWebRequest $request)
    {
        if (!$this->getUser()->getAttribute('scenarioId', 0)) {
            $this->redirect('@homepage'); // @scenario
        }

        parent::executeIndex($request);
    }
}
