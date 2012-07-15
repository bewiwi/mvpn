<?php 
	require_once('required.php');
	if($_GET['userid'] != "" && is_numeric($_GET['userid'])) {
		$userManager = ManagerFactory::getUserManager();
		$userManager->lockUser((int)$_GET['userid']);
	} else {
		exit;
	}
?>