<?php
require_once 'model/programasocial.php';
class ProgramasocialController{
	private $model;
	public $error;
	public function _CONSTRUCT(){
		$this->model = new ProgramaSocial();
	}
	public function Index(){
		$administracion=true;
		$programasocial=true;
		$page="view/programasocial/index.php";
		require_once 'view/index.php';
	}
	public function Crud(){
		$programasocial= new ProgramaSocial();
		if (isset($_REQUEST['idprogramaSocial'])) {
			$programasocial= $this->model->Obtener($_REQUEST['idprogramaSocial']);
			echo $_REQUEST['idprogramaSocial'];
		}
		$administracion=true;
		$programasocial=true;
		$page="view/programasocial.php";
		require_once "view/index.php";
	}
public function Guardar(){
	$programasocial= new ProgramaSocial();
	$programasocial->idprogramaSocial = $_REQUEST['idprogramaSocial'];
	$programasocial->idDependencia = $_REQUEST['idDependencia'];
	$programasocial->nombreProgramaSocial = $_REQUEST['nombreProgramaSocial'];
	$programasocial->cvePadron = $_REQUEST['cvePadron'];
	if ($programasocial->idprogramaSocial > 0) {
		$this->model->Actualizar($programasocial);
		$mensaje="Se han Actualizado correctamente los datos del programa social <strong>$programasocial->programasocial</strong>";
	}else{
		$this->model->Registrar($programasocial);
		$mensaje="Se ha registrado correctamente los datos del programa social <strong>$programasocial->programasocial</strong>";
	}
	$administracion=true;
	$programasocial=true;
	$page="view/programasocial/index.php";
	require_once 'view/index.php';
}
public function Eliminar(){
	$this->model->Eliminar($_REQUEST['idprogramaSocial']);
	$administracion=true;
	$programasocial=true;
	$page="view/programasocial/index.php";
	require_once 'view/index.php';
}
public function Importar(){
  if (file_exists("./assets/files/programasocial.xlsx")) {

          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
    //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/programasocial.xlsx';
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
   // $this->model->Check(0);
    $this->ProgramaSocial($objPHPExcel,$numRows);
  //  $this->model->Check(1);
    $mensaje="Se ha leído correctamente el archivo <strong>programasocial.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los programasociales.";
    $page="view/programasocial/index.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
          //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>programasocial.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/programasocial/programasocial.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
}
public function ProgramaSocial($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("programaSocial");
  $numRow=2;

  do {
         //echo "Entra";
    $progs = new ProgramaSocial();
    $progs->idDependencia = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $progs->nombreProgramaSocial = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
     $progs->cvePadron = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
    if (!$progs->idDependencia == null) {

      $this->model->ImportarProgramaSocial($progs);

    }
    $numRow+=1;
  } while ( !$progs->idDependencia == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de Programa Social.";
 $page="view/programasocial/programasocial.php";
 //$beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
}