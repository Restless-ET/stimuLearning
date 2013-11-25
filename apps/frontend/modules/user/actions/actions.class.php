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

    /**
     * Process Form Action
     * Overrided parent method for more useful flash messages and page redirects.
     *
     * @param sfWebRequest $request A request object
     * @param sfForm       $form    A form object
     *
     * @return void
     */
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ?
             'Your account was registered successfully. You can now log on into the platform!':
             'The user details were updated successfully.';

            $user = $form->save();

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $user)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', 'The user was created successfully. You can add another one below.');

                $this->redirect('@user_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                if ($this->getUser()->hasCredential('admin')) {
                    $this->redirect(array('sf_route' => 'user_edit', 'sf_subject' => $user));
                } else {
                    $this->redirect('@login');
                }
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
