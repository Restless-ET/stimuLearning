<?php

/**
 * Operator filter form.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
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
    if (!sfContext::getInstance()->getUser()->hasCredential('admin'))
    {
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
    $query = parent::doBuildQuery($values);

    $query->leftJoin('r.Scenario s')
          ->leftJoin('r.User u')
          ->select('r.*, s.description, u.name');

    return $query;
  }
}