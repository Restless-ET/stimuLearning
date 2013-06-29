<?php

/**
 * scenario module helper.
 *
 * @package    stimuLearning
 * @subpackage scenario
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class scenarioGeneratorHelper extends BaseScenarioGeneratorHelper
{
  public function linkToNextStep($object, $params)
  {
    return '<li class="sf_admin_action_sim_next_step">'.link_to(__($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks=1',
            array('id' => 'scenario_sim_next_step')).'</li>';
  }
  public function linkToNextDecision($object, $params)
  {
    //TODO calculate proper number of ticks
    $ticks='2';

    return '<li class="sf_admin_action_sim_next_decision">'.link_to(__($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks='.$ticks,
            array('id' => 'scenario_sim_next_decision')).'</li>';
  }
  public function linkToFinish($object, $params)
  {
    //TODO calculate proper number of ticks
    $ticks='5';

    return '<li class="sf_admin_action_sim_finish">'.link_to(__($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks='.$ticks,
            array('id' => 'scenario_sim_finish')).'</li>';
  }
}
