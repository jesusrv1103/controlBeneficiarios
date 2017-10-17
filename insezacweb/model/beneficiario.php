<?php
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


	public function Listar()
	{
		try
		{
			$stm = $this->pdo->prepare(" select
				b.idBeneficiario, 
				b.curp, 
				b.primerApellido, 
				b.segundoApellido,
				b.nombres, 
				idOf.identificacion as nomTipoI, 
				tV.tipoVialidad,
				b.nombreVialidad,
				b.noExterior,
				b.noInterior,
				a.nombreAsentamiento,
				l.localidad,
				b.entreVialidades,
				b.descripcionUbicacion,
				b.estudioSocioeconomico,
				eC.estadoCivil, 
				b.jefeFamilia
				o.ocupacion, 
				iM.ingresoMensual,
				b.integrantesFamilia,
				b.dependientesEconomicos,
				v.vivienda, 
				b.noHabitantes,
				b.viviendaElectricidad,
				b.viviendaAgua,
				b.viviendaDrenaje,
				b.viviendaGas,
				b.viviendaTelefono,
				b.viviendaInternet
				nE.nivelEstudios, 
				sS.seguridadSocial,
				d.discapacidad, 
				gV.grupoVulnerable,
				b.beneficiarioColectivo
				from identificacionOficial idOf, 
				tipoVialidad tV, estadoCivil eC, 
				ocupacion o, vivienda v, 
				nivelEstudio nE,
				seguridadSocial sS, 
				discapacidad d, 
				grupoVulnerable gV, 
				asentamientos a, localidades l, 
				ingresoMensual iM, beneficiarios  b
				where  b.idIdentificacion = idOf.idIdentificacion AND   
				b.idTipoVialidad = tV.idTipoVialidad AND 	
				b.estadoCivil = eC.idEstadoCivil AND 
				b.ocupacion = o.idOcupacion AND 
				b.ingresoMensual = iM.idIngresoMensual AND 
				b.vivienda =  v.idVivienda AND   
				b.nivelEstudios = nE.idNivelEstudios AND  
				b.tipoSeguridadSocial = sS.idSeguridadSocial AND  
				b.discapacidad = d.idDiscapacidad AND  
				b.grupoVulnerable =gV.idGrupoVulnerable AND 
				b.claveAsentamiento = a.idAsentamientos AND 
				b.claveLocalidad = l.idLocalidad");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
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
				select
				b.idBeneficiario, 
				b.curp, 
				b.primerApellido, 
				b.segundoApellido,
				b.nombres, 
				idOf.identificacion as nomTipoI
				from identificacionOficial idOf, 
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
				b.idLocalidad = l.idLocalidad");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idBeneficiario)
	{
		try
		{
			$stm = $this->pdo->prepare(" SELECT
				b.idBeneficiario, 
				b.curp, 
				b.primerApellido, 
				b.segundoApellido,
				b.nombres, 
				idOf.identificacion as nomTipoI, 
				tV.tipoVialidad,
				b.nombreVialidad,
				b.noExterior,
				b.noInterior,
				a.nombreAsentamiento,
				l.localidad,
				b.entreVialidades,
				b.descripcionUbicacion,
				b.estudioSocioeconomico,
				eC.estadoCivil, 
				b.jefeFamilia
				o.ocupacion, 
				iM.ingresoMensual,
				b.integrantesFamilia,
				b.dependientesEconomicos,
				v.vivienda, 
				b.noHabitantes,
				b.viviendaElectricidad,
				b.viviendaAgua,
				b.viviendaDrenaje,
				b.viviendaGas,
				b.viviendaTelefono,
				b.viviendaInternet
				nE.nivelEstudios, 
				sS.seguridadSocial,
				d.discapacidad, 
				gV.grupoVulnerable,
				b.beneficiarioColectivo
				FROM identificacionOficial idOf, 
				tipoVialidad tV, estadoCivil eC, 
				ocupacion o, vivienda v, 
				nivelEstudio nE,
				seguridadSocial sS, 
				discapacidad d, 
				grupoVulnerable gV, 
				asentamientos a, localidades l, 
				ingresoMensual iM, beneficiarios  b
				WHERE  b.idIdentificacion = idOf.idIdentificacion AND   
				b.idTipoVialidad = tV.idTipoVialidad AND 	
				b.estadoCivil = eC.idEstadoCivil AND 
				b.ocupacion = o.idOcupacion AND 
				b.ingresoMensual = iM.idIngresoMensual AND 
				b.vivienda =  v.idVivienda AND   
				b.nivelEstudios = nE.idNivelEstudios AND  
				b.tipoSeguridadSocial = sS.idSeguridadSocial AND  
				b.discapacidad = d.idDiscapacidad AND  
				b.grupoVulnerable =gV.idGrupoVulnerable AND 
				b.claveAsentamiento = a.idAsentamientos AND 
				b.claveLocalidad = l.idLocalidad AND 
				b.idBeneficiario=$idBeneficiario");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			idTipoVialidad = ?,
			nombreVialidad = ?,
			noExterior = ?,
			noInterior = ?,
			idAsentamientos = ?,
			idLocalidad = ?,
			entreVialidades = ?,
			descripcionUbicacion = ?
			WHERE idBeneficiario = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->idTipoVialidad, 
					$data->nombreVialidad,
					$data->noExterior,
					$data->noInterior,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->entreVialidades,
					$data->descripcionUbicacion,
					$data->idBeneficiario
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

		//Metodo para actualizar
	public function Actualizar1($data)
	{
		try 
		{
			$sql = "UPDATE beneficiarios SET 
			estudioSocioeconomico = ?,
			jefeFamilia = ?,
			idEstadoCivil = ?,
			idOcupacion = ?,
			idIngresoMensual = ?,
			integrantesFamilia = ?,
			dependientesEconomicos = ?,
			idGrupoVulnerable =?
			WHERE idBeneficiario = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->estudioSocioeconomico,
					$data->jefeFamilia,
					$data->idEstadoCivil,
					$data->idOcupacion,
					$data->idIngresoMensual,
					$data->integrantesFamilia,
					$data->dependientesEconomicos,
					$data->idGrupoVulnerable,
					$data->idBeneficiario
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Actualizar2($data)
	{
		try 
		{
			$sql = "UPDATE beneficiarios SET 
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
					$data->idTipoVialidad, 
					$data->nombreVialidad,
					$data->noExterior,
					$data->noInterior,
					$data->idAsentamientos,
					$data->idLocalidad,
					$data->entreVialidades,
					$data->descripcionUbicacion,
					$data->idBeneficiario
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Registrar(Beneficiario $data)
	{
		try 
		{
			
			$sql = "INSERT INTO beneficiarios (curp,primerApellido,segundoApellido,nombres,idIdentificacion,
			idNivelEstudios,idSeguridadSocial,
			idDiscapacidad,beneficiarioColectivo) values (?,?,?,?,?,?,?,?,?)";

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
					$data->beneficiarioColectivo
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	


}








