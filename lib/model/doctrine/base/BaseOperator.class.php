<?php

/**
 * BaseOperator
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $starting_market_size
 * @property integer $current_market_size
 * @property decimal $balance
 * @property decimal $net_present_value
 * @property decimal $market_share
 * @property decimal $payback_period
 * @property float $internal_rate_of_return
 * @property decimal $accumulated_CAPEX
 * @property integer $user_id
 * @property integer $scenario_id
 * @property User $User
 * @property Scenario $Scenario
 * @property Doctrine_Collection $Architectures
 * @property Doctrine_Collection $Equipments
 * @property Doctrine_Collection $Services
 * @property Doctrine_Collection $Technologies
 * @property Doctrine_Collection $Ticks
 * 
 * @method string              getName()                    Returns the current record's "name" value
 * @method integer             getStartingMarketSize()      Returns the current record's "starting_market_size" value
 * @method integer             getCurrentMarketSize()       Returns the current record's "current_market_size" value
 * @method decimal             getBalance()                 Returns the current record's "balance" value
 * @method decimal             getNetPresentValue()         Returns the current record's "net_present_value" value
 * @method decimal             getMarketShare()             Returns the current record's "market_share" value
 * @method decimal             getPaybackPeriod()           Returns the current record's "payback_period" value
 * @method float               getInternalRateOfReturn()    Returns the current record's "internal_rate_of_return" value
 * @method decimal             getAccumulatedCAPEX()        Returns the current record's "accumulated_CAPEX" value
 * @method integer             getUserId()                  Returns the current record's "user_id" value
 * @method integer             getScenarioId()              Returns the current record's "scenario_id" value
 * @method User                getUser()                    Returns the current record's "User" value
 * @method Scenario            getScenario()                Returns the current record's "Scenario" value
 * @method Doctrine_Collection getArchitectures()           Returns the current record's "Architectures" collection
 * @method Doctrine_Collection getEquipments()              Returns the current record's "Equipments" collection
 * @method Doctrine_Collection getServices()                Returns the current record's "Services" collection
 * @method Doctrine_Collection getTechnologies()            Returns the current record's "Technologies" collection
 * @method Doctrine_Collection getTicks()                   Returns the current record's "Ticks" collection
 * @method Operator            setName()                    Sets the current record's "name" value
 * @method Operator            setStartingMarketSize()      Sets the current record's "starting_market_size" value
 * @method Operator            setCurrentMarketSize()       Sets the current record's "current_market_size" value
 * @method Operator            setBalance()                 Sets the current record's "balance" value
 * @method Operator            setNetPresentValue()         Sets the current record's "net_present_value" value
 * @method Operator            setMarketShare()             Sets the current record's "market_share" value
 * @method Operator            setPaybackPeriod()           Sets the current record's "payback_period" value
 * @method Operator            setInternalRateOfReturn()    Sets the current record's "internal_rate_of_return" value
 * @method Operator            setAccumulatedCAPEX()        Sets the current record's "accumulated_CAPEX" value
 * @method Operator            setUserId()                  Sets the current record's "user_id" value
 * @method Operator            setScenarioId()              Sets the current record's "scenario_id" value
 * @method Operator            setUser()                    Sets the current record's "User" value
 * @method Operator            setScenario()                Sets the current record's "Scenario" value
 * @method Operator            setArchitectures()           Sets the current record's "Architectures" collection
 * @method Operator            setEquipments()              Sets the current record's "Equipments" collection
 * @method Operator            setServices()                Sets the current record's "Services" collection
 * @method Operator            setTechnologies()            Sets the current record's "Technologies" collection
 * @method Operator            setTicks()                   Sets the current record's "Ticks" collection
 * 
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOperator extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('operator');
        $this->hasColumn('name', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('starting_market_size', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('current_market_size', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('balance', 'decimal', null, array(
             'type' => 'decimal',
             'default' => 0,
             'notnull' => true,
             ));
        $this->hasColumn('net_present_value', 'decimal', null, array(
             'type' => 'decimal',
             'default' => 0,
             'notnull' => true,
             ));
        $this->hasColumn('market_share', 'decimal', null, array(
             'type' => 'decimal',
             'default' => 0,
             'notnull' => true,
             ));
        $this->hasColumn('payback_period', 'decimal', null, array(
             'type' => 'decimal',
             'default' => 0,
             'notnull' => true,
             ));
        $this->hasColumn('internal_rate_of_return', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('accumulated_CAPEX', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
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
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('Scenario', array(
             'local' => 'scenario_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Architecture as Architectures', array(
             'local' => 'id',
             'foreign' => 'operator_id'));

        $this->hasMany('Equipment as Equipments', array(
             'local' => 'id',
             'foreign' => 'operator_id'));

        $this->hasMany('Service as Services', array(
             'local' => 'id',
             'foreign' => 'operator_id'));

        $this->hasMany('Technology as Technologies', array(
             'local' => 'id',
             'foreign' => 'operator_id'));

        $this->hasMany('Tick as Ticks', array(
             'local' => 'id',
             'foreign' => 'operator_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}