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
   require_once 'view/programa/create.php';
 }  
   public function Alta(){
   require_once 'view/header.php';
   require_once 'view/programa/programa.php';
   require_once 'view/footer.php';
 } 
 public function Create(){
 }
 public function Update(){
  
 }
 public function Delete(){
  
 }
}
