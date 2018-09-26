<?php
//Помошник, читающий файл настроек, команды и проверяющий, был ли контреллер запущен в командной строке или в браузере

class ApplicationHelper
{
	private $reg ;
	private $config = __DIR__ . "/../../data/settings.xml" ;
	private $commands = __DIR__ . "/../../data/commands.ini" ;
	private $conf ;
	public function __construct()
	{
		$this -> reg = Registry::getInstance() ;
	}
	public function init()
	{
		$this -> setupOptions() ;
		$this -> setupCommands() ;
		if(isset($_SERVER['REQUEST_METHOD']))
		{
				$request = new HttpRequest ;
		}
		else
		{
			throw new Exception('Can\t run from command line') ;
		}
		$this -> reg -> setRequest($request) ;
		
	}
	private function setupOptions()
	{
		
		if(!file_exists($this -> config))
		{
			throw new Exception('Could not find settings file.') ;
		}
		
		$options = simplexml_load_file($this -> config) ;
		$host = $options -> host ;
		$user = $options -> user ;
		$password = $options -> password ;
		$database = $options -> database ;
		$this -> conf = new Conf($host, $user, $password, $database) ;
		$this -> reg -> setConf($this -> conf) ;
	}
	private function setupCommands()
	{
		
		if(!file_exists($this -> commands))
		{
			throw new Exception('Could not find commands file.') ;
		}
		
		$comm = parse_ini_file($this -> commands) ;
		$this -> conf -> setCommands($comm) ;
	}
}