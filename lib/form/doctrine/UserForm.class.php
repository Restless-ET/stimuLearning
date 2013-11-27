<?php

/**
 * User form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class UserForm extends BaseUserForm
{
    /**
     * Apply the proper widget configurations and validators for this form
     * (non-PHPdoc)
     *
     * @see sfForm::configure()
     *
     * @return nothing
     */
    public function configure()
    {
        unset($this['created_at'], $this['updated_at']);
        $user = sfContext::getInstance()->getUser();

        if (!$user->hasCredential('admin')) {
            unset($this['is_admin']);
        }

        // Prepare the area of password changing
        unset($this['password']);
        $this->setWidget('new_password', new sfWidgetFormInputPassword());
        $this->setValidator('new_password', new sfValidatorString(array('required' => $this->isNew(), 'min_length' => 3)));
        $this->setWidget('confirm_new_password', new sfWidgetFormInputPassword());
        $this->setValidator('confirm_new_password', new sfValidatorString(array('required' => $this->isNew(), 'min_length' => 3)));

        $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare(
            'confirm_new_password',
            sfValidatorSchemaCompare::EQUAL,
            'new_password',
            array(),
            array('invalid' => 'Passwords did not match!')
        ));

        $duplicatedUsernameValidator = new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => 'username'));
        $duplicatedUsernameValidator->setMessage('invalid', 'The chosen username is already in use!');

        $duplicatedEmailValidator = new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => 'email'));
        $duplicatedEmailValidator->setMessage('invalid', 'The inserted email address is already registered');

        $this->mergePostValidator(new sfValidatorAnd(array(
            $duplicatedUsernameValidator, $duplicatedEmailValidator
        )));

    }

  /**
   * This method re-declares baseUserForm doSave method.
   *
   * @param connection $con Connection if not null.
   *
   * @access protected
   *
   * @return nothing
   */
  protected function doSave($con = null)
  {
    if ($this->getValue('new_password')) {
      $this->getObject()->password = md5($this->getValue('new_password'));
    }

    parent::doSave($con);
  }
}
