<?php

/**
 * BaseLibArch
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $download_bandwidth
 * @property integer $upload_bandwidth
 * @property string $image
 * @property integer $tech_id
 * @property LibTech $Technology
 * @property Doctrine_Collection $Equipments
 * 
 * @method string              getName()               Returns the current record's "name" value
 * @method integer             getDownloadBandwidth()  Returns the current record's "download_bandwidth" value
 * @method integer             getUploadBandwidth()    Returns the current record's "upload_bandwidth" value
 * @method string              getImage()              Returns the current record's "image" value
 * @method integer             getTechId()             Returns the current record's "tech_id" value
 * @method LibTech             getTechnology()         Returns the current record's "Technology" value
 * @method Doctrine_Collection getEquipments()         Returns the current record's "Equipments" collection
 * @method LibArch             setName()               Sets the current record's "name" value
 * @method LibArch             setDownloadBandwidth()  Sets the current record's "download_bandwidth" value
 * @method LibArch             setUploadBandwidth()    Sets the current record's "upload_bandwidth" value
 * @method LibArch             setImage()              Sets the current record's "image" value
 * @method LibArch             setTechId()             Sets the current record's "tech_id" value
 * @method LibArch             setTechnology()         Sets the current record's "Technology" value
 * @method LibArch             setEquipments()         Sets the current record's "Equipments" collection
 * 
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLibArch extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lib_arch');
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('download_bandwidth', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('upload_bandwidth', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('tech_id', 'integer', null, array(
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
        $this->hasOne('LibTech as Technology', array(
             'local' => 'tech_id',
             'foreign' => 'id'));

        $this->hasMany('LibEquip as Equipments', array(
             'local' => 'id',
             'foreign' => 'arch_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}