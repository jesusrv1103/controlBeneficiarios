<?php
class Database
{
	public static function StartUp()
	{
		try
		{
			if (!isset($_SESSION['seguridad']) || $_SESSION['tipoUsuario']==1) {
				$pdo = new PDO('mysql:host=localhost;dbname=INSEZAC;charset=utf8', 'root', '123-horses');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $pdo;
			}else{
				$usuario=$_SESSION['usuario'];
				$password=$_SESSION['password'];
				$pdo = new PDO('mysql:host=localhost;dbname=INSEZAC;charset=utf8',$usuario,$password);
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
