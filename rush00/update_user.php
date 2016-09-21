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
echo "<h1 id='title'>USER : UPDATE</h1>";

if ($_POST['submit'] == "update")
{
	$user_db = unserialize(file_get_contents(USER_DB));
	foreach ($user_db as $index => &$user)
	{
		foreach ($user as $key => $value)
		{
			if ($key == "login" && $value == $_POST['login'])
			{
					$user['login'] = $_POST['login'];
					$user['privilege'] = $_POST['privilege'];
					$_POST['info'] = "Update done.";
			}
		}
	}
	file_put_contents(USER_DB, serialize($user_db));
}


if ($_POST['submit'] == "delete")
{
	$user_db = unserialize(file_get_contents(USER_DB));
	foreach ($user_db as $index => $user)
	{
		foreach ($user as $key => $value)
		{
			if ($key == "login" && $value == $_POST['login'])
			{
				unset ($user_db[$index]);
				$_POST['info'] = "The user has been deleted.";
			}
		}
	}
	file_put_contents(USER_DB, serialize($user_db));
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
	if ($_GET['login'])
		$user = get_user_info($_GET['login']);
?>
	<div style="clear:both"></div>
	<div class="admin_form">
	<form action="update_user.php" method="POST">
			<div style="clear:both"></div>
			<div class="input_label">
			<p>login</p><input type="text" name="login" class="input" value="<?php echo $user['login']?>" />
			</div>
			<div class="input_label">
			<p>password</p><input type="password" name="pwd" class="input" value="<?php echo $user['password'] ?>"/>
			</div>
			<div class="input_label">
			<p>privilege</p><input type="number" name="privilege" min="0" max="3" class="input" value="<?php echo $user['privilege'] ?>"/>
			</div>
			<input type="hidden" name="action" value="update"/>
			<input type="submit" name="submit" value="update" class="bouton"/>
			<input type="submit" name="submit" value="delete" class="bouton" style="background-color: #ff5050;"/>
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
			<li><a href="update_user.php?login=<?php echo $user ?>"><?php echo $user ?></a></li>
<?php
		}
?>
		</ul>
	</div>

	</div>
</div>
