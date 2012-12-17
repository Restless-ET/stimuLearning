<?php

require_once dirname(__FILE__).'/../lib/scenarioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/scenarioGeneratorHelper.class.php';

/**
 * scenario actions.
 *
 * @package    stimuLearning
 * @subpackage scenario
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scenarioActions extends autoScenarioActions
{
  /**
   * Executes show action for scenario
   *
   * @param sfWebRequest $request A request object
   *
   * @return nothing
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->scenario = $this->getRoute()->getObject();
    $this->forward404Unless($this->scenario);

    $this->helper = new scenarioGeneratorHelper();

    $this->form = $this->configuration->getForm($this->scenario);
  }

  /**
   * Gets market share data from ticks related with the given Scenario in order
   *  to provide that data in JSON format for graphs that need it.
   *
   * @param sfWebRequest $request A request object
   *
   * @return nothing
   */
  public function executeGetMarketShareEvolutionDatasets(sfWebRequest $request)
  {
    $scenario = $this->getRoute()->getObject();
    $this->forward404Unless($scenario);

    $i = 0;
    $chartData = array();
    foreach ($scenario->Operators as $operator)
    {
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

      foreach ($ticksForOperator as $tick)
      {
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
