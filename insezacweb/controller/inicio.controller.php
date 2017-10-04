<?php
class InicioController{
  public function Index(){
    $inicio=true;
    $page="body.php";
    require_once 'view/index.php';
  } 
} 
?>