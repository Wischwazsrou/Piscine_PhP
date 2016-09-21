#!/usr/bin/php
<?php
if($argc == 4)
{
	$tab = split(' ', $argv[1]);
	$i = 2;
	while (isset($argv[$i]))
	{
		$tab = array_merge($tab, split(' ', $argv[$i]));
		$i++;
	}
	$i = 0;
	$tab = array_filter($tab);
	$tab = split(' ', join(' ', $tab));
	if ($tab[1] == "+")
		echo ($tab[0] + $tab[2]);
	else if ($tab[1] == "-")
		echo ($tab[0] - $tab[2]);
	else if ($tab[1] == "*")
		echo ($tab[0] * $tab[2]);
	else if ($tab[1] == "/")
		echo ($tab[0] / $tab[2]);
	else if ($tab[1] == "%")
		echo ($tab[0] % $tab[2]);
}
else
	echo "Incorrect Parameters\n";
?>
