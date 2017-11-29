<?php
require_once 'model/direccion.php';

class DireccionController{

  private $model;
  public $error;

  //Constructor
  public function __CONSTRUCT(){
    $this->model = new Direccion();
  }
  //Index 
  public function Index(){
    $administracion=true; 
    $direcciones=true; 
   $page="view/direccion/index.php"; //Vista principal donde se enlistan los programas
   require_once 'view/index.php';
 } 
 public function Crud(){
   $direccion = new Direccion();
   if(isset($_REQUEST['nuevoRegistro'])){
    $nuevoRegistro=true;
  }
  if(isset($_REQUEST['idDireccion'])){
    $direccion = $this->model->Obtener($_REQUEST['idDireccion']);
 // echo $_REQUEST['idDireccion'];
  }
  $administracion=true;
  $direcciones=true;
  $page="view/direccion/direccion.php";
  require_once 'view/index.php';
}
public function Importar(){
  if (file_exists("./assets/files/direcciones.xlsx")) {

          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
        //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/direcciones.xlsx';
        // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
        //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
        //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->Direcciones($objPHPExcel,$numRows);
    $mensaje="Se ha leído correctamente el archivo <strong>direcciones.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de direcciones.";
    $page="view/direccion/index.php";
    $direcciones = true;
    $administracion=true;
    require_once 'view/index.php';
  }
        //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>direcciones.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/direccion/index.php";
    $direcciones = true;
    $administracion=true;
    require_once 'view/index.php';
  }
}
public function Direcciones($objPHPExcel,$numRows){
  try{
    $this->model->Limpiar("direccion");
    $numRow=2;
    do {
      
      $cat = new Direccion();
      $cat->direccion = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
      $cat->descripcion = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
      $cat->titular = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
      $cat->estado="ACTIVO";
      if (!$cat->direccion == null) {
       $this->model->Check(0);
       $this->model->ImportarDirecciones($cat);
       $this->model->Check(1);
     }
     $numRow+=1;
   } while (!$cat->direccion == null);

 }catch (Exception $e) {
  $mensaje="error";
  $page="view/direccion/index.php";
  $direcciones = true;
  $administracion=true;
  require_once 'view/index.php';
}
}
public function Eliminar(){
  if (isset($_POST['idDireccion'])){
   $this->model->Eliminar($_POST['idDireccion']);
   $administracion=true;
   $direcciones=true;
   $mensaje="La dirección se ha dado correctamente de baja";
   $page="view/direccion/index.php";
   require_once 'view/index.php';
 }
}
public function Guardar(){
  $direccion= new Direccion();
  $direccion->idDireccion = $_REQUEST['idDireccion'];
  $direccion->direccion = $_REQUEST['direccion'];
  $direccion->descripcion = $_REQUEST['descripcion'];
  $direccion->titular = $_REQUEST['titular'];
  $direccion->estado = "ACTIVO";
  if($direccion->idDireccion > 0){
    $this->model->Actualizar($direccion);
    $mensaje="Se han actualizado correctamente los datos de la dirección <strong>$direccion->direccion</strong>";
  } else {
    $this->model->Registrar($direccion);
    $mensaje="Se ha registrado correctamente los datos de la dirección <strong>$direccion->direccion</strong>";
  } 
  $direcciones = true;
  $administracion=true; 
  $page="view/direccion/index.php";
  require_once 'view/index.php';
}
}
