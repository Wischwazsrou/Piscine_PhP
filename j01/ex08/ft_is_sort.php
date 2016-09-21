<?php
function ft_is_sort($tab)
{
	$i = 0;
	$tmp = $tab;
	sort($tab);
	while(isset($tab[$i]))
	{
		if (strcmp($tab[$i], $tmp[$i]) != 0)
			return FALSE;
		$i++;		
	}
	return TRUE;
}
?>
