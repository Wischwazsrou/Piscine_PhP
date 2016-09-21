<?php

class Tyrion extends Lannister{
	function sleepWith($f){
		if (is_a($f, 'Lannister') == False && is_a($f, 'Stark') == False)
			return;
		if (get_parent_class($f) == "Lannister")
			echo "Not even if i'm drunk".PHP_EOL;
		else
			echo "Let's do this".PHP_EOL;
	}
}

?>