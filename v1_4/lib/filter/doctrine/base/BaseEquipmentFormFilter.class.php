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
      'nature_or_purpose' => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Construção civil (1)' => 'Construção civil (1)', 'Cabos de cobre (1)' => 'Cabos de cobre (1)', 'Cabos de fibra (0.8)' => 'Cabos de fibra (0.8)', 'Electrónica (0.9)' => 'Electrónica (0.9)', 'Componentes ópticos avançados (0.7)' => 'Componentes ópticos avançados (0.7)', 'Componentes ópticos passivos (0.8)' => 'Componentes ópticos passivos (0.8)'))),
      'tecnology_age'     => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Velha (0.5)' => 'Velha (0.5)', 'Madura (0.1)' => 'Madura (0.1)', 'Nova (0.01)' => 'Nova (0.01)', 'Emergente (0.001)' => 'Emergente (0.001)'))),
      'setup_speed'       => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Muito rápida (5)' => 'Muito rápida (5)', 'Rápida (10)' => 'Rápida (10)', 'Lenta (20)' => 'Lenta (20)', 'Muito lenta (40)' => 'Muito lenta (40)'))),
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
      'nature_or_purpose' => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Construção civil (1)' => 'Construção civil (1)', 'Cabos de cobre (1)' => 'Cabos de cobre (1)', 'Cabos de fibra (0.8)' => 'Cabos de fibra (0.8)', 'Electrónica (0.9)' => 'Electrónica (0.9)', 'Componentes ópticos avançados (0.7)' => 'Componentes ópticos avançados (0.7)', 'Componentes ópticos passivos (0.8)' => 'Componentes ópticos passivos (0.8)'))),
      'tecnology_age'     => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Velha (0.5)' => 'Velha (0.5)', 'Madura (0.1)' => 'Madura (0.1)', 'Nova (0.01)' => 'Nova (0.01)', 'Emergente (0.001)' => 'Emergente (0.001)'))),
      'setup_speed'       => new sfValidatorChoice(array('required' => false, 'choices' => array('' => NULL, 'Muito rápida (5)' => 'Muito rápida (5)', 'Rápida (10)' => 'Rápida (10)', 'Lenta (20)' => 'Lenta (20)', 'Muito lenta (40)' => 'Muito lenta (40)'))),
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
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
