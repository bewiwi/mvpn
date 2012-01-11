<?php

/**
 * User filter form base class.
 *
 * @package    m-vpn
 * @subpackage filter
 * @author     Loïc PORTE
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'login'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'  => new sfWidgetFormFilterInput(),
      'firstname' => new sfWidgetFormFilterInput(),
      'locked'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'login'     => new sfValidatorPass(array('required' => false)),
      'password'  => new sfValidatorPass(array('required' => false)),
      'lastname'  => new sfValidatorPass(array('required' => false)),
      'firstname' => new sfValidatorPass(array('required' => false)),
      'locked'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
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
      'id'        => 'Number',
      'login'     => 'Text',
      'password'  => 'Text',
      'lastname'  => 'Text',
      'firstname' => 'Text',
      'locked'    => 'Boolean',
    );
  }
}
