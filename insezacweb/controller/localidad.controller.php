<?php
require_once 'model/localidad.php';
class LocalidadController{
	public function __CONSTRUCT(){
		$this->model = new Localidad();
	}
	public function Index(){
		$catalogos=true;
		$localidades=true;
		$page="view/catalogos/localidad.php";
		require_once 'view/index.php';
	}
}