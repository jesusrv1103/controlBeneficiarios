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

//Metodo Guardar  si trae un id actualiza, no registra
 public function Guardar(){
  $beneficiario= new Beneficiario();
  $beneficiario->idBeneficiario = $_REQUEST['idBeneficiario'];
  $beneficiario->curp = $_REQUEST['curp'];
  $beneficiario->primerApellido= $_REQUEST['primerApellido'];
  $beneficiario->segundoApellido = $_REQUEST['segundoApellido'];
  $beneficiario->nombres = $_REQUEST['nombres'];
  $beneficiario->idIdentificacion = $_REQUEST['idIdentificacion'];
  $beneficiario->idNivelEstudios = $_REQUEST['idNivelEstudios'];
  $beneficiario->idSeguridadSocial = $_REQUEST['idSeguridadSocial'];
  $beneficiario->idDiscapacidad = $_REQUEST['idDiscapacidad'];
  $beneficiario->beneficiarioColectivo=$_REQUEST['beneficiarioColectivo'];
 
  //vialidad
  $beneficiario->idTipoVialidad = $_REQUEST['idTipoVialidad'];
  $beneficiario->nombreVialidad = $_REQUEST['nombreVialidad'];
  $beneficiario->noExterior = $_REQUEST['noExterior'];
  $beneficiario->noInterior = $_REQUEST['noInterior'];
  $beneficiario->idAsentamientos = $_REQUEST['idAsentamientos'];
  $beneficiario->idLocalidad = $_REQUEST['idLocalidad'];
  $beneficiario->entreVialidades = $_REQUEST['entreVialidades'];
  $beneficiario->descripcionUbicacion = $_REQUEST['descripcionUbicacion'];
 
 //estado social
  $beneficiario->estudioSocioeconomico=$_REQUEST['estudioSocioeconomico'];
  $beneficiario->idEstadoCivil=$_REQUEST['idEstadoCivil'];
  $beneficiario->jefeFamilia=$_REQUEST['jefeFamilia'];
  $beneficiario->idOcupacion=$_REQUEST['idOcupacion']; 
  $beneficiario->idIngresoMensual=$_REQUEST['idIngresoMensual'];
  $beneficiario->integrantesFamilia=$_REQUEST['integrantesFamilia'];
  $beneficiario->dependientesEconomicos=$_REQUEST['dependientesEconomicos'];
  $beneficiario->idGrupoVulnerable=$_REQUEST['idGrupoVulnerable'];

 //Vivienda
  $beneficiario->idVivienda=$_REQUEST['idVivienda'];
  $beneficiario->noHabitantes=$_REQUEST['noHabitantes'];
  isset($_REQUEST['viviendaElectricidad'])? $beneficiario->viviendaElectricidad="Si": $beneficiario->viviendaElectricidad="No";
  isset($_REQUEST['viviendaAgua'])? $beneficiario->viviendaAgua="Si": $beneficiario->viviendaAgua="No";
  isset($_REQUEST['viviendaDrenaje'])? $beneficiario->viviendaDrenaje="Si": $beneficiario->viviendaDrenaje="No";
  isset($_REQUEST['viviendaGas'])? $beneficiario->viviendaGas="Si": $beneficiario->viviendaGas="No";
  isset($_REQUEST['viviendaTelefono'])? $beneficiario->viviendaTelefono="Si": $beneficiario->viviendaTelefono="No";
  isset($_REQUEST['viviendaInternet'])? $beneficiario->viviendaInternet="Si": $beneficiario->viviendaInternet="No";
  $beneficiario->idBeneficiario > 0 
  ? $this->model->Actualizar($beneficiario)
  : $this->model->Registrar($beneficiario);
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/beneficiario/index.php";
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

public function Crud(){
 $beneficiario = new Beneficiario();
 if(isset($_REQUEST['idBeneficiario'])){
  $beneficiario = $this->model->Obtener($_REQUEST['idBeneficiario']);
}
$page="view/beneficiario/beneficiario.php";
require_once 'view/index.php';
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



public function Detalles(){
  $administracion=true;
  $beneficiarios=true;
  $ben = new Beneficiario();
  $ben = $this->model->Listar($_REQUEST['idBeneficiario']);
  $page="view/beneficiario/detalles.php";
  require_once 'view/index.php';
}

public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $this->model->Eliminar($_REQUEST['idBeneficiario']);
    header ('Location: index.php?c=Beneficiario&a=Index');
  }

}
