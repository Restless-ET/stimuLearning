<?php

/**
 * EquipmentTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class EquipmentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EquipmentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Equipment');
    }
}
