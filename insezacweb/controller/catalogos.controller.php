<?php

require_once 'model/catalogos.php';

class CatalogosController{

  public function __CONSTRUCT()
  {
   $this->model = new Catalogos();
 }

 /******C A T Á L O G O S - B E N E F I C I A R I O S*****/

 public function Beneficiarios(){
  $catalogos=true;
  $beneficiarios2=true;
  $page="view/catalogos/beneficiarios.php";
  require_once 'view/index.php';
}

 public function UploadBeneficiarios(){
    if(!isset($_FILES['file']['name'])){
      header('Location: ./?c=catalogos&a=Apoyos');
    }
      $archivo=$_FILES['file'];
      $nameArchivo = $archivo['name'];
      echo $tmp = $archivo['tmp_name'];
      $src = "./assets/files/".$nameArchivo;
      move_uploaded_file($tmp, $src);


   /*if(copy($_FILES['file']['tmp_name'], $destino)){
      //echo "Archivo Cargado Con Éxito" . "<br><br>";
      $this->ImportarBeneficiarios($archivo);
      //mandar llamar todas las funciones a importar
    }
    else{
      $this->Beneficiarios();
    }*/
  }

public function ImportarBeneficiarios(){
  if (file_exists("./assets/files/catalogo_beneficiarios.xlsx")) {

          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
    //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/catalogo_beneficiarios.xlsx';
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->model->Check(0);
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
    $this->model->Check(1);
    $mensaje="Se ha leído correctamente el archivo <strong>catalogo_beneficiarios.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los identificadores del catálogo.";
    $page="view/catalogos/beneficiarios.php";
    $beneficiarios2 = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
          //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>catalogo_beneficiarios.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/catalogos/beneficiarios.php";
    $beneficiarios2 = true;
    $catalogos=true;
    require_once 'view/index.php';
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
 $error=true;
 $mensaje="Error al importar los datos de identificacion oficial.";
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
 $error=true;
 $mensaje="Error al importar los datos de tipo de vialidad.";
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
 $error=true;
 $mensaje="Error al importar los datos de estado civil.";
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
 $error=true;
 $mensaje="Error al importar los datos de ocupación.";
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
 $error=true;
 $mensaje="Error al importar los datos de ingreso mensual.";
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
 $error=true;
 $mensaje="Error al importar los datos de vivienda.";
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
 $error=true;
 $mensaje="Error al importar los datos de nivel de estudio.";
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
 $error=true;
 $mensaje="Error al importar los datos de seguridad social.";
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
 $error=true;
 $mensaje="Error al importar los datos de discapacidad.";
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
 $error=true;
 $mensaje="Error al importar los datos de grupo vulnerable.";
 $page="view/catalogos/beneficiarios.php";
 $beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}

/******C A T Á L O G O S - A P O Y O S*****/ 

public function Apoyos(){
  $catalogos=true;
  $apoyos2=true;
  $page="view/catalogos/apoyos.php";
  require_once 'view/index.php';
}

 public function UploadApoyos(){
    if(!isset($_FILES['file']['name'])){
      header('Location: ./?c=catalogos&a=Apoyos');
    }
    $archivo = $_FILES['file']['name'];
    $tipo = $_FILES['file']['type'];
    $destino = "./assets/files/".$archivo;
    if(copy($_FILES['file']['tmp_name'], $destino)){
      //echo "Archivo Cargado Con Éxito" . "<br><br>";
      $this->ImportarApoyos($archivo);
      //mandar llamar todas las funciones a importar
    }
    else{
      $this->Apoyos();
    }
  }

public function ImportarApoyos($archivo){
  if (file_exists("./assets/files/".$archivo)) {

          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
    //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/'.$archivo;
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->model->Check(0);
    $this->Origen($objPHPExcel,$numRows);
    $this->TipoApoyo($objPHPExcel,$numRows);
    $this->Periodicidad($objPHPExcel,$numRows);
    $this->CaracteristicasApoyo($objPHPExcel,$numRows);
    $this->model->Check(1);
    $mensaje="Se ha leído correctamente el archivo <strong>catalogo_apoyos.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los identificadores del catálogo.";
    $page="view/catalogos/apoyos.php";
    $apoyos2 = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
          //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>catalogo_apoyos.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/catalogos/apoyos.php";
    $catalogos=true;
    $apoyos2 = true;
    require_once 'view/index.php';
  }
}

public function Origen($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("origen");
  $numRow=3;

  do {
         //echo "Entra";
    $cat = new Catalogos();
    $cat->idOrigen = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    $cat->origen = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    if (!$cat->idOrigen == null) {

      $this->model->ImportarOrigen($cat);

    }
    $numRow+=1;
  } while ( !$cat->idOrigen == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de Origen.";
 $page="view/catalogos/apoyos.php";
 $apoyos2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function TipoApoyo($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("tipoApoyo");
  $numRow=3;

  do {
         //echo "Entra";
    $cat = new Catalogos();
    $cat->idTipoApoyo = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
    $cat->tipoApoyo = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
    if (!$cat->idTipoApoyo == null) {

      $this->model->ImportarTipoApoyo($cat);

    }
    $numRow+=1;
  } while ( !$cat->idTipoApoyo == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de Origen.";
 $page="view/catalogos/apoyos.php";
 $apoyos2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function Periodicidad($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("periodicidad");
  $numRow=3;

  do {
         //echo "Entra";
    $cat = new Catalogos();
    $cat->idPeriodicidad = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();
    $cat->periodicidad = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
    if (!$cat->idPeriodicidad == null) {

      $this->model->ImportarPeriodicidad($cat);

    }
    $numRow+=1;
  } while ( !$cat->idPeriodicidad == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de Periodicidad.";
 $page="view/catalogos/apoyos.php";
 $apoyos2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
public function CaracteristicasApoyo($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("caracteristicasApoyo");
  $numRow=3;

  do {
         //echo "Entra";
    $cat = new Catalogos();
    $cat->idCaracteristicasApoyo = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
    $cat->caracteristicasApoyo = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
     $cat->idTipoApoyo = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
    if (!$cat->idCaracteristicasApoyo == null) {

      $this->model->ImportarCaracteristicasApoyo($cat);

    }
    $numRow+=1;
  } while ( !$cat->idCaracteristicasApoyo == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de Caracteristicas de Apoyos.";
 $page="view/catalogos/apoyos.php";
 $apoyos2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
}
?>