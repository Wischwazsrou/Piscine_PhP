<?php
session_start();
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
		echo "<h1 id='title'>USER : ADD</h1>";
		if ($_POST['submit'] == "OK")
		{
				if (check_value($_POST['login'], $_POST['pwd'], $_POST['action']) == true)
				{
					add_user($_POST['login'], $_POST['pwd'], $_POST['privilege']);
					$_POST['info'] = "new profil created !";
				}
		}
if ($_POST['error'])
{
?>
	<div class="error" class"admin_popup_position">
		<p><?php echo $_POST['error']; ?></p>
	</div>
<?php
}
if ($_POST['info'])
{
?>
	<div class="info" class"admin_popup_position">
		<p><?php echo $_POST['info']; ?></p>
	</div>
<?php
}
?>
	<div style="clear:both"></div>
	<div class="admin_form">
	<form action="add_user.php" method="POST">
			<div style="clear:both"></div>
			<div class="input_label">
			<p>login</p><input type="text" name="login" class="input" />
			</div>
			<div class="input_label">
				<p>password</p><input type="password" name="pwd" class="input" />
			</div>
			<div class="input_label">
				<p>privilege</p><input type="number" name="privilege" min="0" max="3" class="input"/>
			</div>
			<input type="hidden" name="action" value="sign_in"/>
			<input type="submit" name="submit" value="OK" class="bouton"/>
		</form>
<?php
		$register_users = get_all_users();
?>
	<div id="register_user" class="content_style">
		<p>Registers users</p></br>
		<ul>
<?php 
		foreach ($register_users as $user)
		{
?>
			<li><a href="#"><?php echo $user ?></a></li>
<?php
		}
?>
		</ul>
	</div>

	</div>
</div>
