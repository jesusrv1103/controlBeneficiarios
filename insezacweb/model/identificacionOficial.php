<?php
class IdentificacionOficial
{
	
	private $pdo;
	public $idIdentificacion;
	public $identificacion;

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

	//Metdodo para listar
	public function Listar()
	{
		try
		{
			
			$stm = $this->pdo->prepare("SELECT * from identificacionOficial");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	
}