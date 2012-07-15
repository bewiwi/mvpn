<?php 
	require_once('required.php');
	$serverManager = ManagerFactory::getServerManager();
	$users = $serverManager->getUserListByServer((int)$_GET['serverid']);
	if(count($users) > 0) {
?>
<table class="table">
	<thead>
    	<tr>
        	<th>First name</th>
            <th>Last name</th>
            <th>Login</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach($users as $u) { ?>
    	<tr>
        	<td><?php echo htmlentities($u->getFirstName()); ?></td>
            <td><?php echo htmlentities($u->getLastName()); ?></td>
            <td><?php echo $u->getLogin(); ?></td>
            <td><a href="javascript:deleteUserFromServer(<?php echo $u->getId(); ?>,<?php echo (int)$_GET['serverid']; ?>);">Delete</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } else { ?>
	<h4>No users for now.</h4>
<?php }?>