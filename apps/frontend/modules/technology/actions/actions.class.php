<?php

require_once dirname(__FILE__).'/../lib/technologyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/technologyGeneratorHelper.class.php';

/**
 * technology actions.
 *
 * @package    stimuLearning
 * @subpackage technology
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class TechnologyActions extends autoTechnologyActions
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
