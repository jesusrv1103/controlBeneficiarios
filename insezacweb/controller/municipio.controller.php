<?php
require_once 'model/municipio.php';

class MunicipioController{

  private $model;
  public $error;

  //Constructor
  public function __CONSTRUCT(){
    $this->model = new Municipio();
  }
  //Index 
  public function Index(){
    $catalogos=true; //variable cargada para activar la opcion administracion en el menu
    $municipios=true; //variable cargada para activar la opcion municipios en el menu
   $page="view/municipio/index.php"; //Vista principal donde se enlistan los municipios
   require_once 'view/index.php';
 } 

public function Crud(){
 $municipio = new Municipio();

 if(isset($_REQUEST['idMunicipio'])){
  $municipio = $this->model->Obtener($_REQUEST['idMunicipio']);
  echo $this->model->idMunicipio;
  
}
$catalogos=true;
$municipios=true;
$page="view/municipio/municipio.php";
require_once 'view/index.php';
}

public function Importar(){
  if (file_exists("./assets/files/municipios.xlsx")) {
          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
        //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/municipios.xlsx';
        // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
        //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
        //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->Municipios($objPHPExcel,$numRows);
    $mensaje="Se ha leído correctamente el archivo <strong>municipios.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de municipios.";
    $page="view/municipio/index.php";
    $municipios = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
        //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>municipios.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/municipio/municipio.php";
    $municipios = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
}

public function Municipios($objPHPExcel,$numRows){
  try{
    $this->model->Limpiar("municipio");
    $numRow=2;
    do {
            //echo "Entra";
      $muni = new Municipio();
      $muni->idMunicipio= $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
      $muni->nombreMunicipio = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
      if (!$muni->idMunicipio == null) {
        $this->model->ImportarMunicipio($muni);
      }
      $numRow+=1;
    } while (!$muni->idMunicipio == null);

  }catch (Exception $e) {
    $error=true;
    $mensaje="Error al importar los datos de Municipios";
    $page="view/municipio/municipio.php";
    $municipios = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
}

public function Eliminar(){

  $municipio= new Municipio();
  $municipio->idMunicipio = $_REQUEST['idMunicipio'];
  $municipio->estado='Inactivo';
  $this->model->Eliminar($municipio);
  $catalogos=true;
  $municipios=true;
  $mensaje="Eliminacion exitosa";
  $page="view/municipio/index.php";
  require_once 'view/index.php';
  
}





public function Guardar(){
  $municipio= new Municipio();
  $municipio->idMunicipio = $_REQUEST['idMunicipio'];
  $municipio->nombreMunicipio = $_REQUEST['nombreMunicipio'];
  $municipio->claveMunicipio = $_REQUEST['claveMunicipio'];
  $municipio->estado = "Activo";


  if($municipio->idMunicipio > 0){

    $this->model->Actualizar($municipio);
    $mensaje="Se han actualizado correctamente los datos de el Municipio";
  } else {
    $this->model->Registrar($municipio);
    $mensaje="Se ha registrado correctamente los datos de el Municipio";
  } 


  $municipios = true;
  $catalogos=true; 
  $page="view/municipio/index.php";
  require_once 'view/index.php';
}



}
