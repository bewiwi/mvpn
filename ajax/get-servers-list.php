<?php
    require_once('required.php');
    $serverManager = ManagerFactory::getServerManager();
    $servers = $serverManager->getServerList();
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Options</th>
            <th>Name</th>
            <th>IP Address</th>
            <th>Port</th>
            <th>Protocol</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach($servers as $s) {
?>
        <tr>
            <td>
            	<i class="icon-pencil pointer" title="Update server" onclick="javascript:document.location='servers-update.php?id=<?php echo $s->getId(); ?>'"></i>
                <i class="icon-user pointer" title="User list"></i>
                <i class="icon-remove pointer" title="Delete server" onclick="javascript:deleteServer(<?php echo $s->getId(); ?>);"></i>
            </td>
            <td><?php echo $s->getName(); ?></td>
            <td><?php echo $s->getAddress(); ?></td>
            <td><?php echo $s->getPort(); ?></td>
            <td><?php echo strtoupper($s->getProtocol()); ?></td>
        </tr>
<?php
    }
?>
    </tbody>
</table>