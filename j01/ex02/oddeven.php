#!/usr/bin/php
<?php
	function get_number()
	{
		echo "Entrer un nombre : ";
		$nbr = fgets(STDIN);
		return ($nbr);
	}

	while ($nbr = get_number())
	{
		$nbr = trim($nbr, "\n");
		$nbr = trim($nbr);
		if (is_numeric($nbr))
		{
			if ($nbr % 2 == 0)
				echo  "Le chiffre ".$nbr." est Pair\n";
			else
				echo "Le chiffre ".$nbr." est Impair\n";
		}
		else
			echo "'".$nbr."' n'est pas un chiffre\n";
	}
	echo "\n";
?>
