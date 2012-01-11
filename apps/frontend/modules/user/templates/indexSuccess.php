<h1>Users List</h1>

<table>
  <thead>
    <tr>
      <th>Login</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>"><?php echo $user->getLogin() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
