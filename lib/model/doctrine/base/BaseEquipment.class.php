<?php

/**
 * BaseEquipment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property decimal $starting_price
 * @property integer $number_of_ports
 * @property integer $network_level
 * @property integer $life_expectation
 * @property enum $equipment_type
 * @property enum $nature_or_purpose
 * @property decimal $valK
 * @property enum $tecnology_age
 * @property decimal $NrIni
 * @property enum $setup_speed
 * @property integer $deltaT
 * @property integer $maximum_clients
 * @property integer $architecture_id
 * @property integer $operator_id
 * @property integer $scenario_id
 * @property Architecture $Architecture
 * @property Operator $Operator
 * @property Scenario $Scenario
 * @property Doctrine_Collection $AcquiredEquipments
 * 
 * @method string              getName()               Returns the current record's "name" value
 * @method decimal             getStartingPrice()      Returns the current record's "starting_price" value
 * @method integer             getNumberOfPorts()      Returns the current record's "number_of_ports" value
 * @method integer             getNetworkLevel()       Returns the current record's "network_level" value
 * @method integer             getLifeExpectation()    Returns the current record's "life_expectation" value
 * @method enum                getEquipmentType()      Returns the current record's "equipment_type" value
 * @method enum                getNatureOrPurpose()    Returns the current record's "nature_or_purpose" value
 * @method decimal             getValK()               Returns the current record's "valK" value
 * @method enum                getTecnologyAge()       Returns the current record's "tecnology_age" value
 * @method decimal             getNrIni()              Returns the current record's "NrIni" value
 * @method enum                getSetupSpeed()         Returns the current record's "setup_speed" value
 * @method integer             getDeltaT()             Returns the current record's "deltaT" value
 * @method integer             getMaximumClients()     Returns the current record's "maximum_clients" value
 * @method integer             getArchitectureId()     Returns the current record's "architecture_id" value
 * @method integer             getOperatorId()         Returns the current record's "operator_id" value
 * @method integer             getScenarioId()         Returns the current record's "scenario_id" value
 * @method Architecture        getArchitecture()       Returns the current record's "Architecture" value
 * @method Operator            getOperator()           Returns the current record's "Operator" value
 * @method Scenario            getScenario()           Returns the current record's "Scenario" value
 * @method Doctrine_Collection getAcquiredEquipments() Returns the current record's "AcquiredEquipments" collection
 * @method Equipment           setName()               Sets the current record's "name" value
 * @method Equipment           setStartingPrice()      Sets the current record's "starting_price" value
 * @method Equipment           setNumberOfPorts()      Sets the current record's "number_of_ports" value
 * @method Equipment           setNetworkLevel()       Sets the current record's "network_level" value
 * @method Equipment           setLifeExpectation()    Sets the current record's "life_expectation" value
 * @method Equipment           setEquipmentType()      Sets the current record's "equipment_type" value
 * @method Equipment           setNatureOrPurpose()    Sets the current record's "nature_or_purpose" value
 * @method Equipment           setValK()               Sets the current record's "valK" value
 * @method Equipment           setTecnologyAge()       Sets the current record's "tecnology_age" value
 * @method Equipment           setNrIni()              Sets the current record's "NrIni" value
 * @method Equipment           setSetupSpeed()         Sets the current record's "setup_speed" value
 * @method Equipment           setDeltaT()             Sets the current record's "deltaT" value
 * @method Equipment           setMaximumClients()     Sets the current record's "maximum_clients" value
 * @method Equipment           setArchitectureId()     Sets the current record's "architecture_id" value
 * @method Equipment           setOperatorId()         Sets the current record's "operator_id" value
 * @method Equipment           setScenarioId()         Sets the current record's "scenario_id" value
 * @method Equipment           setArchitecture()       Sets the current record's "Architecture" value
 * @method Equipment           setOperator()           Sets the current record's "Operator" value
 * @method Equipment           setScenario()           Sets the current record's "Scenario" value
 * @method Equipment           setAcquiredEquipments() Sets the current record's "AcquiredEquipments" collection
 * 
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEquipment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('equipment');
        $this->hasColumn('name', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('starting_price', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('number_of_ports', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unsigned' => true,
             ));
        $this->hasColumn('network_level', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unsigned' => true,
             ));
        $this->hasColumn('life_expectation', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unsigned' => true,
             ));
        $this->hasColumn('equipment_type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => NULL,
              1 => 'Wired',
              2 => 'Wireless',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('nature_or_purpose', 'enum', null, array(
             'type' => 'enum',
             'notnull' => true,
             'values' => 
             array(
              0 => NULL,
              1 => 'Building/Construction (1)',
              2 => 'Copper cables (1)',
              3 => 'Fiber cables (0.8)',
              4 => 'Electronics (0.9)',
              5 => 'Advanced Optical Components (0.7)',
              6 => 'Passive Optical Components (0.8)',
             ),
             ));
        $this->hasColumn('valK', 'decimal', null, array(
             'type' => 'decimal',
             ));
        $this->hasColumn('tecnology_age', 'enum', null, array(
             'type' => 'enum',
             'notnull' => true,
             'values' => 
             array(
              0 => NULL,
              1 => 'Old (0.5)',
              2 => 'Mature (0.1)',
              3 => 'New (0.01)',
              4 => 'Emerging (0.001)',
             ),
             ));
        $this->hasColumn('NrIni', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 3,
             ));
        $this->hasColumn('setup_speed', 'enum', null, array(
             'type' => 'enum',
             'notnull' => true,
             'values' => 
             array(
              0 => NULL,
              1 => 'Very fast (5)',
              2 => 'Fast (10)',
              3 => 'Slow (20)',
              4 => 'Very slow (40)',
             ),
             ));
        $this->hasColumn('deltaT', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('maximum_clients', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('architecture_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('operator_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('scenario_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Architecture', array(
             'local' => 'architecture_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Operator', array(
             'local' => 'operator_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Scenario', array(
             'local' => 'scenario_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('AcquiredEquipment as AcquiredEquipments', array(
             'local' => 'id',
             'foreign' => 'equipment_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}