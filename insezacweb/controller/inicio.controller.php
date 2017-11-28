<?php
require_once 'model/beneficiario.php';
require_once 'model/catalogos.php';
class InicioController{
  public function Index(){
    $inicio=true;
    $administracion = true;
    $page="body.php";
    require_once 'view/index.php';
  } 
  public function Wizard(){
  	$page="pruebawizard.php";
    require_once 'view/index.php';
  }
} 
?>