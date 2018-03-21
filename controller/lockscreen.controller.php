<?php
require_once 'model/login.php';
class LockscreenController{
	private $model;

	public function __CONSTRUCT(){
		$this->model = new Login();
	}

	public function Index(){
		if(isset($_REQUEST['idUsuario'])){
			$idUsuario=$_REQUEST['idUsuario'];
		}	
		$c=$_REQUEST['c'];
		$a=$_REQUEST['a'];
		require_once 'view/lockscreen.php';
	}
	
	public function Acceso(){
		$log = new Login();
		$c=$_REQUEST['ct'];
		$a=$_REQUEST['at'];
		if(isset($_REQUEST['idUsuario'])){
			$idUsuario=$_REQUEST['idUsuario'];
		}
		$usuario=$log->usuario = $_SESSION['usuario'];
		$password = $_REQUEST['password'];
		$password=md5($password);
		$password=crc32($password);
		$password=crypt($password,"xtem");
		$password=sha1($password);
		$consulta=$this->model->verificar($log);
		if($consulta!=null){
			if($consulta->password == $password && $consulta->tipoUsuario==1){
				if(isset($_REQUEST['idUsuario'])){
					echo 	
					"<script type='text/javascript'>
					window.location='index.php?acceso=true&c=$c&a=$a&idUsuario=$idUsuario';
					</script>";
				}else{
					echo 	
					"<script type='text/javascript'>
					window.location='index.php?acceso=true&c=$c&a=$a';
					</script>";
				}
			}else{
				$error="  Acceso incorrecto";
				require_once 'view/lockscreen.php';
			}
		}else{
			$error="  Acceso incorrecto";
			require_once 'view/lockscreen.php';
		}
	}
}