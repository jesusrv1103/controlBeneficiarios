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
  isset($_REQUEST['viviendaInternet'])? $beneficiario->viiendaInternet="Si": $beneficiario->viviendaInternet="No";
  $beneficiario->idBeneficiario > 0 
  ? $this->model->Actualizar($beneficiario)
  : $this->model->Registrar($beneficiario);
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $mensaje="El beneficiario se ha registrado correctamente";
  $page="view/beneficiario/index.php";
  require_once 'view/index.php';
}

public function Upload(){
  $archivo = $_FILES['file']['name'];
  $tipo = $_FILES['file']['type'];
  $destino = "./assets/files/beneficiarios.xlsx";
  if (copy($_FILES['file']['tmp_name'], $destino)){
    //echo "Archivo Cargado Con Éxito" . "<br><br>";
    $this->Importar($archivo);
  }
  else{
    $mensaje="Error al cargar el archivo";
    $page="view/beneficiario/index.php";
    $beneficiarios = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
}

public function Crud(){
 $beneficiario = new Beneficiario();
 if(isset($_REQUEST['idBeneficiario'])){
  $beneficiario = $this->model->Listar($_REQUEST['idBeneficiario']);  
}
$page="view/beneficiario/beneficiario.php";
require_once 'view/index.php';
}

public function Importar($archivo){
  if (file_exists("./assets/importaciones/bak_" . $archivo)) {
  //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
        //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/beneficiarios.xlsx';
        // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
        //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
        //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->Beneficiario($objPHPExcel,$numRows);
    $mensaje="Se han importado correctamente los beneficiarios";
    $page="view/beneficiario/index.php";
    $beneficiarios = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
        //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>beneficiarios.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/beneficiarios/index.php";
    $beneficiarios = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
}
public function Beneficiario($objPHPExcel,$numRows){
  try{
    $numRow=2;
    do {
            //echo "Entra";
   $cat= new Beneficiario;
       $cat->curp = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
       $cat->primerApellido = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
       $cat->segundoApellido = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
       $cat->nombres = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
       $cat->idIdentificacion = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
       $cat->idTipoVialidad = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
       $cat->nombreVialidad = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
       $cat->noExterior = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
       $cat->noInterior = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
       $cat->idAsentamientos = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
       $cat->idLocalidad = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
       $cat->entreVialidades = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();
       $cat->descripcionUbicacion = $objPHPExcel->getActiveSheet()->getCell('M'.$numRow)->getCalculatedValue();
       $cat->estudioSocioeconomico = $objPHPExcel->getActiveSheet()->getCell('N'.$numRow)->getCalculatedValue();
       $cat->idEstadoCivil = $objPHPExcel->getActiveSheet()->getCell('O'.$numRow)->getCalculatedValue();
       $cat->jefeFamilia = $objPHPExcel->getActiveSheet()->getCell('P'.$numRow)->getCalculatedValue();
       $cat->idOcupacion = $objPHPExcel->getActiveSheet()->getCell('Q'.$numRow)->getCalculatedValue();
       $cat->idIngresoMensual = $objPHPExcel->getActiveSheet()->getCell('R'.$numRow)->getCalculatedValue();
       $cat->integrantesFamilia = $objPHPExcel->getActiveSheet()->getCell('S'.$numRow)->getCalculatedValue();
       $cat->dependientesEconomicos = $objPHPExcel->getActiveSheet()->getCell('T'.$numRow)->getCalculatedValue();
       $cat->idVivienda =$objPHPExcel->getActiveSheet()->getCell('U'.$numRow)->getCalculatedValue();
       $cat->noHabitantes = $objPHPExcel->getActiveSheet()->getCell('V'.$numRow)->getCalculatedValue();
       $cat->viviendaElectricidad = $objPHPExcel->getActiveSheet()->getCell('W'.$numRow)->getCalculatedValue();
       $cat->viviendaAgua = $objPHPExcel->getActiveSheet()->getCell('X'.$numRow)->getCalculatedValue();
       $cat->viviendaDrenaje = $objPHPExcel->getActiveSheet()->getCell('Y'.$numRow)->getCalculatedValue();
       $cat->viviendaGas = $objPHPExcel->getActiveSheet()->getCell('Z'.$numRow)->getCalculatedValue();
       $cat->viviendaTelefono = $objPHPExcel->getActiveSheet()->getCell('AA'.$numRow)->getCalculatedValue();
       $cat->viviendaInternet = $objPHPExcel->getActiveSheet()->getCell('AB'.$numRow)->getCalculatedValue();
       $cat->idNivelEstudios = $objPHPExcel->getActiveSheet()->getCell('AC'.$numRow)->getCalculatedValue();
       $cat->idSeguridadSocial = $objPHPExcel->getActiveSheet()->getCell('AD'.$numRow)->getCalculatedValue();
       $cat->idDiscapacidad = $objPHPExcel->getActiveSheet()->getCell('AE'.$numRow)->getCalculatedValue();        
       $cat->idGrupoVulnerable = $objPHPExcel->getActiveSheet()->getCell('AF'.$numRow)->getCalculatedValue();
       $cat->beneficiarioColectivo = $objPHPExcel->getActiveSheet()->getCell('AG'.$numRow)->getCalculatedValue();

      if (!$cat->curp == null) {
        $this->model->ImportarBeneficiario($cat);
      }
      $numRow+=1;
    } while(!$cat->curp == null);

  }catch (Exception $e) {
    $mensaje="error";
    $page="view/beneficiario/index.php";
    $beneficiarios = true;
    $catalogos=true;
    require_once 'view/index.php';
  }
}
public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $this->model->Eliminar($_REQUEST['idBeneficiario']);
    header ('Location: index.php?c=Beneficiario&a=Index');
  }

  public function Detalles(){
    $administracion=true;
    $beneficiarios=true;
    $ben = new Beneficiario();
    $ben = $this->model->Listar($_REQUEST['idBeneficiario']);
    $page="view/beneficiario/detalles.php";
    require_once 'view/index.php';
  }
}
