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
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar()
	{
		try
		{
			$usuario = $_SESSION['usuario'];
			$stm = $this->pdo->prepare("SELECT * from usuarios WHERE usuario = '$usuario'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarSuS()
	{
		try
		{
			$usuario = $_SESSION['usuario'];
			$stm = $this->pdo->prepare("SELECT * from usuarios WHERE usuario != '$usuario'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener($id)
	{
		try
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM usuarios WHERE idUsuario = ? ");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function VerificaUsuario($username)
	{
		try
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM usuarios WHERE usuario=?");
			$stm->execute(
				array($username)
			);
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo
			->prepare("DELETE FROM usuarios WHERE idUsuario = ?");

			$stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function EliminarInDB($usuario)
	{
		try
		{
			$stm = $this->pdo
			->prepare("drop user ? @'localhost'");
			$stm->execute(
				array(
					$usuario
				)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Actualizar(Usuario $data)
	{
		try
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
		} catch (Exception $e)
		{
			$error=true;
			$mensaje="Error al actualizar el usuario";
			$page="view/usuario/index.php";
			require_once "view/index.php";
		}
	}
	public function ActualizaSP(Usuario $data)
	{
		try
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
		} catch (Exception $e)
		{
			$error=true;
			$mensaje="Error al actualizar el usuario";
			$page="view/usuario/index.php";
			require_once "view/index.php";
		}
	}
	public function ActualizarInDB(Usuario $data,$password)
	{
		try
		{
			$sql = "set password for $data->usuario@'localhost'=password('$password')";
			$this->pdo->prepare($sql)
			->execute();
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Registrar(Usuario $data)
	{
		try
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
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function RegistrarInDB(Usuario $data)
	{
		try
		{
			$sql = "grant all privileges on insezac.* to ?@'localhost' identified by ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->usuario,
					$data->password,
				)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerUsuario($idUsuario)
	{
		try
		{
			$sql= $this->pdo->prepare("SELECT * FROM usuarios WHERE idUsuario=?");
			$resultado=$sql->execute(
				array(
					$idUsuario
				)
			);
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerDireccion($idDireccion)
	{
		try
		{
			$sql= $this->pdo->prepare("SELECT * FROM direccion WHERE idDireccion=?");
			$resultado=$sql->execute(
				array(
					$idDireccion
				)
			);
			return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

			//Metdodo para listar
	public function ConsultarDirecciones()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * from direccion WHERE estado='activo'");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}
