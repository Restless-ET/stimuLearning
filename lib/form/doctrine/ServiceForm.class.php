<?php

/**
 * Service form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ServiceForm extends BaseServiceForm
{
    /**
     * Apply the proper widget configurations and validators for this form
     * (non-PHPdoc)
     *
     * @see sfForm::configure()
     *
     * @return void
     */
    public function configure()
    {
        unset($this['created_at'], $this['updated_at']);
    }
}
