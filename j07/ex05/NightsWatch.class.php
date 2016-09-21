<?php

class NightsWatch{	

	private $_fighters;

	function recruit($candidat){
		if ($candidat instanceof IFighter && method_exists($candidat, 'fight') == True)
			$this->_fighters[get_class($candidat)] = $candidat;
	}

	function fight(){
		foreach ($this->_fighters as $fighter){
			echo $fighter->fight();
		}
	}
}

?>