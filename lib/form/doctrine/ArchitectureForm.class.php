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
        unset($this['created_at'], $this['updated_at'], $this['scenario_id']);
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
        $query = Doctrine_Core::getTable('Technology')->createQuery('t')
                  ->where('t.scenario_id = ?', $scId)
                  ->andWhere('(t.id = ?', $currentTech)
                  ->orWhere('t.id NOT IN (SELECT a.technology_id FROM Architecture a WHERE a.scenario_id = ?))', $scId);
        $this->getWidget('technology_id')->setOption('query', $query);
        $this->getWidget('technology_id')->setOption('add_empty', true);

        $query = Doctrine_Core::getTable('Operator')->createQuery('o')
                  ->where('o.scenario_id = ?', $scId)
                  ->andWhere('o.user_id = ?', $user->getAttribute('id'));
        $this->getWidget('operator_id')->setOption('query', $query);
        $this->getWidget('operator_id')->setOption('add_empty', true);

        $operatorId = $user->getAttribute('operatorId', 0);
        if ($operatorId) {
            $this->setDefault('operator_id', $operatorId);
        }

        //$this->mergePostValidator(new sfValidatorCallback(array(
        //    'callback' => array($this, 'validateSingleArchitecturePerOperator'))
        //));
    }

    /**
     * Checks if the select technology does not have an associated architecture for this operator already
     *
     * @param mixed $validator Validator
     * @param mixed $values    Values
     *
     * @return $values
     */
    public function validateSingleArchitecturePerOperator($validator, $values)
    {
        // The list of fields that have failed validation (initially none)
        $failed = array();

        //TODO finish this
        if ($sum !== 100.00) {
            $tempError = new sfValidatorError($validator,
                'Total percentage for territory sections has to be 100%. Adjust this value if needed.');
            $failed = array(
                'dense_urban_territory' => $tempError,
                'urban_territory' => $tempError,
                'suburban_territory' => $tempError,
                'rural_territory' => $tempError,
            );
        }

        // If any failed, we need to throw a schema of errors
        if (count($failed) > 0) {
            throw new sfValidatorErrorSchema($validator, $failed);
        }

        // If everything is OK, we must return the values, that could have been "cleaned" if we wanted to
        return $values;
    }
}
