<?php

/**
 * Equipment filter form base class.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEquipmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'starting_price'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'number_of_ports'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'network_level'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'life_expectation'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'equipment_type'    => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Wired' => 'Wired', 'Wireless' => 'Wireless'))),
      'nature_or_purpose' => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Building/Construction (1)' => 'Building/Construction (1)', 'Copper cables (1)' => 'Copper cables (1)', 'Fiber cables (0.8)' => 'Fiber cables (0.8)', 'Electronics (0.9)' => 'Electronics (0.9)', 'Advanced Optical Components (0.7)' => 'Advanced Optical Components (0.7)', 'Passive Optical Components (0.8)' => 'Passive Optical Components (0.8)'))),
      'tecnology_age'     => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Old (0.5)' => 'Old (0.5)', 'Mature (0.1)' => 'Mature (0.1)', 'New (0.01)' => 'New (0.01)', 'Emerging (0.001)' => 'Emerging (0.001)'))),
      'setup_speed'       => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Very fast (5)' => 'Very fast (5)', 'Fast (10)' => 'Fast (10)', 'Slow (20)' => 'Slow (20)', 'Very slow (40)' => 'Very slow (40)'))),
      'architecture_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Architecture'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'starting_price'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'number_of_ports'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'network_level'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'life_expectation'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'equipment_type'    => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Wired' => 'Wired', 'Wireless' => 'Wireless'))),
      'nature_or_purpose' => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Building/Construction (1)' => 'Building/Construction (1)', 'Copper cables (1)' => 'Copper cables (1)', 'Fiber cables (0.8)' => 'Fiber cables (0.8)', 'Electronics (0.9)' => 'Electronics (0.9)', 'Advanced Optical Components (0.7)' => 'Advanced Optical Components (0.7)', 'Passive Optical Components (0.8)' => 'Passive Optical Components (0.8)'))),
      'tecnology_age'     => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Old (0.5)' => 'Old (0.5)', 'Mature (0.1)' => 'Mature (0.1)', 'New (0.01)' => 'New (0.01)', 'Emerging (0.001)' => 'Emerging (0.001)'))),
      'setup_speed'       => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Very fast (5)' => 'Very fast (5)', 'Fast (10)' => 'Fast (10)', 'Slow (20)' => 'Slow (20)', 'Very slow (40)' => 'Very slow (40)'))),
      'architecture_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Architecture'), 'column' => 'id')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('equipment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipment';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'starting_price'    => 'Number',
      'number_of_ports'   => 'Number',
      'network_level'     => 'Number',
      'life_expectation'  => 'Number',
      'equipment_type'    => 'Enum',
      'nature_or_purpose' => 'Enum',
      'tecnology_age'     => 'Enum',
      'setup_speed'       => 'Enum',
      'architecture_id'   => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
