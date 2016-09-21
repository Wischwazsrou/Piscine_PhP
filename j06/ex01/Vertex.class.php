<?php 

Class Vertex{

	private $_x = 0.00;
	private $_y = 0.00;
	private $_z = 0.00;
	private $_w = 1.00;
	private $_color;
	public static $verbose = FALSE;

	static function doc(){
		if (file_exists("Vertex.doc.txt") == 0)
			return;
		return file_get_contents("Vertex.doc.txt");
	}

	function getX(){ return $this->_x;	}
	function getY(){ return $this->_y;	}
	function getZ(){ return $this->_z;	}
	function getW(){ return $this->_w;	}
	function getColor(){ return $this->_color;	}

	function setX( $v ){
		$this->_x = $v;
		return;
	}
	function setY( $v ){
		$this->_y = $v;
		return;
	}
	function setZ( $v ){
		$this->_z = $v;
		return;
	}
	function setW( $v ){
		$this->_w = $v;
		return;
	}
	function setColor( $v ){
		$this->_color = $v;
		return;
	}

	function __construct(array $tab){
		if (array_key_exists('x', $tab))
			$this->_x = $tab['x'];
		if (array_key_exists('y', $tab))
			$this->_y = $tab['y'];
		if (array_key_exists('z', $tab))
			$this->_z = $tab['z'];
		if (array_key_exists('color', $tab))
			$this->_color = $tab['color'];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (Vertex::$verbose == TRUE)
			echo $this." constructed".PHP_EOL;
		return;
	}

	function __destruct(){
		if (Vertex::$verbose == TRUE)
			echo $this." destructed".PHP_EOL;
		return;
	}

	function __toString(){
		if (Vertex::$verbose == TRUE)
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w:%.2f, ", $this->_x, $this->_y, $this->_z, $this->_w).$this->_color." )";
		else
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}
}

?>
