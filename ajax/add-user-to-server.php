<?php
	if($_GET['serverid'] != "" && $_GET['userid'] != "" && is_numeric($_GET['serverid']) && is_numeric($_GET['userid'])) {
		require_once('required.php');
		$serverManager = ManagerFactory::getServerManager();	
		$serverManager->addUserToServer((int)$_GET['serverid'], (int)$_GET['userid']);
	} else {
		exit();
	}
	
?>
