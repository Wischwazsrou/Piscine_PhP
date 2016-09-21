<?php 

Class Vector{

	private $_x = 0.00;
	private $_y = 0.00;
	private $_z = 0.00;
	private $_w = 0.00;
	private $_dest;
	private $_orig;
	public static $verbose = FALSE;

	static function doc(){
		if (file_exists("Vector.doc.txt") == 0)
			return;
		return file_get_contents("Vector.doc.txt");
	}

	function getX(){ return $this->_x;	}
	function getY(){ return $this->_y;	}
	function getZ(){ return $this->_z;	}
	function getW(){ return $this->_w;	}

	function __construct(array $tab){
		$this->_dest = $tab['dest'];
		if (array_key_exists('orig', $tab))
			$this->_orig = $tab['orig'];
		else
			$this->_orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		$this->x = $this->_dest->getX() - $this->_orig->getX();
		$this->y = $this->_dest->getY() - $this->_orig->getY();
		$this->z = $this->_dest->getZ() - $this->_orig->getZ();
		$this->w = $this->_dest->getW() - $this->_orig->getW();
		if (Vector::$verbose == TRUE)
			echo $this." constructed".PHP_EOL;
		return;
	}

	function __destruct(){
		if (Vector::$verbose == TRUE)
			echo $this." destructed".PHP_EOL;
		return;
	}

	function __toString(){
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->x, $this->y, $this->z, $this->w); 
	}

	function magnitude(){
		return abs(sqrt((pow($this->x, 2) + pow($this->y, 2) + pow($this->z, 2))));
	}

	function normalize(){
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f)",
				$this->x / $this->magnitude(), $this->y / $this->magnitude(),
				$this->z / $this->magnitude(), $this->w);
	}

	function add($rhs){
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f)", $this->x + $rhs->x,
				$rhs->y + $rhs->y, $this->z + $rhs->z, $this->w + $rhs->w);
	}

	function sub($rhs){
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f)", $this->x - $rhs->x,
				$this->y - $rhs->y, $this->z - $rhs->z, $this->w - $rhs->w);
	}

	function opposite(){
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", -$this->x, -$this->y, -$this->z, -$this->w);
	}

	function scalarProduct($k){
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->x * $k, $this->y * $k,
				$this->z * $k, $this->w * $k);
	}

	function dotProduct($rhs){
		return sprintf("%.4f", $this->x * $rhs->x + $this->y * $rhs->y + 
				$this->z * $rhs->z + $this->w * $rhs->w);
	}

	function crossProduct($rhs){
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->y * $rhs->z - $this->z * $rhs->y,
				$this->z * $rhs->x - $this->x * $rhs->z, $this->x * $rhs->y - $this->y * $rhs->x,
				$this->w * $rhs->w);
	}

	function cos($rhs){
		return ((($this->x * $rhs->x + $this->y * $rhs->y + $this->z * $rhs->z)) / sqrt((pow($this->y, 2) + pow($this->x, 2) + pow($this->z, 2)) * ((pow($rhs->y, 2) + pow($rhs->x, 2) + pow($rhs->z, 2)))));
	}

}

Vertex::$verbose = False;

print( Vector::doc() );
Vector::$verbose = True;


$vtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
$vtxX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0 ) );
$vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0 ) );
$vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0 ) );

$vtcXunit = new Vector( array( 'orig' => $vtxO, 'dest' => $vtxX ) );
$vtcYunit = new Vector( array( 'orig' => $vtxO, 'dest' => $vtxY ) );
$vtcZunit = new Vector( array( 'orig' => $vtxO, 'dest' => $vtxZ ) );

print( $vtcXunit . PHP_EOL );
print( $vtcYunit . PHP_EOL );
print( $vtcZunit . PHP_EOL );

$dest1 = new Vertex( array( 'x' => -12.34, 'y' => 23.45, 'z' => -34.56 ) );
Vertex::$verbose = True;
$vtc1  = new Vector( array( 'dest' => $dest1 ) );
Vertex::$verbose = False;

$orig2 = new Vertex( array( 'x' => 23.87, 'y' => -37.95, 'z' => 78.34 ) );
$dest2 = new Vertex( array( 'x' => -12.34, 'y' => 23.45, 'z' => -34.56 ) );
$vtc2  = new Vector( array( 'orig' => $orig2, 'dest' => $dest2 ) );

print( 'Magnitude is ' . $vtc2->magnitude() . PHP_EOL );

$nVtc2 = $vtc2->normalize();
print( 'Normalized $vtc2 is ' . $nVtc2 . PHP_EOL );
//print( 'Normalized $vtc2 magnitude is ' . $nVtc2->magnitude() . PHP_EOL );

print( '$vtc1 + $vtc2 is ' . $vtc1->add( $vtc2 ) . PHP_EOL );
print( '$vtc1 - $vtc2 is ' . $vtc1->sub( $vtc2 ) . PHP_EOL );
print( 'opposite of $vtc1 is ' . $vtc1->opposite() . PHP_EOL );
print( 'scalar product of $vtc1 and 42 is ' . $vtc1->scalarProduct( 42 ) . PHP_EOL );
print( 'dot product of $vtc1 and $vtc2 is ' . $vtc1->dotProduct( $vtc2 ) . PHP_EOL );
print( 'cross product of $vtc1 and $vtc2 is ' . $vtc1->crossProduct( $vtc2 ) . PHP_EOL );
print( 'cross product of $vtcXunit and $vtcYunit is ' . $vtcXunit->crossProduct( $vtcYunit ) . 'aka $vtcZunit' . PHP_EOL );
print( 'cosinus of angle between $vtc1 and $vtc2 is ' . $vtc1->cos( $vtc2 ) . PHP_EOL );
print( 'cosinus of angle between $vtcXunit and $vtcYunit is ' . $vtcXunit->cos( $vtcYunit ) . PHP_EOL );

?>
