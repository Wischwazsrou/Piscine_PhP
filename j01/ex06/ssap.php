#!/usr/bin/php
<?php
if($argc > 1)
{
	$tab = split(' ', $argv[1]);
	$i = 2;
	while (isset($argv[$i]))
	{
		$tab = array_merge($tab, split(' ', $argv[$i]));
		$i++;
	}
	$tab = array_filter($tab);
	asort($tab);
	echo join("\n", $tab);
}
?>
