<?php

include('config.php');
include('include/user_handle.php');


if ($_POST['submit'] == "OK")
{
	#sign_in

	if (check_value($_POST['login'], $_POST['pwd'], $_POST['action'], $to_do) == TRUE)
	{
		if ($_POST['action'] == 'sign_in')
			add_user($_POST['login'], $_POST['pwd'], 0);
		session_start();
		$user_info= get_user_info($_POST['login']);
		$_SESSION['user'] = $user_info['login'];
		$_SESSION['privilege'] = $user_info['privilege'];
		// print_r($_SESSION['is_logged']);
		$_SESSION['status'] = "logged";
		header("Location: ".ROOT);
		exit();
	}
}

include('include/header.php');
?>

<?php
if ($_POST['error'])
{
?>
<div class="error" ">
<p><?php echo $_POST['error'];?></p>
</div>
<?php
}
?>
<form action="auth.php" method="post">
	<h1><?php echo ($_POST['action'] == 'login' || $_GET['action'] == 'login') ? Connection : Inscription ?></h1>
	<div class="input_label">
		<p>Identifiant</p><input type="text" name="login" class="input"/>
	</div>
	</br>
	<div class="input_label">
		<p>Mot de passe</p><input type="password" name="pwd" class="input" />
	</div>
	</br>
	<input type="hidden" name="action" value="<?php echo ($_GET['action']) ? $_GET['action'] : $_POST['action'] ?>" />
	<input type="submit" name="submit" value="OK" class="bouton"/>
</form>


<?php

include('include/footer.php');

?>


