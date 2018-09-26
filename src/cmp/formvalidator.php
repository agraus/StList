<?php 
//обработка формы валидации
abstract class FormValidator
{
	private static function getFormData()
	{
		$reg = Registry::getInstance() ;
		$request = $reg -> getRequest() ;
		$method = $request -> getProperty() ;
		if(!empty($method))
		{
			$array = array(
			'first_name' => $method['first_name'],
			'last_name' => $method['last_name'],
			'email' => $method['email'],
			'gender' => $method['gender'],
			'origin' => $method['origin'],
			'points' => $method['points'],
			'group' => $method['group'],
			'date_birth' => $method['date_birth']
			) ;
			return $array ;
		}
		return null ;
	}
	public static function run()
	{
		if(!is_null(self::getFormData()))
		{
			$std = new Student(self::getFormData()) ;
			$map = new StudentMapper() ;
			$map -> setStudent($std) ;
			$map -> connectDatabase() ;
			$map -> createTable() ;
			if(!($map -> searchEmail()))
			{
				$map -> endConnection() ;
				return 'Email already registerd' ;	
			}
			$map -> insertStudent() ;
			$map -> endConnection() ;
			return null ;
		}
		else 
		{
			return 'empty' ;
		}
	}
}