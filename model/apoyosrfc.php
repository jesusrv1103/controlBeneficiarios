<?php
class Apoyosrfc
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
	public $idBeneficiarioRFC;
	public $clavePresupuestal;

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
			$stm = $this->pdo->prepare("SELECT * FROM apoyosrfc,beneficiariorfc,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyosrfc.idBeneficiario=beneficiariorfc.idBeneficiarioRFC AND apoyosrfc.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyosrfc.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyosrfc.idPeriodicidad=periodicidad.idPeriodicidad AND apoyosrfc.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyosrfc.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo");
			
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
			->prepare("SELECT * FROM apoyos, beneficiariorfc, origen, tipoapoyo, caracteristicasapoyo, periodicidad, subprograma WHERE apoyos.idOrigen=origen.idOrigen AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idSubprograma=subprograma.idSubprograma AND apoyos.idBeneficiario=beneficiariorfc.idBeneficiarioRFC AND idApoyo = ?");
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
	public function Actualizar(Apoyosrfc $data)
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
	public function Registrar(Apoyosrfc $data)
	{
		try 
		{
			$sql = "INSERT INTO apoyos
			VALUES (?,?,?,?,?,
			?,?,?,?,?,
			?,?,?)";

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
					'rfc'
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
	public function ImportarApoyoRFC(Apoyosrfc $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO apoyosrfc VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
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
					$data->clavePresupuestal
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
			$sql= $this->pdo->prepare("SELECT * FROM apoyos,beneficiariorfc,origen,registroapoyo,subprograma,programa,periodicidad,tipoApoyo,caracteristicasapoyo WHERE apoyos.idBeneficiario=beneficiariorfc.idBeneficiario AND apoyos.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoApoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyos.idApoyo=?;");
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

	public function RegistraActualizacion(Apoyosrfc $data){
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
	public function RegistraDatosRegistro(Apoyosrfc $data){

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
	public function ObtenerIdBen($rfc)
	{
		try
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM beneficiariorfc WHERE RFC = ?");


			$stm->execute(array($rfc));
			return $stm->fetch(PDO::FETCH_OBJ);


		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

}
