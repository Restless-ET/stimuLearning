<?php

/**
 * operator module configuration.
 *
 * @package    stimuLearning
 * @subpackage operator
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class OperatorGeneratorConfiguration extends BaseOperatorGeneratorConfiguration
{
    public function getShowActions()
    {
        $actions = parent::getShowActions();
        //unset($actions['_edit'], $actions['_delete']);

        return $actions;
    }
}
