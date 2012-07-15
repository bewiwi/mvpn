<?php
	if($_GET['id'] == "" || !is_numeric($_GET['id'])) {
		exit;
	} else {
		require_once('include/required.inc.php');
		$page = "users";
		$pageTitle = "MyVPN - Update user";
		$userManager = ManagerFactory::getUserManager();
		$user = $userManager->getUserById((int)$_GET['id']);
	}
	 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('include/meta.inc.php'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$("#frmUSR").validate({
		rules: {
			userConfirm: { equalTo: "#userPassword" }		
		}	
	});
});
</script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
       <?php include('include/header.inc.php'); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="page-header">
                	<h1>Create User</h1>
                </div>
            </div>
            <div>
            	<form id="frmUSR" name="frmUSR" action="users-update-snd.php" class="form-horizontal" method="post">
                	<div class="well">
                    	<div class="control-group">
                        	<label class="control-label" for="userFirstName">First Name</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="userFirstName" id="userFirstName" value="<?php echo $user->getFirstName(); ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="userLastName">Last Name</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="userLastName" id="userLastName" value="<?php echo $user->getLastName(); ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="userLogin">Login</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="userLogin" id="userLogin" value="<?php echo $user->getLogin(); ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="userPassword">Password</label>
                            <div class="controls">
                            	<input type="password" class="input-xlarge" name="userPassword" id="userPassword" />
                                <p class="help-block">If you let it blank, the password will not be changed.</p>
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="userConfirm">Confirm</label>
                            <div class="controls">
                            	<input type="password" class="input-xlarge" name="userConfirm" id="userConfirm" />
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                    	<button type="submit" class="btn btn-primary">Validate</button><input type="hidden" name="userID" id="userID" value="<?php echo (int)$_GET['id']; ?>" />
                        <button type="button" class="btn" onclick="javascript:document.location='<?php echo $_SERVER['HTTP_REFERER']; ?>'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>