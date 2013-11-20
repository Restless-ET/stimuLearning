<?php

/**
 * service actions.
 *
 * @package    stimuLearning
 * @subpackage service
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ServiceActions extends autoServiceActions
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
            $this->redirect('@service');
        } elseif ($scenario->getFinished()) {
            $user->setFlash('error', 'You cannot create a new service for a scenario with a finished simulation!');
            $this->redirect('@service');
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
        $service = $this->getRoute()->getObject();
        $this->forward404Unless($service);
        $operator = $service->Operator;

        $user = $this->getUser();
        if (!$user->hasCredential('admin') && $operator->getUserId() != $user->getAttribute('id')) {
            $user->setFlash('error', 'You cannot edit a Service that does not belong to an Operator that you control!');
            $this->redirect('@service');
        }
        $scenario = $operator->Scenario;
        if ($scenario->getFinished())  {
            $user->setFlash('error', 'You cannot edit a Service from a scenario with a finished simulation!');
            $this->redirect('@service');
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
        $service = $this->getRoute()->getObject();
        $this->forward404Unless($service);
        $operator = $service->Operator;

        $user = $this->getUser();
        if (!$user->hasCredential('admin') && $operator->getUserId() != $user->getAttribute('id')) {
            $user->setFlash('error', 'You cannot delete a Service that does not belong to an Operator that you control!');
            $this->redirect('@service');
        }
        $scenario = $operator->Scenario;
        if ($scenario->getFinished())  {
            $user->setFlash('error', 'You cannot delete a Service from a scenario with a finished simulation!');
            $this->redirect('@service');
        }

        parent::executeDelete($request);
    }
}
