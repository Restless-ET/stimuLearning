<?php

/**
 * Scenario form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ScenarioForm extends BaseScenarioForm
{
  /**
   * Apply the proper widget configurations and validators for this form
   * (non-PHPdoc)
   *
   * @see sfForm::configure()
   *
   * @return nothing
   */
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    unset($this['status'], $this['current_tick'], $this['available_technologies_list']);

    $this->setWidget('lifespan', new amWidgetFormSlider(array(
      'min' => '1',
      'default' => '36',
      'strict_limits' => false,
      'js_on_slide' => 'configAndInitiateGraphDraw();setTicksBetweenDP();',
    )));
    $this->setWidget('total_decision_points', new amWidgetFormSlider(array(
      'max' => '15',
      'default' => '3',
      'js_on_slide' => 'setTicksBetweenDP();',
    )));
    $this->getWidget('ticks_between_decision_points')->setAttribute('readonly', true);
    $this->setWidget('starting_level', new amWidgetFormSlider(array(
      'units' => '%',
      'js_on_slide' => 'configAndInitiateGraphDraw();',
    )));
    $this->setWidget('saturation_level', new amWidgetFormSlider(array(
      'units' => '%',
      'js_on_slide' => 'configAndInitiateGraphDraw();',
    )));
    $this->setWidget('alpha', new amWidgetFormSlider(array(
      'max' => 300,
      'strict_limits' => false,
      'js_on_slide' => 'configAndInitiateGraphDraw();',
    )));
    $this->setWidget('beta', new amWidgetFormSlider(array(
      'min' => -1,
      'max' => 0,
      'step' => 0.02,
      'js_on_slide' => 'configAndInitiateGraphDraw();',
    )));
  }
}
