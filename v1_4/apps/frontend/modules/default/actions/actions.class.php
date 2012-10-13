<?php

/**
 * default actions.
 *
 * @package    stimuLearning
 * @subpackage default
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'error404');
  }
  
  /**
   * Executes error404 action
   *
   * @param sfRequest $request A request object
   *
   * @return nothing
   */
  public function executeError404(sfWebRequest $request)
  {
  }
}
