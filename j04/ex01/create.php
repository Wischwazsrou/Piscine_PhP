<?php

if ($_POST["login"] == NULL || $_POST["passwd"] == NULL)
{
	echo "ERROR\n";
	return ;
}
else if (file_exists("../private/passwd") == 0)
{
	if (file_exists("../private") == 0)
		mkdir("../private");
	file_put_contents("../private/passwd", "");
}
if ($_POST["submit"] == "OK" && file_exists("../private/passwd") == 1)
{
	$account = file_get_contents("../private/passwd");
	$account = unserialize($account);
	if ($account)
	{
		foreach ($account as $id)
			foreach ($id as $login => $passwd)
			{
 				if ($login == $_POST['login'])
 				{
 					echo "ERROR\n";
 					return ;
 				}
 			}
 	}
	$passwd = hash('sha1', $_POST['passwd']);
	$account[] = array($_POST['login'] => $passwd);
	file_put_contents("../private/passwd", serialize($account));
	echo "OK\n";
}

?>
