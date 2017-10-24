<?php
require_once 'model/localidad.php';

class LocalidadController{

 public function __CONSTRUCT(){
  $this->model = new Localidad();
}

public function Index(){
  $catalogos=true;
  $localidades=true;
  $page="view/localidad/index.php";
  require_once 'view/index.php';
}

public function Crud(){
  if(isset($_REQUEST['nuevoRegistro'])){
      $nuevoRegistro=true;
    }
  $localidad = new Localidad();
  if(isset($_REQUEST['idLocalidad'])){
    $localidad = $this->model->Obtener($_REQUEST['idLocalidad']);
  }
  $catalogos=true;
  $localidades=true;
  $page="view/localidad/localidad.php";
  require_once 'view/index.php';
}

public function Upload(){
  $archivo = $_FILES['file']['name'];
  $tipo = $_FILES['file']['type'];
  $destino = "./assets/files/localidades.xlsx";
  if(copy($_FILES['file']['tmp_name'], $destino)){
      //echo "Archivo Cargado Con Éxito" . "<br><br>";
    $this->Importar();
      //mandar llamar todas las funciones a importar
  }
  else{
   $mensaje="Error al cargar el archivo";
   $page="view/localidad/index.php";
   $localidades=true;
   $catalogos=true;
   require_once 'view/index.php';
 }
}

public function Importar(){
  if (file_exists("./assets/files/localidades.xlsx")) {
          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
          //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/localidades.xlsx';
          // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
          //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
          //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->Localidades($objPHPExcel,$numRows);
    $mensaje="Se han importado correctamente las localidades";
    $page="view/localidad/index.php";
    $localidades=true;
    $catalogos=true;
    require_once 'view/index.php';
  }
        //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>localidades.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/localidad/index.php";
    $localidades = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
}

public function Localidades($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("localidades");
  $numRow=2;
  do {
    $cat = new Localidad();
    $cat->idLocalidad = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $cat->municipio = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    $cat->localidad = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
    $cat->ambito = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
    if (!$cat->idLocalidad == null) {
      $this->model->ImportarLocalidad($cat);
    }
    $numRow+=1;
  } while ( !$cat->idLocalidad == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/localidad/index.php";
 $localidades=true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function Eliminar(){
  $this->model->Eliminar($_REQUEST['idLocalidad']);
  $localidades = true;
  $catalogos=true;
  $page="view/localidad/index.php";
  $mensaje="Se ha eliminado correctamente la localidad";
  require_once 'view/index.php';
}
public function Guardar(){
    $localidad= new Localidad();
    $localidad->idLocalidad = $_REQUEST['idLocalidad'];
    $localidad->municipio = $_REQUEST['municipio'];
    $localidad->localidad = $_REQUEST['localidad'];
    $localidad->ambito = $_REQUEST['ambito'];
    if(!isset($_REQUEST['nuevoRegistro'])){
        $this->model->Actualizar($localidad);
        $mensaje="Se han actualizado correctamente la localidad";
      }else{
        $this->model->Registrar($localidad);
        $mensaje="Se ha registrado correctamente la localidad";
      } 
    $localidad = true;
    $catalogos=true;
    $page="view/localidad/index.php";
    require_once 'view/index.php';
  }
}


