<?php
function auth($login, $passwd)
{
	$user_db = USER_DB;
	if (file_exists(USER_DB) == FALSE)
	{
		echo "DB not found\n";
		return FALSE;
	}
	$user_db = unserialize(file_get_contents($user_db));
	foreach ($user_db as $user)
	{
		if ($user['login'] == $login && $user['pwd'] == hash("whirlpool", $passwd))
			return TRUE;
	}
	return FALSE;
}

function add_user($login, $passwd, $privilege)
{
	if (file_exists(USER_DB) == TRUE)
		$user_db = unserialize(file_get_contents(USER_DB));
	else
		$user_db = array();

	$new_user= array(
		'login' => $login,
		'pwd' => hash("whirlpool", $passwd),
		// 'is_logged' => 1,
		'privilege' => $privilege,
	);

	$user_db[] = $new_user;
	$user_db = serialize($user_db);
	file_put_contents(USER_DB, $user_db);
}

function is_available_login($login)
{
	if (file_exists(USER_DB) == FALSE)
		return TRUE;
	$user_db = unserialize(file_get_contents(USER_DB));
	foreach ($user_db as $user)
	{
		if ($user['login'] == $login)
			return FALSE;
	}
	return TRUE;
}

function check_value($login, $passwd, $action)
{
	if (!$login || !$passwd)
	{
		$_POST['error'] = "Error: empty_fields\n";
		// echo $_POST['error'];
		return (FALSE);
	}
	else if (!preg_match('/^[a-zA-Z]{4}[a-zA-Z0-9]*$/', $login)
		|| !preg_match('/^[a-zA-Z]{4}[a-zA-Z0-9]*$/', $login))
	{
		$_POST['error'] = "Error: bad_format\n";
		return FALSE;
	}
	else if ($action == 'sign_in' && is_available_login($login) == FALSE)
	{
		$_POST['error'] = "Error: login_not_availables\n";
		return FALSE;
	}
	else if ($action == 'login' && auth($login, $passwd) == FALSE)
	{
		$_POST['error'] = "Error: bad user information\n";
		return FALSE;
	}
	return TRUE;
}

function get_user_info($login)
{
	$user_db = unserialize(file_get_contents(USER_DB));
	foreach ($user_db as $user)
	{
		if ($user['login'] == $login)
		{
			$info = array(
				'login' => $login,
				'password' => $user['pwd'],
				'privilege' => $user['privilege'],
			);
			return $info;
		}
	}
}

function get_all_users()
{
	$user_db = unserialize(file_get_contents(USER_DB));
	$users = array();
	foreach($user_db as $key => $user)
	{
		// print_r($user);
		foreach($user as $name => $value)
		{
			if ($name == "login")
				$users[] = $value;
		}
	}
	return $users;
}
?>
