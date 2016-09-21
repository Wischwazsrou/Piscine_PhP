#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = $argv[1];
		$str = trim($str);
		$tab = split(' ', $str);
		$tab = array_filter($tab);
		$str = join(' ', $tab);
		echo $str."\n";
	}
?>
