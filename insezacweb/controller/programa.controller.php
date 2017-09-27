<?php
require_once 'model/programa.php';

class ProyectoController{

  private $model;
  private $session;
  public $error;
  public function __CONSTRUCT(){
    $this->model = new Proyecto();
  }
  public function Index(){
   require_once 'view/programa/programa.php';
 }  
 public function Create(){

 }
 public function Update(){
  
 }
 public function Delete(){
  
 }
}
