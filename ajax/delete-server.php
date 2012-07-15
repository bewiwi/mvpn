<?php 
	if($_GET['serverid'] != "" && is_numeric($_GET['serverid'])) {
		require_once('required.php');
		$serverManager = ManagerFactory::getServerManager();
		$serverManager->deleteServer((int)$_GET['serverid']);
	}
?>