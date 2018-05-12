<?php
class Localidad
{
	private $pdo;
	public $idLocalidad;
	public $municipio;
	public $localidad;
	public $ambito;
	public $estado;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();     
	}

	public function ImportarLocalidad(Localidad $data){
		$sql= $this->pdo->prepare("INSERT INTO localidades VALUES(?,?,?,?,?)");
		$resultado=$sql->execute(
			array(
				$data->idLocalidad,
				$data->municipio,
				$data->localidad,
				$data->ambito,
				$data->estado
				)
			);
	}

	public function Listar()
	{
		$stm = $this->pdo->prepare("SELECT * FROM localidades WHERE estado='Activo'");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);

	}

	public function Limpiar($nomTabla)
	{	
		$stm = $this->pdo
		->prepare("DELETE FROM $nomTabla");			          

		$stm->execute();
	}

	public function Obtener($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM localidades WHERE idLocalidad = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar(Localidad $data)
	{
		$sql = "UPDATE localidades SET 
		estado = ?
		WHERE idLocalidad = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->estado,
				$data->idLocalidad

				)
			);
	}

	public function Actualizar(Localidad $data)
	{
		$sql = "UPDATE localidades SET 
		idLocalidad = ?, municipio = ?, localidad= ?, ambito = ?, estado = ? WHERE idLocalidad = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idLocalidad,
				$data->municipio,
				$data->localidad,
				$data->ambito,
				$data->estado,
				$data->idLocalidad

				)
			);
	}
	
	//Metdod para registrar la localidad
	public function Registrar(Localidad $data)
	{
		$sql = "INSERT INTO localidades
		VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idLocalidad,
				$data->municipio,
				$data->localidad,
				$data->ambito,
				$data->estado
				)
			);
	}

	public function VerificaLocalidad($idLocalidad)
	{

		$sql= $this->pdo->prepare("SELECT * FROM localidades WHERE idLocalidad=?");
		$resultado=$sql->execute(
			array($idLocalidad)
			);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}
}