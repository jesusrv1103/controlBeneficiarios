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
		$usuario->usuario = $_REQUEST['usuario'];
		$usuario->idUsuario = $_REQUEST['idUsuario'];
		$usuario->direccion = $_REQUEST['direccion'];
		$usuario->tipoUsuario = $_REQUEST['tipoUsuario'];
		$password =$_REQUEST['password'];
		$password=md5($password);
		$password=crc32($password);
		$password=crypt($password,"xtem");
		$password=sha1($password);
		$usuario->password=$password;   		
		if($usuario->idUsuario > 0){
			$this->model->Actualizar($usuario);
			$this->model->ActualizarInDB($usuario,$password);
			$mensaje="Se han actualizado correctamente los datos del usuario";
		}else{
			$consulta=$this->model->Obtener2($usuario->usuario);
			if($consulta==null){
				$this->model->Registrar($usuario);
				$this->model->RegistrarInDB($usuario);
				$mensaje="Se ha registrado correctamente el usuario";
			}else{
				$error=true;
				$mensaje="<b>El usuario ya existe</b> ingrese otro nombre de usuario";
				$page="view/usuario/usuario.php";
				require_once "view/index.php";
			}
		}		 
		$administracion=true; //variable cargada para activar la opcion administracion en el menu
		$usuarios=true; //variable cargada para activar la opcion usuarios en el menu
		$page="view/usuario/index.php";
		require_once 'view/index.php';
	}



	//Metodo  para eliminar
	public function Eliminar(){
		if(isset($_REQUEST['acceso'])){
			$this->model->Eliminar($_REQUEST['idUsuario']);
			$this->model->EliminarInDB($_REQUEST['idUsuario']);
		    $administracion=true; //variable cargada para activar la opcion administracion en el menu
			$usuarios=true; //variable cargada para activar la opcion usuarios en el menu
			$page="view/usuario/index.php";
			$mensaje="Se ha eliminado correctamente el usuario";
			require_once 'view/index.php';
		}else{
			$this->Lockscreen();
		}
	}
	//Metodo para acceso de administrador
	public function Lockscreen(){
		$c=$_REQUEST['c'];
		$a=$_REQUEST['a'];
		require_once 'controller/lockscreen.controller.php';
		$controller = new LockscreenController;
		call_user_func( array( $controller, 'index' ));
	}
}

