<?php

/**
 * Technology form base class.
 *
 * @method Technology getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTechnologyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'description'          => new sfWidgetFormTextarea(),
      'first_tick_available' => new sfWidgetFormInputText(),
      'decline_A'            => new sfWidgetFormInputText(),
      'decline_B'            => new sfWidgetFormInputText(),
      'operator_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'), 'add_empty' => false)),
      'scenario_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'), 'add_empty' => false)),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 100)),
      'description'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'first_tick_available' => new sfValidatorInteger(array('required' => false)),
      'decline_A'            => new sfValidatorNumber(),
      'decline_B'            => new sfValidatorNumber(),
      'operator_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'))),
      'scenario_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'))),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('technology[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Technology';
  }

}
