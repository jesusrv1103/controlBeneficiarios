<?php
class Database
{
	public static function StartUp()
	{
		try
		{
			
			//$pdo = new PDO('mysql:host=srv-isp3.zacatecas.gob.mx;dbname=c4insezac;charset=utf8', 'c4insezac', 'JjbLc55!');

			$pdo = new PDO('mysql:host=localhost;dbname=insezac;charset=utf8', 'root', '');

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;				

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
