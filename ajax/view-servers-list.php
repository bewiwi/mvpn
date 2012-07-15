<?php 
	require_once('required.php');
	if($_GET['userid'] != "" && is_numeric($_GET['userid'])) {
		$userManager = ManagerFactory::getUserManager();
		$user = $userManager->getUserById((int)$_GET['userid']);
		$servers = $userManager->getServerListByUser((int)$_GET['userid']);
?>
    <div id="popup-servers" title="<?php echo htmlentities($user->getFirstName()).' '.htmlentities($user->getLastName()).' servers'; ?>">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Port</th>
                <th>Protocol</th>
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
            </tr>
<?php 
			}
?>
        </tbody>
    </table>
</div>
<?php 
	} else {
		exit;
	}
?>