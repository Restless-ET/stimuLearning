<?php

/**
 * Architecture form base class.
 *
 * @method Architecture getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArchitectureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'name'               => new sfWidgetFormInputText(),
      'download_bandwidth' => new sfWidgetFormInputText(),
      'upload_bandwidth'   => new sfWidgetFormInputText(),
      'image'              => new sfWidgetFormInputText(),
      'technology_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Technology'), 'add_empty' => false)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 100)),
      'download_bandwidth' => new sfValidatorInteger(),
      'upload_bandwidth'   => new sfValidatorInteger(),
      'image'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'technology_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Technology'))),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('architecture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Architecture';
  }

}
