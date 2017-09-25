<?php
class Login
{
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
	public function signIn($usuario)
  {
    $usuario = $this->db->real_escape_string($usuario);
    $sql = "SELECT usuario, password FROM usuarios WHERE usuario = '{$usuario}'";
    return $this->db->query($sql);
  }
}