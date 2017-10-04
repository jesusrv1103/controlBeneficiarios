<?php
class Programa
{
	
	private $pdo;
	public $idPrograma;
	public $programa;

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
	public function Listar($nomPrograma)
	{
		try
		{
			//$result = array();
		    // SELECT p.idPrograma, p.programa, sum(techoPresupuestal) as suma   FROM programa p , subprograma s where p.idPrograma =  s.idPrograma group by p.idPrograma

			$stm = $this->pdo->prepare("SELECT * from programa");
			
			$stm->execute($nomPrograma);

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
			          ->prepare("SELECT * FROM programa WHERE idPrograma = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	// select * from programa WHERE programa like '%TRA%';
	
	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM programa WHERE idPrograma = ?");			          

			$stm->execute(array($id));
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
			$sql = "UPDATE programa SET 
						programa = ?
				    WHERE idPrograma = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->programa, 
                        $data->idPrograma
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	//Metdod para registrar
	public function Registrar(Programa $data)
	{
		try 
		{
		$sql = "INSERT INTO programa (programa) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->programa
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}