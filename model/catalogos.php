<?php
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
	public $idOrigen;
	public $origen;
	public $idTipoApoyo;
	public $tipoApoyo;
	public $idPeriodicidad;
	public $periodicidad;
	public $idCaracteristicasApoyo;
	public $caracteristicasApoyo;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function ImportarIdentificacionOficial(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO identificacionoficial VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idIdentificacion,
				$data->identificacion
				)
			);	
	}

	public function ImportarTipoVialidad(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO tipovialidad VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idTipoVialidad,
				$data->tipoVialidad
				)
			);
	}

	public function ImportarEstadoCivil(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO estadocivil VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idEstadoCivil,
				$data->estadoCivil
				)
			);
	}

	public function ImportarOcupacion(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO ocupacion VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idOcupacion,
				$data->ocupacion
				)
			);
	}

	public function ImportarIngresoMensual(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO ingresomensual VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idIngresoMensual,
				$data->ingresoMensual
				)
			);
	}

	public function ImportarVivienda(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO vivienda VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idVivienda,
				$data->vivienda
				)
			);
	}

	public function ImportarNivelEstudios(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO nivelestudio VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idNivelEstudios,
				$data->nivelEstudios
				)
			);
	}

	public function ImportarSeguridadSocial(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO seguridadsocial VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idSeguridadSocial,
				$data->seguridadSocial
				)
			);
	}

	public function ImportarDiscapacidad(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO discapacidad VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idDiscapacidad,
				$data->discapacidad
				)
			);
	}

	public function ImportarGrupoVulnerable(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO grupovulnerable VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idGrupoVulnerable,
				$data->grupoVulnerable
				)
			);
	}

	public function ImportarOrigen(Catalogos $data){
		
		$sql= $this->pdo->prepare("INSERT INTO origen VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idOrigen,
				$data->origen
				)
			);
	}

	public function ImportarTipoApoyo(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO tipoapoyo VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idTipoApoyo,
				$data->tipoApoyo
				)
			);
	}

	public function ImportarPeriodicidad(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO periodicidad VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idPeriodicidad,
				$data->periodicidad
				)
			);
	}
	public function ImportarCaracteristicasApoyo(Catalogos $data){
		$sql= $this->pdo->prepare("INSERT INTO caracteristicasapoyo VALUES(?,?,?)");
		$resultado=$sql->execute(
			array(
				$data->idCaracteristicasApoyo,
				$data->caracteristicasApoyo,
				$data->idTipoApoyo
				)
			);
	}

	public function Limpiar($nomTabla)
	{
		$stm = $this->pdo->prepare("DELETE FROM $nomTabla");			          
		$stm->execute();
	}

	public function Check($valor)
	{
		if ($valor==0) {
			$stm=$this->pdo->prepare("SET GLOBAL FOREIGN_KEY_CHECKS=0");
			$stm->execute();
		}else{
			$stm=$this->pdo->prepare("SET GLOBAL FOREIGN_KEY_CHECKS=1");
			$stm->execute();
		}	
	}

	public function Listar($nomTabla)
	{
		$stm = $this->pdo->prepare("SELECT * FROM $nomTabla");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	public function ListarMunicipio()
	{
		try
		{
			//$result = array();
		    // SELECT p.idMunicipio, p.Municipio, sum(techoPresupuestal) as suma   FROM Municipio p , subMunicipio s where p.idMunicipio =  s.idMunicipio group by p.idMunicipio

			$stm = $this->pdo->prepare("SELECT * from municipio WHERE estado='Activo';");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarCaracteristicasApoyo()
	{
		$stm = $this->pdo->prepare("SELECT * FROM caracteristicasapoyo, tipoapoyo WHERE tipoapoyo.idTipoApoyo=caracteristicasapoyo.idTipoApoyo;");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
}
