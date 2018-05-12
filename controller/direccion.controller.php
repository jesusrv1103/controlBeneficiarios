<?php
require_once 'model/direccion.php';

class DireccionController{

  private $model;
  public $error;
  private $mensaje;

  public function __CONSTRUCT(){
    $this->model = new Direccion();
  }

  public function Index(){
    $administracion=true;
    $direcciones=true;
    $page="view/direccion/index.php"; 
    require_once 'view/index.php';
  }

  public function Crud(){
    try {
      $direccion = new Direccion();
      if(isset($_REQUEST['nuevoRegistro'])){
        $nuevoRegistro=true;
      }
      if(isset($_REQUEST['idDireccion'])){
        $direccion = $this->model->Obtener($_REQUEST['idDireccion']);
      }
      $administracion=true;
      $direcciones=true;
      $page="view/direccion/direccion.php";
      require_once 'view/index.php';
    } catch (Exception $e) {

    }
  }

  public function Upload(){
    try {
      if(!isset($_FILES['file']['name'])){
        header('Location: ./?c=direccion');
      }
      $archivo=$_FILES['file'];
      if($archivo['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
        if($archivo['name']=="direcciones.xlsx"){
          $nameArchivo = $archivo['name'];
          $tmp = $archivo['tmp_name'];
          $archivo['type'];
          $src = "./assets/files/".$nameArchivo;
          if(move_uploaded_file($tmp, $src)){
            $this->Importar();
          }  
        }else{
          $this->error=true;
          $this->mensaje="El nombre del archivo es invalido, porfavor verifique que el nombre del archivo sea <strong>direcciones.xlsx</strong>";
          $this->Index();
        }
      }else{
        $this->error=true;
        $this->mensaje="El tipo de archivo es invalido, porfavor verifique que el archivo sea <strong>.xlsx</strong>";
        $this->Index();
      }
    } catch (Exception $e) {
     $this->error=true;
     $this->mensaje="Se ha producido un error al intentar subir el archivo";
     $this->Index();
   }
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
    $this->LeerArchivo($objPHPExcel,$numRows);
    $this->mensaje="Se ha leído correctamente el archivo <strong>direcciones.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de direcciones.";
    $this->Index();
  } else {
    $this->error=true;
    $this->mensaje="El archivo <strong>direcciones.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $this->Index();
  }
}

public function LeerArchivo($objPHPExcel,$numRows){
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
       //$this->model->Check(0);
       $this->model->ImportarDirecciones($cat);
      // $this->model->Check(1);
     }
     $numRow+=1;
   } while (!$cat->direccion == null);

 }catch (Exception $e) {
  $this->error=true;
  $this->mensaje="Ha ocurrido un error al leer el archivo";
  $this->Index();
}
}

public function Eliminar(){
  try {
    $this->model->Eliminar($_POST['idDireccion']);
    $this->mensaje="La dirección se ha dado correctamente de baja";
    $this->Index();
  } catch (Exception $e) {
    $this->error=true;
    $this->mensaje="Ha ocurrido un error al intentar eliminar la dirección";
    $this->Index();
  }
}

public function Guardar(){
  try {
    $direccion= new Direccion();
    $direccion->idDireccion = $_REQUEST['idDireccion'];
    $direccion->direccion = $_REQUEST['direccion'];
    $direccion->descripcion = $_REQUEST['descripcion'];
    $direccion->titular = $_REQUEST['titular'];
    $direccion->estado = "ACTIVO";
    if($direccion->idDireccion > 0){
      $this->model->Actualizar($direccion);
      $this->mensaje="Se han actualizado correctamente los datos de la dirección <strong>$direccion->direccion</strong>";
    } else {
      $consulta=$this->model->VerificaDireccion($direccion->direccion);
      if ($consulta==null) {
       $this->model->Registrar($direccion);
       $this->mensaje="Se ha registrado correctamente los datos de la dirección <strong>$direccion->direccion</strong>";
     }else{
      $this->error=true;
      $this->mensaje="La dirección <b>$direccion->direccion</b> ya existe, ingrese otro nombre de dirección";
      $page="view/direccion/direccion.php";
      require_once "view/index.php";
    }
  }
  $this->Index();
} catch (Exception $e) {
 $this->error=true;
 $this->mensaje="Ha ocurrido un error al intentar guardar la dirección";
 $this->Index();
}
}
}
