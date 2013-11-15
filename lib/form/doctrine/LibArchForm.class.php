<?php

/**
 * LibArch form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class LibArchForm extends BaseLibArchForm
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
        unset($this['created_at'], $this['updated_at']);

        //show upload selection and file removal option
        $anchorStart = '<a href="%file%" target="_blank">';
        $inputWidgetTemplate = '</a><br />%input%';
        $delete = '<br />%delete% remove the current image';

        $currentData = $this->getObject();
        $this->setWidget('image', new sfWidgetFormInputFileEditable(array(
          'file_src' => '/uploads/architecture/'.$this->getObject()->image,
          'is_image' => true,
          'edit_mode' => $currentData->image ? true : false,
          'with_delete' => true,
          'template' => $currentData->image ? '<div>%file%<br />%input%'.$delete.'</div>' :
             $anchorStart.$currentData->image.$inputWidgetTemplate,
        )));

        $this->setValidator('image', new sfValidatorFile(array(
          'required' => false,
          'path' => sfConfig::get('sf_upload_dir').'/architecture/',
          'max_size' => 1024, // Allowed size in bytes
          'mime_types' => 'web_images',
        )));

        $this->setValidator('image_delete', new sfValidatorPass());

        $currentTech = $currentData->tech_id;
        $query = Doctrine_Core::getTable('LibTech')->createQuery('lt')
                  ->where('lt.id = ?', $currentTech)
                  ->orWhere('lt.id NOT IN (SELECT la.tech_id FROM LibArch la WHERE la.tech_id IS NOT NULL OR la.tech_id > ?)', 0);
        $this->getWidget('tech_id')->setOption('query', $query);
        $this->getWidget('tech_id')->setOption('add_empty', true);
    }
}
