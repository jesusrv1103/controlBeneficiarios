<?php
require_once 'model/subprograma.php';

class SubprogramaController{

  public function __CONSTRUCT(){
    $this->model = new Subprograma();
  }
  public function Index(){
   $administracion = true;
   $inicio = false;
   $subprogramas=true;
   $page="view/subprograma/index.php";
   require_once 'view/index.php';
 }  
}