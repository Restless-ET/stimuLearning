<?php

/**
 * equipment actions.
 *
 * @package    stimuLearning
 * @subpackage equipment
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class equipmentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->equipments = Doctrine_Core::getTable('Equipment')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EquipmentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EquipmentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($equipment = Doctrine_Core::getTable('Equipment')->find(array($request->getParameter('id'))), sprintf('Object equipment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EquipmentForm($equipment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($equipment = Doctrine_Core::getTable('Equipment')->find(array($request->getParameter('id'))), sprintf('Object equipment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EquipmentForm($equipment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($equipment = Doctrine_Core::getTable('Equipment')->find(array($request->getParameter('id'))), sprintf('Object equipment does not exist (%s).', $request->getParameter('id')));
    $equipment->delete();

    $this->redirect('equipment/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $equipment = $form->save();

      $this->redirect('equipment/edit?id='.$equipment->getId());
    }
  }
}
