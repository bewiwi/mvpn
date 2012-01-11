<?php

/**
 * Server form base class.
 *
 * @method Server getObject() Returns the current form's model object
 *
 * @package    m-vpn
 * @subpackage form
 * @author     Loïc PORTE
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'name'  => new sfWidgetFormInputText(),
      'ip'    => new sfWidgetFormInputText(),
      'port'  => new sfWidgetFormInputText(),
      'proto' => new sfWidgetFormInputText(),
      'ca'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'  => new sfValidatorString(array('max_length' => 255)),
      'ip'    => new sfValidatorString(array('max_length' => 30)),
      'port'  => new sfValidatorInteger(),
      'proto' => new sfValidatorString(array('max_length' => 30)),
      'ca'    => new sfValidatorString(array('max_length' => 3500)),
    ));

    $this->widgetSchema->setNameFormat('server[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Server';
  }

}
