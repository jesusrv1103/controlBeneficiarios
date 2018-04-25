<?php
require_once 'model/database.php';
class Beneficiariorfc
{
	public $usuario;
	public $fechaAlta;
	public $hora;
	public $estado;
	public $direccion;
	public $pdo;
	public $idBeneficiarioRFC;
	public $RFC;
	public $curp;
	public $primerApellido;
	public $segundoApellido;
	public $nombres;
	public $fechaAltaSat;
	public $sexo;
	public $idAsentamientos;
	public $idLocalidad;
	public $idTipoVialidad;
	public $nombreVialidad;
	public $numeroExterior;
	public $numeroInterior;
	public $entreVialidades;
	public $descripcionUbicacion;
	public $actividad;
	public $cobertura;
	public $idRegistro;



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



	public function Listar($id)
	{
		echo $id;

		try
		{
			$stm = $this->pdo->prepare("SELECT
				b.idBeneficiarioRFC, 
				b.RFC, 
				b.curp,
				b.primerApellido, 
				b.segundoApellido,
				b.nombres, 
				b.fechaAltaSat,
				b.sexo,
				b.numeroInterior,
				b.numeroExterior,
				a.nombreAsentamiento,
				b.idAsentamientos,
				l.localidad,
				b.idLocalidad,
				tV.tipoVialidad,
				b.nombreVialidad,
				b.idTipoVialidad,
				b.entreVialidades,
				b.descripcionUbicacion,
				b.actividad,
				b.cobertura
				FROM 
				tipovialidad tV, 
				asentamientos a, 
				localidades l, 
				beneficiariorfc  b
				where   
				b.idTipoVialidad = tV.idTipoVialidad AND 	
				b.idAsentamientos = a.idAsentamientos AND 
				b.idLocalidad = l.idLocalidad AND
				b.idBeneficiarioRFC = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarDatosPersonales()
	{
		try
		{
			$stm = $this->pdo->prepare("
				SELECT
				b.idBeneficiarioRFC, 
				b.RFC,
				b.curp, 
				b.primerApellido, 
				b.segundoApellido,
				b.nombres, 
				b.actividad,
				b.cobertura
				FROM  
				beneficiariorfc");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Registrar(Beneficiariorfc $data)
	{
		try 
		{

			$sql = "INSERT INTO beneficiariorfc
			(RFC,curp,primerApellido,segundoApellido,nombres,
			fechaAltaSat,sexo,idAsentamientos,idLocalidad,idTipoVialidad,
			nombreVialidad,numeroExterior,numeroInterior,entreVialidades,descripcionUbicacion,
	        actividad,cobertura,idRegistro) values 
		   (?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->RFC,
					$data->curp,
					$data->primerApellido,
					$data->segundoApellido,
					$data->nombres,
					$data->fechaAltaSat,
					$data->sexo,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->idTipoVialidad,
					$data->nombreVialidad,
					$data->numeroExterior,
					$data->numeroInterior,
					$data->entreVialidades,
					$data->descripcionUbicacion,
					$data->actividad,
					$data->cobertura,
					$data->idRegistro
					)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	

	public function Obtener($idBeneficiario)
	{
		try
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM beneficiariorfc WHERE idBeneficiarioRFC = ?");


			$stm->execute(array($idBeneficiario));
			return $stm->fetch(PDO::FETCH_OBJ);

			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($data)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("UPDATE registro r INNER JOIN beneficiariorfc b
				ON r.idRegistro = b.idRegistro
				SET estado = ?
				WHERE r.idRegistro = ?");			          

			$stm->execute(array(
				$data->estado,
				$data->idRegistro
			));
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
			$sql = "UPDATE beneficiariorfc SET 
			RFC =?,
			curp = ?,
			primerApellido = ?,
			segundoApellido = ?,
			nombres = ?,
			fechaAltaSat =?,
			sexo =?,
			idAsentamientos =?,
			idLocalidad = ?,
			idTipoVialidad =?,
			nombreVialidad =?,
			numeroExterior = ?,
			numeroInterior = ?,
			entreVialidades = ?,
			descripcionUbicacion = ?,
			actividad = ?,
			cobertura = ?,
			idRegistro = ?
			WHERE idBeneficiarioRFC = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->RFC,
					$data->curp,
					$data->primerApellido,
					$data->segundoApellido,
					$data->nombres,
					$data->fechaAltaSat,
					$data->sexo,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->idTipoVialidad,
					$data->nombreVialidad,
					$data->numeroExterior,
					$data->numeroInterior,
					$data->entreVialidades,
					$data->descripcionUbicacion,
					$data->actividad,
					$data->cobertura,
					$data->idRegistro,
					$data->idBeneficiarioRFC

				)
			);
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

public function ActualizarExc($data)
	{
		try 
		{
			$sql = "UPDATE beneficiariorfc SET 
			RFC =?,
			curp = ?,
			primerApellido = ?,
			segundoApellido = ?,
			nombres = ?,
			fechaAltaSat =?,
			sexo =?,
			idAsentamientos =?,
			idLocalidad = ?,
			idTipoVialidad =?,
			nombreVialidad =?,
			numeroExterior = ?,
			numeroInterior = ?,
			entreVialidades = ?,
			descripcionUbicacion = ?,
			actividad = ?,
			cobertura = ?,
			idRegistro = ?
			WHERE RFC = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->RFC,
					$data->curp,
					$data->primerApellido,
					$data->segundoApellido,
					$data->nombres,
					$data->fechaAltaSat,
					$data->sexo,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->idTipoVialidad,
					$data->nombreVialidad,
					$data->numeroExterior,
					$data->numeroInterior,
					$data->entreVialidades,
					$data->descripcionUbicacion,
					$data->actividad,
					$data->cobertura,
					$data->idRegistro,
					$data->idBeneficiarioRFC

				)
			);
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarBeneficiarioRFC(Beneficiariorfc $data){
		try 
		{
			$sql =$this->pdo->prepare("INSERT INTO beneficiariorfc
				(RFC,curp,primerApellido,segundoApellido,nombres,fechaAltaSat,sexo,idAsentamientos,idLocalidad,idTipoVialidad,
				nombreVialidad,numeroExterior,numeroInterior,entreVialidades,descripcionUbicacion,actividad,cobertura,idRegistro) values 
				(?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?)");
			$resultado=$sql->execute(
				array(
					$data->RFC,
					$data->curp,
					$data->primerApellido,
					$data->segundoApellido,
					$data->nombres,
					$data->fechaAltaSat,
					$data->sexo,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->idTipoVialidad,
					$data->nombreVialidad,
					$data->numeroExterior,
					$data->numeroInterior,
					$data->entreVialidades,
					$data->descripcionUbicacion,
					$data->actividad,
					$data->cobertura,
					$data->idRegistro
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Listar1()
	{
		try
		{
			//$result = array();
			$stm = $this->pdo->prepare("SELECT 				
				*
				FROM beneficiariorfc b, registro r, localidades l
				WHERE r.idRegistro= b.idRegistro  AND r.estado='Activo'
				AND b.idLocalidad=l.idLocalidad");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Listar2()
	{
		try
		{
			//$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM beneficiarios, registro, municipio WHERE registro.idRegistro=beneficiarios.idRegistro and registro.estado='Activo'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

//Funciones para registrar los detalles de cada registro de beneficiarios.

	public function RegistraDatosRegistro(Beneficiariorfc $data){

		try 
		{

			$sql = "INSERT INTO registro VALUES (?,?,?,?,?)";
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

	public function ObtenerIdRegistro($idBeneficiarioRFC)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT registro.idRegistro from registro, beneficiariorfc where registro.idRegistro=beneficiarioRFC.idRegistro and idBeneficiarioRFC=$idBeneficiarioRFC");
			$resultado=$sql->execute();
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ObtenerIdMunicipio($claveMunicipio)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT idMunicipio from municipio where claveMunicipio=$claveMunicipio");
			$resultado=$sql->execute();
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function RegistraActualizacion(Beneficiariorfc $data){
		try 
		{
			$sql = "INSERT INTO actualizacion VALUES (?,?,?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->usuario,
					$data->direccion,
					$data->fechaAlta,
					$data->idRegistro
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ObtenerInfoRegistro($idBeneficiarioRFC)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT * FROM registro, beneficiariorfc WHERE beneficiarioRFC.idRegistro=registro.idRegistro AND beneficiarioRFC.idBeneficiarioRFC=?;");
			$resultado=$sql->execute(array($idBeneficiarioRFC));
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ListarActualizacion($idRegistro)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM actualizacion WHERE idRegistro=?");
			$stm->execute(array($idRegistro));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerInfoActualizacion2()
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT * FROM actualizacion;");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}




	public function VerificaBeneficiarioRFC($RFC)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT * FROM beneficiariorfc WHERE RFC=?");
			$resultado=$sql->execute(
				array($RFC)
			);
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ObtenerInfoApoyo($idBeneficiario)
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM apoyos,beneficiariorfc,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyos.idBeneficiario=beneficiariorfc.idBeneficiarioRFC AND apoyos.idRegistroApoyo=registroApoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND beneficiariorfc.idBeneficiariorfc=1 ORDER BY apoyos.idApoyo;");

			
			$stm->execute(array($idBeneficiario));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	
}

/*


mysql> describe beneficiarioRFC;
+----------------------+--------------+------+-----+---------+----------------+
| Field                | Type         | Null | Key | Default | Extra          |
+----------------------+--------------+------+-----+---------+----------------+
| idbeneficiarioRFC    | int(11)      | NO   | PRI | NULL    | auto_increment |
| RFC                  | varchar(13)  | YES  |     | NULL    |                |
| curp                 | varchar(18)  | YES  |     | NULL    |                |
| primerApellido       | varchar(20)  | YES  |     | NULL    |                |
| segundoApellido      | varchar(25)  | YES  |     | NULL    |                |
| nombres              | varchar(25)  | YES  |     | NULL    |                |
| fechaAltaSat         | date         | YES  |     | NULL    |                |
| sexo                 | tinyint(1)   | YES  |     | NULL    |                |
| idAsentamientos      | varchar(45)  | YES  | MUL | NULL    |                |
| idLocalidad          | varchar(10)  | YES  | MUL | NULL    |                |
| idTipoVialidad       | int(11)      | YES  | MUL | NULL    |                |
| nombreVialidad       | varchar(65)  | YES  |     | NULL    |                |
| numeroExterior       | varchar(8)   | YES  |     | NULL    |                |
| numeroInterior       | varchar(8)   | YES  |     | NULL    |                |
| entreVialidades      | varchar(100) | YES  |     | NULL    |                |
| descripcionUbicacion | text         | YES  |     | NULL    |                |
| actividad            | varchar(45)  | YES  |     | NULL    |                |
| cobertura            | int(11)      | YES  |     | NULL    |                |
| idRegistro           | int(11)      | YES  | MUL | NULL    |                |
+----------------------+--------------+------+-----+---------+----------------+


*/