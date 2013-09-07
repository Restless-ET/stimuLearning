<?php

/**
 * default actions.
 *
 * @package    stimuLearning
 * @subpackage default
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class DefaultActions extends sfActions
{
    /**
     * Executes index action
     *
     * @return nothing
     */
    public function executeIndex()
    {
        if (!$this->getUser()->isAuthenticated()) {
            $this->redirect('@login');
        } else {
            $this->redirect('@operator');
        }

        //$this->forward('default', 'error404');
    }

    /**
     * Executes login action
     *
     * @param sfRequest $request A request object
     *
     * @return nothing
     */
    public function executeLogin(sfWebRequest $request)
    {
        $this->form = new LoginForm();

        // We must detect that besides being in post, we have posted the login info
        if ($request->isMethod('post') && $request->hasParameter('login')) {
            // Quick access to the user object
            $user = $this->getUser();
            // Clear any credential  that might be remaining from a previous access
            $user->clearCredentials();
            $user->getAttributeHolder()->clear();

            // If i'm posting, I'm trying to login and not just viewing the login page
            $inputData = $request->getParameter('login');

            $this->form->bind($inputData);

            if ($this->form->isValid()) {
                // if the form is valid, then let's get the data from the database
                $username = $inputData['username'];
                $password = $inputData['password'];

                $userFromDb = Doctrine_Core::getTable('User')->findOneBy('username', $username);
                if ($userFromDb === false || ! $userFromDb->passwordMatchesPassword($password)) {
                    return sfView::ERROR;
                }

                if ($userFromDb->is_manager) { // It's a game manager
                    $user->addCredential('manager');
                }
                if ($userFromDb->is_admin) { // It's an administrator
                    $user->addCredential('admin');
                }

                // Disable all doctrine behaviours on the object and then save the last login into database
                //$userFromDb->getListener()->setOption('disabled', true);
                $userFromDb->last_login = date('Y-m-d H:i:s', time());
                $userFromDb->save();

                $user->setAuthenticated(true);
                $user->setAttribute('username', $userFromDb->getUsername());
                $user->setAttribute('id', $userFromDb->id);

                // Login sucessful, take us to the homepage
                $this->redirect('@homepage');
            }
        }
    }

    /**
     * Executes logout action
     *
     * @return sfView::NONE
     */
    public function executeLogout()
    {
        $this->getUser()->clearCredentials();
        $this->getUser()->getAttributeHolder()->clear();
        $this->getUser()->setAuthenticated(false);
        $this->redirect('@homepage');

        return sfView::NONE;
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
