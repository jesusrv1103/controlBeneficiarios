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
			$stm = $this->pdo->prepare("SELECT * from direccion where estado='ACTIVO'");
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

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM direccion WHERE idDireccion = ?");			          

			$stm->execute(array($id));
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
	public function Limpiar($nomTabla)
	{
		try 
		{
			
			$stm = $this->pdo->prepare("DELETE FROM $nomTabla");			          
			$stm->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarDirecciones(Direccion $data){
		try 
		{
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

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Check($valor)
	{
		try 
		{
			if ($valor==0) {
				$stm=$this->pdo->prepare("SET GLOBAL FOREIGN_KEY_CHECKS=0");
			$stm->execute();
			}else{
			$stm=$this->pdo->prepare("SET GLOBAL FOREIGN_KEY_CHECKS=1");
			$stm->execute();
		}
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function VerificaDireccion($direccion)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM direccion WHERE direccion=?");
			$stm->execute(
				array($direccion)
			);
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}