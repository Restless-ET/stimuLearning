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
      'started'                       => new sfWidgetFormInputCheckbox(),
      'finished'                      => new sfWidgetFormInputCheckbox(),
      'total_clients'                 => new sfWidgetFormInputText(),
      'tick_alias'                    => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Week' => 'Week', 'Month' => 'Month', 'Year' => 'Year'))),
      'current_tick'                  => new sfWidgetFormInputText(),
      'lifespan'                      => new sfWidgetFormInputText(),
      'total_decision_points'         => new sfWidgetFormInputText(),
      'ticks_between_decision_points' => new sfWidgetFormInputText(),
      'starting_level'                => new sfWidgetFormInputText(),
      'saturation_level'              => new sfWidgetFormInputText(),
      'alpha'                         => new sfWidgetFormInputText(),
      'beta'                          => new sfWidgetFormInputText(),
      'total_area'                    => new sfWidgetFormInputText(),
      'dense_urban_territory'         => new sfWidgetFormInputText(),
      'dense_urban_area'              => new sfWidgetFormInputText(),
      'urban_territory'               => new sfWidgetFormInputText(),
      'urban_area'                    => new sfWidgetFormInputText(),
      'suburban_territory'            => new sfWidgetFormInputText(),
      'suburban_area'                 => new sfWidgetFormInputText(),
      'rural_territory'               => new sfWidgetFormInputText(),
      'rural_area'                    => new sfWidgetFormInputText(),
      'dense_urban_distribution'      => new sfWidgetFormInputText(),
      'dense_urban_population'        => new sfWidgetFormInputText(),
      'urban_distribution'            => new sfWidgetFormInputText(),
      'urban_population'              => new sfWidgetFormInputText(),
      'suburban_distribution'         => new sfWidgetFormInputText(),
      'suburban_population'           => new sfWidgetFormInputText(),
      'rural_distribution'            => new sfWidgetFormInputText(),
      'rural_population'              => new sfWidgetFormInputText(),
      'packages_erosion_rate'         => new sfWidgetFormInputText(),
      'depreciation_rate'             => new sfWidgetFormInputText(),
      'interest_rate'                 => new sfWidgetFormInputText(),
      'elasticity'                    => new sfWidgetFormInputText(),
      'bankrupcy_limit'               => new sfWidgetFormInputText(),
      'number_of_services_weight'     => new sfWidgetFormInputText(),
      'download_weight'               => new sfWidgetFormInputText(),
      'upload_weight'                 => new sfWidgetFormInputText(),
      'rate_weight'                   => new sfWidgetFormInputText(),
      'fee_weight'                    => new sfWidgetFormInputText(),
      'occupation_rate_weight'        => new sfWidgetFormInputText(),
      'containment_factor_weight'     => new sfWidgetFormInputText(),
      'reference_occupation_rate'     => new sfWidgetFormInputText(),
      'responsible_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Responsible'), 'add_empty' => true)),
      'created_at'                    => new sfWidgetFormDateTime(),
      'updated_at'                    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'description'                   => new sfValidatorString(array('max_length' => 100)),
      'started'                       => new sfValidatorBoolean(array('required' => false)),
      'finished'                      => new sfValidatorBoolean(array('required' => false)),
      'total_clients'                 => new sfValidatorInteger(),
      'tick_alias'                    => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Week', 2 => 'Month', 3 => 'Year'))),
      'current_tick'                  => new sfValidatorInteger(array('required' => false)),
      'lifespan'                      => new sfValidatorInteger(),
      'total_decision_points'         => new sfValidatorInteger(),
      'ticks_between_decision_points' => new sfValidatorInteger(),
      'starting_level'                => new sfValidatorNumber(),
      'saturation_level'              => new sfValidatorNumber(),
      'alpha'                         => new sfValidatorInteger(),
      'beta'                          => new sfValidatorNumber(),
      'total_area'                    => new sfValidatorNumber(array('required' => false)),
      'dense_urban_territory'         => new sfValidatorNumber(array('required' => false)),
      'dense_urban_area'              => new sfValidatorNumber(array('required' => false)),
      'urban_territory'               => new sfValidatorNumber(array('required' => false)),
      'urban_area'                    => new sfValidatorNumber(array('required' => false)),
      'suburban_territory'            => new sfValidatorNumber(array('required' => false)),
      'suburban_area'                 => new sfValidatorNumber(array('required' => false)),
      'rural_territory'               => new sfValidatorNumber(array('required' => false)),
      'rural_area'                    => new sfValidatorNumber(array('required' => false)),
      'dense_urban_distribution'      => new sfValidatorNumber(array('required' => false)),
      'dense_urban_population'        => new sfValidatorInteger(),
      'urban_distribution'            => new sfValidatorNumber(array('required' => false)),
      'urban_population'              => new sfValidatorInteger(),
      'suburban_distribution'         => new sfValidatorNumber(array('required' => false)),
      'suburban_population'           => new sfValidatorInteger(),
      'rural_distribution'            => new sfValidatorNumber(array('required' => false)),
      'rural_population'              => new sfValidatorInteger(),
      'packages_erosion_rate'         => new sfValidatorNumber(),
      'depreciation_rate'             => new sfValidatorNumber(),
      'interest_rate'                 => new sfValidatorNumber(),
      'elasticity'                    => new sfValidatorNumber(),
      'bankrupcy_limit'               => new sfValidatorNumber(),
      'number_of_services_weight'     => new sfValidatorNumber(array('required' => false)),
      'download_weight'               => new sfValidatorNumber(array('required' => false)),
      'upload_weight'                 => new sfValidatorNumber(array('required' => false)),
      'rate_weight'                   => new sfValidatorNumber(array('required' => false)),
      'fee_weight'                    => new sfValidatorNumber(array('required' => false)),
      'occupation_rate_weight'        => new sfValidatorNumber(array('required' => false)),
      'containment_factor_weight'     => new sfValidatorNumber(array('required' => false)),
      'reference_occupation_rate'     => new sfValidatorNumber(array('required' => false)),
      'responsible_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Responsible'), 'required' => false)),
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
