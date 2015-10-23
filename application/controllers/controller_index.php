<?
class controller_index extends controller
{
	function __construct()
	{
		session_start();
		$this->model = new model_index();
		$this->view = new view();
	}
	
	function action_index()
	{	
		$data = $this->model->get_data(); // входящие данные
		
		//var_dump($data);
		
		$var = array();
		$var['pagename'] = "Рисование фигур";

		if( count($data) > 0 )
		{
			foreach( $data as $row )
			{
				if( $row['type'] == "circle" ) 
					$var['figures'][] = new Circle( $row['params']['x_center'], $row['params']['y_center'], $row['params']['color'], $row['params']['line_dim'], $row['params']['radius'] );
				
				if( $row['type'] == "square" ) 
					$var['figures'][] = new Square( $row['params']['x_center'], $row['params']['y_center'], $row['params']['color'], $row['params']['line_dim'], $row['params']['length'] );
			}
		}
		
		$this->view->generate('index_view.php', 'template_view.php', $var);
	}
}
?>