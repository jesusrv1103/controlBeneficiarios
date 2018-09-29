<?php
class Database
{
	public static function StartUp()
	{
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=controlIndicadores;charset=utf8', 'root', '1234');
			//$pdo = new PDO('mysql:host=localhost;dbname=insezac;charset=utf8', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;				
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

