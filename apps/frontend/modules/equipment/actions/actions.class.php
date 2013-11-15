<?php

require_once dirname(__FILE__).'/../lib/equipmentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/equipmentGeneratorHelper.class.php';

/**
 * equipment actions.
 *
 * @package    stimuLearning
 * @subpackage equipment
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class EquipmentActions extends autoEquipmentActions
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
        $equipment = $this->getRoute()->getObject();
        $this->forward404Unless($equipment);
        $scenario = $equipment->Scenario;

        $user = $this->getUser();
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot edit an equipment from a scenario with a finished simulation!');
            $this->redirect('@equipment');
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
        $equipment = $this->getRoute()->getObject();
        $this->forward404Unless($equipment);
        $scenario = $equipment->Scenario;

        $user = $this->getUser();
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot delete an equipment from a scenario with a started simulation!');
            $this->redirect('@equipment');
        }

        parent::executeDelete($request);
    }
}
