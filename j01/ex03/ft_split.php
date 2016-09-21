<?php
function ft_split($str)
{
	$tab = split(' ', $str);
	asort($tab);
	$tab = join(' ', $tab);
	$tab = trim($tab, ' ');
	$tab = split(' ', $tab);
	return ($tab);	
}
?>
