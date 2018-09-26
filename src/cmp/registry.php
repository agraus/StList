<?php
//Регистр, хранящий и возвращающий объекты
class Registry
{
	private static $instance ;
	private $conf ;
	private $request ;
	private $applicationhelper ;
	private function __construct()
	{
	}
	public static function getInstance()
	{
		if(is_null(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance ;
	}
	public function setRequest(Request $request)
	{
		$this -> request = $request ;
	}
	public function getRequest(): Request
	{
		if(is_null($this -> request))
		{
			throw new Exception('Request isn\'t set.') ;
		}
		return $this -> request ;
	}
	public function setConf(Conf $conf)
	{
		$this -> conf = $conf ;
	}
	public function getConf():Conf
	{
		if(is_null($this -> conf))
		{
			throw new Exception('Configuration isn\'t set.') ;
		}
		return $this -> conf ;
	}
	public function getApplicationHelper():ApplicationHelper
	{
		if(is_null($this -> applicationhelper))
		{
			$this -> applicationhelper = new ApplicationHelper() ;
		}
		return $this -> applicationhelper ;
	}

}