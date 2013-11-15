<?php

/**
 * Technology form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class TechnologyForm extends BaseTechnologyForm
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
        $user = sfContext::getInstance()->getUser();

        if ($user->getAttribute('scenarioId', 0)) {
            $this->setDefault('scenario_id', $user->getAttribute('scenarioId', 0));
        }
        $this->setWidget('scenario_id', new sfWidgetFormInputHidden());
    }
}
