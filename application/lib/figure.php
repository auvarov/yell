<?
class Figure
{
	private $ftype;
	private $x_center;
	private $y_center;
	private $color;
	private $line_dim;
	
	public function __construct( $ftype, $x_center, $y_center, $color, $line_dim )
	{
		$this->ftype = $ftype;
		$this->x_center = $x_center;
		$this->y_center = $y_center;
		$this->color = $color;
		$this->line_dim = $line_dim;
	}
	
	public function setFtype( $ftype ) { $this->ftype = $ftype; }
	public function setXcenter( $x_center ) { $this->x_center = $x_center; }
	public function setYcenter( $y_center ) { $this->y_center = $y_center; }
	public function setColor( $color ) { $this->color = $color; }
	public function setLinedim( $line_dim ) { $this->line_dim = $line_dim; }
	
	public function getFtype() { return $this->ftype; }
	public function getXcenter() { return $this->x_center;  }
	public function getYcenter() { return $this->y_center; }
	public function getColor() { return $this->color; }
	public function getLinedim() { return $this->line_dim; }
}

class Circle extends Figure
{ 
    private $radius;
	
    public function __construct($x_center, $y_center, $color, $line_dim, $radius) 
    { 
        parent :: __construct( 'circle', $x_center, $y_center, $color, $line_dim ); 
        $this->radius = $radius;
    }
	
	public function setRadius( $radius ) { $this->radius = $radius; }
    public function getRadius() { return $this->radius; } 
}

class Square extends Figure
{ 
    private $length;
	
    public function __construct($x_center, $y_center, $color, $line_dim, $length) 
    { 
        parent :: __construct( 'square', $x_center, $y_center, $color, $line_dim ); 
        $this->length = $length; 
    }
	
	public function setLength( $length ) { $this->length = $length; }
    public function getLength() { return $this->length; } 
}

?>