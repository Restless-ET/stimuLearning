<?php

/**
 * Scenario form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
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
        unset($this['created_at'], $this['updated_at'], $this['current_tick']);
        $user = sfContext::getInstance()->getUser();

        if ($user->getAttribute('username', 'demonstration') == 'demonstration') {
            $query = Doctrine_Core::getTable('User')->createQuery('u')
                        ->andWhere('u.username = ?', 'demonstration');
            $this->getWidget('responsible_id')->setOption('query', $query);
        }
        $this->setDefault('responsible_id', sfContext::getInstance()->getUser()->getAttribute('id'));

        $this->getWidget('total_clients')->setAttribute('onchange', 'javascript: setDemographyPopulation();');
        $this->getWidget('total_area')->setAttribute('onchange', 'javascript: setGeographyAreas();');

        $this->setCustomSliderFields();

        $this->setPercentageFields();

        $this->setReadonlyFields();

        $qualityVector = array('number_of_services_weight', 'download_weight', 'upload_weight', 'rate_weight',
            'fee_weight', 'occupation_rate_weight', 'containment_factor_weight', 'reference_occupation_rate');
        if ($this->getObject()->Operators->count() > 1) {
            foreach ($qualityVector as $weightField) {
                $this->setWidget($weightField, new amWidgetFormSlider(array(
                    'units' => '%',
                    'step' => 0.5,
                )));
            }
        } else {
            foreach ($qualityVector as $weight) {
                $this->setWidget($weight, new sfWidgetFormInputHidden());
                //unset($this[$weight]);
            }
        }

        // We should do a server-side validation for territory areas and population distribution values
        $this->mergePostValidator(new sfValidatorCallback(array(
            'callback' => array($this, 'validateTerritoryAreas'))
        ));
        $this->mergePostValidator(new sfValidatorCallback(array(
            'callback' => array($this, 'validatePopulationDistribution'))
        ));
    }

    /**
     * Change the widgets for some fields in order to use the jQuery-UI slider
     *
     * @return void
     */
    private function setCustomSliderFields()
    {
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
            'dense_urban_territory' => 'setGeographyAreas();',
            'urban_territory' => 'setGeographyAreas();',
            'suburban_territory' => 'setGeographyAreas();',
            'rural_territory' => 'setGeographyAreas();',
            'dense_urban_distribution' => 'setDemographyPopulation();',
            'urban_distribution' => 'setDemographyPopulation();',
            'suburban_distribution' => 'setDemographyPopulation();',
            'rural_distribution' => 'setDemographyPopulation();',
            'packages_erosion_rate' => '',
            'depreciation_rate' => '',
            'interest_rate' => '',
        );

        foreach ($simplePercentageFields as $percentageField => $jsOnSlide) {
            $this->setWidget($percentageField, new amWidgetFormSlider(array(
                'units' => '%',
                'step' => 0.5,
                //'strict_limits' => false, // Set to false to allow proper edition of input
                'js_on_slide' => $jsOnSlide,
            )));
        }
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
            'dense_urban_population', 'urban_population', 'suburban_population', 'rural_population'
        );

        foreach ($readonlyFields as $readonly) {
            $this->getWidget($readonly)->setAttribute('readonly', true);
        }
    }

    /**
     * Checks if the total of territory areas are equal to 100%
     *
     * @param mixed $validator Validator
     * @param mixed $values    Values
     *
     * @return $values
     */
    public function validateTerritoryAreas($validator, $values)
    {
        // The list of fields that have failed validation (initially none)
        $failed = array();

        $sum = $values['dense_urban_territory'] + $values['urban_territory']
              + $values['suburban_territory'] + $values['rural_territory'];

        if ($sum !== 100.00) {
            $tempError = new sfValidatorError($validator,
                'Total percentage for territory sections has to be 100%. Adjust this value if needed.');
            $failed = array(
                'dense_urban_territory' => $tempError,
                'urban_territory' => $tempError,
                'suburban_territory' => $tempError,
                'rural_territory' => $tempError,
            );
        }

        // If any failed, we need to throw a schema of errors
        if (count($failed) > 0) {
            throw new sfValidatorErrorSchema($validator, $failed);
        }

        // If everything is OK, we must return the values, that could have been "cleaned" if we wanted to
        return $values;
    }

    /**
     * Checks if the total from the population distributions are equal to 100%
     *
     * @param mixed $validator Validator
     * @param mixed $values    Values
     *
     * @return $values
     */
    public function validatePopulationDistribution($validator, $values)
    {
        // The list of fields that have failed validation (initially none)
        $failed = array();

        $sum = $values['dense_urban_distribution'] + $values['urban_distribution']
              + $values['suburban_distribution'] + $values['rural_distribution'];

        if ($sum !== 100.00) {
            $tempError = new sfValidatorError($validator,
                'Total percentage for population distribution has to be 100%. Adjust this value if needed.');
            $failed = array(
                'dense_urban_distribution' => $tempError,
                'urban_distribution' => $tempError,
                'suburban_distribution' => $tempError,
                'rural_distribution' => $tempError,
            );
        }

        // If any failed, we need to throw a schema of errors
        if (count($failed) > 0) {
            throw new sfValidatorErrorSchema($validator, $failed);
        }

        // If everything is OK, we must return the values, that could have been "cleaned" if we wanted to
        return $values;
    }
}
