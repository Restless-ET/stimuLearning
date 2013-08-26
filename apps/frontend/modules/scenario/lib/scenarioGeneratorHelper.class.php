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
  /**
   * Renders a custom link for an action to advance to the next step
   *
   * @param mixed $object The Scenario object
   * @param array $params Array with parameters for the link to render
   */
  public function linkToNextStep($object, $params)
  {
    return '<li class="sf_admin_action_sim_next_step">'.link_to(__($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks=1',
            array('id' => 'scenario_sim_next_step')).'</li>';
  }

  /**
   * Renders a custom link for an action to advance to the next decision point
   *
   * @param mixed $object The Scenario object
   * @param array $params Array with parameters for the link to render
   */
  public function linkToNextDecision($object, $params)
  {
    //TODO calculate proper number of ticks
    $ticks='2';

    return '<li class="sf_admin_action_sim_next_decision">'.link_to(__($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks='.$ticks,
            array('id' => 'scenario_sim_next_decision')).'</li>';
  }

  /**
   * Renders a custom link to run the simulation all at once
   *
   * @param mixed $object The Scenario object
   * @param array $params Array with parameters for the link to render
   */
  public function linkToFinish($object, $params)
  {
    $ticks = $object->getLifespan() - $object->getCurrentTick();

    return '<li class="sf_admin_action_sim_finish">'.link_to(__($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks='.$ticks,
            array('id' => 'scenario_sim_finish')).'</li>';
  }
}
