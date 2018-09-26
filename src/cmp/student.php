<?php
//класс с информацией о студенте
class Student
{
	private $first_name ;
	private $last_name ;
	private $email ;
	private $gender ;
	private $origin ;
	private $points ;
	private $group ;
	private $date_birth ;
	
	public function __construct(array $array)
	{
		$this -> firts_name = $array['first_name'] ;
		$this -> last_name = $array['last_name'] ;
		$this -> email = $array['email'] ;
		$this -> gender = $array['gender'] ;
		$this -> origin = $array['origin'] ;
		$this -> points = $array['points'] ;
		$this -> group = $array['group'] ;
		$this -> date_birth = $array['date_birth'] ;
	}
	public function getParameters(): array
	{
		$array = [] ;
		$array['first_name'] = $this -> firts_name ;
		$array['last_name'] = $this -> last_name ;
		$array['email'] = $this -> email ;
		$array['gender'] = $this -> gender ;
		$array['origin'] = $this -> origin ;
		$array['points'] = $this -> points ;
		$array['group'] = $this -> group ;	
		$array['date_birth'] = $this -> date_birth ;	
		return $array ;
	}
}