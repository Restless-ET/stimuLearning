<?php

/**
 * scenario module helper.
 *
 * @package    stimuLearning
 * @subpackage scenario
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ScenarioGeneratorHelper extends BaseScenarioGeneratorHelper
{
    /**
     * Renders a custom link for an action to initialize the simulation
     *
     * @param mixed $object The Scenario object
     * @param array $params Array with parameters for the link to render
     *
     * @return string
     */
    public function linkToStartSimulation($object, $params)
    {
        $label = __($params['label'], array(), 'sf_admin');

        return '<li class="sf_admin_action_sim_init">'.link_to(
             UIHelper::addIcon($params).'<span>'.$label.'</span>',
             'scenario/startSimulation?id='.$object->getId(),
             array('id' => 'scenario_sim_init')
        ).'</li>';

        //return '<li class="sf_admin_action_custom">'.link_to(UIHelper::addIcon($params).'<span>'.__($params['label'],
        //  array(), 'sf_admin').'</span>', 'client/'.$params['action'].'?id='.$object->getId(),
        //  array('class' => str_replace('class=', '', $params['params']), 'confirm' => $params['confirm'])).'</li>';
    }

    /**
     * Renders a custom link for an action to advance to the next step
     *
     * @param mixed $object The Scenario object
     * @param array $params Array with parameters for the link to render
     *
     * @return string
     */
    public function linkToNextStep($object, $params)
    {
        return '<li class="sf_admin_action_sim_next_step">'.link_to(
            __($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks=1',
            array('id' => 'scenario_sim_next_step')
        ).'</li>';
    }

    /**
     * Renders a custom link for an action to advance to the next decision point
     *
     * @param mixed $object The Scenario object
     * @param array $params Array with parameters for the link to render
     *
     * @return string
     */
    public function linkToNextDecision($object, $params)
    {
        $nextDP = floor($object->getCurrentTick() / $object->getTicksBetweenDecisionPoints()) + 1;
        $targetStep = $object->getTicksBetweenDecisionPoints() * $nextDP;

        if ($targetStep > $object->getLifespan()) {
            $targetStep = $object->getLifespan();
        }
        $ticks = $targetStep - $object->getCurrentTick();

        return '<li class="sf_admin_action_sim_next_decision">'.link_to(
            __($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks='.$ticks,
            array('id' => 'scenario_sim_next_decision')
        ).'</li>';
    }

    /**
     * Renders a custom link to run the simulation all at once
     *
     * @param mixed $object The Scenario object
     * @param array $params Array with parameters for the link to render
     *
     * @return string
     */
    public function linkToFinish($object, $params)
    {
        $ticks = $object->getLifespan() - $object->getCurrentTick();

        return '<li class="sf_admin_action_sim_finish">'.link_to(
            __($params['label'], array(), 'messages'),
            'scenario/advanceSimulation?id='.$object->getId().'&ticks='.$ticks,
            array('id' => 'scenario_sim_finish')
        ).'</li>';
    }
}
