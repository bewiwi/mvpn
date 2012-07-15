<?php 
	require_once('include/required.inc.php');
	if($_POST['serverName'] != "" && $_POST['serverAddress'] != "" && $_POST['serverPort'] != "") {
		$serverManager = ManagerFactory::getServerManager();
		$serverManager->addServer($_POST['serverName'], $_POST['serverAddress'], $_POST['serverPort'], $_POST['serverProtocol'], $_POST['serverCA']);
	}
	header('location: servers-list.php');
?>