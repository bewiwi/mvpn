

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>


</head>

<body>
<!--Header Begin-->
<div id="header">
    <div class="center">
        <div id="logo"><a href="#">Calliope</a></div>
        <!--Menu Begin-->
        <div id="menu">
            <ul>
                <li><a href="<?php echo url_for('home/index') ?>"><span>Home</a></span></li>
                <li><a href="<?php echo url_for('server/index') ?>"><span>Server</a></span></li>
                <li><a href="<?php echo url_for('user/index') ?>"><span>User</span></a></li>
            </ul>
        </div>
        <!--Menu END-->
    </div>
</div>
<!--Header END-->



<!--MiddleRow Begin
<div id="midrow">
    <div id="container">
        <?php// echo $sf_content ?>
    </div>
</div>
<!--MiddleRow END-->

<!--BottomRow Begin-->
<div id="bottomrow">
    <?php echo $sf_content ?>
</div>


<!--BottomRow END-->

<!--Footer Begin-->
<div id="footer">
    <div class="foot">
        <span>m-vpn</span> by <a href="http://twitter.com/bewiwi" rel="cc:attributionURL">Bewiwi</a> is licensed under a <a rel="license" href="http://fr.wikipedia.org/wiki/Beerware">Beerware</a> .<br/>
        <span>Calliope</span> by <a href="http://www.towfiqi.com" rel="cc:attributionURL">Towfiq I.</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License.</a>
    </div>
</div>
<!--Footer END-->

</body>
</html>