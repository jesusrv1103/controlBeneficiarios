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
   $inicio = false;
   $beneficiarios = true;
   $page="view/apoyos/index.php";
   require_once 'view/index.php';
 }
 public function Alta(){
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/apoyos/apoyos.php";
  require_once 'view/index.php';
}
public function Create(){
}
public function Update(){

}
public function Delete(){

}
}
