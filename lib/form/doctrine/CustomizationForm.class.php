<?php

/**
 * Customization form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class CustomizationForm extends BaseCustomizationForm
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
        $textareas = array('home_page_content', 'about_page_content', 'credits_page_content');

        foreach ($textareas as $textarea) {
            $this->getWidget($textarea)->setAttributes(array('rows' => '15', 'style' => 'width: 99%;'));
        }
    }
}
