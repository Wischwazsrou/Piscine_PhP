<?php

function auth($login, $passwd)
{
	$account = file_get_contents("../private/passwd");
	$account = unserialize($account);
	if ($account)
	{
		foreach ($account as $id)
			foreach ($id as $login_stock => $passwd_stock)
			{
 				if ($login_stock == $_GET['login'])
 					if ($passwd_stock == hash('sha1', $passwd))
 						return TRUE;
 			}
	}
	return FALSE;
}

?>
