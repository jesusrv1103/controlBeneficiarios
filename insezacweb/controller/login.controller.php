<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once 'model/login.php';
require_once LIBS_ROUTE .'session.php';

class LoginController{

    private $model;
    private $session;
    
    public function __CONSTRUCT(){
        $this->model = new Login();
        $this->session = new session();
    }
    public function exec()
    {
        $this->render(__CLASS__);
    }

    public function Index(){
     require_once 'view/login.php';
 }

 public function Acceder($request_params){
        //Tu codigo...
    if($this->verify($request_params))
      return $this->renderErrorMessage('El Usuario y Contraseña son Obligatorios');

  $result = $this->model->signIn($request_params['usuario']);

  if(!$result->num_rows)
      return $this->renderErrorMessage("El usuario {$request_params['usuario']} no fue encontrado");

  $result = $result->fetch_object();

  if(!password_verify($request_params['password'], $result->password))
      return $this->renderErrorMessage('La contraseña es incorrecta');

  $this->session->init();
  $this->session->add('usuario', $result->usuario);
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
}