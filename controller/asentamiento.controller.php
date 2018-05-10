<?php

require_once 'model/asentamiento.php';

class AsentamientoController{

	private $model;
	private $error;
	private $mensaje;

	public function __CONSTRUCT(){
		$this->model = new Asentamiento();
	}

	public function Index(){
		$catalogos=true;
		$asentamientos=true;
		$page="view/asentamiento/index.php";
		require_once 'view/index.php';
	}

	public function Upload(){
		try {
			if(!isset($_FILES['file']['name'])){
				header('Location: ./?c=localidad');
			}
			$archivo=$_FILES['file'];
			if($archivo['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
				if($archivo['name']=="asentamientos.xlsx"){
					$nameArchivo = $archivo['name'];
					$tmp = $archivo['tmp_name'];
					$archivo['type'];
					$src = "./assets/files/".$nameArchivo;
					if(move_uploaded_file($tmp, $src)){
						$this->Importar();
					}  
				}else{
					$this->error=true;
					$this->mensaje="El nombre del archivo es invalido, porfavor verifique que el nombre del archivo sea <strong>asentamientos.xlsx</strong>";
					$this->Index();
				}
			}else{
				$this->error=true;
				$this->mensaje="El tipo de archivo es invalido, porfavor verifique que el archivo sea <strong>.xlsx</strong>";
				$this->Index();
			}
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar subir el archivo";
			$this->Index();
		}
	}

	public function Crud(){
		try {
			$asentamiento = new Asentamiento();
			if(isset($_REQUEST['nuevoRegistro'])){
				$nuevoRegistro=true;
			}
			if(isset($_REQUEST['idAsentamientos'])){
				$asentamiento = $this->model->Obtener($_REQUEST['idAsentamientos']);
			}
			$catalogos=true;
			$asentamientos=true;
			$page="view/asentamiento/asentamiento.php";
			require_once 'view/index.php';
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar obtener los datos del asentamiento";
			$this->Index();
		}
	}

	public function Importar(){
		try {
			if (file_exists("./assets/files/asentamientos.xlsx")) {
				require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
				$nombreArchivo = './assets/files/asentamientos.xlsx';
				$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
				$objPHPExcel->setActiveSheetIndex(0);
				$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
				$this->LeerArchivo($objPHPExcel,$numRows);
				$this->mensaje="Se ha leído correctamente el archivo <strong>asentamientos.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de asentamientos.";
				$page="view/asentamiento/index.php";
				$asentamientos = true;
				$catalogos=true;
				require_once 'view/index.php';
			}
			else {
				$this->error=true;
				$this->mensaje="El archivo <strong>asentamientos.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
				$page="view/asentamiento/index.php";
				$asentamientos = true;
				$catalogos=true;
				require_once 'view/index.php';
			}
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al importar los datos del asentamiento";
			$this->Index();
		}
	}

	public function LeerArchivo($objPHPExcel,$numRows){
		try{
			$this->model->Limpiar("asentamientos");
			$numRow=2;
			do {
				//echo "Entra";
				$cat = new Asentamiento();
				$cat->idAsentamientos = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
				$cat->municipio = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
				$cat->localidad = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
				$cat->nombreAsentamiento = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
				$cat->tipoAsentamiento = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
				if (!$cat->idAsentamientos == null) {
					$this->model->ImportarAsentamientos($cat);
				}
				$numRow+=1;
			} while (!$cat->idAsentamientos == null);

		}catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar leer el archivo";
			$this->Index();
		}
	}

	public function Eliminar(){
		try {
			if (isset($_POST['idAsentamientos'])){
				$this->model->Eliminar($_POST['idAsentamientos']);
				$this->mensaje="Se ha eliminado correctamente el asentamiento";
				$this->Index();
			}
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar eliminar el asentamiento";
			$this->Index();
		}
	}
	
	public function Guardar(){
		try {
			$asentamiento= new Asentamiento();
			$asentamiento->idAsentamientos = $_REQUEST['idAsentamientos'];
			$verificaAsentamiento = $this->model->VerificaAsentamiento($asentamiento->idAsentamientos);
			$asentamiento->municipio = $_REQUEST['municipio'];
			$asentamiento->localidad = $_REQUEST['localidad'];
			$asentamiento->nombreAsentamiento = $_REQUEST['nombreAsentamiento'];
			$asentamiento->tipoAsentamiento = $_REQUEST['tipoAsentamiento'];
			if($verificaAsentamiento!=null && isset($_REQUEST['nuevoRegistro'])){
				$error=true;
				$asentamientos = true;
				$catalogos=true;
				$nuevoRegistro=true;
				$this->mensaje="La clave de asentamiento <b>$asentamiento->idAsentamientos</b> ya existe. Pongase en contacto con el administrador de la Unidad de Planeación para que le proporcione correctamente una nueva clave de asentamiento.";
				$page="view/asentamiento/asentamiento.php";
				require_once "view/index.php";
			}
			else{
				if(!isset($_REQUEST['nuevoRegistro'])){
					$this->model->Actualizar($asentamiento);
					$this->mensaje="Se han actualizado correctamente los datos del asentamiento";
				}else{
					$this->model->Registrar($asentamiento);
					$this->mensaje="Se ha registrado correctamente el asentamiento";
				}
				$this->Index();
			}
		} catch (Exception $e) {
			$this->error=true;
			$this->mensaje="Ha ocurrido un error al intentar guardar el asentamiento";
			$this->Index();
		}
	}
}
