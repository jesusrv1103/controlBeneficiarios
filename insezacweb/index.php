<?php
//error_reporting(ERROR_REPORTING_LEVEL);
require_once 'model/database.php';
session_start();
if (!isset($_REQUEST['c']) && isset($_SESSION['seguridad'])){
    //echo "<script type='text/javascript'> alert('No hay sesion'); </script>";
    header("Location: index.php?c=Inicio"); 
}
$controller = 'login';
// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();   
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ));
}
?>