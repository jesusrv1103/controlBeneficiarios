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
				$usuario = $this->model->ObtenerUsuario($_REQUEST['idUsuario']);
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
		if(isset($_REQUEST['password'])){
			$password =$_REQUEST['password'];
			$password=md5($password);
			$password=crc32($password);
			$password=crypt($password,"xtem");
			$password=sha1($password);
			$usuario->password=$password;
		}
		//echo $usuario->password;
		if($usuario->idUsuario > 0 && isset($_REQUEST['password'])){
			//Actualiza el usuario cambiando password
			$this->model->Actualizar($usuario);
			$this->model->ActualizarInDB($usuario,$password);
			$mensaje="Los datos del usuario <b>$usuario->usuario</b> se han actualizado correctamente";
		}elseif(!isset($_REQUEST['password'])){
			//Actualizar usuario sin cambiar password
			$this->model->ActualizaSP($usuario);
			$mensaje="Los datos del usuario <b>$usuario->usuario</b> se han actualizado correctamente";
		}else{
			//Registra usuario nuevo
			$consulta=$this->model->VerificaUsuario($usuario->usuario);
			if($consulta==null){
				$this->model->Registrar($usuario);
				$this->model->RegistrarInDB($usuario);
				$mensaje="El usuario <b>$usuario->usuario</b> se ha registrado correctamente";
			}else{
				$error=true;
				$cambiarPass=true;
				$nuevoRegistro=true;
				$mensaje="El usuario <b>$usuario->usuario</b> ya existe, ingrese otro nombre de usuario";
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
		$idUsuario = $_REQUEST['idUsuario'];
		if(isset($_REQUEST['acceso'])){
			$consultausuario=$this->model->ObtenerUsuario($idUsuario);
			$this->model->Eliminar($idUsuario);
			$this->model->EliminarInDB($consultausuario->usuario);
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
	public function CambiarPass(){
		$usuario = $this->model->ObtenerUsuario($_REQUEST['idUsuario']);
		$cambiarPass=true;
		$administracion=true;
		$usuarios=true;
		$page="view/usuario/usuario.php";
		require_once 'view/index.php';
	}
}
