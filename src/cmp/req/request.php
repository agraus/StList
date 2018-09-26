<?php
abstract class Request
{
	protected $property ;
	protected $feedback = [];
	protected $path = "/" ;
	protected $uri;
	public function __construct()
	{
		$this -> init() ;
	}
	abstract public function init() ;
	public function setPath(string $path)
	{
		$this -> path = $path ;
	}
	public function getPath():string
	{
		return $this -> path ;
	}
	public function setURI(string $path)
	{
		$this -> uri = $path ;
	}
	public function getURI():string
	{
		return $this -> uri ;
	}
	public function setProperty($val)
	{
		$this -> property = $val ;
	}
	public function getProperty()
	{
		if(isset($this -> property))
		{
			return $this -> property ;
		}
		return null ;
	}
	public function addFeedback(string $msg)
	{
		array_push($this -> feedback, $msg) ;
	}
	public function getFeedbackString() 
	{
		$separator = "\n" ;
		return implode($separator, $this -> feedback) ;
	}
	public function clearFeedback()
	{
		$this -> feedback = [] ;
	}
}