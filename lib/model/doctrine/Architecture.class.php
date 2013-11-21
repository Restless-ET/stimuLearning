<?php

/**
 * Architecture
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class Architecture extends BaseArchitecture
{
    /**
     * Overrided to set the values on some hidden/support fields.
     *
     * @param Doctrine_Connection $conn Optional connection parameter
     *
     * @return void
     */
    public function save(Doctrine_Connection $conn = null)
    {
        $technology = $this->Technology;
        $this->operator_id = $technology->operator_id;
        $this->scenario_id = $technology->scenario_id;

        parent::save($conn);
    }

    /**
     * Generates a proper name for the uploaded file through the widget "image".
     * If it's detected a file with the same name on the general uploads directory,
     * it's appended one digit at the beginning of the file name
     *
     * @param string $file Original name (with extension) of the uploaded file
     *
     * @return string File name
     */
    public function generateImageFilename($file)
    {
        return $this->generateFilename($file);
    }

  /**
     * Auxiliary function to be used by all the previous declared "generateFilename" functions
     *
     * @param string $file File original name (with extension) of the uploaded file
     *
     * @return string File name (according the established nomenclature standard)
     */
    private function generateFilename($file)
    {
        // get the original file name and the file extension
        $originalName = $file->getOriginalName();

        $newFileName = $originalName;

        $filePath = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'architecture';

        $i = 0;
        while (file_exists($filePath.DIRECTORY_SEPARATOR.$newFileName)) {
            $i++;
            // create a new file name - append "i_" to the start of the original file name
            $newFileName = $i.'_'.$originalName;
        }

        return $newFileName;
    }
}
