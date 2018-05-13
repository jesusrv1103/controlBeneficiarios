<?php
require_once 'model/login.php';

class LoginController{

  private $model;

  public function __CONSTRUCT(){
    $this->model = new Login();
  }

  public function Index(){
    require_once 'view/login.php';
  }

  public function Acceder(){
    try {
      $log = new Login();
      $usuario=$log->usuario = $_REQUEST['usuario'];
      $password = $_REQUEST['password'];
      $password=md5($password);
      $password=crc32($password);
      $password=crypt($password,"xtem");
      $password=sha1($password);
      $consulta=$this->model->verificar($log);
      if($consulta!=null){
        if($consulta->password == $password){
          $this->login($usuario, $password, $consulta->tipoUsuario, $consulta->direccion);
          echo 'ok';
        }else{
          echo "  La contraseña es incorrrecta";
        }
      }else{
        echo "  El usuario es incorrecto";
      }
    } catch (Exception $e) {
      echo " Ha ocurrido un error inesperado";
    }
  }

  public function login($usuario,$password,$tipo,$direccion)
  {
   $_SESSION['usuario'] = $usuario;
   $_SESSION['password'] = $password;
   $_SESSION['tipoUsuario'] = $tipo;
   $_SESSION['direccion']=$direccion;
   $_SESSION['seguridad'] = "ok";
 }

 public function redirect($url)
 {
   header("Location: $url");
 }

 public function logout()
 {
  session_destroy();
  unset($_SESSION['usuario']);
  unset($_SESSION['password']);
  unset($_SESSION['seguridad']);
  header ('Location: index.php');
}
}
