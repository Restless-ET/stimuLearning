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
        //unset($this['tick_to_edit']);
        $this->setWidget('tick_to_edit', new sfWidgetFormInputHidden());

        $user = sfContext::getInstance()->getUser();
        $scenarioId = $user->getAttribute('scenarioId', 0);

        $query = Doctrine_Core::getTable('Operator')->createQuery('o')
                  ->where('o.scenario_id = ?', $scenarioId);
        if (!$user->hasCredential('admin')) {
            $query->andWhere('o.user_id = ?', $user->getAttribute('id'));
        }
        $this->getWidget('operator_id')->setOption('query', $query);
        $this->getWidget('operator_id')->setOption('add_empty', true);

        $archSelectPart = 'SELECT a.technology_id FROM Architecture a INNER JOIN a.Operator o ON a.operator_id = o.id';
        $query = Doctrine_Core::getTable('Technology')->createQuery('t')
                  ->where('t.scenario_id = ?', $scenarioId)
                  ->andWhere(
                      't.id IN ('.$archSelectPart." WHERE a.scenario_id = '".$scenarioId."' AND o.user_id = ?)",
                      $user->getAttribute('id')
                   );
        $this->getWidget('technology_id')->setOption('query', $query);
        $this->getWidget('technology_id')->setOption('add_empty', true);
    }
}
