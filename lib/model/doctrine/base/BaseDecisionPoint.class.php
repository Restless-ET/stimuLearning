<?php

/**
 * BaseDecisionPoint
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $tick
 * @property integer $operator_id
 * @property integer $scenario_id
 * @property Operator $Operator
 * @property Scenario $Scenario
 * 
 * @method integer       getTick()        Returns the current record's "tick" value
 * @method integer       getOperatorId()  Returns the current record's "operator_id" value
 * @method integer       getScenarioId()  Returns the current record's "scenario_id" value
 * @method Operator      getOperator()    Returns the current record's "Operator" value
 * @method Scenario      getScenario()    Returns the current record's "Scenario" value
 * @method DecisionPoint setTick()        Sets the current record's "tick" value
 * @method DecisionPoint setOperatorId()  Sets the current record's "operator_id" value
 * @method DecisionPoint setScenarioId()  Sets the current record's "scenario_id" value
 * @method DecisionPoint setOperator()    Sets the current record's "Operator" value
 * @method DecisionPoint setScenario()    Sets the current record's "Scenario" value
 * 
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDecisionPoint extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('decision_point');
        $this->hasColumn('tick', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('operator_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('scenario_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));

        $this->option('symfony', array(
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Operator', array(
             'local' => 'operator_id',
             'foreign' => 'id'));

        $this->hasOne('Scenario', array(
             'local' => 'scenario_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}