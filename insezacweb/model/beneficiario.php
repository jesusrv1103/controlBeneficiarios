<?php
class Beneficiario
{
	private $pdo;
	private $idBeneficiario;
	private $curp;
	private $primerApellido;
	private $segundoApellido;
	private $nombres;
	private $idIdentificacion;
	private $idTipoVialidad;
	private $nombreVialidad;
	private $noExterior;
	private $claveAsentamiento;
	private $claveLocalidad;
	private $entreVialidades;
	private $descripcionUbicacion;
	private $estudioSocioeconomico;
	private $estadoCivil;
	private $jefeFamilia;
	private $ocupacion;
	private $ingresoMensual;
	private $integrantesFamilia;
	private $dependientesEconomicos;
	private $vivienda;
	private $noHabitantes;
	private $viviendaElectricidad;
	private $viviendaAgua;
	private $viviendaDrenaje;
	private $viviendaGas;
	private $viviendaTelefono;
	private $viviendaInternet;
	private $nivelEstudios;
	private $tipoSeguridadSocial;
	private $discapacidad;
	private $grupoVulnerable;
	private $beneficiarioColectivo;



	
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
	public function Importar(Beneficiario $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO beneficiarios  VALUES(?,?,?,?)");
			$resultado=$sql->execute(
				array(
					null,
					$data->nombre,
					$data->precio,
					$data->existencia
				)
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$stm = $this->pdo->prepare("select b.idBeneficiario, 
			  b.curp, 
			  b.primerApellido, 
			  b.segundoApellido,
			  b.nombres, 
			  idOf.identificacion as nomTipoI, 
			  tV.tipoVialidad, 
			  eC.estadoCivil, 
			  o.ocupacion, 
			  iM.ingresoMensual,
			  v.vivienda, 
			  nE.nivelEstudios, 
			  sS.seguridadSocial,
			  d.discapacidad, 
			  gV.grupoVunerable,
			  a.nombreAsentamiento, 
			  l.localidad 
			  from identificacionOficial idOf, 
			  tipoVialidad tV, estadoCivil eC, 
			  ocupacion o, vivienda v, 
			  nivelEstudio nE,
			  seguridadSocial sS, 
			  discapacidad d, 
			  grupoVulnerable gV, 
			  asentamientos a, localidades l, 
			  ingresoMensual iM, beneficiarios  b
			    where  b.idIdentificacion = idOf.idIdentificacion AND   
			   	b.idTipoVialidad = tV.idTipoVialidad AND 	
				b.estadoCivil = eC.idEstadoCivil AND 
			    b.ocupacion = o.idOcupacion AND 
			    b.ingresoMensual = iM.idIngresoMensual AND 
			    b.vivienda =  v.idVivienda AND   
			    b.nivelEstudios = nE.idNivelEstudios AND  
			    b.tipoSeguridadSocial = sS.idSeguridadSocial AND  
			    b.discapacidad = d.idDiscapacidad AND  
			   	b.grupoVulnerable =gV.idGrupoVulnerable AND 
			    b.claveAsentamiento = a.idAsentamientos AND 
			    b.claveLocalidad = l.idLocalidad");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



	public function ListarDatosPersonales()
	{
		try
		{
			$stm = $this->pdo->prepare("select b.idBeneficiario, 
			  b.curp, 
			  b.primerApellido, 
			  b.segundoApellido,
			  b.nombres, 
			  idOf.identificacion AS nombreId
			  from identificacionOficial idOf, 
			  tipoVialidad tV, estadoCivil eC, 
			  ocupacion o, vivienda v, 
			  nivelEstudio nE,
			  seguridadSocial sS, 
			  discapacidad d, 
			  grupoVulnerable gV, 
			  asentamientos a, localidades l, 
			  ingresoMensual iM, beneficiarios  b
			    where  b.idIdentificacion = idOf.idIdentificacion AND   
			   	b.idTipoVialidad = tV.idTipoVialidad AND 	
				b.estadoCivil = eC.idEstadoCivil AND 
			    b.ocupacion = o.idOcupacion AND 
			    b.ingresoMensual = iM.idIngresoMensual AND 
			    b.vivienda =  v.idVivienda AND   
			    b.nivelEstudios = nE.idNivelEstudios AND  
			    b.tipoSeguridadSocial = sS.idSeguridadSocial AND  
			    b.discapacidad = d.idDiscapacidad AND  
			   	b.grupoVulnerable =gV.idGrupoVulnerable AND 
			    b.claveAsentamiento = a.idAsentamientos AND 
			    b.claveLocalidad = l.idLocalidad");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



	public function ListarIdentificaciones()
	{
		try
		{
			$stm = $this->pdo->prepare("select * from identificacionOficial");
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListaDiscapacidad()
	{
		try
		{
			$stm = $this->pdo->prepare("select * from discapacidad");
			
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
			->prepare("SELECT * FROM beneficiarios WHERE idBeneficiario = ?");


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
				->prepare("DELETE FROM beneficiarios WHERE idBeneficiario = ?");			          
	
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


	public function Registrar(Beneficiario $data)
	{
		try 
		{
			$sql = "INSERT INTO beneficiarios (curp,primerApellido,segundoApellido,nombres,idIdentificacion) 
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








  