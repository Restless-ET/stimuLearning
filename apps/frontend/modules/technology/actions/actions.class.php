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
            $this->redirect('@technology');
        } elseif ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot create a new technology for a scenario with a finished simulation!');
            $this->redirect('@technology');
        }
        $userHasOperator = Doctrine_Core::getTable('Operator')->createQuery('o')
                              ->select('o.id')
                              ->where('o.scenario_id = ?', $scenario->getId())
                              ->andWhere('o.user_id = ?', $user->getAttribute('id'))
                              ->count();
        if (!$userHasOperator) {
            $user->setFlash('error', 'You do not control any operator on this scenario!');
            $this->redirect('@technology');
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
        $technology = $this->getRoute()->getObject();
        $this->forward404Unless($technology);
        $scenario = $technology->Scenario;
        $operator = $technology->Operator;
        $user = $this->getUser();

        if ($operator->user_id != $user->getAttribute('id')) {
            $user->setFlash('error', 'That technology is not yours to edit!');
            $this->redirect('@technology');
        }
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
        $operator = $technology->Operator;
        $user = $this->getUser();

        if ($operator->user_id != $user->getAttribute('id')) {
            $user->setFlash('error', 'That technology is not yours to delete!');
            $this->redirect('@technology');
        }
        if ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot delete a technology from a scenario with a started simulation!');
            $this->redirect('@technology');
        }

        parent::executeDelete($request);
    }
}
