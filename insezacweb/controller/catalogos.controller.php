<?php
require_once 'model/catalogos.php';
class CatalogosController{
  public function __CONSTRUCT()
  {
   $this->model = new Catalogos();
 }

 public function Beneficiarios(){
  $catalogos=true;
  $beneficiarios=true;
  $page="view/catalogos/beneficiarios.php";
  require_once 'view/index.php';
}

public function Upload(){
  $archivo = $_FILES['file']['name'];
  $tipo = $_FILES['file']['type'];
  $destino = "./assets/importaciones/bak_" . $archivo;
  if (copy($_FILES['file']['tmp_name'], $destino)){
    //echo "Archivo Cargado Con Éxito" . "<br><br>";
    $this->Importar($archivo);
    //mandar llamar todas las funciones a importar
  }
  else{
    echo "Error Al Cargar el Archivo". "<br><br>";
  }
}
public function Importar($archivo){
  if (file_exists("./assets/importaciones/bak_" . $archivo)) {

        //Agregamos la librería 
      require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
  //Variable con el nombre del archivo
      $nombreArchivo = './assets/importaciones/bak_' . $archivo;
  // Cargo la hoja de cálculo
      $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
  //Asigno la hoja de calculo activa
      $objPHPExcel->setActiveSheetIndex(0);
  //Obtengo el numero de filas del archivo
      $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
      $this->IdentificacionOficial($objPHPExcel,$numRows);
      //incluir las demas funciones
  }
        //si por algo no cargo el archivo bak_ 
  else {
    echo "Necesitas primero importar el archivo";
  }
}
public function IdentificacionOficial($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("identificacionOficial");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idIdentificacion = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $cat->identificacion = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    if (!$cat->idIdentificacion == null) {

      $this->model->ImportarIdentificacionOficial($cat);

    }
    $numRow+=1;
  } while ( !$cat->idIdentificacion == null);

  $mensaje="success";
  $page="view/catalogos/beneficiarios.php";
  $beneficiarios2 = true;
  $catalogos=true;
  require_once 'view/index.php';
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
}
?>