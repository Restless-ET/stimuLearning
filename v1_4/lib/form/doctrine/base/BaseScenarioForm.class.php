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
      'id'                            => new sfWidgetFormInputHidden(),
      'description'                   => new sfWidgetFormInputText(),
      'simulation_status'             => new sfWidgetFormChoice(array('choices' => array('Unstarted' => 'Unstarted', 'Paused' => 'Paused', 'Running' => 'Running', 'Finished' => 'Finished'))),
      'market_clients_total'          => new sfWidgetFormInputText(),
      'tick_alias'                    => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Day' => 'Day', 'Month' => 'Month', 'Year' => 'Year'))),
      'simulation_lifespan'           => new sfWidgetFormInputText(),
      'decision_points'               => new sfWidgetFormInputText(),
      'ticks_between_decision_points' => new sfWidgetFormInputText(),
      'time_between_ticks'            => new sfWidgetFormInputText(),
      'tariffs_erosion_rate'          => new sfWidgetFormInputText(),
      'depreciation_rate'             => new sfWidgetFormInputText(),
      'interest_rate'                 => new sfWidgetFormInputText(),
      'elasticity'                    => new sfWidgetFormInputText(),
      'bankrupcy_limit'               => new sfWidgetFormInputText(),
      'starting_level'                => new sfWidgetFormInputText(),
      'saturation_level'              => new sfWidgetFormInputText(),
      'alpha'                         => new sfWidgetFormInputText(),
      'beta'                          => new sfWidgetFormInputText(),
      'number_of_services_weight'     => new sfWidgetFormInputText(),
      'download_weight'               => new sfWidgetFormInputText(),
      'upload_weight'                 => new sfWidgetFormInputText(),
      'rate_weight'                   => new sfWidgetFormInputText(),
      'fee_weight'                    => new sfWidgetFormInputText(),
      'occupation_rate_weight'        => new sfWidgetFormInputText(),
      'containment_factor_weight'     => new sfWidgetFormInputText(),
      'reference_occupation_rate'     => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'updated_at'                    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'description'                   => new sfValidatorString(array('max_length' => 100)),
      'simulation_status'             => new sfValidatorChoice(array('choices' => array(0 => 'Unstarted', 1 => 'Paused', 2 => 'Running', 3 => 'Finished'), 'required' => false)),
      'market_clients_total'          => new sfValidatorInteger(),
      'tick_alias'                    => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Day', 2 => 'Month', 3 => 'Year'))),
      'simulation_lifespan'           => new sfValidatorInteger(),
      'decision_points'               => new sfValidatorInteger(),
      'ticks_between_decision_points' => new sfValidatorInteger(),
      'time_between_ticks'            => new sfValidatorInteger(),
      'tariffs_erosion_rate'          => new sfValidatorNumber(),
      'depreciation_rate'             => new sfValidatorNumber(),
      'interest_rate'                 => new sfValidatorNumber(),
      'elasticity'                    => new sfValidatorNumber(),
      'bankrupcy_limit'               => new sfValidatorNumber(),
      'starting_level'                => new sfValidatorNumber(),
      'saturation_level'              => new sfValidatorNumber(),
      'alpha'                         => new sfValidatorInteger(),
      'beta'                          => new sfValidatorNumber(),
      'number_of_services_weight'     => new sfValidatorNumber(),
      'download_weight'               => new sfValidatorNumber(),
      'upload_weight'                 => new sfValidatorNumber(),
      'rate_weight'                   => new sfValidatorNumber(),
      'fee_weight'                    => new sfValidatorNumber(),
      'occupation_rate_weight'        => new sfValidatorNumber(),
      'containment_factor_weight'     => new sfValidatorNumber(),
      'reference_occupation_rate'     => new sfValidatorNumber(),
      'created_at'                    => new sfValidatorDateTime(),
      'updated_at'                    => new sfValidatorDateTime(),
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
