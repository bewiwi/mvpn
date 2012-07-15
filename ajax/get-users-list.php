<?php
    require_once('required.php');
    $userManager = ManagerFactory::getUserManager();
    $users = $userManager->getUserList();
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Options</th>
        <th>Login</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($users as $u) {
        if($u->getLocked() == 1) { $status = "Bloqué"; } else { $status = "Ok"; }
        ?>
    <tr>
        <td>
        	<i class="icon-pencil pointer" onclick="javascript:document.location='users-update.php?id=<?php echo $u->getId(); ?>'" title="Update this user"></i>
            <i class="icon-lock pointer" onclick="javascript:lockUser(<?php echo $u->getId(); ?>);" title="<?php if($u->getLocked() == 1) { echo "Unlock this user"; } else { echo "Lock this user"; }?>"></i>
            <i class="icon-hdd pointer" onclick="javascript:viewServerList(<?php echo $u->getId(); ?>);" title="View servers list"></i>
            <i class="icon-remove pointer" onclick="javascript:deleteUser(<?php echo $u->getId(); ?>);" title="Remove this user"></i>
        </td>
        <td><?php echo $u->getLogin(); ?></td>
        <td><?php echo htmlentities($u->getFirstName()); ?></td>
        <td><?php echo htmlentities($u->getLastName()); ?></td>
        <td><?php echo $status; ?></td>
    </tr>
        <?php
    }
    ?>
    </tbody>
</table>