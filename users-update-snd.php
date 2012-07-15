<?php 
	require_once('include/required.inc.php');
	if($_POST['userFirstName'] != "" && $_POST['userLastName'] != "" && $_POST['userLogin'] != "" && is_numeric($_POST['userID']) && $_POST['userID'] != "") {
		if($_POST['userPassword'] != "") {
			$password = sha1($_POST['userPassword']);
		} else {
			$password = "";
		}
		$userManager = ManagerFactory::getUserManager();
		$userManager->updateUser((int)$_POST['userID'], ucfirst($_POST['userFirstName']), strtoupper($_POST['userLastName']), $_POST['userLogin'], $password);
		header('location: users-list.php');
	}
?>