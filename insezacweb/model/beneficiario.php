<?php
class Beneficiario
{
	private $pdo;
	public $nombre;
	public $precio;
	public $existencia;
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
	public function Importar(Beneficiario $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO productos VALUES(?,?,?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->nombre,
					$data->precio,
					$data->existencia
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}