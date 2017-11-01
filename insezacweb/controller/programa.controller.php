<?php
require_once 'model/programa.php';

class ProgramaController{

  private $model;
  public $error;

  //Constructor
  public function __CONSTRUCT(){
    $this->model = new Programa();
  }
  //Index 
  public function Index(){
    $catalogos=true; //variable cargada para activar la opcion administracion en el menu
    $programas=true; //variable cargada para activar la opcion programas en el menu
   $page="view/programa/index.php"; //Vista principal donde se enlistan los programas
   require_once 'view/index.php';
 } 
 	//Metodo Crud *** Mandara llamar a Metodo Crear select editar y eliminar
 public function Crud(){
   $programa = new Programa();
   if(isset($_REQUEST['idPrograma'])){
    $programa = $this->model->Obtener($_REQUEST['idPrograma']);
  }
  $page= "view/programa/programa.php";
  require_once 'view/index.php';
} 
  //Metodo Guardar  si trae un id actualiza, no registra
public function Guardar(){
  $programa= new Programa();
        //echo "entre";
        //echo  $programa->idPrograma
  $programa->idPrograma = $_REQUEST['idPrograma'];
  $programa->programa = $_REQUEST['programa'];
  $programa->idPrograma > 0 
  ? $this->model->Actualizar($programa)
  : $this->model->Registrar($programa);
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $programas=true; //variable cargada para activar la opcion programas en el menu
    $page="view/programa/index.php";
    require_once 'view/index.php';
  }
    //Metodo  para eliminar
  public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $programas=true; //variable cargada para activar la opcion programas en el menu
    $this->model->Eliminar($_REQUEST['idPrograma']);
    header ('Location: index.php?c=Programa&a=Index');
  }
  public function Importar(){
  if (file_exists("./assets/files/programas.xlsx")) {

          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
    //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/programas.xlsx';
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
   // $this->model->Check(0);
    $this->Programas($objPHPExcel,$numRows);
  //  $this->model->Check(1);
    $mensaje="Se ha leído correctamente el archivo <strong>programas.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los programas.";
    $page="view/programa/programa.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
          //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>programas.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/programa/programa.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
}
public function Programas($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("programa");
  $numRow=3;

  do {
         //echo "Entra";
    $prog = new Programa();
    $prog->idPrograma = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $prog->programa = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    if (!$prog->idPrograma == null) {

      $this->model->ImportarPrograma($prog);

    }
    $numRow+=1;
  } while ( !$prog->idPrograma == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de Programas.";
 $page="view/programa/programa.php";
 //$beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}
}
