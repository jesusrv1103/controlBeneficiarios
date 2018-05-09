<?php
class Programa
{
	
	private $pdo;
	public $idPrograma;
	public $programa;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function Listar()
	{
		try {
			$stm = $this->pdo->prepare("SELECT * from programa");	
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			echo 'No se ha podido establer conexión con la base de datos';
		}
	}

	public function ImportarPrograma(Programa $data)
	{
		$sql= $this->pdo->prepare("INSERT INTO programa VALUES(?,?)");
		$resultado=$sql->execute(
			array(
				$data->idPrograma,
				$data->programa
			)
		);
	}

	public function Limpiar($nomTabla)
	{
		$stm = $this->pdo->prepare("DELETE FROM $nomTabla");			          
		$stm->execute();
	}

	public function Obtener($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM programa WHERE idPrograma = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}
	
	public function Eliminar($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM programa WHERE idPrograma = ?");			          
		$stm->execute(array($id));
	}

	public function Actualizar($data)
	{
		$sql = "UPDATE programa SET programa = ?
		WHERE idPrograma = ?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->programa, 
				$data->idPrograma
			)
		);
	}

	public function Registrar(Programa $data)
	{
		$sql = "INSERT INTO programa (programa) VALUES (?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->programa
			)
		);
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