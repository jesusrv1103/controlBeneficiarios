<?php
require_once 'model/programa.php';

class ProgramaController{

  private $model;
  private $session;
  public $error;

  public function __CONSTRUCT(){
    $this->model = new Programa();
  }
  public function Index(){
   $administracion = true;
    $inicio = false;
    $beneficiarios = false;
   $page="view/programa/index.php";
   require_once 'view/index.php';
 }  
   public function Alta(){
    $administracion = true;
    $inicio = false;
    $beneficiarios = false;
   $page="view/programa/programa.php";
   require_once 'view/index.php';
 } 
 public function Create(){
 }
 public function Update(){
  
 }
 public function Delete(){
  
 }
}
