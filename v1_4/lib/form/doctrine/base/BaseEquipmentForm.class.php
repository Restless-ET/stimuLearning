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
      'nature_or_purpose' => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Construção civil' => 'Construção civil', 'Cabos de cobre' => 'Cabos de cobre', 'Cabos de fibra' => 'Cabos de fibra', 'Electrónica' => 'Electrónica', 'Componentes ópticos avançados' => 'Componentes ópticos avançados', 'Componentes ópticos passivos' => 'Componentes ópticos passivos'))),
      'tecnology_age'     => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Velha' => 'Velha', 'Madura' => 'Madura', 'Nova' => 'Nova', 'Emergente' => 'Emergente'))),
      'setup_speed'       => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Muito rápida' => 'Muito rápida', 'Rápida' => 'Rápida', 'Lenta' => 'Lenta', 'Muito lenta' => 'Muito lenta'))),
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
      'nature_or_purpose' => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Construção civil', 2 => 'Cabos de cobre', 3 => 'Cabos de fibra', 4 => 'Electrónica', 5 => 'Componentes ópticos avançados', 6 => 'Componentes ópticos passivos'), 'required' => false)),
      'tecnology_age'     => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Velha', 2 => 'Madura', 3 => 'Nova', 4 => 'Emergente'), 'required' => false)),
      'setup_speed'       => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Muito rápida', 2 => 'Rápida', 3 => 'Lenta', 4 => 'Muito lenta'), 'required' => false)),
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
