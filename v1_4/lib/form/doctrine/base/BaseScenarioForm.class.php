<?php

/**
 * Scenario form base class.
 *
 * @method Scenario getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseScenarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'description'         => new sfWidgetFormInputText(),
      'simulation_lifespan' => new sfWidgetFormInputText(),
      'starting_level'      => new sfWidgetFormInputText(),
      'saturation_level'    => new sfWidgetFormInputText(),
      'alpha'               => new sfWidgetFormInputText(),
      'beta'                => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'description'         => new sfValidatorString(array('max_length' => 50)),
      'simulation_lifespan' => new sfValidatorInteger(array('required' => false)),
      'starting_level'      => new sfValidatorNumber(),
      'saturation_level'    => new sfValidatorNumber(),
      'alpha'               => new sfValidatorInteger(),
      'beta'                => new sfValidatorNumber(),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('scenario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Scenario';
  }

}
