<?php

$dirname = "../private";

if ($_POST['submit'] != "OK"
	|| !$_POST['login'] || !$_POST['passwd'])
{
	echo "ERROR\n";
	exit ;
}

if (file_exists($dirname) === false)
	mkdir($dirname);
if (file_exists($dirname."/passwd") === true)
	$file = unserialize(file_get_contents($dirname."/passwd"));
else
	$file = array();

if ($file)
{
	foreach ($file as $compte)
	{
		if ($compte['login'] == $_POST['login'])
		{
			echo "ERROR\n";
			exit ;
		}
	}
}

$entry = array(
	'login' => $_POST['login'],
	'passwd' => hash("whirlpool", $_POST['passwd']),
);

$file[] = $entry;
$file = serialize($file);
file_put_contents($dirname."/passwd", $file);
echo "OK\n";
?>
