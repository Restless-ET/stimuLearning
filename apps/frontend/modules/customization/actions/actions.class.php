<?php

require_once dirname(__FILE__).'/../lib/customizationGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/customizationGeneratorHelper.class.php';

/**
 * customization actions.
 *
 * @package    stimuLearning
 * @subpackage customization
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class customizationActions extends autoCustomizationActions
{
    /**
     * Override index action to automatically redirect to edit
     *
     * @param sfRequest $request A request object
     *
     * @return void
     */
    public function executeIndex(sfWebRequest $request)
    {
        $customization = Doctrine_Core::getTable('Customization')->findAll();

        $this->redirect('customization/edit?id='.$customization[0]['id']);
    }
}
