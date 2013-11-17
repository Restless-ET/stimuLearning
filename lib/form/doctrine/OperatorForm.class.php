<?php

/**
 * Operator form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class OperatorForm extends BaseOperatorForm
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
        unset($this['created_at'], $this['updated_at'], $this['accumulated_CAPEX']);
        $user = sfContext::getInstance()->getUser();

        $query = Doctrine_Core::getTable('User')->createQuery('u')
                  ->where('u.deleted = ?', false)
                  ->orWhere('u.id = ?', $this->getObject()->user_id);
        $this->getWidget('user_id')->setOption('query', $query);
        $this->getWidget('user_id')->setOption('add_empty', true);
        $this->setDefault('user_id', $user->getAttribute('id'));

        if ($user->getAttribute('scenarioId', 0)) {
            $this->setDefault('scenario_id', $user->getAttribute('scenarioId', 0));
        }
        $this->setWidget('scenario_id', new sfWidgetFormInputHidden());
    }

    /**
     * Overrides parent method to update the 'maximum_clients' of all equipments
     *  belonging to the same Architecture as this one.
     *
     * @param mixed $con An optional connection object
     *
     * @return nothing
     */
    protected function doSave($con = null)
    {
        parent::doSave($con);

        $operator = $this->getObject();
        $clients = $operator->getScenario()->getTotalClients();
        $initialClients = $clients * $operator->getScenario()->getStartingLevel() / 100;
        $operator->setMarketShare(round($operator->getStartingMarketSize() / $initialClients * 100, 2));
        $operator->save();
    }
}
