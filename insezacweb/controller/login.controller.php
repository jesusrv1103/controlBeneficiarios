<?php
require_once 'model/login.php';
class LoginController{
  private $model;
  private $session;
  public $error;
  public function __CONSTRUCT(){
    $this->model = new Login();
  }
  public function Index(){
    require_once 'view/login.php';
  }  
  public function Acceder(){
   $log = new Login();
   $usuario=$log->usuario = $_REQUEST['usuario'];
   $password = $_REQUEST['password'];
   $consulta=$this->model->verificar($log);
   if($consulta!=null){
    if($consulta->password == $password){
      echo "<script type='text/javascript'> alert('Datos correctos'); </script>";
      $this->login($usuario);
      echo "<script type='text/javascript'> alert('".$_SESSION['user_session']."'); </script>";
      header ('Location: index.php?c=Inicio');
      }else{
        $error="  La contraseña es incorrrecta";
        require_once 'view/login.php';
      }
    }else{
     $error="  El usuario es incorrecto";
     require_once 'view/login.php';
   }
 }
public function login($usuario)
{
 $_SESSION['user_session'] = $usuario;
 $_SESSION['seguridad'] = "ok";
}
public function redirect($url)
{
 header("Location: $url");
}
public function logout()
{
  session_destroy();
  unset($_SESSION['user_session']);
  unset($_SESSION['seguridad']);
  header ('Location: index.php');
}
}
