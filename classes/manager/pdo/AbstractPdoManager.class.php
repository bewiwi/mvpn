<?php 
abstract class AbstractPdoManager {
	const DRIVER  = "mysql";
	const HOST = "localhost";
	const PORT = "3306";
	const DATABASE_NAME = "mvpn";
	const USER = "root";
	const PASSWORD = "";
	
	protected $pdo;
	
	public function __construct() {
		$dns = self::DRIVER.':host='.self::HOST.';port='.self::PORT.';dbname='.self::DATABASE_NAME;
		$this->pdo = new PDO($dns, self::USER, self::PASSWORD);
	}
}
?>