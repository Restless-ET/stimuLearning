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
      'nature_or_purpose' => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Construção civil (1)' => 'Construção civil (1)', 'Cabos de cobre (1)' => 'Cabos de cobre (1)', 'Cabos de fibra (0.8)' => 'Cabos de fibra (0.8)', 'Electrónica (0.9)' => 'Electrónica (0.9)', 'Componentes ópticos avançados (0.7)' => 'Componentes ópticos avançados (0.7)', 'Componentes ópticos passivos (0.8)' => 'Componentes ópticos passivos (0.8)'))),
      'tecnology_age'     => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Velha (0.5)' => 'Velha (0.5)', 'Madura (0.1)' => 'Madura (0.1)', 'Nova (0.01)' => 'Nova (0.01)', 'Emergente (0.001)' => 'Emergente (0.001)'))),
      'setup_speed'       => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Muito rápida (5)' => 'Muito rápida (5)', 'Rápida (10)' => 'Rápida (10)', 'Lenta (20)' => 'Lenta (20)', 'Muito lenta (40)' => 'Muito lenta (40)'))),
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
      'nature_or_purpose' => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Construção civil (1)', 2 => 'Cabos de cobre (1)', 3 => 'Cabos de fibra (0.8)', 4 => 'Electrónica (0.9)', 5 => 'Componentes ópticos avançados (0.7)', 6 => 'Componentes ópticos passivos (0.8)'), 'required' => false)),
      'tecnology_age'     => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Velha (0.5)', 2 => 'Madura (0.1)', 3 => 'Nova (0.01)', 4 => 'Emergente (0.001)'), 'required' => false)),
      'setup_speed'       => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Muito rápida (5)', 2 => 'Rápida (10)', 3 => 'Lenta (20)', 4 => 'Muito lenta (40)'), 'required' => false)),
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
