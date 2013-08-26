<?php

/**
 * Scenario filter form base class.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseScenarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'                        => new sfWidgetFormChoice(array('choices' => array('' => '', 'Unstarted' => 'Unstarted', 'Running' => 'Running', 'Finished' => 'Finished'))),
      'total_clients'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tick_alias'                    => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Day' => 'Day', 'Month' => 'Month', 'Year' => 'Year'))),
      'current_tick'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lifespan'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_decision_points'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ticks_between_decision_points' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tariffs_erosion_rate'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depreciation_rate'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'interest_rate'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'elasticity'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bankrupcy_limit'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'starting_level'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'saturation_level'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'alpha'                         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'beta'                          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'number_of_services_weight'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'download_weight'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'upload_weight'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rate_weight'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fee_weight'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'occupation_rate_weight'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'containment_factor_weight'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reference_occupation_rate'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'available_technologies_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Technology')),
    ));

    $this->setValidators(array(
      'description'                   => new sfValidatorPass(array('required' => false)),
      'status'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('Unstarted' => 'Unstarted', 'Running' => 'Running', 'Finished' => 'Finished'))),
      'total_clients'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tick_alias'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Day' => 'Day', 'Month' => 'Month', 'Year' => 'Year'))),
      'current_tick'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lifespan'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_decision_points'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ticks_between_decision_points' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tariffs_erosion_rate'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'depreciation_rate'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'interest_rate'                 => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'elasticity'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bankrupcy_limit'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'starting_level'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'saturation_level'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'alpha'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'beta'                          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'number_of_services_weight'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'download_weight'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'upload_weight'                 => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rate_weight'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fee_weight'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'occupation_rate_weight'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'containment_factor_weight'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'reference_occupation_rate'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'available_technologies_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Technology', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('scenario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAvailableTechnologiesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ScenarioTechnology ScenarioTechnology')
      ->andWhereIn('ScenarioTechnology.techonology_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Scenario';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'description'                   => 'Text',
      'status'                        => 'Enum',
      'total_clients'                 => 'Number',
      'tick_alias'                    => 'Enum',
      'current_tick'                  => 'Number',
      'lifespan'                      => 'Number',
      'total_decision_points'         => 'Number',
      'ticks_between_decision_points' => 'Number',
      'tariffs_erosion_rate'          => 'Number',
      'depreciation_rate'             => 'Number',
      'interest_rate'                 => 'Number',
      'elasticity'                    => 'Number',
      'bankrupcy_limit'               => 'Number',
      'starting_level'                => 'Number',
      'saturation_level'              => 'Number',
      'alpha'                         => 'Number',
      'beta'                          => 'Number',
      'number_of_services_weight'     => 'Number',
      'download_weight'               => 'Number',
      'upload_weight'                 => 'Number',
      'rate_weight'                   => 'Number',
      'fee_weight'                    => 'Number',
      'occupation_rate_weight'        => 'Number',
      'containment_factor_weight'     => 'Number',
      'reference_occupation_rate'     => 'Number',
      'created_at'                    => 'Date',
      'updated_at'                    => 'Date',
      'available_technologies_list'   => 'ManyKey',
    );
  }
}
