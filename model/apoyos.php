<?php
require_once 'model/database.php';
class Apoyos
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
	public $clavePresupuestal;
	public $tipo;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function Listar()
	{
		$stm = $this->pdo->prepare("SELECT * FROM apoyos,beneficiarios,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyos.idBeneficiario=beneficiarios.idBeneficiario AND apoyos.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyos.tipo='curp'");

		$stm->execute(array());

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarSelects($nomTabla)
	{
		$stm = $this->pdo->prepare("SELECT * FROM $nomTabla");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Obtener($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM apoyos, beneficiarios, origen, tipoapoyo, caracteristicasapoyo, periodicidad, subprograma WHERE apoyos.idOrigen=origen.idOrigen AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idSubprograma=subprograma.idSubprograma AND apoyos.idBeneficiario=beneficiarios.idBeneficiario AND idApoyo = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM apoyos WHERE idApoyo = ?");			          

		$stm->execute(array($id));
	}
	
	public function Actualizar(Apoyos $data)
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
	}

	public function Registrar(Apoyos $data)
	{
		$sql = "INSERT INTO apoyos
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

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
				'curp'
				)
			);
	}

	public function Limpiar($nomTabla)
	{
		$stm = $this->pdo->prepare("DELETE FROM $nomTabla");			          
		$stm->execute();
	}

	public function ImportarApoyo(Apoyos $data){
		$sql= $this->pdo->prepare("INSERT INTO apoyos VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
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
				$data->clavePresupuestal,
				'curp'
				)
			);
	}

	public function ObtenerInfoApoyo($idApoyo)
	{
		$sql= $this->pdo->prepare("SELECT * FROM apoyos,beneficiarios,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyos.idBeneficiario=beneficiarios.idBeneficiario AND apoyos.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND apoyos.idApoyo=?;");
		$resultado=$sql->execute(array($idApoyo));
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ObtenerIdRegistro($idApoyo)
	{
		$sql= $this->pdo->prepare("SELECT registroapoyo.idRegistroApoyo from registroapoyo, apoyos where registroapoyo.idRegistroApoyo=apoyos.idRegistroApoyo and idApoyo=$idApoyo");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function RegistraActualizacion(Apoyos $data){
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
	
	public function RegistraDatosRegistro(Apoyos $data){


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

	public function ObtenerIdBen($curp)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM beneficiarios WHERE curp = ?");
		$stm->execute(array($curp));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ListarBeneficiarios()
	{
		$stm = $this->pdo->prepare("SELECT 	* FROM beneficiarios b, registro r WHERE b.idRegistro= r.idRegistro AND r.estado='Activo'");
		$stm->execute(array());
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
}
