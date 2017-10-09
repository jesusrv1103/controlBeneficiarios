<?php
require_once 'model/asentamiento.php';
class AsentamientoController{
	public function __CONSTRUCT(){
		$this->model = new Asentamiento();
	}
	public function Index(){
		$catalogos=true;
		$asentamientos=true;
		$page="view/catalogos/asentamiento.php";
		require_once 'view/index.php';
	}
}