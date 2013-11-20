<?php

/**
 * Equipment form base class.
 *
 * @method Equipment getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEquipmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'starting_price'    => new sfWidgetFormInputText(),
      'number_of_ports'   => new sfWidgetFormInputText(),
      'network_level'     => new sfWidgetFormInputText(),
      'life_expectation'  => new sfWidgetFormInputText(),
      'equipment_type'    => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Wired' => 'Wired', 'Wireless' => 'Wireless'))),
      'nature_or_purpose' => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Building/Construction (1)' => 'Building/Construction (1)', 'Copper cables (1)' => 'Copper cables (1)', 'Fiber cables (0.8)' => 'Fiber cables (0.8)', 'Electronics (0.9)' => 'Electronics (0.9)', 'Advanced Optical Components (0.7)' => 'Advanced Optical Components (0.7)', 'Passive Optical Components (0.8)' => 'Passive Optical Components (0.8)'))),
      'valK'              => new sfWidgetFormInputText(),
      'tecnology_age'     => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Old (0.5)' => 'Old (0.5)', 'Mature (0.1)' => 'Mature (0.1)', 'New (0.01)' => 'New (0.01)', 'Emerging (0.001)' => 'Emerging (0.001)'))),
      'NrIni'             => new sfWidgetFormInputText(),
      'setup_speed'       => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Very fast (5)' => 'Very fast (5)', 'Fast (10)' => 'Fast (10)', 'Slow (20)' => 'Slow (20)', 'Very slow (40)' => 'Very slow (40)'))),
      'deltaT'            => new sfWidgetFormInputText(),
      'maximum_clients'   => new sfWidgetFormInputText(),
      'architecture_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Architecture'), 'add_empty' => false)),
      'operator_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'), 'add_empty' => true)),
      'scenario_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 150)),
      'starting_price'    => new sfValidatorNumber(),
      'number_of_ports'   => new sfValidatorInteger(),
      'network_level'     => new sfValidatorInteger(),
      'life_expectation'  => new sfValidatorInteger(),
      'equipment_type'    => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Wired', 2 => 'Wireless'))),
      'nature_or_purpose' => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Building/Construction (1)', 2 => 'Copper cables (1)', 3 => 'Fiber cables (0.8)', 4 => 'Electronics (0.9)', 5 => 'Advanced Optical Components (0.7)', 6 => 'Passive Optical Components (0.8)'), 'required' => false)),
      'valK'              => new sfValidatorNumber(array('required' => false)),
      'tecnology_age'     => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Old (0.5)', 2 => 'Mature (0.1)', 3 => 'New (0.01)', 4 => 'Emerging (0.001)'), 'required' => false)),
      'NrIni'             => new sfValidatorNumber(array('required' => false)),
      'setup_speed'       => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Very fast (5)', 2 => 'Fast (10)', 3 => 'Slow (20)', 4 => 'Very slow (40)'), 'required' => false)),
      'deltaT'            => new sfValidatorInteger(array('required' => false)),
      'maximum_clients'   => new sfValidatorInteger(array('required' => false)),
      'architecture_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Architecture'))),
      'operator_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'), 'required' => false)),
      'scenario_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'), 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('equipment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipment';
  }

}
