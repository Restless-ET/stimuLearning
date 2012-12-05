<?php

/**
 * Technology form base class.
 *
 * @method Technology getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTechnologyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'description'          => new sfWidgetFormTextarea(),
      'first_tick_available' => new sfWidgetFormInputText(),
      'decline_A'            => new sfWidgetFormInputText(),
      'decline_B'            => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'scenarios_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Scenario')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 100)),
      'description'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'first_tick_available' => new sfValidatorInteger(array('required' => false)),
      'decline_A'            => new sfValidatorNumber(),
      'decline_B'            => new sfValidatorNumber(),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'scenarios_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Scenario', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('technology[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Technology';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['scenarios_list']))
    {
      $this->setDefault('scenarios_list', $this->object->Scenarios->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveScenariosList($con);

    parent::doSave($con);
  }

  public function saveScenariosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['scenarios_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Scenarios->getPrimaryKeys();
    $values = $this->getValue('scenarios_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Scenarios', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Scenarios', array_values($link));
    }
  }

}
