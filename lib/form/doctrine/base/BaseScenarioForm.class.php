<?php

/**
 * Scenario form base class.
 *
 * @method Scenario getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseScenarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'description'                   => new sfWidgetFormInputText(),
      'simulation_status'             => new sfWidgetFormChoice(array('choices' => array('Unstarted' => 'Unstarted', 'Running' => 'Running', 'Finished' => 'Finished'))),
      'market_clients_total'          => new sfWidgetFormInputText(),
      'tick_alias'                    => new sfWidgetFormChoice(array('choices' => array('' => NULL, 'Day' => 'Day', 'Month' => 'Month', 'Year' => 'Year'))),
      'simulation_lifespan'           => new sfWidgetFormInputText(),
      'total_decision_points'         => new sfWidgetFormInputText(),
      'ticks_between_decision_points' => new sfWidgetFormInputText(),
      'tariffs_erosion_rate'          => new sfWidgetFormInputText(),
      'depreciation_rate'             => new sfWidgetFormInputText(),
      'interest_rate'                 => new sfWidgetFormInputText(),
      'elasticity'                    => new sfWidgetFormInputText(),
      'bankrupcy_limit'               => new sfWidgetFormInputText(),
      'starting_level'                => new sfWidgetFormInputText(),
      'saturation_level'              => new sfWidgetFormInputText(),
      'alpha'                         => new sfWidgetFormInputText(),
      'beta'                          => new sfWidgetFormInputText(),
      'number_of_services_weight'     => new sfWidgetFormInputText(),
      'download_weight'               => new sfWidgetFormInputText(),
      'upload_weight'                 => new sfWidgetFormInputText(),
      'rate_weight'                   => new sfWidgetFormInputText(),
      'fee_weight'                    => new sfWidgetFormInputText(),
      'occupation_rate_weight'        => new sfWidgetFormInputText(),
      'containment_factor_weight'     => new sfWidgetFormInputText(),
      'reference_occupation_rate'     => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'updated_at'                    => new sfWidgetFormDateTime(),
      'available_technologies_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Technology')),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'description'                   => new sfValidatorString(array('max_length' => 100)),
      'simulation_status'             => new sfValidatorChoice(array('choices' => array(0 => 'Unstarted', 1 => 'Running', 2 => 'Finished'), 'required' => false)),
      'market_clients_total'          => new sfValidatorInteger(),
      'tick_alias'                    => new sfValidatorChoice(array('choices' => array(0 => NULL, 1 => 'Day', 2 => 'Month', 3 => 'Year'))),
      'simulation_lifespan'           => new sfValidatorInteger(),
      'total_decision_points'         => new sfValidatorInteger(),
      'ticks_between_decision_points' => new sfValidatorInteger(),
      'tariffs_erosion_rate'          => new sfValidatorNumber(),
      'depreciation_rate'             => new sfValidatorNumber(),
      'interest_rate'                 => new sfValidatorNumber(),
      'elasticity'                    => new sfValidatorNumber(),
      'bankrupcy_limit'               => new sfValidatorNumber(),
      'starting_level'                => new sfValidatorNumber(),
      'saturation_level'              => new sfValidatorNumber(),
      'alpha'                         => new sfValidatorInteger(),
      'beta'                          => new sfValidatorNumber(),
      'number_of_services_weight'     => new sfValidatorNumber(),
      'download_weight'               => new sfValidatorNumber(),
      'upload_weight'                 => new sfValidatorNumber(),
      'rate_weight'                   => new sfValidatorNumber(),
      'fee_weight'                    => new sfValidatorNumber(),
      'occupation_rate_weight'        => new sfValidatorNumber(),
      'containment_factor_weight'     => new sfValidatorNumber(),
      'reference_occupation_rate'     => new sfValidatorNumber(),
      'created_at'                    => new sfValidatorDateTime(),
      'updated_at'                    => new sfValidatorDateTime(),
      'available_technologies_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Technology', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('scenario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Scenario';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['available_technologies_list']))
    {
      $this->setDefault('available_technologies_list', $this->object->AvailableTechnologies->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAvailableTechnologiesList($con);

    parent::doSave($con);
  }

  public function saveAvailableTechnologiesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['available_technologies_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->AvailableTechnologies->getPrimaryKeys();
    $values = $this->getValue('available_technologies_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AvailableTechnologies', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AvailableTechnologies', array_values($link));
    }
  }

}
