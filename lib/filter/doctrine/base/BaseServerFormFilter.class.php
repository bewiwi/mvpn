<?php

/**
 * Server filter form base class.
 *
 * @package    m-vpn
 * @subpackage filter
 * @author     Loïc PORTE
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ip'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'port'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'proto' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ca'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'  => new sfValidatorPass(array('required' => false)),
      'ip'    => new sfValidatorPass(array('required' => false)),
      'port'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'proto' => new sfValidatorPass(array('required' => false)),
      'ca'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('server_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Server';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'name'  => 'Text',
      'ip'    => 'Text',
      'port'  => 'Number',
      'proto' => 'Text',
      'ca'    => 'Text',
    );
  }
}
