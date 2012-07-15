<div class="navbar-inner">
   <div class="container">
       <a class="brand" href="index.php"><img src="images/logo.png" alt="MyVPN" /></a>
       <ul class="nav">
       <li <?php if($page == "home") { echo 'class="active"'; }?>><a href="index.php">Home</a></li>
           <li class="dropdown <?php if($page == "servers") { echo 'active'; }?>">
           	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Servers <b class="caret"></b></a>
            <ul class="dropdown-menu">
            	<li><a href="servers-list.php"><i class="icon-list-alt"></i> Servers list</a></li>
                <li><a href="servers-add.php"><i class="icon-plus"></i> New server</a></li>
            </ul>
           </li>
           <li class="dropdown <?php if($page == "users") { echo 'active'; }?>">
           	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <b class="caret"></b></a>
            <ul class="dropdown-menu">
            	<li><a href="users-list.php"><i class="icon-list-alt"></i> Users list</a></li>
                <li><a href="users-add.php"><i class="icon-plus"></i> Create user</a></li>
            </ul>
           </li>
       </ul>
       <ul class="nav pull-right">
           <li class="divider-vertical"></li>
           <li><a href="#">Contact us</a></li> 
       </ul>
   </div>
</div>