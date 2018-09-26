<?php
//фронт-контроллер
class Controller
{
	private $reg ;
	
	private function __construct()
	{
		$this -> reg = Registry::getInstance() ;
	}
	public static function run()
	{
		$instance = new Controller() ;
		$instance -> init() ;
		$instance -> handleRequest() ;
	}
	private function init()
	{
		$this -> reg -> getApplicationHelper() -> init() ;
	}
	private function handleRequest()
	{
		$request = $this -> reg -> getRequest() ;
		$resolver = new CommandResolver() ;
		$cmd = $resolver -> getCommand($request) ;
		$cmd -> execute($request) ;		
	}
}
