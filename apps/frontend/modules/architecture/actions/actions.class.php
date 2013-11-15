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

    /**
     * Override edit action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeEdit(sfWebRequest $request)
    {
        $architecture = $this->getRoute()->getObject();
        $this->forward404Unless($architecture);
        $scenario = $architecture->Scenario;

        $user = $this->getUser();
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot edit an architecture from a scenario with a finished simulation!');
            $this->redirect('@architecture');
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
        $architecture = $this->getRoute()->getObject();
        $this->forward404Unless($architecture);
        $scenario = $architecture->Scenario;

        $user = $this->getUser();
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot delete an architecture from a scenario with a started simulation!');
            $this->redirect('@architecture');
        }

        parent::executeDelete($request);
    }
}
