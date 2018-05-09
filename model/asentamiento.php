<?php
class Asentamiento
{
	private $pdo;
	public $idAsentamientos;
	public $municipio;
	public $localidad;
	public $nombreAsentamiento;
	public $tipoAsentamiento;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function Listar()
	{
		$stm = $this->pdo->prepare("SELECT * FROM asentamientos");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ImportarAsentamientos(Asentamiento $data)
	{
		$sql= $this->pdo->prepare("INSERT INTO asentamientos VALUES (?,?,?,?,?)");
		$resultado=$sql->execute(
			array(
				$data->idAsentamientos,
				$data->municipio,
				$data->localidad,
				$data->nombreAsentamiento,
				$data->tipoAsentamiento
			)
		);
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
		->prepare("SELECT * FROM asentamientos WHERE idAsentamientos = ?");


		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM asentamientos WHERE idAsentamientos = ?");

		$stm->execute(array($id));
	}

	public function Actualizar(Asentamiento $data)
	{
		$sql = "UPDATE asentamientos SET
		municipio = ?, localidad= ?, nombreAsentamiento =?, tipoAsentamiento = ?
		WHERE idAsentamientos = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->municipio,
				$data->localidad,
				$data->nombreAsentamiento,
				$data->tipoAsentamiento,
				$data->idAsentamientos
			)
		);
	}

	public function Registrar(Asentamiento $data)
	{
		$sql = "INSERT INTO asentamientos
		VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idAsentamientos,
				$data->municipio,
				$data->localidad,
				$data->nombreAsentamiento,
				$data->tipoAsentamiento,

			)
		);
	}
	
	public function VerificaAsentamiento($idAsentamientos)
	{
		$sql= $this->pdo->prepare("SELECT * FROM asentamientos WHERE idAsentamientos=?");
		$resultado=$sql->execute(
			array($idAsentamientos)
		);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}
}
