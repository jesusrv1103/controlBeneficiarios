<?php
require_once 'model/login.php';

class LoginController{
  private $model;
  private $session;
  public $error;
  public function __CONSTRUCT(){
    $this->model = new Login();
       // if ($this->session->getStatus() === 1 || empty($this->session->get('usuario')))
     //   exit('Acceso denegado');
  }
  public function Index(){
    require_once 'view/login.php';
  }  
  public function Acceder(){
   $log = new Login();  
   $log->usuario = $_REQUEST['usuario'];
   $password = $_REQUEST['password'];
   $consulta=$this->model->verificar($log);
   if($consulta!=null){
    if($consulta->password == $password){
      $_SESSION['user_session'] = $consulta->idusuarios;
      $controller=new LoginController;
      $administracion=false;
      $inicio=true;
      $beneficiarios=false;
      $page="body.php";
      require_once 'view/index.php';
    }
    else
    {
      $error="  La contraseña es incorrrecta";
      require_once 'view/login.php';
    }

  }else{
   $error="  El usuario es incorrecto";
   require_once 'view/login.php';
 }
}
public function is_loggedin()
{
  if(isset($_SESSION['user_session']))
  {
   return true;
 }
 else
 {
  return false;
}
}
public function redirect($url)
{
 header("Location: $url");
}
public function logout()
{
  session_destroy();
  unset($_SESSION['user_session']);
//return true;
//require_once 'index.php';
  header("Location: index.php");
}
}