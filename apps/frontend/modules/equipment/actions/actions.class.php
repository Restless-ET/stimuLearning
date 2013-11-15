<?php

require_once dirname(__FILE__).'/../lib/equipmentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/equipmentGeneratorHelper.class.php';

/**
 * equipment actions.
 *
 * @package    stimuLearning
 * @subpackage equipment
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class EquipmentActions extends autoEquipmentActions
{
    /**
     * Override index action for extra validations
     *
     * @param sfWebRequest $request A request object
     *
     * @return void
     */
    public function executeIndex(sfWebRequest $request)
    {
        if (!$this->getUser()->getAttribute('scenarioId', 0)) {
            $this->redirect('@homepage'); // @scenario
        }

        parent::executeIndex($request);
    }
}
