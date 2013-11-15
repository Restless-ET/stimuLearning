<?php

/**
 * Equipment form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class EquipmentForm extends BaseEquipmentForm
{
    /**
     * Apply the proper widget configurations and validators for this form
     * (non-PHPdoc)
     *
     * @see sfForm::configure()
     *
     * @return nothing
     */
    public function configure()
    {
        unset($this['maximum_clients'], $this['created_at'], $this['updated_at']);
        unset($this['valK'], $this['NrIni'], $this['deltaT'], $this['scenario_id']);

        //TODO Forçar a registo ordenado do nivel na rede?!?
        // $this->getWidget('network_level')->setOptions(array('readonly' => true, 'default' => 'XX'))
        // Seria necessário ao utilizador conhecer a arquitectura de antemão
    }

    /**
     * Overrides parent method to update the 'maximum_clients' of all equipments
     *  belonging to the same Architecture as this one.
     *
     * @param mixed $con An optional connection object
     *
     * @return nothing
     */
    protected function doSave($con = null)
    {
        parent::doSave($con);

        $maximum_clients = 1;
        $upwards = Doctrine_Core::getTable('Equipment')->createQuery('e')
                                ->where('e.architecture_id = ?', $this->getObject()->architecture_id)
                                ->orderBy('e.network_level DESC')
                                ->execute();
        foreach ($upwards as $higher) {
            $maximum_clients *= $higher['number_of_ports'];
            $higher->setMaximumClients($maximum_clients);
            $higher->save();
        }
    }
}
