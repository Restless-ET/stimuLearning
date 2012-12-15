<?php

require_once dirname(__FILE__).'/../lib/operatorGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/operatorGeneratorHelper.class.php';

/**
 * operator actions.
 *
 * @package    stimuLearning
 * @subpackage operator
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class operatorActions extends autoOperatorActions
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
    $this->operator = $this->getRoute()->getObject();
    $this->forward404Unless($this->operator);

    //$this->helper = new operatorGeneratorHelper();
    //$this->form = $this->configuration->getForm($this->operator);
  }
}
