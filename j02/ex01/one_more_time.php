#!/usr/bin/php
<?php
function ft_error()
{
	echo "Wrong Format\n";
}
function month($str)
{
	if (strtolower($str) == "janvier")
		return (1);
	else if (strtolower($str) == "fevrier")
		return (2);
	else if (strtolower($str) == "mars")
		return (3);
	else if (strtolower($str) == "avril")
		return (4);
	else if (strtolower($str) == "mai")
		return (5);
	else if (strtolower($str) == "juin")
		return (6);
	else if (strtolower($str) == "juillet")
		return (7);
	else if (strtolower($str) == "aout")
		return (8);
	else if (strtolower($str) == "septembre")
		return (9);
	else if (strtolower($str) == "octobre")
		return (10);
	else if (strtolower($str) == "novembre")
		return (11);
	else if (strtolower($str) == "decembre")
		return (12);
	else
		return (0);
}

function day($str)
{
	$day = array ("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
	if (in_array(strtolower($str), $day) == FALSE)
		return (FALSE);
	return (TRUE);
}

function checktime($hour, $min, $sec)
{
	if ($hour < 0 || $hour > 23 || !is_numeric($hour)) {
		return FALSE;
	}
	if ($min < 0 || $min > 59 || !is_numeric($min)) {
		return FALSE;
	}
	if ($sec < 0 || $sec > 59 || !is_numeric($sec)) {
		return FALSE;
	}
	return TRUE;
}

if($argc == 2)
{
	$str = trim($argv[1]);
	if (preg_match("/(\w*) (\d{1,2}) (\w*) (\d{4}) (\d{2}):(\d{2}):(\d{2})/", $str) != 1)
		return ft_error();
	$tab = split(" ", $str);
	if (day($tab[0]) == FALSE)
		return ft_error();
	$month = month($tab[2]);
	if (checkdate($month, $tab[1], $tab[3]) == FALSE)
		return ft_error();
	list($hour, $min, $sec) = split(":", $tab[4]);
	if (checktime($hour, $min, $sec) == FALSE)
		return ft_error();
	$date = $month."/".$tab[1]."/".$tab[3];
	date_default_timezone_set("Europe/Paris");
	echo strtotime($date) + $hour * 60 * 60 + $min * 60 + $sec;
}
?>
