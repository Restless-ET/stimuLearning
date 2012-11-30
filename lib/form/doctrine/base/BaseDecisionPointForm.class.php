<?php

/**
 * DecisionPoint form base class.
 *
 * @method DecisionPoint getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDecisionPointForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'tick'        => new sfWidgetFormInputText(),
      'operator_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'), 'add_empty' => false)),
      'scenario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'), 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tick'        => new sfValidatorInteger(),
      'operator_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Operator'))),
      'scenario_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Scenario'))),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('decision_point[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DecisionPoint';
  }

}
