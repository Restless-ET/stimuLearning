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
        $scenarioId = $user->getAttribute('scenarioId', 0);

        $query = Doctrine_Core::getTable('Operator')->createQuery('o')
                  ->where('o.scenario_id = ?', $scenarioId)
                  ->andWhere('o.user_id = ?', $user->getAttribute('id'));
        $this->getWidget('operator_id')->setOption('query', $query);
        $this->getWidget('operator_id')->setOption('add_empty', true);

        $this->setWidget('scenario_id', new sfWidgetFormInputHidden());

        $this->setDefault('operator_id', $user->getAttribute('operatorId', ''));
        if ($scenarioId) {
            $this->setDefault('scenario_id', $scenarioId);
        }
    }
}
