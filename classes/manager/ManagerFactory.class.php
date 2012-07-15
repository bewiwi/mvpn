<?php 
require_once('pdo/PdoServerManager.class.php');
require_once('pdo/PdoUserManager.class.php');

final class ManagerFactory {
	private static $pdo = true;
	
	public function __construct() { }
	
	public static function getUserManager() {
		return new PdoUserManager();
	}
	
	public static function getServerManager() {
		return new PdoServerManager();
	}
}
?>