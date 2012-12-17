<?php

/**
 * Technology filter form base class.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTechnologyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'          => new sfWidgetFormFilterInput(),
      'first_tick_available' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'decline_A'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'decline_B'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'scenarios_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Scenario')),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'description'          => new sfValidatorPass(array('required' => false)),
      'first_tick_available' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'decline_A'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'decline_B'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'scenarios_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Scenario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('technology_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addScenariosListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ScenarioTechnology.scenario_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Technology';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'description'          => 'Text',
      'first_tick_available' => 'Number',
      'decline_A'            => 'Number',
      'decline_B'            => 'Number',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'scenarios_list'       => 'ManyKey',
    );
  }
}
