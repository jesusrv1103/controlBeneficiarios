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
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $direccion=true; //variable cargada para activar la opcion programas en el menu
   $page="view/direccion/index.php"; //Vista principal donde se enlistan los programas
   require_once 'view/index.php';
 } 

 public function Upload(){
  $archivo = $_FILES['file']['name'];
  $tipo = $_FILES['file']['type'];
  $destino = "./assets/files/direcciones.xlsx";
  if(copy($_FILES['file']['tmp_name'], $destino)){
    //echo "Archivo Cargado Con Éxito" . "<br><br>";
    $this->Importar();
    //mandar llamar todas las funciones a importar
  }
  else{
    $mensaje="Error al cargar el archivo";
    $page="view/direccion/index.php";
    $direccion = true;
    $administracion=true;
    require_once 'view/index.php';
  }
}

public function Crud(){
 $direccion = new Direccion();

 if(isset($_REQUEST['idDireccion'])){
  $direccion = $this->model->Obtener($_REQUEST['idDireccion']);
  echo $_REQUEST['idDireccion'];
}
$administracion=true;
$dir=true;
$page="view/direccion/direccion.php";
require_once 'view/index.php';
}

public function Importar(){
  if (file_exists("./assets/files/direcciones.xlsx")) {
    echo "Enra";
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
    $this->direcciones($objPHPExcel,$numRows);
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
    $direccion = true;
    $administracion=true;
    require_once 'view/index.php';
  }
}

public function direcciones($objPHPExcel,$numRows){
  try{
    $this->model->Limpiar("direcciones");
    $numRow=2;
    do {
            //echo "Entra";
      $cat = new Direccion();
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
    $page="view/direccion/index.php";
    $direcciones = true;
    $administracion=true;
    require_once 'view/index.php';
  }
}

public function Eliminar(){

  $direccion= new Direccion();
  $direccion->idDireccion = $_REQUEST['idDireccion'];
  $direccion->estado='Inactivo';
  $this->model->Eliminar($direccion);
  $administracion=true;
  $direcciones=true;
  $mensaje="La dirección se ha dado correctamente de baja";
  $page="view/direccion/index.php";
  require_once 'view/index.php';
  
}

public function Guardar(){
  $direccion= new Direccion();
  $direccion->idDireccion = $_REQUEST['idDireccion'];
  $direccion->direccion = $_REQUEST['direccion'];
  $direccion->descripcion = $_REQUEST['descripcion'];
  $direccion->titular = $_REQUEST['titular'];
  $direccion->estado = "Activo";

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
