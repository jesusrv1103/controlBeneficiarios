<?php
require_once 'model/database.php';
class Beneficiario
{
	public $pdo;
	public $idBeneficiario;
	public $curp;
	public $primerApellido;
	public $segundoApellido;
	public $nombres;
	public $idIdentificacion;
	public $idTipoVialidad;
	public $nombreVialidad;
	public $noExterior;
	public $noInterior;
	public $idAsentamientos;
	public $idLocalidad;
	public $entreVialidades;
	public $descripcionUbicacion;
	public $estudioSocioeconomico;
	public $idEstadoCivil;
	public $jefeFamilia;
	public $idOcupacion;
	public $idIngresoMensual;
	public $integrantesFamilia;
	public $dependientesEconomicos;
	public $idVivienda;
	public $noHabitantes;
	public $viviendaElectricidad;
	public $viviendaAgua;
	public $viviendaDrenaje;
	public $viviendaGas;
	public $viviendaTelefono;
	public $viviendaInternet;
	public $idNivelEstudios;
	public $idSeguridadSocial;
	public $idDiscapacidad;
	public $idGrupoVulnerable;
	public $beneficiarioColectivo;
	public $usuario;
	public $fecha;
	public $hora;
	public $estado;
	public $direccion;
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
		try
		{
			$stm = $this->pdo->prepare("SELECT
				b.idBeneficiario, 
				b.curp, 
				b.primerApellido, 
				b.segundoApellido,
				b.nombres, 
				b.idIdentificacion,
				idOf.identificacion as nomTipoI, 
				tV.tipoVialidad,
				b.nombreVialidad,
				b.idTipoVialidad,
				b.noExterior,
				b.noInterior,
				a.nombreAsentamiento,
				b.idAsentamientos,
				l.localidad,
				b.idLocalidad,
				b.entreVialidades,
				b.descripcionUbicacion,
				b.estudioSocioeconomico,
				eC.estadoCivil, 
				b.idEstadoCivil,
				b.jefeFamilia,
				o.ocupacion, 
				b.idOcupacion,
				iM.ingresoMensual,
				b.idIngresoMensual,
				b.integrantesFamilia,
				b.dependientesEconomicos,
				v.vivienda, 
				b.idVivienda,
				b.noHabitantes,
				b.viviendaElectricidad,
				b.viviendaAgua,
				b.viviendaDrenaje,
				b.viviendaGas,
				b.viviendaTelefono,
				b.viviendaInternet,
				nE.nivelEstudios, 
				b.idNivelEstudios,
				b.idSeguridadSocial,
				sS.seguridadSocial,
				d.discapacidad, 
				d.idDiscapacidad,
				gV.grupoVulnerable,
				b.idGrupoVulnerable,
				b.beneficiarioColectivo
				FROM identificacionOficial idOf, 
				tipoVialidad tV, estadoCivil eC, 
				ocupacion o, vivienda v, 
				nivelEstudio nE,
				seguridadSocial sS, 
				discapacidad d, 
				grupoVulnerable gV, 
				asentamientos a, 
				localidades l, 
				ingresoMensual iM, beneficiarios  b
				where  b.idIdentificacion = idOf.idIdentificacion AND   
				b.idTipoVialidad = tV.idTipoVialidad AND 	
				b.idEstadoCivil = eC.idEstadoCivil AND 
				b.idOcupacion = o.idOcupacion AND 
				b.idIngresoMensual = iM.idIngresoMensual AND 
				b.idVivienda =  v.idVivienda AND   
				b.idNivelEstudios = nE.idNivelEstudios AND  
				b.idSeguridadSocial = sS.idSeguridadSocial AND  
				b.idDiscapacidad = d.idDiscapacidad AND  
				b.idGrupoVulnerable =gV.idGrupoVulnerable AND 
				b.idAsentamientos = a.idAsentamientos AND 
				b.idLocalidad = l.idLocalidad AND
				b.idBeneficiario = ?");

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
				b.idBeneficiario, 
				b.curp, 
				b.primerApellido, 
				b.segundoApellido,
				b.nombres, 
				idOf.identificacion as nomTipoI
				FROM identificacionOficial idOf, 
				tipoVialidad tV, estadoCivil eC, 
				ocupacion o, vivienda v, 
				nivelEstudio nE,
				seguridadSocial sS, 
				discapacidad d, 
				grupoVulnerable gV, 
				asentamientos a, 
				localidades l, 
				ingresoMensual iM, 
				beneficiarios  b
				where  b.idIdentificacion = idOf.idIdentificacion AND
				b.idTipoVialidad = tV.idTipoVialidad AND 
				b.idEstadoCivil = eC.idEstadoCivil AND  
				b.idOcupacion = o.idOcupacion AND  
				b.idIngresoMensual = iM.idIngresoMensual AND 
				b.idVivienda =  v.idVivienda AND  
				b.idNivelEstudios = nE.idNivelEstudios AND  
				b.idSeguridadSocial = sS.idSeguridadSocial AND   
				b.idDiscapacidad = d.idDiscapacidad AND
				b.idGrupoVulnerable =gV.idGrupoVulnerable AND 
				b.idAsentamientos = a.idAsentamientos AND  
				b.idLocalidad = l.idLocalidad
				WHERE idBeneficiario = ?");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Beneficiario $data)
	{
		try 
		{

			$sql = "INSERT INTO beneficiarios 
			(curp,primerApellido,segundoApellido,nombres,idIdentificacion,
			idNivelEstudios,idSeguridadSocial,idDiscapacidad,beneficiarioColectivo,idTipoVialidad,
			nombreVialidad,noExterior,noInterior,idAsentamientos,idLocalidad,
			entreVialidades,descripcionUbicacion,estudioSocioeconomico,idEstadoCivil,jefeFamilia,
			idOcupacion,idIngresoMensual,integrantesFamilia,dependientesEconomicos,idGrupoVulnerable,
			idVivienda,noHabitantes,viviendaElectricidad,viviendaAgua,viviendaDrenaje,
			viviendaGas,viviendaTelefono,viviendaInternet,idRegistro) values 
			(?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->curp,
					$data->primerApellido,
					$data->segundoApellido,
					$data->nombres,
					$data->idIdentificacion,
					$data->idNivelEstudios,
					$data->idSeguridadSocial,
					$data->idDiscapacidad,
						$data->beneficiarioColectivo,//9
					//vialidad
						$data->idTipoVialidad, 
						$data->nombreVialidad,
						$data->noExterior,
						$data->noInterior,
						$data->idAsentamientos,
						$data->idLocalidad,
						$data->entreVialidades,
						$data->descripcionUbicacion,//8
					//estudio
						$data->estudioSocioeconomico,
						$data->idEstadoCivil,
						$data->jefeFamilia,
						$data->idOcupacion,
						$data->idIngresoMensual,
						$data->integrantesFamilia,
						$data->dependientesEconomicos,
						$data->idGrupoVulnerable,//8
					//vivienda
						$data->idVivienda,
						$data->noHabitantes,				
						$data->viviendaElectricidad,
						$data->viviendaAgua,
						$data->viviendaDrenaje,
						$data->viviendaGas,
						$data->viviendaTelefono,
						$data->viviendaInternet,//8
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
			->prepare("SELECT * FROM beneficiarios WHERE idBeneficiario = ?");


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
			->prepare("UPDATE registro r INNER JOIN beneficiarios b
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
			$sql = "UPDATE beneficiarios SET 
			curp = ?,
			primerApellido = ?,
			segundoApellido = ?,
			nombres = ?,
			idIdentificacion = ?,
			idNivelEstudios = ?,
			idSeguridadSocial = ?,
			idDiscapacidad = ?,
			beneficiarioColectivo =?,
			idTipoVialidad = ?,
			nombreVialidad = ?,
			noExterior = ?,
			noInterior = ?,
			idAsentamientos = ?,
			idLocalidad = ?,
			entreVialidades = ?,
			descripcionUbicacion = ?,
			estudioSocioeconomico = ?,
			idEstadoCivil = ?,
			jefeFamilia = ?,
			idOcupacion = ?,
			idIngresoMensual = ?,
			integrantesFamilia = ?,
			dependientesEconomicos = ?,
			idGrupoVulnerable = ?,
			idVivienda = ?,
			noHabitantes = ?,
			viviendaElectricidad = ?,
			viviendaAgua = ?,
			viviendaDrenaje = ?,
			viviendaGas = ?,
			viviendaTelefono = ?,
			viviendaInternet = ?
			WHERE idBeneficiario = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->curp,
					$data->primerApellido,
					$data->segundoApellido,
					$data->nombres,
					$data->idIdentificacion,
					$data->idNivelEstudios,
					$data->idSeguridadSocial,
					$data->idDiscapacidad,
					$data->beneficiarioColectivo,
					$data->idTipoVialidad,
					$data->nombreVialidad,
					$data->noExterior,
					$data->noInterior,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->entreVialidades,
					$data->descripcionUbicacion,
					$data->estudioSocioeconomico,
					$data->idEstadoCivil,
					$data->jefeFamilia,
					$data->idOcupacion,
					$data->idIngresoMensual,
					$data->integrantesFamilia,
					$data->dependientesEconomicos,
					$data->idGrupoVulnerable,
					$data->idVivienda,
					$data->noHabitantes,
					$data->viviendaElectricidad,
					$data->viviendaAgua,
					$data->viviendaDrenaje,
					$data->viviendaGas,
					$data->viviendaTelefono,
					$data->viviendaInternet,
					$data->idBeneficiario

				)
			);
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ImportarBeneficiario(Beneficiario $data){
		try 
		{
			$sql =$this->pdo->prepare("INSERT INTO beneficiarios 
				(curp,primerApellido,segundoApellido,nombres,idIdentificacion,
				idNivelEstudios,idSeguridadSocial,idDiscapacidad,beneficiarioColectivo,idTipoVialidad,
				nombreVialidad,noExterior,noInterior,idAsentamientos,idLocalidad,
				entreVialidades,descripcionUbicacion,estudioSocioeconomico,idEstadoCivil,jefeFamilia,idOcupacion,
				idIngresoMensual,integrantesFamilia,dependientesEconomicos,idGrupoVulnerable,idVivienda,
				noHabitantes,viviendaElectricidad,viviendaAgua,viviendaDrenaje,viviendaGas,
				viviendaTelefono,viviendaInternet,idRegistro) values 
				(?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?)");
			$resultado=$sql->execute(
				array(
					$data->curp,
					$data->primerApellido,
					$data->segundoApellido,
					$data->nombres,
					$data->idIdentificacion,
					$data->idNivelEstudios,
					$data->idSeguridadSocial,
					$data->idDiscapacidad,
					$data->beneficiarioColectivo,//9
					//vialidad
					$data->idTipoVialidad, 
					$data->nombreVialidad,
					$data->noExterior,
					$data->noInterior,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->entreVialidades,
					$data->descripcionUbicacion,//8
					//estudio
					$data->estudioSocioeconomico,
					$data->idEstadoCivil,
					$data->jefeFamilia,
					$data->idOcupacion,
					$data->idIngresoMensual,
					$data->integrantesFamilia,
					$data->dependientesEconomicos,
					$data->idGrupoVulnerable,//8
					//vivienda
					$data->idVivienda,
					$data->noHabitantes,				
					$data->viviendaElectricidad,
					$data->viviendaAgua,
					$data->viviendaDrenaje,
					$data->viviendaGas,
					$data->viviendaTelefono,
					$data->viviendaInternet,//8

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

			$stm = $this->pdo->prepare("SELECT idBeneficiario,
				b.idRegistro,
				curp,
				primerApellido,
				segundoApellido,
				nombres
				FROM beneficiarios b
				INNER JOIN 
				registro r
				where estado='Activo'");
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

			$stm = $this->pdo->prepare("SELECT * FROM beneficiarios, registro WHERE registro.idRegistro=beneficiarios.idRegistro and registro.estado='Activo';");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

//Funciones para registrar los detalles de cada registro de beneficiarios.

	public function RegistraDatosRegistro(Beneficiario $data){

		try 
		{

			$sql = "INSERT INTO registro VALUES (?,?,?,?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->usuario,
					$data->direccion,
					$data->fecha,
					$data->hora,
					$data->estado
				)
			);
			return $this->pdo->lastInsertId();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ObtenerIdRegistro($idBeneficiario)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT registro.idRegistro from registro, beneficiarios where registro.idregistro=beneficiarios.idregistro and idBeneficiario=$idBeneficiario");
			$resultado=$sql->execute();
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function RegistraActualizacion(Beneficiario $data){
		try 
		{
			$sql = "INSERT INTO actualizacion VALUES (?,?,?,?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->usuario,
					$data->direccion,
					$data->fecha,
					$data->hora,
					$data->idRegistro
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ObtenerInfoRegistro($idBeneficiario)
	{
		try 
		{
			$sql= $this->pdo->prepare("SELECT * FROM registro, beneficiarios WHERE beneficiarios.idregistro=registro.idregistro AND beneficiarios.idbeneficiario=?;");
			$resultado=$sql->execute(array($idBeneficiario));
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

}