<?php

/**
 * scenario module configuration.
 *
 * @package    stimuLearning
 * @subpackage scenario
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scenarioGeneratorConfiguration extends BaseScenarioGeneratorConfiguration
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
