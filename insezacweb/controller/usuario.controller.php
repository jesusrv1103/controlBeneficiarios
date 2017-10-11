<?php
require_once 'model/usuario.php';
class UsuarioController{
	
	private $model;

	public function __CONSTRUCT(){
		$this->model = new Usuario();
	}
	public function Index(){
		$administracion=true;
		$usuarios=true;
		$page="view/usuario/index.php";
		require_once 'view/index.php';

	}
	public function Crud(){
		if(isset($_REQUEST['acceso'])){
			$usuario = new Usuario();
			if(isset($_REQUEST['idUsuario'])){
    		$usuario = $this->model->Obtener($_REQUEST['idUsuario']);
  			}
			$administracion=true;
			$usuarios=true;
			$page="view/usuario/usuario.php";
			require_once 'view/index.php';
		}else{
			$this->Lockscreen();
		}
	}
	public function Lockscreen(){
		$c=$_REQUEST['c'];
		$a=$_REQUEST['a'];
		require_once 'controller/lockscreen.controller.php';
		$controller = new LockscreenController;
		call_user_func( array( $controller, 'index' ));
	}
	public function Guardar(){

	}
}

