<?php
//класс, оперирующий базой данных.
class StudentMapper
{
	private $reg ;
	private $dbs ;
	private $std ;
	public function __construct()
	{
		$this -> reg = Registry::getInstance() ;
	}
	public function setStudent(Student $std)
	{
		$this -> std = $std ;
	}
	public function createTable() 
	{
		$sql = "CREATE TABLE IF NOT EXISTS students
		( 
		student_id INT UNSIGNED AUTO_INCREMENT, 
		first_name VARCHAR(30) NOT NULL,
		last_name VARCHAR(40) NOT NULL,
		email VARCHAR(60) NOT NULL, 
		gender VARCHAR(1) NOT NULL,
		origin VARCHAR(10) NOT NULL,
		points INT(3) UNSIGNED NOT NULL,
		`group` VARCHAR(5) NOT NULL,
		date_birth VARCHAR(10), 
		PRIMARY KEY(student_id))";
		mysqli_query($this -> dbs, $sql) ;
		$sql = "ALTER TABLE students ADD FULLTEXT(email)" ;
		mysqli_query($this -> dbs, $sql) ;
		echo mysqli_error($this -> dbs);
	}
	public function connectDatabase() 
	{
		$conf = $this -> reg -> getConf() ;
		$this -> dbs = mysqli_connect($conf -> getHost(), $conf -> getUser(), $conf -> getPassword(), $conf -> getDatabase()) or die(mysqli_connect_error()) ;
		mysqli_set_charset($this -> dbs, 'utf-8mb4') ;
		return $this -> dbs ;
	}
	public function endConnection()
	{
		mysqli_close($this -> dbs) ;
	}
	public function insertStudent()
	{
		$array = $this -> std -> getParameters() ;
		$sql = "INSERT INTO students 
			(
			first_name, 
			last_name, 
			email, 
			gender, 
			origin, 
			points, 
			`group`, 
			date_birth
			)
			VALUES
			(
			'" .$array['first_name'] ."', 
			'" .$array['last_name'] ."',  
			'" .$array['email'] ."',  
			'" .$array['gender'] ."',  
			'" .$array['origin'] ."',  
			'" .$array['points'] ."',  
			'" .$array['group'] ."',  
			'" .$array['date_birth'] ."' 
			)" ;
		mysqli_query($this -> dbs, $sql) ;
		echo mysqli_error($this -> dbs);
	}
	public function searchEmail(): bool
	{
		$array = $this -> std -> getParameters() ;
		$sql = "SELECT email FROM students
				WHERE MATCH (email)
				AGAINST('\"" .$array['email'] ."\"')" ;
		$result = mysqli_query($this -> dbs, $sql) ;
		if(mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			return false ;
		}
		return true ;
	
		echo mysqli_error($this -> dbs);
	}
	public function getTable($pages, string $search)
	{
		if(!empty($search))
		{
			$search = "WHERE CONCAT(first_name, last_name, `group`) LIKE '%$search%'" ;
			$sql = "SELECT first_name, last_name, gender, `group`, points FROM students " .$search ;
		} 
		else
		{
			switch($pages)
			{
				case 0: $pages = '' ; break ;
				case 1: $pages = "LIMIT 4" ; break; 
				default: $pages ="LIMIT 4 OFFSET " .(($pages-1)*4) ;
			}
			$sql = "SELECT first_name, last_name, gender, `group`, points FROM students " .$pages ;
		}
		
		$result = mysqli_query($this ->dbs, $sql) ;
		echo mysqli_error($this -> dbs);
		return $result ;
	}

}