<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ServerUser', 'doctrine');

/**
 * BaseServerUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $server_id
 * @property integer $user_id
 * @property Server $Server
 * @property User $User
 * 
 * @method integer    getId()        Returns the current record's "id" value
 * @method integer    getServerId()  Returns the current record's "server_id" value
 * @method integer    getUserId()    Returns the current record's "user_id" value
 * @method Server     getServer()    Returns the current record's "Server" value
 * @method User       getUser()      Returns the current record's "User" value
 * @method ServerUser setId()        Sets the current record's "id" value
 * @method ServerUser setServerId()  Sets the current record's "server_id" value
 * @method ServerUser setUserId()    Sets the current record's "user_id" value
 * @method ServerUser setServer()    Sets the current record's "Server" value
 * @method ServerUser setUser()      Sets the current record's "User" value
 * 
 * @package    m-vpn
 * @subpackage model
 * @author     Loïc PORTE
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseServerUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('server_user');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('server_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Server', array(
             'local' => 'server_id',
             'foreign' => 'id'));

        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}