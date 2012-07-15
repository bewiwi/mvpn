<?php 
	require_once('required.php');
	if($_GET['userid'] != "" && is_numeric($_GET['userid'])) {
		$userManager = ManagerFactory::getUserManager();
		$user = $userManager->getUserById((int)$_GET['userid']);
		$servers = $userManager->getServerListByUser((int)$_GET['userid']);
		if(count($servers) > 0) { 
?>
    <div id="popup-servers" title="<?php echo htmlentities($user->getFirstName()).' '.htmlentities($user->getLastName()).' servers'; ?>">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Port</th>
                <th>Protocol</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php 
			foreach($servers as $s) {
?>
            <tr>
                <td><?php echo $s->getName(); ?></td>
                <td><?php echo $s->getAddress(); ?></td>
                <td><?php echo $s->getPort(); ?></td>
                <td><?php echo $s->getProtocol(); ?></td>
                <td><i class="icon-cog icon-white pointer" title="Get Config" onclick="javascript:document.location='get-config.php?serverid=<?php echo $s->getId(); ?>&userid=<?php echo $user->getId(); ?>'"></i></td>
            </tr>
<?php 
			}
?>
        </tbody>
    </table>
</div>
<?php
		} else {
?>
	<div id="popup-servers" title="<?php echo htmlentities($user->getFirstName()).' '.htmlentities($user->getLastName()).' servers'; ?>">
    	<p>No servers for now</p>
    </div>
<?php 	
		}
	} else {
		exit;
	}
?>