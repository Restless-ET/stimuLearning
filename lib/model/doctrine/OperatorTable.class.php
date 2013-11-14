<?php

/**
 * OperatorTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class OperatorTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object OperatorTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Operator');
    }

    /**
     * Auxiliar method to create a query to fetch Operators filtered properly for the current user
     *
     * @param Doctrine_Query $q A Doctrine_Query object
     *
     * @return the built query
     */
    public static function filterByCredential(Doctrine_Query $q)
    {
        $user = sfContext::getInstance()->getUser();

        $q->leftJoin('r.Scenario s')->leftJoin('r.User u')
          ->select('r.*, s.description, u.name');

        if (!$user->hasCredential('admin')) {
            //$q->andWhere('user_id = ?', $user->getAttribute('id'));
        }
        $q->andWhere('scenario_id = ?', $user->getAttribute('scenarioId', 0));

        return $q;
    }
}
