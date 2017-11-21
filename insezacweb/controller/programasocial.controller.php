<?php
require_once 'model/programasocial.php';

class ProgramasocialController{
	private $model;
	public $error;

	public function _CONSTRUCT(){
$this->model = new Programasocial();
	}
	public function Index(){
		$administracion=true;
		$programasocial=true;
		$page="view/programasocial/index.php";
		require_once 'view/index.php';
	}
	
}