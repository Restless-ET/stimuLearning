<?php

require_once dirname(__FILE__).'/../lib/userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/userGeneratorHelper.class.php';

/**
 * user actions.
 *
 * @package    stimuLearning
 * @subpackage user
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class UserActions extends autoUserActions
{
    // The entire module is secured for 'admin' only

    /**
     * Override edit action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return nothing
     */
    public function executeEdit(sfWebRequest $request)
    {
        $user = $this->getUser();
        $dbUser = $this->getRoute()->getObject();
        if (!$user->hasCredential('admin') && $user->getAttribute('id') != $dbUser->getId()) {
            $this->redirect('user/edit?id='.$user->getAttribute('id'));
        }

        parent::executeEdit($request);
    }
}
