<?php

/**
 * Customization form base class.
 *
 * @method Customization getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCustomizationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'home_page_content'    => new sfWidgetFormTextarea(),
      'about_page_content'   => new sfWidgetFormTextarea(),
      'credits_page_content' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'home_page_content'    => new sfValidatorString(),
      'about_page_content'   => new sfValidatorString(),
      'credits_page_content' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('customization[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Customization';
  }

}
