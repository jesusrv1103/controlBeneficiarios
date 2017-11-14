<?php
require_once 'model/database.php';
class Direccion
{
	private $pdo;
	public $idDireccion;
	public $direccion;
	public $descripcion;
	public $titular;


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


		//Metdodo para listar
	public function Listar()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * from direccion where estado='Activo'");
			
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
			->prepare("SELECT * FROM direccion WHERE idDireccion = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar(Direccion $data)
	{
		try 
		{
			$sql = "UPDATE direccion SET 
			estado = ?
			WHERE idDireccion = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->estado,
					$data->idDireccion
					
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar(Direccion $data)
	{
		try 
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
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	//Metdod para registrar
	public function Registrar(Direccion $data)
	{
		try 
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
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}