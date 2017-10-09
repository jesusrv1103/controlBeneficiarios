<?php
require_once 'model/beneficiario.php';
require_once 'model/catalogos.php';
class BeneficiarioController{
  private $pdo;
  private $model;
  private $model2; 
  private $session;
  public $error;

  public function __CONSTRUCT(){
    $this->model = new Beneficiario();
    $this->model2 = new Catalogos();
    /*try
    {
      $this->pdo = Database::StartUp();     
    }
    catch(Exception $e)
    {
      die($e->getMessage());
    }*/
  }
  public function Index(){
   $administracion = true;
   $inicio = false;
   $beneficiarios = true;
   $page="view/beneficiario/index.php";
   require_once 'view/index.php';
 }  

 public function Alta(){
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/beneficiario/beneficiario.php";
  require_once 'view/index.php';
} 

public function Upload(){
  $archivo = $_FILES['file']['name'];
  $tipo = $_FILES['file']['type'];
  $destino = "./assets/importaciones/bak_" . $archivo;
  if (copy($_FILES['file']['tmp_name'], $destino)){
    //echo "Archivo Cargado Con Éxito" . "<br><br>";
    $this->Importar($archivo);
  }
  else{
    //echo "Error Al Cargar el Archivo". "<br><br>";
  }
}

public function Importar($archivo){
  if (file_exists("./assets/importaciones/bak_" . $archivo)) {
  //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
  //Variable con el nombre del archivo
    $nombreArchivo = './assets/importaciones/bak_' . $archivo;
  // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
  //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
  //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    //echo '<table border=1><tr><td>Producto</td><td>Precio</td><td>Existencia</td></tr>';

    for ($i = 2; $i <= $numRows; $i++) {

      $ben = new Beneficiario();
      $ben->nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
      $ben->precio = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
      $ben->existencia = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
      $this->model->Importar($ben);

     /* echo '<tr>';
      echo '<td>'. $ben->nombre.'</td>';
      echo '<td>'. $ben->precio.'</td>';
      echo '<td>'. $ben->existencia.'</td>';
      echo '</tr>';
      */
    }

   /* echo '<table>';
    echo '<br> Importación con éxito'; */
    $mensaje="El archivo se ha importado correctamente";
    $page="view/beneficiario/index.php";
    $administracion = true;
    $inicio = false;
    $beneficiarios = true;
    require_once 'view/index.php';

  }
        //si por algo no cargo el archivo bak_ 
  else {
    echo "Necesitas primero importar el archivo";
  }
}
public function Update(){

}
public function Delete(){

}
}
