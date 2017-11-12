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
    $catalogos=true; //variable cargada para activar la opcion administracion en el menu
    $direccion=true; //variable cargada para activar la opcion programas en el menu
   $page="view/direccion/index.php"; //Vista principal donde se enlistan los programas
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
 $direccion = new Direccion();

 if(isset($_REQUEST['idDireccion'])){
  $direccion = $this->model->Obtener($_REQUEST['idDireccion']);
  echo $_REQUEST['idDireccion'];
}
$catalogos=true;
$dir=true;
$page="view/direccion/direccion.php";
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

  $direccion= new Direccion();
  $direccion->idDireccion = $_REQUEST['idDireccion'];
  $direccion->estado='Inactivo';
  $this->model->Eliminar($direccion);
  $catalogos=true;
  $direccion=true;
  $mensaje="Eliminacion exitosa";
  $page="view/direccion/index.php";
  require_once 'view/index.php';
  
}




public function Guardar(){
  $direccion= new Direccion();
  $direccion->idDireccion = $_REQUEST['idDireccion'];
  $direccion->nombreDireccion = $_REQUEST['nombreDireccion'];
  $direccion->descripcionDireccion = $_REQUEST['descripcionDireccion'];
  $direccion->titular = $_REQUEST['titular'];
  $direccion->estado = "Activo";

  if($programa->idPrograma > 0){

    $this->model->Actualizar($direccion);
    $mensaje="Se han actualizado correctamente los datos de la Direccion";
  } else {
    $this->model->Registrar($direccion);
    $mensaje="Se ha registrado correctamente los datos de la  Direccion";
  } 


  $direccion = true;
  $catalogos=true; 
  $page="view/direccion/index.php";
  require_once 'view/index.php';
}



}
