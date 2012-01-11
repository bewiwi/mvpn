<?php

/**
 * Log filter form base class.
 *
 * @package    m-vpn
 * @subpackage filter
 * @author     Loïc PORTE
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'server_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Server'), 'add_empty' => true)),
      'user_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'info'      => new sfWidgetFormFilterInput(),
      'level'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'server_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Server'), 'column' => 'id')),
      'user_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'info'      => new sfValidatorPass(array('required' => false)),
      'level'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Log';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'server_id' => 'ForeignKey',
      'user_id'   => 'ForeignKey',
      'info'      => 'Text',
      'level'     => 'Text',
    );
  }
}
