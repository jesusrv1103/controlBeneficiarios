<?php
class Usuario
{
	public $idUsuario;
	public $usuario;
	public $password;
	public $tipoUsuario;
	public $direccion;
	private $pdo;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function Listar()
	{
		$usuario = $_SESSION['usuario'];
		$stm = $this->pdo->prepare("SELECT * from usuarios WHERE usuario = '$usuario'");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarSuS()
	{
		$usuario = $_SESSION['usuario'];
		$stm = $this->pdo->prepare("SELECT * from usuarios WHERE usuario != '$usuario'");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Obtener($id)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM usuarios WHERE idUsuario = ? ");

		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function VerificaUsuario($username)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM usuarios WHERE usuario=?");
		$stm->execute(
			array($username)
			);
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM usuarios WHERE idUsuario = ?");

		$stm->execute(array($id));
	}

	public function Actualizar(Usuario $data)
	{
		$sql = "UPDATE usuarios SET
		usuario = ?, password = ?, tipoUsuario = ? ,direccion =?

		WHERE idUsuario = ?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->usuario,
				$data->password,
				$data->tipoUsuario,
				$data->direccion,
				$data->idUsuario
				)
			);
	}
	public function ActualizaSP(Usuario $data)
	{
		$sql = "UPDATE usuarios SET
		usuario = ?, direccion =?, tipoUsuario = ?
		WHERE idUsuario = ?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->usuario,
				$data->direccion,
				$data->tipoUsuario,
				$data->idUsuario
				)
			);
	}
	
	public function Registrar(Usuario $data)
	{
		$sql = "INSERT INTO usuarios
		VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->usuario,
				$data->password,
				$data->tipoUsuario,
				$data->direccion
				)
			);
	}

	public function ObtenerUsuario($idUsuario)
	{
		$sql= $this->pdo->prepare("SELECT * FROM usuarios WHERE idUsuario=?");
		$resultado=$sql->execute(
			array(
				$idUsuario
				)
			);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ObtenerDireccion($idDireccion)
	{
		$sql= $this->pdo->prepare("SELECT * FROM direccion WHERE idDireccion=?");
		$resultado=$sql->execute(
			array(
				$idDireccion
				)
			);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

			//Metdodo para listar
	public function ConsultarDirecciones()
	{

		$stm = $this->pdo->prepare("SELECT * from direccion WHERE estado='activo'");

		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
}
