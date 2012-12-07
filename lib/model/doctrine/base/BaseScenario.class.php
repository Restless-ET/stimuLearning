<?php

/**
 * BaseScenario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $description
 * @property enum $status
 * @property integer $total_clients
 * @property enum $tick_alias
 * @property integer $lifespan
 * @property integer $total_decision_points
 * @property integer $ticks_between_decision_points
 * @property float $tariffs_erosion_rate
 * @property float $depreciation_rate
 * @property float $interest_rate
 * @property decimal $elasticity
 * @property decimal $bankrupcy_limit
 * @property decimal $starting_level
 * @property decimal $saturation_level
 * @property integer $alpha
 * @property float $beta
 * @property decimal $number_of_services_weight
 * @property decimal $download_weight
 * @property decimal $upload_weight
 * @property decimal $rate_weight
 * @property decimal $fee_weight
 * @property decimal $occupation_rate_weight
 * @property decimal $containment_factor_weight
 * @property decimal $reference_occupation_rate
 * @property Doctrine_Collection $AvailableTechnologies
 * @property Doctrine_Collection $DecisionPoints
 * @property Doctrine_Collection $Operators
 * @property Doctrine_Collection $ScenarioTechnology
 * @property Doctrine_Collection $Ticks
 * 
 * @method string              getDescription()                   Returns the current record's "description" value
 * @method enum                getStatus()                        Returns the current record's "status" value
 * @method integer             getTotalClients()                  Returns the current record's "total_clients" value
 * @method enum                getTickAlias()                     Returns the current record's "tick_alias" value
 * @method integer             getLifespan()                      Returns the current record's "lifespan" value
 * @method integer             getTotalDecisionPoints()           Returns the current record's "total_decision_points" value
 * @method integer             getTicksBetweenDecisionPoints()    Returns the current record's "ticks_between_decision_points" value
 * @method float               getTariffsErosionRate()            Returns the current record's "tariffs_erosion_rate" value
 * @method float               getDepreciationRate()              Returns the current record's "depreciation_rate" value
 * @method float               getInterestRate()                  Returns the current record's "interest_rate" value
 * @method decimal             getElasticity()                    Returns the current record's "elasticity" value
 * @method decimal             getBankrupcyLimit()                Returns the current record's "bankrupcy_limit" value
 * @method decimal             getStartingLevel()                 Returns the current record's "starting_level" value
 * @method decimal             getSaturationLevel()               Returns the current record's "saturation_level" value
 * @method integer             getAlpha()                         Returns the current record's "alpha" value
 * @method float               getBeta()                          Returns the current record's "beta" value
 * @method decimal             getNumberOfServicesWeight()        Returns the current record's "number_of_services_weight" value
 * @method decimal             getDownloadWeight()                Returns the current record's "download_weight" value
 * @method decimal             getUploadWeight()                  Returns the current record's "upload_weight" value
 * @method decimal             getRateWeight()                    Returns the current record's "rate_weight" value
 * @method decimal             getFeeWeight()                     Returns the current record's "fee_weight" value
 * @method decimal             getOccupationRateWeight()          Returns the current record's "occupation_rate_weight" value
 * @method decimal             getContainmentFactorWeight()       Returns the current record's "containment_factor_weight" value
 * @method decimal             getReferenceOccupationRate()       Returns the current record's "reference_occupation_rate" value
 * @method Doctrine_Collection getAvailableTechnologies()         Returns the current record's "AvailableTechnologies" collection
 * @method Doctrine_Collection getDecisionPoints()                Returns the current record's "DecisionPoints" collection
 * @method Doctrine_Collection getOperators()                     Returns the current record's "Operators" collection
 * @method Doctrine_Collection getScenarioTechnology()            Returns the current record's "ScenarioTechnology" collection
 * @method Doctrine_Collection getTicks()                         Returns the current record's "Ticks" collection
 * @method Scenario            setDescription()                   Sets the current record's "description" value
 * @method Scenario            setStatus()                        Sets the current record's "status" value
 * @method Scenario            setTotalClients()                  Sets the current record's "total_clients" value
 * @method Scenario            setTickAlias()                     Sets the current record's "tick_alias" value
 * @method Scenario            setLifespan()                      Sets the current record's "lifespan" value
 * @method Scenario            setTotalDecisionPoints()           Sets the current record's "total_decision_points" value
 * @method Scenario            setTicksBetweenDecisionPoints()    Sets the current record's "ticks_between_decision_points" value
 * @method Scenario            setTariffsErosionRate()            Sets the current record's "tariffs_erosion_rate" value
 * @method Scenario            setDepreciationRate()              Sets the current record's "depreciation_rate" value
 * @method Scenario            setInterestRate()                  Sets the current record's "interest_rate" value
 * @method Scenario            setElasticity()                    Sets the current record's "elasticity" value
 * @method Scenario            setBankrupcyLimit()                Sets the current record's "bankrupcy_limit" value
 * @method Scenario            setStartingLevel()                 Sets the current record's "starting_level" value
 * @method Scenario            setSaturationLevel()               Sets the current record's "saturation_level" value
 * @method Scenario            setAlpha()                         Sets the current record's "alpha" value
 * @method Scenario            setBeta()                          Sets the current record's "beta" value
 * @method Scenario            setNumberOfServicesWeight()        Sets the current record's "number_of_services_weight" value
 * @method Scenario            setDownloadWeight()                Sets the current record's "download_weight" value
 * @method Scenario            setUploadWeight()                  Sets the current record's "upload_weight" value
 * @method Scenario            setRateWeight()                    Sets the current record's "rate_weight" value
 * @method Scenario            setFeeWeight()                     Sets the current record's "fee_weight" value
 * @method Scenario            setOccupationRateWeight()          Sets the current record's "occupation_rate_weight" value
 * @method Scenario            setContainmentFactorWeight()       Sets the current record's "containment_factor_weight" value
 * @method Scenario            setReferenceOccupationRate()       Sets the current record's "reference_occupation_rate" value
 * @method Scenario            setAvailableTechnologies()         Sets the current record's "AvailableTechnologies" collection
 * @method Scenario            setDecisionPoints()                Sets the current record's "DecisionPoints" collection
 * @method Scenario            setOperators()                     Sets the current record's "Operators" collection
 * @method Scenario            setScenarioTechnology()            Sets the current record's "ScenarioTechnology" collection
 * @method Scenario            setTicks()                         Sets the current record's "Ticks" collection
 * 
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseScenario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('scenario');
        $this->hasColumn('description', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('status', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Unstarted',
              1 => 'Running',
              2 => 'Finished',
             ),
             'default' => 'Unstarted',
             ));
        $this->hasColumn('total_clients', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('tick_alias', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => NULL,
              1 => 'Day',
              2 => 'Month',
              3 => 'Year',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('lifespan', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('total_decision_points', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('ticks_between_decision_points', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('tariffs_erosion_rate', 'float', null, array(
             'type' => 'float',
             'scale' => 4,
             'notnull' => true,
             ));
        $this->hasColumn('depreciation_rate', 'float', null, array(
             'type' => 'float',
             'scale' => 4,
             'notnull' => true,
             ));
        $this->hasColumn('interest_rate', 'float', null, array(
             'type' => 'float',
             'scale' => 4,
             'notnull' => true,
             ));
        $this->hasColumn('elasticity', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('bankrupcy_limit', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('starting_level', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('saturation_level', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('alpha', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('beta', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
        $this->hasColumn('number_of_services_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('download_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('upload_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('rate_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('fee_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('occupation_rate_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('containment_factor_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('reference_occupation_rate', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));

        $this->option('symfony', array(
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Technology as AvailableTechnologies', array(
             'refClass' => 'ScenarioTechnology',
             'local' => 'scenario_id',
             'foreign' => 'techonology_id'));

        $this->hasMany('DecisionPoint as DecisionPoints', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $this->hasMany('Operator as Operators', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $this->hasMany('ScenarioTechnology', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $this->hasMany('Tick as Ticks', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}