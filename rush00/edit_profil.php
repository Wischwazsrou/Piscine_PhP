<?php

include('config.php');
include('include/user_handle.php');
session_start();

if ($_POST['login'] != $_SESSION['user'] || $_POST['login'] == NULL)
{
	$_POST['error'] = "Enter your real login";
}

else if (file_exists(USER_DB) == 1 && $_POST != NULL && $_POST['submit'] == "udpate")
{
	$account = file_get_contents(USER_DB);
	$account = unserialize($account);
	$oldpwd = hash("whirlpool", $_POST['oldpwd']);
	$newpwd = hash("whirlpool", $_POST['newpwd']);
	if ($account)
	{
		foreach ($account as $key => &$value)
		{
			if ($value["login"] == $_POST['login'])
			{
				if ($value['pwd'] == $oldpwd)
				{
					if ($value['pwd'] == $newpwd)
					{
						file_put_contents(USER_DB, serialize($account));
						$_POST['error'] =  "New password is the same as the older. No changes has be done.";
					}
					else
					{	
						$value['pwd'] = $newpwd;
						file_put_contents(USER_DB, serialize($account));
						$_POST['info'] = "Modifications done.";
					}
				}
				else
					$_POST['error'] = "Old password incorrect.";
			}
		}
 	}
}

else if (file_exists(USER_DB) == 1 && $_POST != NULL && $_POST['submit'] == "delete")
{
	$account = file_get_contents(USER_DB);
	$account = unserialize($account);
	$oldpwd = hash("whirlpool", $_POST['oldpwd']);
	if ($account)
	{
		foreach ($account as $key => &$value)
		{
			if ($value["login"] == $_POST['login'])
			{
				if ($value['pwd'] == $oldpwd)
				{
					unset($account[$key]);
					file_put_contents(USER_DB, serialize($account));
					$_POST['info'] =  "Account deleted.";
					session_destroy();
					header("location: index.php");
				}
				else
				{	
					file_put_contents(USER_DB, serialize($account));
					$_POST['error'] = "Passwrod incorrect.";
				}
			}
		}
	}
}
include('include/header.php');
?>

<h1><?php echo $_SESSION['user'] ?></h1>

<div id="admin_content">
	<div id="admin_menu">
		<ul>
			<li><a href="admin.php?type=user_handle">user</a></li>
			<li><a href="admin.php?type=product_handle">product</a></li>
		</ul>
	</div>
<?php
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
	<form action="edit_profil.php" method="POST">
			<div style="clear:both"></div>
			<div class="input_label">
			<p>login</p><input type="text" name="login" class="input" value="<?php echo $user['login']?>" />
			</div>
			<div class="input_label">
			<p>old password</p><input type="password" name="oldpwd" class="input" value=""/>
			</div>
			<div class="input_label">
			<p>new</p><input type="password" name="newpwd" class="input" value=""/>
			</div>
			<input type="hidden" name="action" value="update"/>
			<input type="submit" name="submit" value="update" class="bouton"/>
			<input type="submit" name="submit" value="delete" class="bouton" style="background-color: #ff5050;"/>
	</form>
	</div>
</div>
