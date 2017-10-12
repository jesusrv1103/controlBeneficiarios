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
   $log = new Login();
   $usuario=$log->usuario = $_REQUEST['usuario'];
   $password = $_REQUEST['password'];
   $password=md5($password);
   $password=crc32($password);
   $password=crypt($password,"xtem");
   $password=sha1($password);
   echo $password;
   $consulta=$this->model->verificar($log);
   if($consulta!=null){
    if($consulta->password == $password){
      $this->login($usuario,$password);
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

public function login($usuario,$password)
{
 $_SESSION['user_session'] = $usuario;
 $_SESSION['user_password'] = $password;
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
