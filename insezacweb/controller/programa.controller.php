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
}
