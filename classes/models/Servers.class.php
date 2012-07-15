<?php 
class Server {
	// ATTRIBUTS
	private $id;
	private $name;
	private $address;
	private $port;
	private $protocol;
	private $certificate;
	
	// CONSTRUCTEUR
	public function __construct($id = null, $name = null, $address = null, $port = null, $protocol = null, $certificate = null) {
		$this->id = $id;
		$this->name = $name;
		$this->address = $address;
		$this->port = $port;
		$this->protocol = $protocol;
		$this->certificate = $certificate;
	}
	
	// GETTERS & SETTERS
	public function getId() { return $this->id; }
	public function getName() { return $this->name; }
	public function getAddress() { return $this->address; }
	public function getPort() { return $this->port; }
	public function getProtocol() { return $this->protocol; }
	public function getCertificate() { return $this->certificate; }
	public function setName($name) { $this->name = $name; }
	public function setAddress($address) { $this->address = $address; }
	public function setPort($port) { $this->port = $port; }
	public function setProtocol($protocol) { $this->protocol = $protocol; }
	public function setCertificate($certificate) { $this->certificate = $certificate; }
}
?>