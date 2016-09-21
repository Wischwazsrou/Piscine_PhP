#!/usr/bin/php
<?php
function is_alpha($c)
{
	if (("a" <= $c && $c <= "z") || ("A" <= $c && $c <= "Z"))
		return (1);
	return (0);
}

function cmp($a, $b)
{
	$i = 0;
	while (1)
	{
		if (isset($a[$i]) == FALSE && isset($b[$i]) == TRUE)
			return -1;
		else if (isset($b[$i]) == FALSE && isset($a[$i]) == TRUE)
			return 1;
		else if (!($a[$i]) && !($b[$i]))
			return 0;
		else if (strcasecmp($a[$i], $b[$i]) == 0)
			$i++;
		else if ((is_alpha($a[$i]) == 1 || is_numeric($a[$i])) && !is_numeric($b[$i]) && is_alpha($b[$i]) == 0)
			return -1;
		else if (is_alpha($a[$i]) == 0 && !is_numeric($a[$i]) && (is_numeric($b[$i]) || is_alpha($b[$i]) == 1))
			return 1;		
		else if (is_numeric($a[$i]) && is_alpha($b[$i]) == 1)
			return 1;
		else if (is_alpha($a[$i]) == 1 && is_numeric($b[$i]))
			return -1;
		else
			return (strtolower($a[$i]) < strtolower($b[$i])) ? -1 : 1;
	}
}
if($argc > 1)
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
	usort($tab, "cmp");
	$i = 0;
	while (isset($tab[$i]))
	{
		echo $tab[$i];
		echo "\n";
		$i++;
	}
}
