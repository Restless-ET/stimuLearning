<?php

/**
 * scenario actions.
 *
 * @package    stimuLearning
 * @subpackage scenario
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scenarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->scenarios = Doctrine_Core::getTable('Scenario')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ScenarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ScenarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($scenario = Doctrine_Core::getTable('Scenario')->find(array($request->getParameter('id'))), sprintf('Object scenario does not exist (%s).', $request->getParameter('id')));
    $this->form = new ScenarioForm($scenario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($scenario = Doctrine_Core::getTable('Scenario')->find(array($request->getParameter('id'))), sprintf('Object scenario does not exist (%s).', $request->getParameter('id')));
    $this->form = new ScenarioForm($scenario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($scenario = Doctrine_Core::getTable('Scenario')->find(array($request->getParameter('id'))), sprintf('Object scenario does not exist (%s).', $request->getParameter('id')));
    $scenario->delete();

    $this->redirect('scenario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $scenario = $form->save();

      $this->redirect('scenario/edit?id='.$scenario->getId());
    }
  }
}