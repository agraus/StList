<?php
//класс, хранящий настройки для подключения БД и комманды
class Conf
{
	private $host ;
	private $user ;
	private $password ;
	private $database ;
	private $commands = [];
	public function __construct(string $host, string $user, string $password, string $database)
	{
		$this -> host = $host ;
		$this -> user = $user ;
		$this -> password = $password ;
		$this -> database = $database ;
	}
	public function getHost():string 
	{
		return $this -> host ;
	}
	public function getUser():string 
	{
		return $this -> user ;
	}
	public function getPassword():string 
	{
		return $this -> password ;
	}
	public function getDatabase():string 
	{
		return $this -> database ;
	}
	public function setCommands(array $commands) 
	{
		$this -> commands = $commands ;
	}
	public function getCommands():array
	{
		return $this -> commands ;
	}
}