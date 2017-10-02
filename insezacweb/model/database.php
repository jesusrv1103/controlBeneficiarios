<?php

//session_start();

class Database
{
	public static function StartUp()
	{	
		//session_start();
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=INSEZAC;charset=utf8', 'root', '123-horses');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

}