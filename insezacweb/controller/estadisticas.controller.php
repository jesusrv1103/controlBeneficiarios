<?php
//require_once 'model/estadisticas.php';
class EstadisticasController{

  private $model;
  private $model2;
  private $session;
  public $error;

  public function __CONSTRUCT(){
   //$this->model = new Beneficiario();
  }
  public function Index(){
   $estadisticas = true;
   $page="view/estadisticas/index.php";
   require_once 'view/index.php';
 }
}