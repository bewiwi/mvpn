<?php
	require_once('include/required.inc.php');
	$userManager = ManagerFactory::getUserManager();
	$users = $userManager->getUserList();
	$serverManager = ManagerFactory::getServerManager();
	$server = $serverManager->findServerById((int)$_GET['id']);
	$pageTitle = "MyVPN - Update Server";
	$page = "servers";	 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('include/meta.inc.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
	getUserListByServer(<?php echo $server->getId(); ?>);
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
                	<h1>Manage Server</h1>
                </div>
            </div>
            <div>
            	<form action="servers-update-snd.php" class="form-horizontal" method="post">
                	<div class="well">
                    	<div class="control-group">
                        	<label class="control-label" for="serverName">Name</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="serverName" id="serverName" value="<?php echo $server->getName(); ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverAddress">IP Address</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="serverAddress" id="serverAddress" value="<?php echo $server->getAddress(); ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverCA">CA</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="serverCA" id="serverCA" value="<?php echo $server->getCertificate(); ?>" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverProtocol">Protocol</label>
                            <div class="controls">
                            	<select id="serverProtocol" name="serverProtocol" class="input-small">
                                	<option value="tcp" <?php if($server->getProtocol() == "tcp") { echo "selected='selected'"; } ?>>TCP</option>
                                	<option value="udp" <?php if($server->getProtocol() == "udp") { echo "selected='selected'"; } ?>>UDP</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverPort">Port</label>
                            <div class="controls">
                            	<input type="telephone" class="input-mini" name="serverPort" id="serverPort" value="<?php echo $server->getPort(); ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="well">
                    	<div class="inline-block" style="width:45%;">
                        	<h3>Manage users</h3>
                        	<p class="txt11"><em>You can bind several user to the new server.</em></p>
                        	<select id="users" name="users">
                        	<?php foreach($users as $u) { ?>
                            	<option value="<?php echo $u->getId(); ?>"><?php echo $u->getFirstName().' '.$u->getLastName(); ?></option>
                        	<?php } ?>
                        	</select>
                            <i class="icon-plus pointer" style="margin-left:5px;" onclick="addUserToServer(<?php echo $server->getId(); ?>, $('#users').val());"></i>
                        </div>
                        <div id="users-list" class="inline-block valign-top">
                        	<h4>No users for now.</h4>
                        </div>
                    </div>
                    <div class="form-actions">
                    	<button type="submit" class="btn btn-primary">Validate</button><input type="hidden" id="serverID" name="serverID" value="<?php echo (int)$_GET['id']; ?>" / >
                        <button type="button" class="btn" onclick="javascript:document.location='<?php echo $_SERVER['HTTP_REFERER']; ?>'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>