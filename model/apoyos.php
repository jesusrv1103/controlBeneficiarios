<?php
require_once 'model/database.php';
class Apoyos
{
	private $pdo; //int 
	public $idApoyo;
	public $curp;
	public $idOrigen; //int
	public $programa;
	public $idSubprograma;  //int
	public $idCaracteristica; //int
	public $importeApoyo; //int
	public $numeroApoyo;  //int
	public $fechaApoyo; //Date
	public $idPeriodicidad;  //int
	public $apoyoEconomico;
	public $idProgramaSocial;
	public $usuario;
	public $direccion;
	public $fechaAlta;
	public $estado;
	public $idRegistroApoyo;
	public $idBeneficiario;
	public $clavePresupuestal;
	public $tipo;


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
			$stm = $this->pdo->prepare("SELECT * FROM apoyos,beneficiarios,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyos.idBeneficiario=beneficiarios.idBeneficiario AND apoyos.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyos.tipo='curp'");
			
			$stm->execute(array());

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		//Metdodo para listar
	public function ListarSelects($nomTabla)
	{
		try
		{
			//$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM $nomTabla");
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
			->prepare("SELECT * FROM apoyos, beneficiarios, origen, tipoapoyo, caracteristicasapoyo, periodicidad, subprograma WHERE apoyos.idOrigen=origen.idOrigen AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idSubprograma=subprograma.idSubprograma AND apoyos.idBeneficiario=beneficiarios.idBeneficiario AND idApoyo = ?");
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
	public function Actualizar(Apoyos $data)
	{
		try 
		{
			$sql = "UPDATE apoyos SET idBeneficiario = ?, idOrigen = ?, idSubprograma = ?, idCaracteristica = ?, importeApoyo = ?, fechaApoyo = ?, idPeriodicidad = ? WHERE idApoyo = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->idBeneficiario,
					$data->idOrigen, 
					$data->idSubprograma, 
					$data->idCaracteristica, 
					$data->importeApoyo, 
					$data->fechaApoyo, 
					$data->idPeriodicidad,
					$data->idApoyo
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
		//Metdod para registrar
	public function Registrar(Apoyos $data)
	{
		try 
		{
			$sql = "INSERT INTO apoyos
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->idBeneficiario,
					$data->idOrigen, 
					$data->idSubprograma,  
					$data->idCaracteristica, 
					$data->importeApoyo, 
					$data->numeroApoyo, 
					$data->fechaApoyo, 
					$data->idPeriodicidad, 
					$data->idProgramaSocial,
					$data->idRegistroApoyo,
					null,
					'curp'
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
			$sql= $this->pdo->prepare("INSERT INTO apoyos VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->idBeneficiario,
					$data->idOrigen,  
					$data->idSubprograma, 
					$data->idCaracteristica, 
					$data->importeApoyo, 
					$data->numerosApoyo, 
					$data->fechaApoyo, 
					$data->idPeriodicidad,
					$data->idProgramaSocial,
					$data->idRegistroApoyo,
					$data->clavePresupuestal,
					'curp'
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ObtenerInfoApoyo($idApoyo)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT * FROM apoyos,beneficiarios,origen,registroapoyo,subprograma,programa,periodicidad,tipoApoyo,caracteristicasApoyo WHERE apoyos.idBeneficiario=beneficiarios.idBeneficiario AND apoyos.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasApoyo.idTipoApoyo=tipoApoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasApoyo.idCaracteristicasApoyo AND apoyos.idApoyo=?;");
			$resultado=$sql->execute(array($idApoyo));
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ObtenerIdRegistro($idApoyo)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT registroapoyo.idRegistroApoyo from registroApoyo, apoyos where registroapoyo.idRegistroApoyo=apoyos.idRegistroApoyo and idApoyo=$idApoyo");
			$resultado=$sql->execute();
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function RegistraActualizacion(Apoyos $data){
		try 
		{
			$sql = "INSERT INTO actualizacionApoyo VALUES (?,?,?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->usuario,
					$data->direccion,
					$data->fechaAlta,
					$data->idRegistroApoyo
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ListarActualizacion($idRegistro)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM actualizacionApoyo WHERE idRegistroApoyo=?");
			$stm->execute(array($idRegistro));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarSubprogramas($idPrograma)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM subprograma WHERE idPrograma=?");
			$stm->execute(array($idPrograma));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function RegistraDatosRegistro(Apoyos $data){

		try 
		{

			$sql = "INSERT INTO registroapoyo VALUES (?,?,?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->usuario,
					$data->direccion,
					$data->fechaAlta,
					$data->estado
				)
			);
			return $this->pdo->lastInsertId();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ObtenerIdBen($curp)
	{
		try
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM beneficiarios WHERE curp = ?");


			$stm->execute(array($curp));
			return $stm->fetch(PDO::FETCH_OBJ);


		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

}
