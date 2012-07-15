<?php 
class User {
	// ATTRIBUTS
	private $id;
	private $lastName;
	private $firstName;
	private $login;
	private $password;
	private $locked;
	
	// CONSTRUCTEUR
	public function __construct($id = null, $lastName = null, $firstName = null, $login = null, $password =  null, $locked = null) {
		$this->id = $id;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->login = $login;
		$this->password = $password;
		$this->locked = $locked;
	}
	
	// GETTERS & SETTERS
	public function getId() { return $this->id; }
	public function getFirstName() { return $this->firstName; }
	public function getLastName() { return $this->lastName; }
	public function getLogin() { return $this->login; }
	public function getPassword() { return $this->password; }
	public function getLocked() { return $this->locked; }
	public function setFirstName($firstName) { $this->firstName = $firstName; }
	public function setLastName($lastName) { $this->lastName = $lastName; }
	public function setLogin($login) { $this->login = $login; }
	public function setLocked($locked) { $this->locked = $locked; }	
}
?>