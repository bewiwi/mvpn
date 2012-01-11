<h1>Servers List</h1>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Ip</th>
      <th>config</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($servers as $server): ?>
    <tr>
      <td><a href="<?php echo url_for('server/edit?id='.$server->getId()) ?>"><?php echo $server->getName() ?></a></td>
      <td><?php echo $server->getIp() ?></td>
      <td><a href="<?php echo url_for('server/config?id='.$server->getId()) ?>">config</a>&nbsp; &nbsp;<a href="<?php echo url_for('server/ca?id='.$server->getId()) ?>">CA</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('server/new') ?>">New</a>
