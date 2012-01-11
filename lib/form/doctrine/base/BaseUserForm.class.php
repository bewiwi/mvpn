<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    m-vpn
 * @subpackage form
 * @author     Loïc PORTE
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'login'     => new sfWidgetFormInputText(),
      'password'  => new sfWidgetFormInputText(),
      'lastname'  => new sfWidgetFormInputText(),
      'firstname' => new sfWidgetFormInputText(),
      'locked'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'login'     => new sfValidatorString(array('max_length' => 255)),
      'password'  => new sfValidatorString(array('max_length' => 255)),
      'lastname'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'firstname' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'locked'    => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
