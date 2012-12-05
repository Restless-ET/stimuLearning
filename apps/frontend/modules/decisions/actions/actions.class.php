<?php

/**
 * decisions actions.
 *
 * @package    stimuLearning
 * @subpackage decisions
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class decisionsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->decision_points = Doctrine_Core::getTable('DecisionPoint')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DecisionPointForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DecisionPointForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($decision_point = Doctrine_Core::getTable('DecisionPoint')->find(array($request->getParameter('id'))), sprintf('Object decision_point does not exist (%s).', $request->getParameter('id')));
    $this->form = new DecisionPointForm($decision_point);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($decision_point = Doctrine_Core::getTable('DecisionPoint')->find(array($request->getParameter('id'))), sprintf('Object decision_point does not exist (%s).', $request->getParameter('id')));
    $this->form = new DecisionPointForm($decision_point);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($decision_point = Doctrine_Core::getTable('DecisionPoint')->find(array($request->getParameter('id'))), sprintf('Object decision_point does not exist (%s).', $request->getParameter('id')));
    $decision_point->delete();

    $this->redirect('decisions/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $decision_point = $form->save();

      $this->redirect('decisions/edit?id='.$decision_point->getId());
    }
  }
}
