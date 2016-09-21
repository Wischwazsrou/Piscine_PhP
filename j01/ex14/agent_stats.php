#!/usr/bin/php
<?php
if ($argc != 2)
	return ;
$i = 0;
$poubelle = fgets(STDIN);
while ($var[] = fgets(STDIN))
{
	$tmp = split(";", $var[$i]);
	$users[$tmp[0]][$tmp[2]] = $tmp[1];
	$i++;
}
if ($argv[1] == "moyenne")
{
	$all_notes = 0;
	$nbr_notes = 0;
	foreach ($users as $correcteurs)
		foreach ($correcteurs as $correcteur => $note)
			if ($correcteur != "moulinette" && is_numeric($note))
			{
				$all_notes += $note;
				$nbr_notes++;
			}
	echo $all_notes / $nbr_notes."\n";
}
if ($argv[1] == "moyenne_user")
{
	ksort($users);
	foreach ($users as $user => $correcteurs)
	{
		$all_notes = 0;
		$nbr_notes = 0;
		echo $user.":";
		foreach ($correcteurs as $correcteur => $note)
			if ($correcteur != "moulinette" && is_numeric($note))
			{
				$all_notes += $note;
				$nbr_notes++;
			}
		echo $all_notes / $nbr_notes."\n";
	}
}
if ($argv[1] == "ecart_moulinette")
{
	$ecart = 0;
	$nbr_notes = 0;
	ksort($users);
	foreach ($users as $user => $correcteurs)
	{
		foreach ($correcteurs as $correcteur => $note)
			if ($correcteur == "moulinette")
				$note_moul = $note;
		echo $user.":";
		foreach ($correcteurs as $correcteur => $note)
			if ($correcteur != "moulinette" && is_numeric($note))
			{
				$ecart += ($note - $note_moul);
				$nbr_notes++;
			}
		echo $ecart / $nbr_notes."\n";
		$nbr_notes = 0;
		$ecart = 0;
	}
}
?>
