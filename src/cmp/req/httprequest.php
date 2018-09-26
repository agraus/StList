<?php
class HttpRequest extends Request
{
	public function init()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$this -> property = $_POST ;
		}
		else
		{
			$this -> property = $_GET ;
		}
		if(isset($_SERVER['PATH_INFO']))
		{
			$this -> path = $_SERVER['PATH_INFO'] ;
		}
		if(isset($_SERVER['REQUEST_URI']))
		{
			$this -> uri = $_SERVER['REQUEST_URI'] ;
		}
	}
}