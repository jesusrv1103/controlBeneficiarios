<?php
class InicioController{
  public function Index(){
    $administracion=false;
    $inicio=true;
    $beneficiarios=false;
    $page="body.php";
    require_once 'view/index.php';
  } 
} 
?>