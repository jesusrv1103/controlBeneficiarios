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
	public $idUsuario;
	public $fechaRegistro;
	public $horaRegistro;
	public $estado;
	
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
			entreVialidades,descripcionUbicacion,estudioSocioeconomico,idEstadoCivil,jefeFamilia,idOcupacion,
			idIngresoMensual,integrantesFamilia,dependientesEconomicos,idGrupoVulnerable,idVivienda,
			noHabitantes,viviendaElectricidad,viviendaAgua,viviendaDrenaje,viviendaGas,
			viviendaTelefono,viviendaInternet) values 
			(?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?)";
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
						$data->viviendaInternet//8
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

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM beneficiarios WHERE idBeneficiario = ?");			          

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
				viviendaTelefono,viviendaInternet) values 
				(?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?)");
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
					$data->viviendaInternet//8
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

			$stm = $this->pdo->prepare("SELECT * FROM beneficiarios");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

}