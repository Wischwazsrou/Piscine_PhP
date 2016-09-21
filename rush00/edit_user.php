<?php

if (file_exists(USER_DB) == 1)
{
	$account = file_get_contents(USER_DB);
	$account = unserialize($account);
	if ($account)
	{
		foreach ($account as $key => $value)
		{
			if ($value["login"] == $_POST["login"])
			{
				if ($value == $_POST)
				{
					file_put_contents(USER_DB, serialize($account));
					//	header('Location: http://e3r7p10.42.fr:8080/');
					echo "No modification to be done";
					return ;
				}
				else
				{	
					$account[$key] = $_POST;
					file_put_contents(USER_DB, serialize($account));
					//	header('Location: http://e3r7p10.42.fr:8080/');
					echo "modifications done.";
					return;
				}
			}
			else
			{
				file_put_contents(USER_DB, serialize($account));
				//	header('Location: http://e3r7p10.42.fr:8080/');
				echo "This login doesn't exist.";
				return ;
			}
		}
 	}
}

?>