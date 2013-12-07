<?php

/**
 * Customization form base class.
 *
 * @method Customization getObject() Returns the current form's model object
 *
 * @package    stimuLearning
 * @subpackage form
 * @author     Artur Melo <adsmelo@ua.pt>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCustomizationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'home_page_content'    => new sfWidgetFormTextarea(),
      'about_page_content'   => new sfWidgetFormTextarea(),
      'credits_page_content' => new sfWidgetFormTextarea(),
      'jquery_ui_theme'      => new sfWidgetFormChoice(array('choices' => array('black-tie' => 'black-tie', 'blitzer' => 'blitzer', 'cupertino' => 'cupertino', 'dark-hive' => 'dark-hive', 'dot-luv' => 'dot-luv', 'eggplant' => 'eggplant', 'excite-bike' => 'excite-bike', 'flick' => 'flick', 'hot-sneaks' => 'hot-sneaks', 'humanity' => 'humanity', 'le-frog' => 'le-frog', 'mint-choc' => 'mint-choc', 'overcast' => 'overcast', 'pepper-grinder' => 'pepper-grinder', 'redmond' => 'redmond', 'smoothness' => 'smoothness', 'south-street' => 'south-street', 'start' => 'start', 'sunny' => 'sunny', 'swanky-purse' => 'swanky-purse', 'trontastic' => 'trontastic', 'ui-darkness' => 'ui-darkness', 'ui-lightness' => 'ui-lightness', 'vader' => 'vader'))),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'home_page_content'    => new sfValidatorString(),
      'about_page_content'   => new sfValidatorString(),
      'credits_page_content' => new sfValidatorString(),
      'jquery_ui_theme'      => new sfValidatorChoice(array('choices' => array(0 => 'black-tie', 1 => 'blitzer', 2 => 'cupertino', 3 => 'dark-hive', 4 => 'dot-luv', 5 => 'eggplant', 6 => 'excite-bike', 7 => 'flick', 8 => 'hot-sneaks', 9 => 'humanity', 10 => 'le-frog', 11 => 'mint-choc', 12 => 'overcast', 13 => 'pepper-grinder', 14 => 'redmond', 15 => 'smoothness', 16 => 'south-street', 17 => 'start', 18 => 'sunny', 19 => 'swanky-purse', 20 => 'trontastic', 21 => 'ui-darkness', 22 => 'ui-lightness', 23 => 'vader'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customization[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Customization';
  }

}
