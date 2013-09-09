<?php

/**
 * Operator filter form.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class OperatorFormFilter extends BaseOperatorFormFilter
{
    /**
     * Configures the filter form
     *
     * @return nothing
     */
    public function configure()
    {
        if (!sfContext::getInstance()->getUser()->hasCredential('manager')) {
            unset($this['user_id']);
        }
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

        $query->leftJoin('r.Scenario s')
              ->leftJoin('r.User u')
              ->select('r.*, s.description, u.name');
        if (!$user->hasCredential('manager')) {
            $query->andWhere('r.user_id = ?', $user->getAttribute('id', 0));
        }

        return $query;
    }
}
