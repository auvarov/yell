<?

class FileNotExistsException extends Exception 
{
	public function __construct($e) {
		parent::__construct("File {$e} not found");
	}
}

?>