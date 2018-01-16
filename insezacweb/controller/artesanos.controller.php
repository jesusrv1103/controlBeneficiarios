<?php
require_once 'model/beneficiario.php';
require_once 'model/direccion.php';
class ArtesanosController{

  private $model;
  private $model2;
  private $session;
  public $error;

  public function __CONSTRUCT(){
    $this->model = new Beneficiario();

    $this->model2 = new Direccion();

  }
  public function Index(){
   $artesania = true;
   $artesanos = true;
   $tipoBen="CURP";
   $page="view/artesania/index.php";
   require_once 'view/index.php';
 }
 public function Crud(){
   $direccion= new Direccion();
   if(isset($_REQUEST['nuevoRegistro'])){
    $nuevoRegistro=true;
  }
  if(isset($_REQUEST['idDireccion'])){
    $direccion = $this->model->Obtener($_REQUEST['idDireccion']);
 // echo $_REQUEST['idDireccion'];
  }
   $artesania = true;
   $artesanos = true;
   $tipoBen="CURP";
   $page="view/artesania/artesanos.php";
   require_once 'view/index.php';

 }
}
