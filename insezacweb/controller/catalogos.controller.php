<?php
require_once 'model/catalogos.php';
class CatalogosController{
  public function __CONSTRUCT()
  {
   $this->model = new Catalogos();
 }

 public function Beneficiarios(){
  $catalogos=true;
  $beneficiarios2=true;
  $page="view/catalogos/beneficiarios.php";
  require_once 'view/index.php';
}

public function Upload(){
    $archivo = $_FILES['file']['name'];
    $tipo = $_FILES['file']['type'];
    $destino = "./assets/importaciones/catalogo_beneficiarios.xlsx";
    if(copy($_FILES['file']['tmp_name'], $destino)){
    //echo "Archivo Cargado Con Éxito" . "<br><br>";
      $this->Importar();
    //mandar llamar todas las funciones a importar
    }
    else{
     $mensaje="Error al cargar el archivo";
     $page="view/catalogos/beneficiarios.php";
     $beneficiarios2 = true;
     $catalogos=true;
     require_once 'view/index.php';
   }
 }
 public function Importar(){
  if (file_exists("./assets/importaciones/catalogo_beneficiarios.xlsx")) {

        //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
  //Variable con el nombre del archivo
    $nombreArchivo = './assets/importaciones/catalogo_beneficiarios.xlsx';
  // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
  //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
  //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->IdentificacionOficial($objPHPExcel,$numRows);
    $this->IdentificacionOficial($objPHPExcel,$numRows);
    $this->TipoVialidad($objPHPExcel,$numRows);
    $this->EstadoCivil($objPHPExcel,$numRows);
    $this->Ocupacion($objPHPExcel,$numRows);
    $this->IngresoMensual($objPHPExcel,$numRows);
    $this->Vivienda($objPHPExcel,$numRows);
    $this->NivelEstudio($objPHPExcel,$numRows);
    $this->SeguridadSocial($objPHPExcel,$numRows);
    $this->Discapacidad($objPHPExcel,$numRows);
    $this->GrupoVulnerable($objPHPExcel,$numRows);
    $mensaje="success";
    $page="view/catalogos/beneficiarios.php";
    $beneficiarios2 = true;
    $catalogos=true;
    require_once 'view/index.php';
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

} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function TipoVialidad($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("tipoVialidad");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idTipoVialidad = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
    $cat->tipoVialidad = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
    if (!$cat->idTipoVialidad == null) {

      $this->model->ImportarTipoVialidad($cat);
    }
    $numRow+=1;
  } while ( !$cat->idTipoVialidad == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function EstadoCivil($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("estadoCivil");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idEstadoCivil = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
    $cat->estadoCivil = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
    if (!$cat->idEstadoCivil == null) {

      $this->model->ImportarEstadoCivil($cat);

    }
    $numRow+=1;
  } while ( !$cat->idEstadoCivil == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function Ocupacion($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("ocupacion");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idOcupacion = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
    $cat->ocupacion = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
    if (!$cat->idOcupacion == null) {

      $this->model->ImportarOcupacion($cat);

    }
    $numRow+=1;
  } while ( !$cat->idOcupacion == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function IngresoMensual($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("ingresoMensual");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idIngresoMensual = $objPHPExcel->getActiveSheet()->getCell('M'.$numRow)->getCalculatedValue();
    $cat->ingresoMensual = $objPHPExcel->getActiveSheet()->getCell('N'.$numRow)->getCalculatedValue();
    if (!$cat->idIngresoMensual == null) {

      $this->model->ImportarIngresoMensual($cat);

    }
    $numRow+=1;
  } while ( !$cat->idIngresoMensual == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function Vivienda($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("vivienda");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idVivienda = $objPHPExcel->getActiveSheet()->getCell('P'.$numRow)->getCalculatedValue();
    $cat->vivienda = $objPHPExcel->getActiveSheet()->getCell('Q'.$numRow)->getCalculatedValue();
    if (!$cat->idVivienda == null) {

      $this->model->ImportarVivienda($cat);

    }
    $numRow+=1;
  } while ( !$cat->idVivienda == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function NivelEstudio($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("nivelEstudio");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idNivelEstudios = $objPHPExcel->getActiveSheet()->getCell('S'.$numRow)->getCalculatedValue();
    $cat->nivelEstudios = $objPHPExcel->getActiveSheet()->getCell('T'.$numRow)->getCalculatedValue();
    if (!$cat->idNivelEstudios == null) {

      $this->model->ImportarNivelEstudios($cat);
    }
    $numRow+=1;
  } while ( !$cat->idNivelEstudios == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function SeguridadSocial($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("seguridadSocial");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idSeguridadSocial = $objPHPExcel->getActiveSheet()->getCell('V'.$numRow)->getCalculatedValue();
    $cat->seguridadSocial = $objPHPExcel->getActiveSheet()->getCell('W'.$numRow)->getCalculatedValue();
    if (!$cat->idSeguridadSocial == null) {

      $this->model->ImportarSeguridadSocial($cat);

    }
    $numRow+=1;
  } while ( !$cat->idSeguridadSocial == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function Discapacidad($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("discapacidad");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idDiscapacidad = $objPHPExcel->getActiveSheet()->getCell('Y'.$numRow)->getCalculatedValue();
    $cat->discapacidad = $objPHPExcel->getActiveSheet()->getCell('Z'.$numRow)->getCalculatedValue();
    if (!$cat->idDiscapacidad == null) {

      $this->model->ImportarDiscapacidad($cat);

    }
    $numRow+=1;
  } while ( !$cat->idDiscapacidad == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function GrupoVulnerable($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("grupoVulnerable");
  $numRow=2;

  do {
       //echo "Entra";
    $cat = new Catalogos();
    $cat->idGrupoVulnerable = $objPHPExcel->getActiveSheet()->getCell('AB'.$numRow)->getCalculatedValue();
    $cat->grupoVulnerable = $objPHPExcel->getActiveSheet()->getCell('AC'.$numRow)->getCalculatedValue();
    if (!$cat->idGrupoVulnerable == null) {

      $this->model->ImportarGrupoVulnerable($cat);

    }
    $numRow+=1;
  } while ( !$cat->idGrupoVulnerable == null);
} catch (Exception $e) {
 $mensaje="error";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function Descargar(){
// grab the requested file's name
  $file_name = 'catalogo_beneficiarios.xlsx';
// make sure it's a file before doing anything!
  if(is_file($file_name))
  {
    header("Content-type: text/html; charset=utf8");
    header ("Content-Disposition: attachment; filename=catalogo_beneficiarios.xlsx"); 
    header ("Content-Type: application/octet-stream");
    header ("Content-Length: ".filesize($enlace));
    readfile($enlace);
  }
}
}
?>