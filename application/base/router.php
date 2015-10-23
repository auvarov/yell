<?
class Router
{	
	static function start()
	{
		$controller_name = 'index';
		$action_name = 'index';
		
		$urls = explode('/', $_SERVER['REQUEST_URI']);

		// контроллер
		if( !empty($urls[1]) )
		{	
			$controller_name = Router::prepare_srt($urls[1]);
		}
		
		// action
		if( !empty($urls[2]) )
		{
			$action_name = Router::prepare_srt($urls[2]);
		}

		//print "<p>controller_name='$controller_name'</p>";
		//print "<p>action_name='$action_name'</p>";
		
		// добавляем префиксы
		$model_name = 'model_'.$controller_name;
		$controller_name = 'controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// класс модели
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		
		/*
		try {
			if( file_exists($model_path) )
			{
				include "application/models/".$model_file;
			}
			else
			{
				throw new FileNotExistsException($model_path);
			}
		} 
		catch( Exception $e ) 
		{
			echo $e->getMessage();
		}
		*/
		
		//print "<p>models='application/models/$model_file'</p>";
		
		if( file_exists($model_path) )
		{
			include "application/models/".$model_file;
		}
			
		// класс контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		
		try {
			if( file_exists($controller_path) )
			{
				include "application/controllers/".$controller_file;
				// создаем контроллер
				$controller = new $controller_name;
				$action = $action_name;
			}
			else
			{
				throw new Exception("Not found controller '{$controller_file}'");
			}
		}
		catch( Exception $e )
		{
			Router::error_page_404($e->getMessage());
		}
		
		try {
			if( method_exists($controller, $action) )
			{
				$controller->$action();
			}
			else
			{
				throw new Exception("Not found action '{$action}' in controller '{$controller_file}'");
			}
		}
		catch( Exception $e )
		{
			Router::error_page_404($e->getMessage());
		}
	
	}
	
	static function prepare_srt( $str )
	{
		// проверка на валидность строки
		// ......
		
		return $str;
	}

	static function get_url_data()
	{
		$urls = explode('/', $_SERVER['REQUEST_URI']);
		if( count($urls) > 3 )
		{
			//print_r($urls);
			//print_r(array_slice($urls, 3));
			return array_slice($urls, 3);
		}
		return array();
	}
	
	static function error_page_404($e)
	{
		//die("404 - $e");
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
?>