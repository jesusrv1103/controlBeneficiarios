<?php
require_once 'model/beneficiario.php';

class BeneficiarioController{

  private $model;
  private $session;
  public $error;

  public function __CONSTRUCT(){
    $this->model = new Beneficiario();
  }
  public function Index(){
   $administracion = true;
   $inicio = false;
   $beneficiarios = true;
   $page="view/beneficiario/index.php";
   require_once 'view/index.php';
 }  
 public function Alta(){
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/beneficiario/beneficiario.php";
  require_once 'view/index.php';
} 
public function Create(){
}
public function Update(){

}
public function Delete(){

}
}
