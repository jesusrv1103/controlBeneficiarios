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
	public $idMunicipio;
	private $mensaje;
	private $error;

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
			b.idMunicipio = m.idMunicipio AND
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
		actividad,cobertura,idRegistro,idMunicipio) values 
		(?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?)";
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
				$data->idMunicipio
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
		idRegistro = ?,
		idMunicipio = ?
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
				$data->idMunicipio,
				$data->idBeneficiarioRFC

				)
			);
	}
	
	public function ImportarBeneficiarioRFC(Beneficiariorfc $data){
		$sql =$this->pdo->prepare("INSERT INTO beneficiariorfc values 
			(?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?)");
		$resultado=$sql->execute(
			array(
				null,
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
				$data->idMunicipio,

				)
			);
	}

	public function Listar1($periodo)
	{
		$fechaInicio=$periodo.'-01-01';
		$fechaFin=$periodo.'-12-31';
		$stm = $this->pdo->prepare("SELECT * FROM beneficiariorfc b, registro r, municipio m WHERE r.idRegistro= b.idRegistro  AND r.estado='Activo' AND b.idMunicipio=m.idMunicipio AND DATE(r.fechaAlta) BETWEEN ? AND ?");
		$stm->execute(array($fechaInicio, $fechaFin));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Listar2($periodo)
	{
		$fechaInicio=$periodo.'-01-01';
		$fechaFin=$periodo.'-12-31';
		$stm = $this->pdo->prepare("SELECT * FROM beneficiariorfc b, registro r, municipio m , actualizacion a  WHERE r.idRegistro= b.idRegistro  AND r.estado='Activo' AND r.idRegistro=a.idRegistro AND b.idMunicipio=m.idMunicipio AND DATE(a.fechaActualizacion) BETWEEN ? AND ?");
		$stm->execute(array($fechaInicio, $fechaFin));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarTodos()
	{
		$stm = $this->pdo->prepare("SELECT * FROM beneficiariorfc brfc, registro r, municipio m WHERE r.idRegistro=brfc.idRegistro and r.estado='Activo' AND brfc.idMunicipio=m.idMunicipio");
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
public function ObtenerIdBeneficiarioRFC($RFC)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM beneficiariorfc WHERE RFC = ?");
		$stm->execute(array($RFC));
		return $stm->fetch(PDO::FETCH_OBJ);
	}
	public function ListarAsentamientos($localidad)
	{
		$stm = $this->pdo->prepare("SELECT * FROM asentamientos WHERE localidad=?");
		$stm->execute(array($localidad));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ObtenerIdMunicipio($claveMunicipio)
	{
		$sql= $this->pdo->prepare("SELECT * from municipio where claveMunicipio=?");
		$resultado=$sql->execute(array($claveMunicipio));
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
		$stm = $this->pdo->prepare("SELECT * FROM apoyosrfc,beneficiariorfc,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyosrfc.idBeneficiario=beneficiariorfc.idBeneficiarioRFC AND apoyosrfc.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyosrfc.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyosrfc.idPeriodicidad=periodicidad.idPeriodicidad AND apoyosrfc.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyosrfc.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND beneficiariorfc.idBeneficiarioRFC=? ORDER BY apoyosrfc.idApoyo;");
		$stm->execute(array($idBeneficiario));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}	
}

