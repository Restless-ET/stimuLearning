<?php

/**
 * DecisionPoint form.
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DecisionPointForm extends BaseDecisionPointForm
{
  /**
   * Apply the proper widget configurations and validators for this form
   * (non-PHPdoc)
   * @see sfForm::configure()
   */
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
  }
}