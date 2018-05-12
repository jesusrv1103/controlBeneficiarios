<?php
class Direccion
{
	private $pdo;
	public $idDireccion;
	public $direccion;
	public $descripcion;
	public $titular;
	public $estado;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}
		//Metdodo para listar
	public function Listar()
	{
		$stm = $this->pdo->prepare("SELECT * from direccion where estado='ACTIVO'");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Obtener($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM direccion WHERE idDireccion = ?");


		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM direccion WHERE idDireccion = ?");			          

		$stm->execute(array($id));
	}

	public function Actualizar(Direccion $data)
	{
		$sql = "UPDATE direccion SET 
		direccion = ?, descripcion= ?, titular =?
		WHERE idDireccion = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->direccion,
				$data->descripcion,
				$data->titular, 
				$data->idDireccion
				)
			);
	}

	//Metdod para registrar
	public function Registrar(Direccion $data)
	{
		$sql = "INSERT INTO direccion(
		direccion,descripcion,titular,estado)
		VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->direccion,
				$data->descripcion,
				$data->titular,
				$data->estado
				)
			);
	}

	public function Limpiar($nomTabla)
	{
		
		$stm = $this->pdo->prepare("DELETE FROM $nomTabla");			          
		$stm->execute();
	}

	public function ImportarDirecciones(Direccion $data){
		$sql= $this->pdo->prepare("INSERT INTO direccion VALUES(?,?,?,?,?)");
		$resultado=$sql->execute(
			array(
				null,
				$data->direccion,
				$data->descripcion,
				$data->titular,
				$estado="ACTIVO"

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
	
	public function VerificaDireccion($direccion)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM direccion WHERE direccion=?");
		$stm->execute(
			array($direccion)
			);
		return $stm->fetch(PDO::FETCH_OBJ);
	}
}