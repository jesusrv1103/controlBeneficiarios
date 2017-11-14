<?php
require_once 'model/database.php';
class Apoyos
{
	private $pdo; //int 
	public $idApoyo;
	public $curp;
	public $idOrigen; //int
	public $idPrograma; //int
	public $idSubprograma;  //int
	public $idTipoApoyo;  //int
	public $idCaracteristica; //int
	public $importeApoyo; //int
	public $numeroApoyo;  //int
	public $fechaUltimoApoyo; //Date
	public $idPeriodicidad;  //int
	public $apoyoEconomico;
	public $idProgramaSocial;

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


			$stm = $this->pdo->prepare("SELECT * from apoyos");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM apoyos WHERE idApoyo = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
		// select * from programa WHERE programa like '%TRA%';

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM apoyos WHERE idApoyo = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
		//Metodo para actualizar
	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE apoyos SET null,
			curp = ?, idOrigen = ?, idPrograma = ?, idSubprograma = ?, idTipoApoyo = ?, idCaracteristica = ?, importeApoyo = ?, numerosApoyo = ?, fechaUltimoApoyo = ?, idPeriodicidad = ?, apoyoEconomico = ?
			WHERE idApoyo = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->curp,
					$data->idOrigen, 
					$data->idPrograma, 
					$data->idSubprograma, 
					$data->idTipoApoyo, 
					$data->idCaracteristica, 
					$data->importeApoyo, 
					$data->numeroApoyo, 
					$data->fechaUltimoApoyo, 
					$data->idPeriodicidad, 
					$data->apoyoEconomico
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
		//Metdod para registrar
	public function Registrar(Apoyo $data)
	{
		try 
		{
			$sql = "INSERT INTO apoyos
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->curp,
					$data->idOrigen, 
					$data->idPrograma, 
					$data->idSubprograma, 
					$data->idTipoApoyo, 
					$data->idCaracteristica, 
					$data->importeApoyo, 
					$data->numeroApoyo, 
					$data->fechaUltimoApoyo, 
					$data->idPeriodicidad, 
					$data->apoyoEconomico
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Limpiar($nomTabla)
	{
		try 
		{
			
			$stm = $this->pdo->prepare("DELETE FROM $nomTabla");			          
			$stm->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarApoyo(Apoyos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO apoyos VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->curp,
					$data->idOrigen, 
					$data->idPrograma, 
					$data->idSubprograma, 
					$data->idTipoApoyo, 
					$data->idCaracteristica, 
					$data->importeApoyo, 
					$data->numeroApoyo, 
					$data->fechaUltimoApoyo, 
					$data->idPeriodicidad, 
					$data->apoyoEconomico,
					$data->idProgramaSocial
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
