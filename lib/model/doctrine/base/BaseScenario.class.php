<?php

/**
 * BaseScenario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $description
 * @property boolean $started
 * @property boolean $finished
 * @property integer $total_clients
 * @property enum $tick_alias
 * @property integer $current_tick
 * @property integer $lifespan
 * @property integer $total_decision_points
 * @property integer $ticks_between_decision_points
 * @property decimal $starting_level
 * @property decimal $saturation_level
 * @property integer $alpha
 * @property float $beta
 * @property decimal $total_area
 * @property decimal $dense_urban_territory
 * @property decimal $dense_urban_area
 * @property decimal $urban_territory
 * @property decimal $urban_area
 * @property decimal $suburban_territory
 * @property decimal $suburban_area
 * @property decimal $rural_territory
 * @property decimal $rural_area
 * @property decimal $dense_urban_distribution
 * @property integer $dense_urban_population
 * @property decimal $urban_distribution
 * @property integer $urban_population
 * @property decimal $suburban_distribution
 * @property integer $suburban_population
 * @property decimal $rural_distribution
 * @property integer $rural_population
 * @property decimal $packages_erosion_rate
 * @property decimal $depreciation_rate
 * @property decimal $interest_rate
 * @property decimal $elasticity
 * @property decimal $bankrupcy_limit
 * @property decimal $number_of_services_weight
 * @property decimal $download_weight
 * @property decimal $upload_weight
 * @property decimal $rate_weight
 * @property decimal $fee_weight
 * @property decimal $occupation_rate_weight
 * @property decimal $containment_factor_weight
 * @property decimal $reference_occupation_rate
 * @property integer $responsible_id
 * @property User $Responsible
 * @property Doctrine_Collection $Technologies
 * @property Doctrine_Collection $Architectures
 * @property Doctrine_Collection $Equipments
 * @property Doctrine_Collection $Operators
 * @property Doctrine_Collection $Ticks
 * 
 * @method string              getDescription()                   Returns the current record's "description" value
 * @method boolean             getStarted()                       Returns the current record's "started" value
 * @method boolean             getFinished()                      Returns the current record's "finished" value
 * @method integer             getTotalClients()                  Returns the current record's "total_clients" value
 * @method enum                getTickAlias()                     Returns the current record's "tick_alias" value
 * @method integer             getCurrentTick()                   Returns the current record's "current_tick" value
 * @method integer             getLifespan()                      Returns the current record's "lifespan" value
 * @method integer             getTotalDecisionPoints()           Returns the current record's "total_decision_points" value
 * @method integer             getTicksBetweenDecisionPoints()    Returns the current record's "ticks_between_decision_points" value
 * @method decimal             getStartingLevel()                 Returns the current record's "starting_level" value
 * @method decimal             getSaturationLevel()               Returns the current record's "saturation_level" value
 * @method integer             getAlpha()                         Returns the current record's "alpha" value
 * @method float               getBeta()                          Returns the current record's "beta" value
 * @method decimal             getTotalArea()                     Returns the current record's "total_area" value
 * @method decimal             getDenseUrbanTerritory()           Returns the current record's "dense_urban_territory" value
 * @method decimal             getDenseUrbanArea()                Returns the current record's "dense_urban_area" value
 * @method decimal             getUrbanTerritory()                Returns the current record's "urban_territory" value
 * @method decimal             getUrbanArea()                     Returns the current record's "urban_area" value
 * @method decimal             getSuburbanTerritory()             Returns the current record's "suburban_territory" value
 * @method decimal             getSuburbanArea()                  Returns the current record's "suburban_area" value
 * @method decimal             getRuralTerritory()                Returns the current record's "rural_territory" value
 * @method decimal             getRuralArea()                     Returns the current record's "rural_area" value
 * @method decimal             getDenseUrbanDistribution()        Returns the current record's "dense_urban_distribution" value
 * @method integer             getDenseUrbanPopulation()          Returns the current record's "dense_urban_population" value
 * @method decimal             getUrbanDistribution()             Returns the current record's "urban_distribution" value
 * @method integer             getUrbanPopulation()               Returns the current record's "urban_population" value
 * @method decimal             getSuburbanDistribution()          Returns the current record's "suburban_distribution" value
 * @method integer             getSuburbanPopulation()            Returns the current record's "suburban_population" value
 * @method decimal             getRuralDistribution()             Returns the current record's "rural_distribution" value
 * @method integer             getRuralPopulation()               Returns the current record's "rural_population" value
 * @method decimal             getPackagesErosionRate()           Returns the current record's "packages_erosion_rate" value
 * @method decimal             getDepreciationRate()              Returns the current record's "depreciation_rate" value
 * @method decimal             getInterestRate()                  Returns the current record's "interest_rate" value
 * @method decimal             getElasticity()                    Returns the current record's "elasticity" value
 * @method decimal             getBankrupcyLimit()                Returns the current record's "bankrupcy_limit" value
 * @method decimal             getNumberOfServicesWeight()        Returns the current record's "number_of_services_weight" value
 * @method decimal             getDownloadWeight()                Returns the current record's "download_weight" value
 * @method decimal             getUploadWeight()                  Returns the current record's "upload_weight" value
 * @method decimal             getRateWeight()                    Returns the current record's "rate_weight" value
 * @method decimal             getFeeWeight()                     Returns the current record's "fee_weight" value
 * @method decimal             getOccupationRateWeight()          Returns the current record's "occupation_rate_weight" value
 * @method decimal             getContainmentFactorWeight()       Returns the current record's "containment_factor_weight" value
 * @method decimal             getReferenceOccupationRate()       Returns the current record's "reference_occupation_rate" value
 * @method integer             getResponsibleId()                 Returns the current record's "responsible_id" value
 * @method User                getResponsible()                   Returns the current record's "Responsible" value
 * @method Doctrine_Collection getTechnologies()                  Returns the current record's "Technologies" collection
 * @method Doctrine_Collection getArchitectures()                 Returns the current record's "Architectures" collection
 * @method Doctrine_Collection getEquipments()                    Returns the current record's "Equipments" collection
 * @method Doctrine_Collection getOperators()                     Returns the current record's "Operators" collection
 * @method Doctrine_Collection getTicks()                         Returns the current record's "Ticks" collection
 * @method Scenario            setDescription()                   Sets the current record's "description" value
 * @method Scenario            setStarted()                       Sets the current record's "started" value
 * @method Scenario            setFinished()                      Sets the current record's "finished" value
 * @method Scenario            setTotalClients()                  Sets the current record's "total_clients" value
 * @method Scenario            setTickAlias()                     Sets the current record's "tick_alias" value
 * @method Scenario            setCurrentTick()                   Sets the current record's "current_tick" value
 * @method Scenario            setLifespan()                      Sets the current record's "lifespan" value
 * @method Scenario            setTotalDecisionPoints()           Sets the current record's "total_decision_points" value
 * @method Scenario            setTicksBetweenDecisionPoints()    Sets the current record's "ticks_between_decision_points" value
 * @method Scenario            setStartingLevel()                 Sets the current record's "starting_level" value
 * @method Scenario            setSaturationLevel()               Sets the current record's "saturation_level" value
 * @method Scenario            setAlpha()                         Sets the current record's "alpha" value
 * @method Scenario            setBeta()                          Sets the current record's "beta" value
 * @method Scenario            setTotalArea()                     Sets the current record's "total_area" value
 * @method Scenario            setDenseUrbanTerritory()           Sets the current record's "dense_urban_territory" value
 * @method Scenario            setDenseUrbanArea()                Sets the current record's "dense_urban_area" value
 * @method Scenario            setUrbanTerritory()                Sets the current record's "urban_territory" value
 * @method Scenario            setUrbanArea()                     Sets the current record's "urban_area" value
 * @method Scenario            setSuburbanTerritory()             Sets the current record's "suburban_territory" value
 * @method Scenario            setSuburbanArea()                  Sets the current record's "suburban_area" value
 * @method Scenario            setRuralTerritory()                Sets the current record's "rural_territory" value
 * @method Scenario            setRuralArea()                     Sets the current record's "rural_area" value
 * @method Scenario            setDenseUrbanDistribution()        Sets the current record's "dense_urban_distribution" value
 * @method Scenario            setDenseUrbanPopulation()          Sets the current record's "dense_urban_population" value
 * @method Scenario            setUrbanDistribution()             Sets the current record's "urban_distribution" value
 * @method Scenario            setUrbanPopulation()               Sets the current record's "urban_population" value
 * @method Scenario            setSuburbanDistribution()          Sets the current record's "suburban_distribution" value
 * @method Scenario            setSuburbanPopulation()            Sets the current record's "suburban_population" value
 * @method Scenario            setRuralDistribution()             Sets the current record's "rural_distribution" value
 * @method Scenario            setRuralPopulation()               Sets the current record's "rural_population" value
 * @method Scenario            setPackagesErosionRate()           Sets the current record's "packages_erosion_rate" value
 * @method Scenario            setDepreciationRate()              Sets the current record's "depreciation_rate" value
 * @method Scenario            setInterestRate()                  Sets the current record's "interest_rate" value
 * @method Scenario            setElasticity()                    Sets the current record's "elasticity" value
 * @method Scenario            setBankrupcyLimit()                Sets the current record's "bankrupcy_limit" value
 * @method Scenario            setNumberOfServicesWeight()        Sets the current record's "number_of_services_weight" value
 * @method Scenario            setDownloadWeight()                Sets the current record's "download_weight" value
 * @method Scenario            setUploadWeight()                  Sets the current record's "upload_weight" value
 * @method Scenario            setRateWeight()                    Sets the current record's "rate_weight" value
 * @method Scenario            setFeeWeight()                     Sets the current record's "fee_weight" value
 * @method Scenario            setOccupationRateWeight()          Sets the current record's "occupation_rate_weight" value
 * @method Scenario            setContainmentFactorWeight()       Sets the current record's "containment_factor_weight" value
 * @method Scenario            setReferenceOccupationRate()       Sets the current record's "reference_occupation_rate" value
 * @method Scenario            setResponsibleId()                 Sets the current record's "responsible_id" value
 * @method Scenario            setResponsible()                   Sets the current record's "Responsible" value
 * @method Scenario            setTechnologies()                  Sets the current record's "Technologies" collection
 * @method Scenario            setArchitectures()                 Sets the current record's "Architectures" collection
 * @method Scenario            setEquipments()                    Sets the current record's "Equipments" collection
 * @method Scenario            setOperators()                     Sets the current record's "Operators" collection
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
        $this->hasColumn('started', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('finished', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
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
              1 => 'Week',
              2 => 'Month',
              3 => 'Year',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('current_tick', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
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
        $this->hasColumn('total_area', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 500,
             ));
        $this->hasColumn('dense_urban_territory', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('dense_urban_area', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 125,
             ));
        $this->hasColumn('urban_territory', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('urban_area', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 125,
             ));
        $this->hasColumn('suburban_territory', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('suburban_area', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 125,
             ));
        $this->hasColumn('rural_territory', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('rural_area', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 125,
             ));
        $this->hasColumn('dense_urban_distribution', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('dense_urban_population', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('urban_distribution', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('urban_population', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('suburban_distribution', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('suburban_population', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('rural_distribution', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 25,
             ));
        $this->hasColumn('rural_population', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('packages_erosion_rate', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('depreciation_rate', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('interest_rate', 'decimal', null, array(
             'type' => 'decimal',
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
        $this->hasColumn('number_of_services_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('download_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('upload_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('rate_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('fee_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('occupation_rate_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('containment_factor_weight', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('reference_occupation_rate', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 14,
             ));
        $this->hasColumn('responsible_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User as Responsible', array(
             'local' => 'responsible_id',
             'foreign' => 'id'));

        $this->hasMany('Technology as Technologies', array(
             'local' => 'id',
             'foreign' => 'scenario_id',
             'orderBy' => 'first_tick_available ASC'));

        $this->hasMany('Architecture as Architectures', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $this->hasMany('Equipment as Equipments', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $this->hasMany('Operator as Operators', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $this->hasMany('Tick as Ticks', array(
             'local' => 'id',
             'foreign' => 'scenario_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}