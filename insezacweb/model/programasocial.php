<?php
require_once 'model/database.php';
class ProgramaSocial{

	private $pdo;
	public $idprogramaSocial;
	public $idDependencia;
	public $nombreProgramaSocial;
	public $cvePadron;

	public function __CONSTRUCT(){
		try {
			$this->pdo =Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Listar(){
		try {
			$stm = $this->pdo->prepare("SELECT * from programaSocial");
			$stm->execute();	
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} 
		catch (Exception $e) {
			die($e->getMessage());	
		}
	}
	public function Obtener($id){
		try {
			$stm= $this->pdo->prepare("SELECT * FROM programaSocial WHERE idprogramaSocial = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());	
		}
	}
	public function Registrar(ProgramaSocial $data){
		try {
			$stm= $this->pdo->prepare("INSERT INTO programaSocial(idDependencia,nombreProgramaSocial,cvePadron) VALUES (7,?,?)");
			$this->pdo->prepare($stm)->execute(array(
				$data->idDependencia,
				$data->nombreProgramaSocial,
				$data->cvePadron
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Eliminar($id){
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM programaSocial WHERE idprogramaSocial = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar($data){
		try {
			$sql="UPDATE programaSocial SET idDependencia = ?, nombreProgramaSocial = ?, cvePadron = ? WHERE idprogramaSocial = ?";
			$this->pdo->prepare($sql)->execute(array(
				$data->idDependencia,
				$data->nombreProgramaSocial,
				$data->cvePadron,
				$data->idprogramaSocial
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Limpiar($nomTabla){
		try {
			$stm=$this->pdo->prepare("DELETE FROM $nomTabla");
			$stm->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function ImportarProgramaSocial(ProgramaSocial $data){
		try {
			$sql=$this->pdo->prepare("INSERT INTO programaSocial VALUES(?,?,?,?)");
			$result=$sql->execute(array(
				null,
				$data->idDependencia,
				$data->nombreProgramaSocial,
				$data->cvePadron
				)
			);
		} catch (Exception $e) {
			
		}
	}}
