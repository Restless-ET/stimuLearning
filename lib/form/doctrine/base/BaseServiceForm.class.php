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
      'id'               => new sfWidgetFormInputHidden(),
      'setup_fee'        => new sfWidgetFormInputText(),
      'cost_per_user'    => new sfWidgetFormInputText(),
      'CAPEX_percentage' => new sfWidgetFormInputText(),
      'tick_to_apply'    => new sfWidgetFormInputText(),
      'operator_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'), 'add_empty' => false)),
      'scenario_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'), 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'setup_fee'        => new sfValidatorNumber(),
      'cost_per_user'    => new sfValidatorNumber(),
      'CAPEX_percentage' => new sfValidatorNumber(),
      'tick_to_apply'    => new sfValidatorInteger(),
      'operator_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'))),
      'scenario_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'))),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
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
