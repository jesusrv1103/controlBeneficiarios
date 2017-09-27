<?php
//defined('BASEPATH') or exit('No se permite acceso directo');
//require_once ROOT . FOLDER_PATH .'/model/login.php';
require_once 'model/login.php';
require_once 'system/libs/session.php';

class LoginController{

  private $model;
  private $session;
  public $error;
  public function __CONSTRUCT(){
    $this->model = new Login();

       // if ($this->session->getStatus() === 1 || empty($this->session->get('usuario')))
         //   exit('Acceso denegado');
  }
  public function exec()
  {
    $this->render(__CLASS__);
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
      require_once 'view/header.php';
      require_once 'view/inicio.php';
      require_once 'view/footer.php';
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

}





















  // if($resultado->fetchColumn() > 0)
  /*  if($this->verify($request_params))
      return $this->renderErrorMessage('El Usuario y Contraseña son Obligatorios');

  $result = $this->model->signIn($request_params['usuario']);

  if(!$result->num_rows)
      return $this->renderErrorMessage("El usuario {$request_params['usuario']} no fue encontrado");

  $result = $result->fetch_object();

  if(!password_verify($request_params['password'], $result->password))
      return $this->renderErrorMessage('La contraseña es incorrecta');
//Iniciar session 
  $this->session->init();
  $this->session->add('usuario', $result->usuario);
 //var_dump($this->session->getAll());
  //header('location: /php-mvc/main');
  require_once 'view/header.php';
  require_once 'view/blankpanel.php';
  require_once 'view/footer.php';
}

private function verify($request_params)
{
    return empty($request_params['usuario']) OR empty($request_params['password']);
}

private function renderErrorMessage($message)
{
    $params = array('error_message' => $message);
    $this->render(__CLASS__, $params);
}
public function logout(){
    $this->session->close();
    require_once 'view/login.php';
  }*/
