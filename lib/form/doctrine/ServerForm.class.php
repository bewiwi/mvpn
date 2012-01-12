<?php

/**
 * Server form.
 *
 * @package    m-vpn
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ServerForm extends BaseServerForm
{
  public function configure()
  {
      $this->widgetSchema['proto'] = new sfWidgetFormSelect(array('choices' => array(
                                                                                    'tcp'=>'TCP',
                                                                                    'udp'=>'UDP',
                                                                                    )
                                                                 )
                                                            );
      $this->widgetSchema['proto']->addOption('TCP','tcp');
      $this->widgetSchema['proto']->addOption('UDP','udp');
  }
}
