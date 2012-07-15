<?php 
	$page = "users";
	$pageTitle = "MyVPN - Users list"; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('include/meta.inc.php'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        getUsersList();
		$("#search").livefilter({selector:'tr'});
    });
</script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <?php include('include/header.inc.php'); ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="page-header">
            	<h1 class="inline-block">Users list</h1>
                <button class="btn btn-primary btn-large pull-right" style="display:inline-block;" onclick="javascript:document.location='users-add.php'">
                	<i class="icon-user icon-white"></i>&nbsp; Create User
                 </button>
            </div>
            <div class="input-prepend" style="padding-bottom:15px;">
            	<span class="add-on"><i class="icon-search"></i></span><input type="text" name="search" id="search" class="input-xlarge" placeholder="Search user by first name, last name ..." />
            </div>
            <div id="users"></div>
        </div>
    </div>
</div>
<div id="popup-container" style="display:none;"></div>
</body>
</html>