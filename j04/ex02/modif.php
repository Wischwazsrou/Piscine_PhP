<?php

if ($_POST['login'] == NULL || $_POST['oldpw'] == NULL || $_POST['newpw'] == NULL)
	echo "ERROR\n";
if ($_POST['submit'] == "OK")
{
	$account = file_get_contents("../private/passwd");
	$account = unserialize($account);
	$oldpw = hash('sha1', $_POST['oldpw']);
	if ($account)
	{
		foreach ($account as $id => $logins)
		{
			foreach($logins as $login => $passwd)
			{
				if ($login == $_POST['login'])
				{
 					if ($passwd == $oldpw)
 					{
						$account[$id][$login]  = hash('sha1', $_POST['newpw']);
						file_put_contents("../private/passwd", serialize($account));
						echo "OK\n";
						return ;
 					}
				}
			}
		}
	}	
	echo "ERROR\n";
}

?>
