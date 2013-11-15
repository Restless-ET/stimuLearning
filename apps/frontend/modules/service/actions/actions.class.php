<?php

/**
 * service actions.
 *
 * @package    stimuLearning
 * @subpackage service
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ServiceActions extends autoServiceActions
{
    /**
     * Override index action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeIndex(sfWebRequest $request)
    {
        if (!$this->getUser()->getAttribute('scenarioId', 0)) {
            $this->redirect('@homepage'); // @scenario
        }

        parent::executeIndex($request);
    }
}
