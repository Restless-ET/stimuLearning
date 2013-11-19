<?php

/**
 * Scenario filter form.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ScenarioFormFilter extends BaseScenarioFormFilter
{
    /**
     * Configures the filter form
     *
     * @return nothing
     */
    public function configure()
    {
        $roles = array('' => 'Either', 'responsible' => 'Responsible', 'player' => 'Player');
        $this->setWidget('my_role', new sfWidgetFormChoice(array('choices' => $roles)));
        $this->setValidator('my_role',
            new sfValidatorChoice(array('required' => false, 'choices' => array_keys($roles))));
    }

    /**
     * Overrides default doBuilQuery so that we can set the special cases we might need
     *
     * @param array $values Array of values to process into the query.
     *
     * @see sfFormFilterDoctrine::doBuildQuery()
     *
     * @return Doctrine_Query
     */
    protected function doBuildQuery(array $values)
    {
        $user = sfContext::getInstance()->getUser();
        $query = parent::doBuildQuery($values);

        $query->innerJoin('r.Operators o');

        if (!isset($values['my_role'])) {
            $query->where('responsible_id = ?', $user->getAttribute('id'))
                  ->orWhere('o.user_id = ?', $user->getAttribute('id'));
        }

        return $query;
    }

    /**
     * Applies the custom filter for the field 'my_role'
     *
     * @param Doctrine_Query $query  The query to be modified
     * @param string         $field  The name of the field
     * @param mixed          $values The value of the widget
     *
     * @access protected
     *
     * @return nothing
     */
    protected function addMyRoleColumnQuery(Doctrine_Query $query, $field, $values)
    {
        $user = sfContext::getInstance()->getUser();
        $to_check = trim($values);
        if ($to_check == 'responsible') {
            $query->where('responsible_id = ?', $user->getAttribute('id'));
        } elseif ($to_check == 'player') {

            $query->where('responsible_id != ?', $user->getAttribute('id'))
                  ->andWhere('o.user_id = ?', $user->getAttribute('id'));
        } else {
            $query->where('responsible_id = ?', $user->getAttribute('id'))
                  ->orWhere('o.user_id = ?', $user->getAttribute('id'));
        }
    }
}
