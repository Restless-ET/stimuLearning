<?php

/**
 * Operator filter form base class.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOperatorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'starting_market_size'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'balance'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'net_present_value'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'market_share'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'payback_period'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'internal_rate_of_return' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'scenario_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'), 'add_empty' => true)),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'starting_market_size'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'balance'                 => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'net_present_value'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'market_share'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'payback_period'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'internal_rate_of_return' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'user_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'scenario_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Scenario'), 'column' => 'id')),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('operator_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Operator';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'starting_market_size'    => 'Number',
      'balance'                 => 'Number',
      'net_present_value'       => 'Number',
      'market_share'            => 'Number',
      'payback_period'          => 'Number',
      'internal_rate_of_return' => 'Number',
      'user_id'                 => 'ForeignKey',
      'scenario_id'             => 'ForeignKey',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
