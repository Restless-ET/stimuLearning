<?php

/**
 * operator actions.
 *
 * @package    stimuLearning
 * @subpackage operator
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class operatorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->operators = Doctrine_Core::getTable('Operator')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OperatorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new OperatorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($operator = Doctrine_Core::getTable('Operator')->find(array($request->getParameter('id'))), sprintf('Object operator does not exist (%s).', $request->getParameter('id')));
    $this->form = new OperatorForm($operator);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($operator = Doctrine_Core::getTable('Operator')->find(array($request->getParameter('id'))), sprintf('Object operator does not exist (%s).', $request->getParameter('id')));
    $this->form = new OperatorForm($operator);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($operator = Doctrine_Core::getTable('Operator')->find(array($request->getParameter('id'))), sprintf('Object operator does not exist (%s).', $request->getParameter('id')));
    $operator->delete();

    $this->redirect('operator/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $operator = $form->save();

      $this->redirect('operator/edit?id='.$operator->getId());
    }
  }
}
