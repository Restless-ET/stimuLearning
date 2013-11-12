<?php

/**
 * User filter form.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class UserFormFilter extends BaseUserFormFilter
{
    /**
     * Configures the filter form
     *
     * @return nothing
     */
    public function configure()
    {
        $this->setWidget('deleted', new sfWidgetFormInputCheckbox());
        $this->setValidator('deleted', new sfValidatorBoolean(array('required' => false)));
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
        $query = parent::doBuildQuery($values);

        if (!isset($values['deleted'])) {
            $query->andWhere('deleted = 0');
        }

        return $query;
    }
}
