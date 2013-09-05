<?php

/**
 * scenario module configuration.
 *
 * @package    stimuLearning
 * @subpackage scenario
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ScenarioGeneratorConfiguration extends BaseScenarioGeneratorConfiguration
{
    /**
     * Get array with fields to display.
     *
     * @return array $showFields Array of fields to display.
     */
    public function getShowDisplay()
    {
        return parent::getEditDisplay();
    }
}
