<?php
class Municipio
{
	private $pdo;
	public $idMunicipio;
	public $nombreMunicipio;
	public $claveMunicipio;
	public $estado;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function Listar()
	{
		$stm = $this->pdo->prepare("SELECT * from municipio WHERE estado='Activo';");		
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ImportarMunicipio(Municipio $data)
	{
		$sql= $this->pdo->prepare("INSERT INTO municipio VALUES(?,?,?,?)");
		$resultado=$sql->execute(
			array(
				NULL,
				$data->nombreMunicipio,
				$data->claveMunicipio,
				$data->estado
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
		->prepare("SELECT * FROM municipio WHERE idMunicipio = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar(Municipio $data)
	{
		$sql = "UPDATE municipio SET 
		estado = ?
		WHERE idMunicipio = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->estado,
				$data->idMunicipio

				)
			);
	}

	//Metodo para actualizar
	public function Actualizar($data)
	{
		$sql = "UPDATE municipio SET 
		nombreMunicipio = ?,
		claveMunicipio = ?
		WHERE idMunicipio = ?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->nombreMunicipio, 
				$data->claveMunicipio,
				$data->idMunicipio
				)
			);
	}

	//Metdod para registrar
	public function Registrar(Municipio $data)
	{
		$sql = "INSERT INTO municipio(nombreMunicipio,estado,claveMunicipio) 
		VALUES (?,?,?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->nombreMunicipio,
				$data->estado,
				$data->claveMunicipio
				)
			);
	}
}