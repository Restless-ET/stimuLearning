<?php

/**
 * BaseTick
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $nbr
 * @property decimal $CAPEX
 * @property decimal $OPEX
 * @property decimal $revenue
 * @property decimal $cashflow
 * @property decimal $balance
 * @property decimal $equity
 * @property float $market_share
 * @property integer $clients
 * @property integer $operator_id
 * @property integer $scenario_id
 * @property Operator $Operator
 * @property Scenario $Scenario
 * @property Doctrine_Collection $AcquiredEquipments
 * 
 * @method integer             getNbr()                Returns the current record's "nbr" value
 * @method decimal             getCAPEX()              Returns the current record's "CAPEX" value
 * @method decimal             getOPEX()               Returns the current record's "OPEX" value
 * @method decimal             getRevenue()            Returns the current record's "revenue" value
 * @method decimal             getCashflow()           Returns the current record's "cashflow" value
 * @method decimal             getBalance()            Returns the current record's "balance" value
 * @method decimal             getEquity()             Returns the current record's "equity" value
 * @method float               getMarketShare()        Returns the current record's "market_share" value
 * @method integer             getClients()            Returns the current record's "clients" value
 * @method integer             getOperatorId()         Returns the current record's "operator_id" value
 * @method integer             getScenarioId()         Returns the current record's "scenario_id" value
 * @method Operator            getOperator()           Returns the current record's "Operator" value
 * @method Scenario            getScenario()           Returns the current record's "Scenario" value
 * @method Doctrine_Collection getAcquiredEquipments() Returns the current record's "AcquiredEquipments" collection
 * @method Tick                setNbr()                Sets the current record's "nbr" value
 * @method Tick                setCAPEX()              Sets the current record's "CAPEX" value
 * @method Tick                setOPEX()               Sets the current record's "OPEX" value
 * @method Tick                setRevenue()            Sets the current record's "revenue" value
 * @method Tick                setCashflow()           Sets the current record's "cashflow" value
 * @method Tick                setBalance()            Sets the current record's "balance" value
 * @method Tick                setEquity()             Sets the current record's "equity" value
 * @method Tick                setMarketShare()        Sets the current record's "market_share" value
 * @method Tick                setClients()            Sets the current record's "clients" value
 * @method Tick                setOperatorId()         Sets the current record's "operator_id" value
 * @method Tick                setScenarioId()         Sets the current record's "scenario_id" value
 * @method Tick                setOperator()           Sets the current record's "Operator" value
 * @method Tick                setScenario()           Sets the current record's "Scenario" value
 * @method Tick                setAcquiredEquipments() Sets the current record's "AcquiredEquipments" collection
 * 
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTick extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tick');
        $this->hasColumn('nbr', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('CAPEX', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('OPEX', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('revenue', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('cashflow', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('balance', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('equity', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('market_share', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
        $this->hasColumn('clients', 'integer', null, array(
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
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Operator', array(
             'local' => 'operator_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Scenario', array(
             'local' => 'scenario_id',
             'foreign' => 'id'));

        $this->hasMany('AcquiredEquipment as AcquiredEquipments', array(
             'local' => 'id',
             'foreign' => 'tick_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}