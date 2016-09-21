<?php

include('config.php');
include('include/header.php');
include('include/user_handle.php')

?>
<h1>Admin</h1>

<div id="admin_content">
	<div id="admin_menu">
		<ul>
			<li><a href="admin.php?type=user_handle">user</a></li>
			<li><a href="admin.php?type=product_handle">product</a></li>
		</ul>
	</div>
<?php
	$handle = $_GET['type'];
	if ($handle)
	{
?>
<?php 
		if ($handle == "user_handle")
		{
			echo "<h1 id='title'>USER : ADD</h1>";
			include('include/user_form.php');
		}
		else
		{
			echo "<h1 id='title'>PRODUCT : ADD</h1>";
			include('include/product_form.php');
		}
		if ($_POST['submit'] == "OK")
		{
			if ($handle == "user_handle")
			{
				if (check_value($_POST['login'], $_POST['pwd'], $_POST['action']) == true)
				{
					add_user($_POST['login'], $_POST['pwd']);
					$_POST['info'] = "new profil created !";
				}
			}
		}
?>
<?php
	}
?>
