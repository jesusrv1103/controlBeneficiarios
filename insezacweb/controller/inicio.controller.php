<?php
class InicioController{
  public function Index(){
    $administracion=true;
    $inicio=true;
    $page="body.php";
    require_once 'view/index.php';
  } 
} 
?>