<?php

/**
 * decisions actions.
 *
 * @package    stimuLearning
 * @subpackage decisions
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class DecisionsActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->decision_points = Doctrine_Core::getTable('DecisionPoint')
                                  ->createQuery('a')
                                  ->execute();
    }

    /**
     * Executes new action
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new DecisionPointForm();
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

        $this->form = new DecisionPointForm();

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
        $decision_point = Doctrine_Core::getTable('DecisionPoint')->find(array($request->getParameter('id')));
        $this->forward404Unless(
            $decision_point,
            sprintf('Object decision_point does not exist (%s).', $request->getParameter('id'))
        );
        $this->form = new DecisionPointForm($decision_point);
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
        $decision_point = Doctrine_Core::getTable('DecisionPoint')->find(array($request->getParameter('id')));
        $this->forward404Unless(
            $decision_point,
            sprintf('Object decision_point does not exist (%s).', $request->getParameter('id'))
        );
        $this->form = new DecisionPointForm($decision_point);

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
        $decision_point = Doctrine_Core::getTable('DecisionPoint')->find(array($request->getParameter('id')));
        $this->forward404Unless(
            $decision_point,
            sprintf('Object decision_point does not exist (%s).', $request->getParameter('id'))
        );
        $decision_point->delete();

        $this->redirect('decisions/index');
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
            $decision_point = $form->save();

            $this->redirect('decisions/edit?id='.$decision_point->getId());
        }
    }
}
