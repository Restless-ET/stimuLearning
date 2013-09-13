<?php

require_once dirname(__FILE__).'/../lib/scenarioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/scenarioGeneratorHelper.class.php';

/**
 * scenario actions.
 *
 * @package    stimuLearning
 * @subpackage scenario
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ScenarioActions extends autoScenarioActions
{
    /**
     * Executes show action for scenario
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeShow(sfWebRequest $request)
    {
        //parent::executeShow($request);
        $this->scenario = Doctrine::getTable('Scenario')->find($request->getParameter('id'));
        $this->forward404Unless($this->scenario);
        $this->form = $this->configuration->getForm($this->scenario);

        $this->getUser()->setAttribute('scenarioId', $this->scenario->id);

        $this->helper = new scenarioGeneratorHelper();
    }

    /**
     * Override edit action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeEdit(sfWebRequest $request)
    {
        if ($this->getRoute()->getObject()->getStarted()) {
            $this->getUser()->setFlash('error', 'You cannot edit a scenario with a started simulation!');
            $this->redirect('@scenario');
        }

        parent::executeEdit($request);
    }

    /**
     * Override delete action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeDelete(sfWebRequest $request)
    {
        if ($this->getRoute()->getObject()->getStarted()) {
            $user->setFlash('error', 'You cannot delete a scenario with a started simulation!');
            $this->redirect('@scenario');
        }

        parent::executeDelete($request);
    }

    /**
     * Initializes the simulation scenario.
     *
     * @return nothing
     */
    public function executeStartSimulation()
    {
        $scenario = $this->getRoute()->getObject();
        $this->forward404Unless($scenario);

        $user = $this->getUser();
        if (!$scenario->getStarted()) {
            $msg = $scenario->initializeSimulation();

            if ($msg === true) {
                $scenario->advanceToNextStep();

                $user->setFlash('notice', 'Simulation started (no new operators can be added)!');
            } else {
                $user->setFlash('error', $msg);
            }
        } else {
            $user->setFlash('error', 'The simulation for this scenario had already been started!');
        }
        $this->redirect('@scenario');
    }

    /**
     * Advance the simulation the indicated number of ticks.
     *
     * @param sfRequest $request A request object
     *
     * @return nothing
     */
    public function executeAdvanceSimulation(sfWebRequest $request)
    {
        $scenario = $this->getRoute()->getObject();
        $this->forward404Unless($scenario);

        $user = $this->getUser();
        if (!$scenario->getStarted() || $scenario->getFinished()) {
            $user->setFlash('notice', 'The simulation for this scenario is either: not started or already finished!');
            $this->redirect('@scenario');
        }

        $ticks = $request->getParameter('ticks', 0);
        if ($ticks > 0) {
            for ($i = 1; $i <= $ticks; $i++) {
                $scenario->advanceToNextStep();
            }

            $user->setFlash('notice', 'Simulation advanced '.$ticks.' ticks!');

        } else {
            $user->setFlash('error', 'No valid number of ticks indicated!');
        }
        $this->redirect('@scenario');
    }

    /**
     * Gets market share data from ticks related with the given Scenario in order
     *  to provide that data in JSON format for graphs that need it.
     *
     * @return nothing
     */
    public function executeGetMarketShareEvolutionDatasets()
    {
        $scenario = $this->getRoute()->getObject();
        $this->forward404Unless($scenario);

        $i = 0;
        $chartData = array();
        foreach ($scenario->Operators as $operator) {
            // hard-code color indices to prevent them from shifting as operators are turned on/off
            $chartData[$operator->id]['color'] = $i;
            $chartData[$operator->id]['label'] = $operator->getName();
            $chartData[$operator->id]['data'] = array();

            $ticksForOperator = TickTable::getInstance()->createQuery('t')
                                    ->select('t.nbr, t.market_share')
                                    ->where('t.scenario_id = ?', $scenario->id)
                                    ->andWhere('t.operator_id = ?', $operator->id)
                                    ->orderBy('t.nbr asc')
                                    ->fetchArray();

            foreach ($ticksForOperator as $tick) {
                array_push($chartData[$operator->id]['data'], array($tick['nbr'], $tick['market_share']));
            }
            $i++;
        }

        $this->data = json_encode($chartData);
        $this->setLayout(false);
        $this->setTemplate('getJsonData', 'default');
        $this->getResponse()->setContentType('application/json');
    }
}
