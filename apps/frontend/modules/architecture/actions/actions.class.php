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
            $this->redirect('@architecture');
        } elseif ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot create a new architecture for a scenario with a finished simulation!');
            $this->redirect('@architecture');
        }
        $userHasOperator = Doctrine_Core::getTable('Operator')->createQuery('o')
                              ->select('o.id')
                              ->where('o.scenario_id = ?', $scenario->getId())
                              ->andWhere('o.user_id = ?', $user->getAttribute('id'))
                              ->count();
        if (!$userHasOperator) {
            $user->setFlash('error', 'You do not control any operator on this scenario!');
            $this->redirect('@architecture');
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
        $architecture = $this->getRoute()->getObject();
        $this->forward404Unless($architecture);
        $scenario = $architecture->Scenario;
        $operator = $architecture->Operator;
        $user = $this->getUser();

        if ($operator->user_id != $user->getAttribute('id')) {
            $user->setFlash('error', 'That architecture is not yours to edit!');
            $this->redirect('@architecture');
        }
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
        $operator = $architecture->Operator;
        $user = $this->getUser();

        if ($operator->user_id != $user->getAttribute('id')) {
            $user->setFlash('error', 'That architecture is not yours to delete!');
            $this->redirect('@architecture');
        }
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot delete an architecture from a scenario with a started simulation!');
            $this->redirect('@architecture');
        }

        parent::executeDelete($request);
    }
}
