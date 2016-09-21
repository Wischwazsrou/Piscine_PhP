<?php 

Class Color{

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	static function doc(){
		if (file_exists("Color.doc.txt") == 0)
			return;
		return file_get_contents("Color.doc.txt");
	}

	function __construct(array $tab){
		if (array_key_exists('rgb', $tab))
		{
			$this->red = $tab['rgb'] % 256;
			$this->green = $tab['rgb'] >> 8 % 256;
			$this->blue = $tab['rgb'] >> 16 % 256;
		}
		else
		{
			if (array_key_exists('red', $tab))
				$this->red = $tab['red'] % 256;
			if (array_key_exists('green', $tab))
				$this->green = $tab['green'] % 256;
			if (array_key_exists('blue', $tab))
				$this->blue = $tab['blue'] % 256;
		}
		if (Color::$verbose == TRUE)
			echo $this." constructed.".PHP_EOL;
		return;
	}

	function __destruct(){
		if (Color::$verbose == TRUE)
			echo $this." destructed.".PHP_EOL;
		return;
	}

	function __toString(){
		return sprintf ("Color( red:%4s, green:%4s, blue:%4s )", $this->red, $this->green, $this->blue);
	}

	function add(Color $rhs){
		return new Color( array('red' => $this->red + $rhs->red,
			'green' => $this->green + $rhs->green, 
			'blue' => $this->blue + $rhs->blue));
	}

	function sub(Color $rhs){
		return new Color( array('red' => $this->red - $rhs->red,
			'green' => $this->green - $rhs->green, 
			'blue' => $this->blue - $rhs->blue));
	}

	function mult($f){
		return new Color( array('red' => $this->red * $f,
			'green' => $this->green * $f, 
			'blue' => $this->blue * $f));
	}
}

?>