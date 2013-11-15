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

    /**
     * Override edit action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeEdit(sfWebRequest $request)
    {
        $technology = $this->getRoute()->getObject();
        $this->forward404Unless($technology);
        $scenario = $technology->Scenario;

        $user = $this->getUser();
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot edit a technology from a scenario with a finished simulation!');
            $this->redirect('@technology');
        }

        parent::executeEdit($request);
    }

    /**
     * Override delete action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeDelete(sfWebRequest $request)
    {
        $technology = $this->getRoute()->getObject();
        $this->forward404Unless($technology);
        $scenario = $technology->Scenario;

        $user = $this->getUser();
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot delete a technology from a scenario with a started simulation!');
            $this->redirect('@technology');
        }

        parent::executeDelete($request);
    }
}
