<?php 
	if($_GET['userid'] != "" && is_numeric($_GET['userid'])) {
		require_once('required.php');
		$userManager = ManagerFactory::getUserManager();
		$userManager->deleteUser((int)$_GET['userid']);
	}
?>