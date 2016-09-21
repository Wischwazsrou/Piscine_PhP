#!/usr/bin/php
<?php
$tab;
$i = 2;
$j = 0;
if ($argc > 2)
{
	while (isset($argv[$i]))
	{
		$tmp = split(":", $argv[$i]);
		$tab [$tmp[0]] = $tmp[1];
		$i++;
	}
	foreach ($tab as $key => $value)
	{
		if (strcmp($key, $argv[1]) == 0)
			echo $value."\n";
	}
}
?>
