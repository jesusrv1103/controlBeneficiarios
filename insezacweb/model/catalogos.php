<?php
require_once 'model/database.php';
class Catalogos
{
	private $pdo;
	public $idIdentificacion;
	public $identificacion;
	public $idTipoVialidad;
	public $tipoVialidad;
	public $idEstadoCivil;
	public $estadoCivil;
	public $idOcupacion;
	public $ocupacion;
	public $idIngresoMensual;
	public $ingresoMensual;
	public $idVivienda;
	public $vivienda;
	public $idNivelEstudios;
	public $nivelEstudios;
	public $idSeguridadSocial;
	public $seguridadSocial;
	public $idDiscapacidad;
	public $discapacidad;
	public $idGrupoVulnerable;
	public $grupoVulnerable;
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
	public function ImportarIdentificacionOficial(Catalogos $data){
		try 
		{
			//$this->Limpiar('identificacionOficial');
			$sql= $this->pdo->prepare("INSERT INTO identificacionOficial VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idIdentificacion,
					$data->identificacion
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

public function ImportarTipoVialidad(Catalogos $data){
		try 
		{
			$this->Limpiar('tipoVialidad');
			$sql= $this->pdo->prepare("INSERT INTO tipoVialidad VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->idTipoVialidad,
					$data->tipoVialidad
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarEstadoCivil(Catalogos $data){
		try 
		{
			$this->Limpiar('estadoCivil');
			$sql= $this->pdo->prepare("INSERT INTO estadoCivil VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->idEstadoCivil,
					$data->estadoCivil
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarOcupacion(Catalogos $data){
		try 
		{
			$this->Limpiar('ocupacion');
			$sql= $this->pdo->prepare("INSERT INTO ocupacion VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->idOcupacion,
					$data->ocupacion
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarIngresoMensual(Catalogos $data){
		try 
		{
			$this->Limpiar('ingresoMensual');
			$sql= $this->pdo->prepare("INSERT INTO ingresoMensual VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->idIngresoMensual,
					$data->ingresoMensual
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarVivienda(Catalogos $data){
		try 
		{
			$this->Limpiar('vivienda');
			$sql= $this->pdo->prepare("INSERT INTO vivienda VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->idVivienda,
					$data->vivienda
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarNivelEstudios(Catalogos $data){
		try 
		{
			$this->Limpiar('nivelEstudio');
			$sql= $this->pdo->prepare("INSERT INTO nivelEstudio VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->idNivelEstudios,
					$data->nivelEstudios
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
			$stm = $this->pdo
			            ->prepare("DELETE FROM $nomTabla");			          

			$stm->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}