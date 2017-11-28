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
			//$result = array();
		    // SELECT p.idMunicipio, p.Municipio, sum(techoPresupuestal) as suma   FROM Municipio p , subMunicipio s where p.idMunicipio =  s.idMunicipio group by p.idMunicipio

			$stm = $this->pdo->prepare("SELECT * from municipio WHERE estado ='Activo' ORDER BY idMunicipio DESC;");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
public function ImportarMunicipio(Municipio $data){
		try 
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
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM municipio WHERE idMunicipio = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	// select * from Municipio WHERE Municipio like '%TRA%';


	public function Eliminar(Municipio $data)
	{
		try 
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
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	//Metodo para actualizar
	public function Actualizar($data)
	{
		try 
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
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	//Metdod para registrar
	public function Registrar(Municipio $data)
	{
		try 
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
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}