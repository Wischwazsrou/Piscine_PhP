#!/usr/bin/php
<?php
if ($argc > 1)
{
	$i = 1;
	$str = trim($argv[1]);
	$tab = split(' ', $str);
	$tab = array_filter($tab);
	$tab = split(' ', join(' ', $tab));
	while (isset($tab[$i]))
	{
		echo $tab[$i]." ";
		$i++;
	}
	echo $tab[0]."\n";
}
?>
