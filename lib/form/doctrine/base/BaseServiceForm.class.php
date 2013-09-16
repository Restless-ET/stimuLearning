<?php

/**
 * Service form base class.
 *
 * @method Service getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServiceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'name'               => new sfWidgetFormInputText(),
      'number_of_services' => new sfWidgetFormInputText(),
      'setup_fee'          => new sfWidgetFormInputText(),
      'cost_per_user'      => new sfWidgetFormInputText(),
      'CAPEX_percentage'   => new sfWidgetFormInputText(),
      'periodic_fee'       => new sfWidgetFormInputText(),
      'clients_quota'      => new sfWidgetFormInputText(),
      'tick_to_edit'       => new sfWidgetFormInputText(),
      'operator_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'), 'add_empty' => false)),
      'technology_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Technology'), 'add_empty' => false)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 100)),
      'number_of_services' => new sfValidatorInteger(array('required' => false)),
      'setup_fee'          => new sfValidatorNumber(),
      'cost_per_user'      => new sfValidatorNumber(),
      'CAPEX_percentage'   => new sfValidatorNumber(),
      'periodic_fee'       => new sfValidatorNumber(),
      'clients_quota'      => new sfValidatorNumber(),
      'tick_to_edit'       => new sfValidatorInteger(array('required' => false)),
      'operator_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'))),
      'technology_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Technology'))),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('service[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Service';
  }

}
