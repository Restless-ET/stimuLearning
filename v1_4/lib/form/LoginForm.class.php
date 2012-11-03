<?php

/**
 * Class that represents a login form
 *
 * @package form
 * @author  Artur Melo <adsmelo@ua.pt>
 */
class LoginForm extends BaseForm
{
  /**
   * Configures the current form
   *
   * @return nothing
   */
  public function configure()
  {
    $this->setWidgets(array(
      'username'    => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputPassword(),
    ));

    //Default validator for strings is required field
    $this->setValidators(array(
      'username'    => new sfValidatorString(array('min_length' => 3)),
      'password'    => new sfValidatorString(),
    ));

    $this->getWidgetSchema()->setNameFormat('login[%s]');
  }
}
