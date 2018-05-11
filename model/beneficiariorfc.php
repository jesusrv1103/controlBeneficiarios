<?php
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
		$this->pdo = Database::StartUp();     
	}



	public function Listar($id)
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
			b.cobertura,
			b.idMunicipio,
			m.nombreMunicipio
			FROM 
			tipovialidad tV, 
			asentamientos a, 
			localidades l, 
			beneficiariorfc b,
			municipio m
			where   
			b.idTipoVialidad = tV.idTipoVialidad AND 	
			b.idAsentamientos = a.idAsentamientos AND 
			b.idLocalidad = l.idLocalidad AND
			b.idMunicipio=m.idMunicipio AND
			b.idBeneficiarioRFC = ?");

		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ListarDatosPersonales()
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


	public function Registrar(Beneficiariorfc $data)
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
	}

	

	public function Obtener($idBeneficiario)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM beneficiariorfc WHERE idBeneficiarioRFC = ?");


		$stm->execute(array($idBeneficiario));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar($data)
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
	}

	//Metodo para actualizar
	public function Actualizar($data)
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
	}

	public function ActualizarExc($data)
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
	}

	public function ImportarBeneficiarioRFC(Beneficiariorfc $data)
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
	}

	public function Listar1()
	{
		$stm = $this->pdo->prepare("SELECT * FROM beneficiariorfc b, registro r, localidades l WHERE r.idRegistro= b.idRegistro  AND r.estado='Activo' AND b.idLocalidad=l.idLocalidad");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function Listar2()
	{
		$stm = $this->pdo->prepare("SELECT * FROM beneficiarios, registro, municipio WHERE registro.idRegistro=beneficiarios.idRegistro and registro.estado='Activo'");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	//Funciones para registrar los detalles de cada registro de beneficiarios.
	public function RegistraDatosRegistro(Beneficiariorfc $data){
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
	}

	public function ObtenerIdRegistro($idBeneficiarioRFC)
	{
		$sql= $this->pdo->prepare("SELECT registro.idRegistro from registro, beneficiariorfc where registro.idRegistro=beneficiariorfc.idRegistro and idBeneficiarioRFC=$idBeneficiarioRFC");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ObtenerIdMunicipio($claveMunicipio)
	{
		$sql= $this->pdo->prepare("SELECT idMunicipio from municipio where claveMunicipio=$claveMunicipio");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function RegistraActualizacion(Beneficiariorfc $data){
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
	}

	public function ObtenerInfoRegistro($idBeneficiarioRFC)
	{
		$sql= $this->pdo->prepare("SELECT * FROM registro, beneficiariorfc WHERE beneficiariorfc.idRegistro=registro.idRegistro AND beneficiariorfc.idBeneficiarioRFC=?;");
		$resultado=$sql->execute(array($idBeneficiarioRFC));
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ListarActualizacion($idRegistro)
	{
		$stm = $this->pdo->prepare("SELECT * FROM actualizacion WHERE idRegistro=?");
		$stm->execute(array($idRegistro));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ObtenerInfoActualizacion2()
	{
		$sql= $this->pdo->prepare("SELECT * FROM actualizacion;");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

    //Metodo para actualizar
	public function Activar($idRegistro)
	{
		$sql = "UPDATE registro SET	estado = 'Activo' WHERE idRegistro = ?";
		$this->pdo->prepare($sql)
		->execute(
			array($idRegistro)
		);
	}

	public function VerificaBeneficiarioRFC($RFC)
	{
		$sql= $this->pdo->prepare("SELECT * FROM beneficiariorfc, registro WHERE RFC=? AND beneficiariorfc.idRegistro=registro.idRegistro");
		$resultado=$sql->execute(
			array($RFC)
		);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ObtenerInfoApoyo($idBeneficiario)
	{
		$stm = $this->pdo->prepare("SELECT * FROM apoyos,beneficiariorfc,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyos.idBeneficiario=beneficiariorfc.idBeneficiarioRFC AND apoyos.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND beneficiariorfc.idBeneficiariorfc=1 ORDER BY apoyos.idApoyo;");
		$stm->execute(array($idBeneficiario));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}	
}

