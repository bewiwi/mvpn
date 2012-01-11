<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="menu">
        <ul>
            <li><a href="<?php echo url_for('home/index') ?>">Home</a></li>
            <li><a href="<?php echo url_for('server/index') ?>">Server</a></li>
            <li><a href="<?php echo url_for('user/index') ?>">User</a></li>
        </ul>
    </div>
    <div id="content">
        <?php echo $sf_content ?>
    </div>
  </body>
</html>
