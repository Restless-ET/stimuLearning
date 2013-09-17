<?php

/**
 * Operator form base class.
 *
 * @method Operator getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOperatorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInputText(),
      'starting_market_size'    => new sfWidgetFormInputText(),
      'current_market_size'     => new sfWidgetFormInputText(),
      'balance'                 => new sfWidgetFormInputText(),
      'net_present_value'       => new sfWidgetFormInputText(),
      'market_share'            => new sfWidgetFormInputText(),
      'payback_period'          => new sfWidgetFormInputText(),
      'internal_rate_of_return' => new sfWidgetFormInputText(),
      'accumulated_CAPEX'       => new sfWidgetFormInputText(),
      'user_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'scenario_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'), 'add_empty' => false)),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 150)),
      'starting_market_size'    => new sfValidatorInteger(),
      'current_market_size'     => new sfValidatorInteger(array('required' => false)),
      'balance'                 => new sfValidatorNumber(array('required' => false)),
      'net_present_value'       => new sfValidatorNumber(array('required' => false)),
      'market_share'            => new sfValidatorNumber(array('required' => false)),
      'payback_period'          => new sfValidatorNumber(array('required' => false)),
      'internal_rate_of_return' => new sfValidatorNumber(array('required' => false)),
      'accumulated_CAPEX'       => new sfValidatorNumber(),
      'user_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'scenario_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'))),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('operator[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Operator';
  }

}
