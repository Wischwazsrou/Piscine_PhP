#!/usr/bin/php
<?php
function is_op($c)
{
	if ($c == "*" || $c == "/" || $c == "+" || $c == "-" || $c == "+" || $c == "%")
		return (1);
	return (0);
}

if ($argc == 2)
{
	$i = 0;
	$j = 0;
	$nb1 = "";
	$nb2 = "";
	$str = trim($argv[1], " ");
	while (is_numeric($str[$i]) || ($str[$j] == "-" && $j == $i) || ($str[$j] == "+" && $j == $i))
	{
		$nb1 = $nb1.$str[$i];
		$i++;
	}
	while($str[$i] == " ")
		$i++;
	if ($str[$i])
		$op = $str[$i];
	$i++;
	while($str[$i] == " ")
		$i++;
	$j = $i;
	while ((isset($str[$i]) && is_numeric($str[$i])) || ($str[$j] == "-" && $j == $i) || ($str[$j] == "+" && $j == $i))
	{
		$nb2 = $nb2.$str[$i];
		$i++;
	}
	if (is_numeric($nb1) && is_numeric($nb2) && is_op($op) && (!(isset($str[$i]))))
	{
		if ($op == "+")
			echo ($nb1 + $nb2);
		else if ($op == "-")
			echo ($nb1 - $nb2);
		else if ($op == "*")
			echo ($nb1 * $nb2);
		else if ($op == "/")
			echo ($nb1 / $nb2);
		else if ($op == "%")
			echo ($nb1 % $nb2);
	}
	else
		echo "Syntax Error\n";
}
else
	echo "Incorrect Parameters\n";
?>
