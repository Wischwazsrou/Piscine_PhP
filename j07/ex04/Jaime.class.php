<?php

class Jaime extends Lannister{
	function sleepWith($f){
		if (is_a($f, 'Lannister') == False && is_a($f, 'Stark') == False)
			return;
		if (get_parent_class($f) == "Lannister")
		{
			if (get_class($f) == "Cersei")
				echo "With pleasure, but only in a tower in Winterfell, then.".PHP_EOL;
			else
				echo "Not even if i'm drunk".PHP_EOL;
		}
		else
			echo "Let's do this".PHP_EOL;
	}
}

?>