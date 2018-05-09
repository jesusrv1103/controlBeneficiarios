<?php
class Subprograma
{
	private $pdo;
	public $idSubprograma;
	public $subprograma;
	public $idPrograma;
	public $programa;
	public $techoPresupuestal;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function ImportarSubprograma(Subprograma $data){
		$sql= $this->pdo->prepare("INSERT INTO subprograma VALUES(?,?,?,?,?)");
		$resultado=$sql->execute(
			array(
				$data->idSubprograma,
				$data->subprograma,
				$data->idPrograma,
				$data->programa,
				null
			)
		);
	}

	public function Limpiar($nomTabla)
	{
		$stm = $this->pdo->prepare("DELETE FROM $nomTabla");
		$stm->execute();
	}

	public function Listar()
	{
		$stm = $this->pdo->prepare("SELECT * from subprograma");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Obtener($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM subprograma WHERE idSubprograma = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM subprograma WHERE idSubprograma = ?");
		$stm->execute(array($id));
	}

	public function Actualizar($data)
	{
		$sql = "UPDATE subprograma SET techoPresupuestal=?
		WHERE idSubprograma = ?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->techoPresupuestal,
				$data->idSubprograma
			)
		);
	}
	
	public function Registrar(Subprograma $data)
	{
		$sql = "INSERT INTO subprograma	VALUES (?,?,?,?,?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->subprograma,
				$data->programa,
				$data->idPrograma,
				$data->techoPresupuestal
			)
		);
	}
	public function ConsultaProgramas()
	{
		$stm = $this->pdo->prepare("SELECT * FROM programa");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ConsultaPrograma($idPrograma)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM programa WHERE idPrograma = ?");
		$stm->execute(array($idPrograma));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ConsultaSubprogramas($valor)
	{
		$stm = $this->pdo->prepare("SELECT * FROM subprograma WHERE programa like '%$valor%' || subprograma like '%$valor%'");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarBeneficiarios($idSubprograma)
	{
		$stm = $this->pdo->prepare("SELECT * from beneficiarios, apoyos WHERE idSubprograma=? AND apoyos.idBeneficiario=beneficiarios.idBeneficiario");
		$stm->execute(array($idSubprograma));
		return $stm->fetchAll(PDO::FETCH_OBJ);
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
}
