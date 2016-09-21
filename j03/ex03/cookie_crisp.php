<?php
$tab = $_GET;

if ($tab["action"] == "set")
	setcookie($tab["name"], $tab["value"]);

else if ($tab["action"] == "get")
{
	if (isset($_COOKIE[$tab["name"]]))
		echo $_COOKIE[$tab["name"]]."\n";
}
else if ($tab["action"] == "del")
	setcookie($tab["name"], "", time(-1));
?>
