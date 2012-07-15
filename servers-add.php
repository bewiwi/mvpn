<?php
	require_once('include/required.inc.php');
	$page = "servers";
	$pageTitle = "MyVPN - New server";
	 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('include/meta.inc.php'); ?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
       <?php include('include/header.inc.php'); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="page-header">
                	<h1>Create a new server</h1>
                </div>
            </div>
            <div>
            	<form action="servers-add-snd.php" class="form-horizontal" method="post">
                	<div class="well">
                    	<div class="control-group">
                        	<label class="control-label" for="serverName">Name</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="serverName" id="serverName" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverAddress">IP Address</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="serverAddress" id="serverAddress" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverCA">CA</label>
                            <div class="controls">
                            	<input type="text" class="input-xlarge" name="serverCA" id="serverCA" required />
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverProtocol">Protocol</label>
                            <div class="controls">
                            	<select id="serverProtocol" name="serverProtocol" class="input-small">
                                	<option value="tcp">TCP</option>
                                	<option value="udp">UDP</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="serverPort">Port</label>
                            <div class="controls">
                            	<input type="telephone" class="input-mini" name="serverPort" id="serverPort" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                    	<button type="submit" class="btn btn-primary">Validate</button>
                        <button type="button" class="btn" onclick="javascript:document.location='<?php echo $_SERVER['HTTP_REFERER']; ?>'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>