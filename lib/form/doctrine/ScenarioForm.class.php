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

        $this->setDefault('responsible_id', sfContext::getInstance()->getUser()->getAttribute('id'));

        $this->setWidget('lifespan', new amWidgetFormSlider(array(
          'min' => '1',
          'default' => '36',
          'strict_limits' => false,
          'js_on_slide' => 'configAndInitiateGraphDraw(); setTicksBetweenDP();',
        )));
        $this->setWidget('total_decision_points', new amWidgetFormSlider(array(
          'max' => '15',
          'default' => '3',
          'js_on_slide' => 'setTicksBetweenDP();',
        )));
        $this->setWidget('alpha', new amWidgetFormSlider(array(
          'max' => 1000,
          'strict_limits' => false,
          'js_on_slide' => 'configAndInitiateGraphDraw();',
        )));
        $this->setWidget('beta', new amWidgetFormSlider(array(
          'min' => -2,
          'max' => 0,
          'step' => 0.02,
          'strict_limits' => false,
          'js_on_slide' => 'configAndInitiateGraphDraw();',
        )));

        $this->setReadonlyFields();

        $this->setPercentageFields();
    }

    /**
     * Update the widgets for readonly fields properly
     *
     * @return void
     */
    private function setReadonlyFields()
    {
        $readonlyFields = array('ticks_between_decision_points',
            'dense_urban_area', 'urban_area', 'suburban_area', 'rural_area',
            //'dense_urban_population', 'urban_population', 'suburban_population', 'rural_population'
        );

        foreach ($readonlyFields as $readonly) {
            $this->getWidget($readonly)->setAttribute('readonly', true);
        }
    }

    /**
     * Update the widgets for percentage fields in order to use the jQuery-UI slider
     *
     * @return void
     */
    private function setPercentageFields()
    {
        $simplePercentageFields = array(
            'starting_level' => 'configAndInitiateGraphDraw();',
            'saturation_level' => 'configAndInitiateGraphDraw();',
            'dense_urban_territory' => '',
            'urban_territory' => '',
            'suburban_territory' => '',
            'rural_territory' => '',
            'dense_urban_distribution' => '',
            'urban_distribution' => '',
            'suburban_distribution' => '',
            'rural_distribution' => '',
            'packages_erosion_rate' => '',
            'depreciation_rate' => '',
            'interest_rate' => '',
        );

        foreach ($simplePercentageFields as $percentageField => $jsOnSlide) {
            $this->setWidget($percentageField, new amWidgetFormSlider(array(
                'units' => '%',
                'step' => 0.5,
                'js_on_slide' => $jsOnSlide,
            )));
        }
    }
}
