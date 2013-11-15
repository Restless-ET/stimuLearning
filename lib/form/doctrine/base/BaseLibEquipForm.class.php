<?php

/**
 * LibEquip form base class.
 *
 * @method LibEquip getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLibEquipForm extends BaseFormDoctrine
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
      'tecnology_age'     => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Old (0.5)' => 'Old (0.5)', 'Mature (0.1)' => 'Mature (0.1)', 'New (0.01)' => 'New (0.01)', 'Emerging (0.001)' => 'Emerging (0.001)'))),
      'setup_speed'       => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Very fast (5)' => 'Very fast (5)', 'Fast (10)' => 'Fast (10)', 'Slow (20)' => 'Slow (20)', 'Very slow (40)' => 'Very slow (40)'))),
      'arch_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Architecture'), 'add_empty' => false)),
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
      'tecnology_age'     => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Old (0.5)', 2 => 'Mature (0.1)', 3 => 'New (0.01)', 4 => 'Emerging (0.001)'), 'required' => false)),
      'setup_speed'       => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Very fast (5)', 2 => 'Fast (10)', 3 => 'Slow (20)', 4 => 'Very slow (40)'), 'required' => false)),
      'arch_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Architecture'))),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('lib_equip[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LibEquip';
  }

}