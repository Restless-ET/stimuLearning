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
        unset($this['created_at'], $this['updated_at'], $this['operator_id']);
        unset($this['periodic_fee']);
        $this->setWidget('tick_to_edit', new sfWidgetFormInputHidden());

        $user = sfContext::getInstance()->getUser();
        $scenarioId = $user->getAttribute('scenarioId', 0);

        $query = Doctrine_Core::getTable('Technology')->createQuery('t')
                  ->innerJoin('t.Operator o')
                  ->select('t.name, o.id')
                  ->where('t.scenario_id = ?', $scenarioId)
                  ->andWhere('o.user_id = ?', $user->getAttribute('id'));
        $this->getWidget('technology_id')->setOption('query', $query);
        $this->getWidget('technology_id')->setOption('add_empty', true);
    }
}
