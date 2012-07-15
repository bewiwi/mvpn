<?php 
	require_once('include/required.inc.php');
	if($_POST['userFirstName'] != "" && $_POST['userLastName'] != "" && $_POST['userLogin'] != "" && $_POST['userPassword'] != "") {
		$userManager = ManagerFactory::getUserManager();
		$userManager->addUser(ucfirst($_POST['userFirstName']), strtoupper($_POST['userLastName']), $_POST['userLogin'], sha1($_POST['password']));
		header('location: users-list.php');
	}
?>