<?php
require_once 'model/database.php';
class Localidad
{
	private $pdo;
	public $idLocalidad;
	public $municipio;
	public $localidad;
	public $ambito;

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
	public function ImportarLocalidad(Localidad $data){
		try 
		{
			//$this->Limpiar('identificacionOficial');
			$sql= $this->pdo->prepare("INSERT INTO localidades VALUES(?,?,?,?)");
			$resultado=$sql->execute(
				array(
					$data->idLocalidad,
					$data->municipio,
					$data->localidad,
					$data->ambito

					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			//$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM localidades");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Limpiar($nomTabla)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM $nomTabla");			          

			$stm->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}