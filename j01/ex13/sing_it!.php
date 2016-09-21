#!/usr/bin/php
<?php
if ($argc == 2)
{
	$n = rand(1, 2);
	$str = trim($argv[1]);
	if ($str == "mais pourquoi cette demo ?")
		echo "Tout simplement pour qu'en feuilletant le sujet\non ne s'apercoive pas de la nature de l'exo\n";
	else if ($str == "mais pourquoi cette chanson ?")
		echo "Parce que Kwame a des enfants\n";
	else if ($str == "vraiment ?" && $n == 1)
		echo "Oui il a vraiment des enfants\n";
	else if ($str == "vraiment ?" && $n == 2)
		echo "Nan c'est parce que c'est le premier avril\n";
}
?>
