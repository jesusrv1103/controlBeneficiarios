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
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM localidades WHERE idLocalidad = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM localidades WHERE idLocalidad = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar(Localidad $data)
	{
		try 
		{
			$sql = "UPDATE localidades SET 
			idLocalidad = ?, municipio = ?, localidad= ?, ambito = ? WHERE idLocalidad = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->idLocalidad,
					$data->municipio,
					$data->localidad,
					$data->ambito,
					$data->idLocalidad
					
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	//Metdod para registrar
	public function Registrar(Localidad $data)
	{
		try 
		{
			$sql = "INSERT INTO localidades
			VALUES (?,?,?,?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->idLocalidad,
					$data->municipio,
					$data->localidad,
					$data->ambito,
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function VerificaLocalidad($idLocalidad)
	{
		try
		{
			$sql= $this->pdo->prepare("SELECT * FROM localidades WHERE idLocalidad=?");
			$resultado=$sql->execute(
				array($idLocalidad)
			);
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

}