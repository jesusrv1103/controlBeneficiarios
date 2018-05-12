<?php
class Login
{
	private $pdo;
	public $usuario;
	public $password;
	public $tipousuario;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function verificar(Login $data)
	{
		$sql= $this->pdo->prepare("SELECT * FROM usuarios WHERE BINARY usuario=?");
		$resultado=$sql->execute(
			array(
				$data->usuario,
				)
			);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function logIn()
	{
		if(isset($_SESSION['usuario']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}


	public function logOut()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
