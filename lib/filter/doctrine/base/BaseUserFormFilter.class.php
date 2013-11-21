<?php

/**
 * User filter form base class.
 *
 * @package    stimuLearning
 * @subpackage filter
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'      => new sfWidgetFormFilterInput(),
      'filiation'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'department' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_admin'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'last_login' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'username'   => new sfValidatorPass(array('required' => false)),
      'password'   => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'filiation'  => new sfValidatorPass(array('required' => false)),
      'department' => new sfValidatorPass(array('required' => false)),
      'is_admin'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'last_login' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'username'   => 'Text',
      'password'   => 'Text',
      'email'      => 'Text',
      'filiation'  => 'Text',
      'department' => 'Text',
      'is_admin'   => 'Boolean',
      'last_login' => 'Date',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'deleted'    => 'Boolean',
    );
  }
}
