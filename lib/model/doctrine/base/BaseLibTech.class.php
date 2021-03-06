<?php

/**
 * BaseLibTech
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property decimal $decline_A
 * @property decimal $decline_B
 * @property LibArch $Architecture
 * 
 * @method string  getName()         Returns the current record's "name" value
 * @method string  getDescription()  Returns the current record's "description" value
 * @method decimal getDeclineA()     Returns the current record's "decline_A" value
 * @method decimal getDeclineB()     Returns the current record's "decline_B" value
 * @method LibArch getArchitecture() Returns the current record's "Architecture" value
 * @method LibTech setName()         Sets the current record's "name" value
 * @method LibTech setDescription()  Sets the current record's "description" value
 * @method LibTech setDeclineA()     Sets the current record's "decline_A" value
 * @method LibTech setDeclineB()     Sets the current record's "decline_B" value
 * @method LibTech setArchitecture() Sets the current record's "Architecture" value
 * 
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLibTech extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lib_tech');
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('description', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             ));
        $this->hasColumn('decline_A', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             ));
        $this->hasColumn('decline_B', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 3,
             'notnull' => true,
             ));

        $this->option('symfony', array(
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('LibArch as Architecture', array(
             'local' => 'id',
             'foreign' => 'tech_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}