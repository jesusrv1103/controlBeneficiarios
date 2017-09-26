<?php
class Login

{
	private $pdo;
	public $usuario;
	public $password;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function verificar(Login $data)
	{
		try 
		{
			$sql = $this->pdo->prepare("SELECT * FROM usuarios");
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

		/*$usuario = $this->db->real_escape_string($usuario);
		$password=$this->db->real_escape_string($password);
		$sql = "SELECT usuario, password FROM usuarios WHERE usuario = '{$usuario}' AND password = '{$password}'";
		return $this->db->query($sql);*/
	}
}