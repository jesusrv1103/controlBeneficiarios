<?php
class Apoyosrfc
{
	private $pdo; //int 
	public $idApoyoRFC;
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
	public $idBeneficiarioRFC;
	public $clavePresupuestal;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	//Metdodo para listar
	public function Listar()
	{
		$stm = $this->pdo->prepare("SELECT * FROM apoyosrfc,beneficiariorfc,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyosrfc.idBeneficiarioRFC=beneficiariorfc.idBeneficiarioRFC AND apoyosrfc.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyosrfc.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyosrfc.idPeriodicidad=periodicidad.idPeriodicidad AND apoyosrfc.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyosrfc.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo");

		$stm->execute(array());

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	//Metdodo para listar
	public function ListarSelects($nomTabla)
	{
		$stm = $this->pdo->prepare("SELECT * FROM $nomTabla");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Obtener($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM apoyosrfc, beneficiariorfc, origen, tipoapoyo, caracteristicasapoyo, periodicidad, subprograma WHERE apoyosrfc.idOrigen=origen.idOrigen AND apoyosrfc.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyosrfc.idPeriodicidad=periodicidad.idPeriodicidad AND apoyosrfc.idSubprograma=subprograma.idSubprograma AND apoyosrfc.idBeneficiarioRFC=beneficiariorfc.idBeneficiarioRFC AND idApoyoRFC = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}
	
	public function Eliminar($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM apoyosrfc WHERE idApoyoRFC = ?");			          

		$stm->execute(array($id));
	}
	
	public function Actualizar(Apoyosrfc $data)
	{
		$sql = "UPDATE apoyosrfc SET idBeneficiarioRFC = ?, idOrigen = ?, idSubprograma = ?, idCaracteristica = ?, importeApoyo = ?, fechaApoyo = ?, idPeriodicidad = ? WHERE idApoyoRFC = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idBeneficiarioRFC,
				$data->idOrigen, 
				$data->idSubprograma, 
				$data->idCaracteristica, 
				$data->importeApoyo, 
				$data->fechaApoyo, 
				$data->idPeriodicidad,
				$data->idApoyoRFC
				)
			);
	}

	public function Registrar(Apoyosrfc $data)
	{
		$sql = "INSERT INTO apoyosrfc
		VALUES (?,?,?,?,?,
		?,?,?,?,?,
		?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idBeneficiarioRFC,
				$data->idOrigen, 
				$data->idSubprograma,  
				$data->idCaracteristica, 
				$data->importeApoyo, 
				$data->numeroApoyo, 
				$data->fechaApoyo, 
				$data->idPeriodicidad, 
				$data->idProgramaSocial,
				$data->idRegistroApoyo,
				null
				)
			);
	}

	public function Limpiar($nomTabla)
	{
		$stm = $this->pdo->prepare("DELETE FROM $nomTabla");			          
		$stm->execute();
	}

	public function ImportarApoyoRFC(Apoyosrfc $data){
		$sql= $this->pdo->prepare("INSERT INTO apoyosrfc VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
		$resultado=$sql->execute(
			array(
				null,
				$data->idBeneficiarioRFC,
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
	}

	public function ObtenerInfoApoyo($idApoyo)
	{
		$sql= $this->pdo->prepare("SELECT * FROM apoyosrfc,beneficiariorfc,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyosrfc.idBeneficiarioRFC=beneficiariorfc.idBeneficiarioRFC AND apoyosrfc.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyosrfc.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyosrfc.idPeriodicidad=periodicidad.idPeriodicidad AND apoyosrfc.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyosrfc.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyosrfc.idApoyoRFC=?;");
		$resultado=$sql->execute(array($idApoyo));
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ObtenerIdRegistro($idApoyo)
	{
		$sql= $this->pdo->prepare("SELECT registroapoyo.idRegistroApoyo from registroapoyo, apoyosrfc where registroapoyo.idRegistroApoyo=apoyosrfc.idRegistroApoyo and idApoyoRFC=$idApoyo");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function RegistraActualizacion(Apoyosrfc $data)
	{
		$sql = "INSERT INTO actualizacionapoyo VALUES (?,?,?,?,?)";
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
	}

	public function ListarActualizacion($idRegistro)
	{
		$stm = $this->pdo->prepare("SELECT * FROM actualizacionapoyo WHERE idRegistroApoyo=?");
		$stm->execute(array($idRegistro));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarSubprogramas($idPrograma)
	{
		$stm = $this->pdo->prepare("SELECT * FROM subprograma WHERE idPrograma=?");
		$stm->execute(array($idPrograma));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function RegistraDatosRegistro(Apoyosrfc $data){


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
	}
	
	public function ObtenerIdBen($rfc)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM beneficiariorfc WHERE RFC = ?");
		$stm->execute(array($rfc));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ListarBeneficiarios()
	{
		$stm = $this->pdo->prepare("SELECT * FROM beneficiariorfc brfc, registro r WHERE r.idRegistro=brfc.idRegistro and r.estado='Activo'");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function VerificaRFC($RFC)
	{
		$sql= $this->pdo->prepare("SELECT * FROM beneficiariorfc WHERE RFC=?");
		$resultado=$sql->execute(
			array($RFC)
			);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

}
