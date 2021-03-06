<?php

require_once dirname(__FILE__).'/../lib/operatorGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/operatorGeneratorHelper.class.php';

/**
 * operator actions.
 *
 * @package    stimuLearning
 * @subpackage operator
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class OperatorActions extends autoOperatorActions
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
            $this->redirect('@operator');
        } elseif ($scenario->getStarted()) {
            $user->setFlash('error',
                'You cannot create a new operator for a scenario with an already started simulation!');
            $this->redirect('@operator');
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
        $operator = $this->getRoute()->getObject();
        $this->forward404Unless($operator);
        $scenario = $operator->Scenario;

        $user = $this->getUser();
        if ($scenario->getStarted()) {
            $user->setFlash('error', 'You cannot edit an operator from a scenario with a started simulation!');
            $this->redirect('@operator');
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
        $operator = $this->getRoute()->getObject();
        $this->forward404Unless($operator);
        $scenario = $operator->Scenario;

        $user = $this->getUser();
        if ($scenario->getStarted()) {
            $user->setFlash('error', 'You cannot delete an operator from a scenario with a started simulation!');
            $this->redirect('@operator');
        }

        parent::executeDelete($request);
    }

    /**
     * Gets operator simulated data from ticks related with the given Operator in order
     *  to provide that data in JSON format for graphs that need it.
     *
     * @return nothing
     */
    public function executeGetSimulatedDataDatasets()
    {
        $operator = $this->getRoute()->getObject();
        $this->forward404Unless($operator);

        // hard-code color indices to prevent them from shifting as datasets are turned on/off
        $chartData = array(
            'capex' => array(
              'color' => 6,
              'label' => 'CAPEX',
              'bars' => array('show' => true,'barWidth' => 0.15,'lineWidth' => 1,'align' => 'left'),
              'data' => array()
            ),
            'opex' => array(
              'color' => 7,
              'label' => 'OPEX',
              'bars' => array('show' => true,'barWidth' => 0.15,'lineWidth' => 1,'align' => 'left'),
              'data' => array()
            ),
            'revenue' => array(
              'color' => 8,
              'label' => 'Revenue',
              'bars' => array('show' => true,'barWidth' => 0.15,'lineWidth' => 1,'align' => 'left'),
              'data' => array()
            ),
            'cashflow' => array(
              'color' => 3,
              'label' => 'Cashflow',
              'bars' => array('show' => true,'barWidth' => 0.15,'lineWidth' => 1,'align' => 'left'),
              'data' => array()
            ),
            'balance' => array(
              'color' => 4,
              'label' => 'Balance',
              'lines' => array('show' => true),
              //'points' => array('show' => true),
              'data' => array()
             ),
              'equity' => array(
              'color' => 5,
              'label' => 'Equity',
              'lines' => array('show' => true),
              //'points' => array('show' => true),
              'data' => array()
        ));

        $ticksForOperator = TickTable::getInstance()->createQuery('t')
            ->select('t.nbr,t.CAPEX,t.OPEX,t.revenue,t.cashflow,t.balance,t.equity')
            ->where('t.operator_id = ?', $operator->id)
            ->orderBy('t.nbr asc')
            ->fetchArray();

        foreach ($ticksForOperator as $tick) {
            array_push($chartData['capex']['data'], array($tick['nbr'] - 0.3, $tick['CAPEX']));
            array_push($chartData['opex']['data'], array($tick['nbr'] - 0.15, $tick['OPEX']));
            array_push($chartData['revenue']['data'], array($tick['nbr'], $tick['revenue']));
            array_push($chartData['cashflow']['data'], array($tick['nbr'] + 0.15, $tick['cashflow']));
            array_push($chartData['balance']['data'], array($tick['nbr'], $tick['balance']));
            array_push($chartData['equity']['data'], array($tick['nbr'], $tick['equity']));
        }

        $this->data = json_encode($chartData);
        $this->setLayout(false);
        $this->setTemplate('getJsonData', 'default');
        $this->getResponse()->setContentType('application/json');
    }
}
