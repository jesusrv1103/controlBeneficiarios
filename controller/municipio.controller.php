<?php
require_once 'model/municipio.php';

class MunicipioController{

  private $model;
  public $error;
  private $mensaje;

  public function __CONSTRUCT()
  {
    $this->model = new Municipio();
  }

  public function Index()
  {
    $catalogos=true; 
    $municipios=true;
    $page="view/municipio/index.php"; 
    require_once 'view/index.php';
  }

  public function Crud()
  {
    try {
      $municipio = new Municipio();
      if(isset($_REQUEST['idMunicipio']))
        $municipio = $this->model->Obtener($_REQUEST['idMunicipio']); 
      $catalogos=true;
      $municipios=true;
      $page="view/municipio/municipio.php";
      require_once 'view/index.php'; 
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="No se pudieron obtener los datos del municipio";
      $this->Index();
    }
  }

  public function Upload()
  {
    try {
      if(!isset($_FILES['file']['name']))
        header('Location: ./?c=municipio');
      $archivo=$_FILES['file'];
      if($archivo['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
      {
        if($archivo['name']=="municipios.xlsx"){
          $nameArchivo = $archivo['name'];
          $tmp = $archivo['tmp_name'];
          $archivo['type'];
          $src = "./assets/files/".$nameArchivo;
          if(move_uploaded_file($tmp, $src)){
            $this->Importar();
          }  
        }else{
          $this->error=true;
          $this->mensaje="El nombre del archivo es invalido, porfavor verifique que el nombre del archivo sea <strong>municipios.xlsx</strong>";
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

  public function Importar()
  {
    try {
      if (file_exists("./assets/files/municipios.xlsx")) 
      {
        require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
        $nombreArchivo = './assets/files/municipios.xlsx';
        $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
        $objPHPExcel->setActiveSheetIndex(0);
        $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        $this->LeerArchivo($objPHPExcel,$numRows);
        $this->mensaje="Se ha leído correctamente el archivo <strong>municipios.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de municipios.";
        $page="view/municipio/index.php";
        $municipios = true;
        $catalogos=true;
        require_once 'view/index.php';
      } else {
        $this->error=true;
        $this->mensaje="El archivo <strong>municipios.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
        $this->Index();
      }
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Se ha producido un error al importar el archivo";
      $this->Index();
    }
  }

  public function LeerArchivo($objPHPExcel,$numRows)
  {
    try{
      $this->model->Limpiar("municipio");
      $numRow=2;
      do {
        $muni = new Municipio();
        $muni->claveMunicipio= $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
        $muni->nombreMunicipio = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
        $muni->estado='Activo';
        if (!$muni->claveMunicipio == null) {
          $this->model->ImportarMunicipio($muni);
        }
        $numRow+=1;
      } while (!$muni->claveMunicipio == null);

    }catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Se ha producido un error al leer el archivo";
      $this->Index();
    }
  }

  public function Eliminar()
  {
    try {
     $municipio= new Municipio();
     $municipio->idMunicipio = $_REQUEST['idMunicipio'];
     $municipio->estado='Inactivo';
     $this->model->Eliminar($municipio);
     $this->mensaje="Se ha eliminado correctamente el municipio";
     $this->Index(); 
   } catch (Exception $e) {
     $this->error=true;
     $this->mensaje="Se ha producido un error al intentar eliminar el municipio";
     $this->Index(); 
   }
 }
 public function Guardar(){
  try {
    $municipio= new Municipio();
    $municipio->idMunicipio = $_REQUEST['idMunicipio'];
    $municipio->nombreMunicipio = $_REQUEST['nombreMunicipio'];
    $municipio->claveMunicipio = $_REQUEST['claveMunicipio'];
    $municipio->estado = "Activo";
    if($municipio->idMunicipio > 0){
      $this->model->Actualizar($municipio);
      $this->mensaje="Se han actualizado correctamente los datos de el Municipio";
    } else {
      $this->model->Registrar($municipio);
      $this->mensaje="Se ha registrado correctamente los datos de el Municipio";
    } 
   $this->Index();
  } catch (Exception $e) {
     $this->error=true;
      $this->mensaje="Se ha producido un error al intentar guardar el municipio";
      $this->Index();
  }
}
}