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
   * Executes view action for scenario
   *
   * @param sfWebRequest $request A request object
   *
   * @return nothing
   */
  public function executeView(sfWebRequest $request)
  {
    $this->scenario = $this->getRoute()->getObject();

    $this->helper = new scenarioGeneratorHelper();
  }
}
