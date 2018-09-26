<?php
//классб выполняющий функцииб связанные с составлением таблицы для передачи в шаблон
abstract class TableBuilder
{
	private static $map;
	public static $search = '';
	private static function init()
	{
		self::$map = new StudentMapper() ;
		self::$map -> connectDatabase() ;
	}
	public static function getPages():array
	{
		self::init() ;
		$result = self::$map -> getTable(0,self::$search) ;
		$pages = ceil(mysqli_num_rows($result)/4) ;
		self::$map -> endConnection() ;
		$pagearr = [] ;
		$value = 0 ;
		for($i = $pages; $i > 0; $i--)
		{
			$value++ ;
			array_push($pagearr, $value) ;
		}
			
		return $pagearr ;
	}
	public static function run(): array
	{
		$reg = Registry::getInstance();
		$req = $reg -> getRequest();
		$path = $req -> getURI() ;
		$pages = 1 ;
		if(strstr($path, "?page="))
		{
			$arr = explode("page=", $path) ;
			$pages = array_pop($arr) + 0;
		}
		
		if(strstr($path, "?search="))
		{
			$arr = explode("search=", $path) ;
			self::$search = array_pop($arr) ;
		}
		self::init() ;
		$result = self::$map -> getTable($pages, self::$search) ;
		self::$map -> endConnection() ;
		$table =[] ;
		if($result)
		{
			for( $i = mysqli_num_rows($result) ; $i > 0; $i--)
			{
				$table[][] = mysqli_fetch_array($result, MYSQLI_ASSOC) ;
			}
		}
		return $table ;
	}
}