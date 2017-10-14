<?php
//session_start();
require_once 'model/login.php';
class Database
{
	public static function StartUp()
	{	
		//session_start();
		try
		{

			if (!isset($_SESSION['seguridad']) || $_SESSION['user_type']==1) {
				//$pdo = new PDO('mysql:host=localhost;dbname=INSEZAC;charset=utf8', 'root', '123-horses');//USO JRV
				$pdo = new PDO('mysql:host=localhost;dbname=insezac;charset=utf8', 'root', '');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
				return $pdo;
			}else{
				$usuario=$_SESSION['user_session'];
				$password=$_SESSION['user_password'];
				$pdo = new PDO('mysql:host=localhost;dbname=insezac;charset=utf8',$usuario,$password);
				//$pdo = new PDO('mysql:host=localhost;dbname=INSEZAC;charset=utf8',$usuario,$password);//USO JRV
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
				return $pdo;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

}