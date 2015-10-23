<?
class model_index extends model
{
	public function get_data()
	{
		$data = [ 
			[
				'type' => 'circle', 
				'params' => ['x_center'=>10, 'y_center'=>20, 'color'=>'red', 'line_dim'=>2, 'radius'=>40]
			],
			[
				'type' => 'square', 
				'params' => ['x_center'=>10, 'y_center'=>20, 'color'=>'blue', 'line_dim'=>2, 'length'=>30]
			]
		];
		
		return $data;
	}
}
?>