<?php

/**
 * Architecture form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class ArchitectureForm extends BaseArchitectureForm
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
        unset($this['created_at'], $this['updated_at'], $this['operator_id'], $this['scenario_id']);
        $user = sfContext::getInstance()->getUser();

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
          'max_size' => 1024 * 1024, // Allowed size in bytes
          'mime_types' => 'web_images',
        )));

        $this->setValidator('image_delete', new sfValidatorPass());

        $scId = $user->getAttribute('scenarioId', 0);
        $currentTech = $currentData->technology_id;
        $archSelectPart = 'SELECT a.technology_id FROM Architecture a INNER JOIN a.Operator o ON a.operator_id = o.id';
        $query = Doctrine_Core::getTable('Technology')->createQuery('t')
                  ->where('t.scenario_id = ?', $scId)
                  ->andWhere('(t.id = ?', $currentTech)
                  ->orWhere(
                      't.id NOT IN ('.$archSelectPart." WHERE a.scenario_id = '".$scId."' AND o.user_id = ?))",
                      $user->getAttribute('id')
                   );
        $this->getWidget('technology_id')->setOption('query', $query);
        $this->getWidget('technology_id')->setOption('add_empty', true);
    }
}
