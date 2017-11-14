<?php
require_once 'model/apoyos.php';

class ApoyosController{

  private $model;
  private $session;
  public $error;

  public function __CONSTRUCT(){
    $this->model = new Apoyos();
  }
  public function Index(){
   $administracion = true;
   $apoyos = true;
   $page="view/apoyos/index.php";
   require_once 'view/index.php';
 }
 public function Crud(){
  if(isset($_REQUEST['nuevoRegistro'])){
    $nuevoRegistro=true;
  }
  $apoyo = new Apoyo();
  if(isset($_REQUEST['idApoyo'])){
    $apoyo = $this->model->Obtener($_REQUEST['idApoyo']);
  }
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/apoyos/apoyos.php";
  require_once 'view/index.php';
}
public function Eliminar(){
  $this->model->Eliminar($_REQUEST['idApoyo']);
  $administracion = true;
  $apoyos = true;
  $page="view/apoyos/index.php";
  $mensaje="Se ha eliminado correctamente el apoyo";
  require_once 'view/index.php';
}
public function Guardar(){
  $apoyo= new Apoyos();
  $apoyo->idApoyo = $_REQUEST['idApoyo'];
  $apoyo->curp = $_REQUEST['curp'];
  $apoyo->idOrigen = $_REQUEST['idOrigen'];
  $apoyo->idPrograma = $_REQUEST['idPrograma'];
  $apoyo->idSubprograma = $_REQUEST['idSubprograma'];
  $apoyo->idTipoApoyo = $_REQUEST['idTipoApoyo'];
  $apoyo->idCaracteristica = $_REQUEST['idCaracteristica'];
  $apoyo->importeApoyo = $_REQUEST['importeApoyo'];
  $apoyo->numeroApoyo = $_REQUEST['numeroApoyo'];
  $apoyo->fechaUltimoApoyo = $_REQUEST['fechaUltimoApoyo'];
  $apoyo->idPeriodicidad = $_REQUEST['idPeriodicidad'];
  $apoyo->apoyoEconomico = $_REQUEST['apoyoEconomico'];
  if(!isset($_REQUEST['nuevoRegistro'])){
    $this->model->Actualizar($apoyo);
    $mensaje="Se han actualizado correctamente los datos del Apoyo";
  }else{
    $this->model->Registrar($apoyo);
    $mensaje="Se han registrado correctamente los datos del Apoyo";
  } 
  $administracion = true;
  $apoyos = true;
  $page="view/apoyos/index.php";
  require_once 'view/index.php';
}
}

