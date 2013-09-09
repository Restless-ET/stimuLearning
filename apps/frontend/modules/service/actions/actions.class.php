<?php

/**
 * service actions.
 *
 * @package    stimuLearning
 * @subpackage service
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ServiceActions extends sfActions
{
    /**
     * Executes index action
     *
     * @return nothing
     */
    public function executeIndex()
    {
        $this->services = Doctrine_Core::getTable('Service')
                                  ->createQuery('a')
                                  ->execute();
    }

    /**
     * Executes new action
     *
     * @return nothing
     */
    public function executeNew()
    {
        $this->form = new ServiceForm();
    }

    /**
     * Executes create action
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ServiceForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    /**
     * Executes edit action
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeEdit(sfWebRequest $request)
    {
        $service = Doctrine_Core::getTable('Service')->find(array($request->getParameter('id')));
        $this->forward404Unless(
            $service,
            sprintf('Object Service does not exist (%s).', $request->getParameter('id'))
        );
        $this->form = new ServiceForm($service);
    }

    /**
     * Executes update action
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $service = Doctrine_Core::getTable('Service')->find(array($request->getParameter('id')));
        $this->forward404Unless(
            $service,
            sprintf('Object Service does not exist (%s).', $request->getParameter('id'))
        );
        $this->form = new ServiceForm($service);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    /**
     * Executes delete action
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
        $service = Doctrine_Core::getTable('Service')->find(array($request->getParameter('id')));
        $this->forward404Unless(
            $service,
            sprintf('Object Service does not exist (%s).', $request->getParameter('id'))
        );
        $service->delete();

        $this->redirect('service/index');
    }

    /**
     * Process form data by validating the form and then saving it
     *
     * @param sfWebRequest $request A request object
     * @param sfForm       $form    A Form object
     *
     * @access protected
     *
     * @return nothing
     */
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $service = $form->save();

            $this->redirect('service/edit?id='.$service->getId());
        }
    }
}
