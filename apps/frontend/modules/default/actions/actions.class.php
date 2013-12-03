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
        $customize = Doctrine_Core::getTable('Customization')->findAll();
        $this->editableText = $customize[0]['home_page_content'];

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $this->myScenarios = Doctrine_Core::getTable('Scenario')
                                  ->createQuery('s')
                                  ->select('s.description')
                                  ->where('s.responsible_id = ?', $user->getAttribute('id'))
                                  ->andWhere('s.finished = ?', false)
                                  ->execute();

            $this->playerScenarios = Doctrine_Core::getTable('Scenario')
                                      ->createQuery('s')
                                      ->select('s.description')
                                      ->innerJoin('s.Operators o')
                                      ->where('s.responsible_id != ?', $user->getAttribute('id'))
                                      ->andWhere('s.finished = ?', false)
                                      ->andWhere('o.user_id = ?', $user->getAttribute('id'))
                                      ->execute();
        }

        // Should this really be cleaned every time we access the homepage??
        $user->setAttribute('scenarioId', false);
        $user->removeCredential('responsible');
    }

    /**
     * Executes about action
     *
     * @return nothing
     */
    public function executeAbout()
    {
        $customize = Doctrine_Core::getTable('Customization')->findAll();
        $this->editableText = $customize[0]['about_page_content'];
    }

    /**
     * Executes credits action
     *
     * @return nothing
     */
    public function executeCredits()
    {
        $customize = Doctrine_Core::getTable('Customization')->findAll();
        $this->editableText = $customize[0]['credits_page_content'];
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
        // If we're already logged on, send to homepage
        if ($this->getUser()->isAuthenticated()) {
            $this->redirect('@homepage');
        }
        $this->isDemo = $request->getParameter('demo', false);

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
                    $user->setFlash('error',
                        'Invalid authentication! Inserted username and/or password are incorrect.');

                    return sfView::SUCCESS;
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
