<?php

require_once 'model/asentamiento.php';

class AsentamientoController{

	private $model;

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
		$archivo = $_FILES['file']['name'];
		$tipo = $_FILES['file']['type'];
		$destino = "./assets/files/asentamientos.xlsx";
		if(copy($_FILES['file']['tmp_name'], $destino)){
    //echo "Archivo Cargado Con Éxito" . "<br><br>";
			$this->Importar();
    //mandar llamar todas las funciones a importar
		}
		else{
			$mensaje="Error al cargar el archivo";
			$page="view/asentamiento/index.php";
			$asentamientos = true;
			$catalogos=true;
			require_once 'view/index.php';
		}
	}

	public function Crud(){
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
	}

	public function Importar(){
		if (file_exists("./assets/files/asentamientos.xlsx")) {
        	//Agregamos la librería 
			require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
  			//Variable con el nombre del archivo
			$nombreArchivo = './assets/files/asentamientos.xlsx';
  			// Cargo la hoja de cálculo
			$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
  			//Asigno la hoja de calculo activa
			$objPHPExcel->setActiveSheetIndex(0);
  			//Obtengo el numero de filas del archivo
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
			$this->Asentamientos($objPHPExcel,$numRows);
			$mensaje="Se ha leído correctamente el archivo <strong>asentamientos.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de asentamientos.";
			$page="view/asentamiento/index.php";
			$asentamientos = true;
			$catalogos=true;
			require_once 'view/index.php';
		}
        //si por algo no cargo el archivo bak_ 
		else {
			$error=true;
			$mensaje="El archivo <strong>asentamientos.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
			$page="view/asentamiento/index.php";
			$asentamientos = true;
			$catalogos=true;
			require_once 'view/index.php';
		}
	}

	public function Asentamientos($objPHPExcel,$numRows){
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
			$mensaje="error";
			$page="view/asentamiento/index.php";
			$asentamientos = true;
			$catalogos=true;
			require_once 'view/index.php';
		}
	}

	public function Eliminar(){
		if (isset($_POST['idAsentamientos'])){
			//echo $_POST['idAsentamientos'];
			$catalogos=true;
			$asentamientos=true;
			$mensaje="success";
			$page="view/asentamiento/index.php";
			require_once 'view/index.php';
		}
	}
	public function Guardar(){
		$asentamiento= new Asentamiento();
		$asentamiento->idAsentamientos = $_REQUEST['idAsentamientos'];
		$asentamiento->municipio = $_REQUEST['municipio'];
		$asentamiento->localidad = $_REQUEST['localidad'];
		$asentamiento->nombreAsentamiento = $_REQUEST['nombreAsentamiento'];
		$asentamiento->tipoAsentamiento = $_REQUEST['tipoAsentamiento'];
		if(!isset($_REQUEST['nuevoRegistro'])){
				$this->model->Actualizar($asentamiento);
				$mensaje="Se han actualizado correctamente los datos del Asentamiento";
			}else{
				$this->model->Registrar($asentamiento);
				$mensaje="Se ha registrado correctamente el Asentamiento";
			}	
		$asentamientos = true;
		$catalogos=true; 
		$page="view/asentamiento/index.php";
		require_once 'view/index.php';
	}


}