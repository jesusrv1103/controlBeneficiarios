<?php
class Database
{
	public static function StartUp()
	{
		try
		{
			if (!isset($_SESSION['seguridad']) || $_SESSION['tipoUsuario']==1) {
				$pdo = new PDO('mysql:host=localhost;dbname=INSEZAC;charset=utf8', 'root', '');
<<<<<<< HEAD
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
=======
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
>>>>>>> 7d0cbc3488b7ead64f861a28b941277ab33a14ed
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
