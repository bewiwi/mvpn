<?php

/**
 * User form.
 *
 * @package    m-vpn
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
    /*  $this->setWidgets(array(
          'login'    => new sfWidgetFormInputText(),
          'password' => new sfWidgetFormInputPassword(),
      ));
      $this->addCSRFProtection();
*/
      $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
     // $this->widgetSchema['lock'] = new sfWidgetFormInputCheckbox();
  }
}
