<?php
require_once 'model/apoyos.php';

class ApoyosController{

  private $model;
  private $session;
  public $error;

  public function __CONSTRUCT(){
    $this->model = new Apoyos();
  }
  public function Index(){
   $administracion = true;
   $apoyos = true;
   $page="view/apoyos/index.php";
   require_once 'view/index.php';
 }
 public function Crud(){
  if(isset($_REQUEST['nuevoRegistro'])){
    $nuevoRegistro=true;
  }
  $apoyo = new Apoyo();
  if(isset($_REQUEST['idApoyo'])){
    $apoyo = $this->model->Obtener($_REQUEST['idApoyo']);
  }
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/apoyos/apoyos.php";
  require_once 'view/index.php';
}
public function Eliminar(){
  $this->model->Eliminar($_REQUEST['idApoyo']);
  $administracion = true;
  $apoyos = true;
  $page="view/apoyos/index.php";
  $mensaje="Se ha eliminado correctamente el apoyo";
  require_once 'view/index.php';
}
public function Guardar(){
  $apoyo= new Apoyos();
  $apoyo->idApoyo = $_REQUEST['idApoyo'];
  $apoyo->curp = $_REQUEST['curp'];
  $apoyo->idOrigen = $_REQUEST['idOrigen'];
  $apoyo->idPrograma = $_REQUEST['idPrograma'];
  $apoyo->idSubprograma = $_REQUEST['idSubprograma'];
  $apoyo->idTipoApoyo = $_REQUEST['idTipoApoyo'];
  $apoyo->idCaracteristica = $_REQUEST['idCaracteristica'];
  $apoyo->importeApoyo = $_REQUEST['importeApoyo'];
  $apoyo->numeroApoyo = $_REQUEST['numeroApoyo'];
  $apoyo->fechaUltimoApoyo = $_REQUEST['fechaUltimoApoyo'];
  $apoyo->idPeriodicidad = $_REQUEST['idPeriodicidad'];
  $apoyo->apoyoEconomico = $_REQUEST['apoyoEconomico'];
  if(!isset($_REQUEST['nuevoRegistro'])){
    $this->model->Actualizar($apoyo);
    $mensaje="Se han actualizado correctamente los datos del Apoyo";
  }else{
    $this->model->Registrar($apoyo);
    $mensaje="Se han registrado correctamente los datos del Apoyo";
  } 
  $administracion = true;
  $apoyos = true;
  $page="view/apoyos/index.php";
  require_once 'view/index.php';
}
public function Importar(){
  if (file_exists("./assets/files/apoyos.xlsx")) {
          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
          //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/apoyos.xlsx';
          // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
          //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
          //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->Apoyos($objPHPExcel,$numRows);
    $mensaje="Se ha leído correctamente el archivo <strong>apoyos.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de Apoyos.";
    $page="view/apoyos/index.php";
    $administracion=true;
    $apoyos=true;
    require_once 'view/index.php';
  }
        //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>apoyos.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/apoyos/index.php";
    $administracion = true;
    $apoyos=true;
    require_once 'view/index.php';
  }
}

public function Apoyos($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("apoyos");
  $numRow=2;
  do {
    $apoyos = new Apoyos();
    $apoyos->curp = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $apoyos->idOrigen = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    $apoyos->idPrograma = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
    $apoyos->idSubprograma = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
    $apoyos->idTipoApoyo = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
    $apoyos->idCaracteristica = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
    $apoyos->importeApoyo = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
    $apoyos->numeroApoyo = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
    $apoyos->fechaUltimoApoyo = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
    $apoyos->idPeriodicidad = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
    $apoyos->apoyoEconomico = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
    $apoyos->idProgramaSocial = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();
    if (!$apoyos->curp == null) {
      $this->model->ImportarApoyo($apoyos);
    }
    $numRow+=1;
  } while ( !$apoyos->curp == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/apoyos/index.php";
 $administracion=true;
 $apoyos=true;
 require_once 'view/index.php';
}
}
}

