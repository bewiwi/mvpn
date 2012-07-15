<?php 
	if($_GET['userid'] != "" && is_numeric($_GET['serverid']) && (int)$_GET['userid'] != "" && (int)$_GET['userid']) {
		include('required.php');
		$serverManager = ManagerFactory::getServerManager();
		$serverManager->deleteUserFromServer((int)$_GET['userid'], (int)$_GET['serverid']);
	}
	
?>