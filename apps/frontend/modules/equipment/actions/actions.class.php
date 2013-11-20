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
     * Override new action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeNew(sfWebRequest $request)
    {
        $user = $this->getUser();
        $scenario = Doctrine_Core::getTable('Scenario')
                      ->find($user->getAttribute('scenarioId', 0));
        if ($scenario === false) {
            $user->setFlash('error', 'No scenario found in session!');
            $this->redirect('@equipment');
        } elseif ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot create a new equipment for a scenario with a finished simulation!');
            $this->redirect('@equipment');
        }
        $userHasOperator = Doctrine_Core::getTable('Operator')->createQuery('o')
                              ->select('o.id')
                              ->where('o.scenario_id = ?', $scenario->getId())
                              ->andWhere('o.user_id = ?', $user->getAttribute('id'))
                              ->count();
        if (!$userHasOperator) {
            $user->setFlash('error', 'You do not control any operator on this scenario!');
            $this->redirect('@equipment');
        }

        parent::executeNew($request);
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
        $operator = $equipment->Operator;
        $user = $this->getUser();

        if ($operator->user_id != $user->getAttribute('id')) {
            $user->setFlash('error', 'That equipment is not yours to edit!');
            $this->redirect('@equipment');
        }

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
        $operator = $equipment->Operator;
        $user = $this->getUser();

        if ($operator->user_id != $user->getAttribute('id')) {
            $user->setFlash('error', 'That equipment is not yours to delete!');
            $this->redirect('@equipment');
        }

        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot delete an equipment from a scenario with a started simulation!');
            $this->redirect('@equipment');
        }

        parent::executeDelete($request);
    }
}
