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
	public function Guardar(){
		$usuario= new Usuario();
		$usuario->password = $_REQUEST['password'];
		$password2 = $_REQUEST['password2'];
		if (!$usuario->password==$password2) {
			$error="Verifique que las contraseñas coincidan";
			$page="view/usuario/usuario.php";
		}else{
			$usuario->idUsuario = $_REQUEST['idUsuario'];
			$usuario->usuario = $_REQUEST['usuario'];
			$usuario->direccion = $_REQUEST['direccion'];
			$usuario->tipoUsuario = $_REQUEST['tipoUsuario'];
			if($usuario->idUsuario > 0)
			$this->model->Actualizar($usuario);
			else{
			$this->model->Registrar($usuario);
			$this->model->RegistrarInDB($usuario);
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $usuarios=true; //variable cargada para activar la opcion usuarios en el menu
    $page="view/usuario/index.php";
    require_once 'view/index.php';
}
}
}
    //Metodo  para eliminar
public function Eliminar(){
	if(isset($_REQUEST['acceso'])){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $usuarios=true; //variable cargada para activar la opcion usuarios en el menu
    $this->model->Eliminar($_REQUEST['idUsuario']);
    header ('Location: index.php?c=Usuario&a=Index');
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
}

