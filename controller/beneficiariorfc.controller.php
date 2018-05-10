<?php
require_once 'model/beneficiario.php';
require_once 'model/catalogos.php';
require_once 'model/beneficiariorfc.php';
class BeneficiariorfcController{
  private $pdo;
  private $model;
  private $model2;
  private $session;
  public $error;

  public function __CONSTRUCT(){
    $this->model = new Beneficiariorfc();
    $this->model2 = new Catalogos();
  }

  public function Index(){
   if(!isset($_REQUEST['periodo'])){
    $periodo='Ver todos';
  }else{
    $periodo=$_REQUEST['periodo'];
  }
  $beneficiarios = true;
  $beneficiario_rfc=true;
  $page="view/beneficiario_rfc/index.php";
  require_once 'view/index.php';
}


//Metodo Guardar  si trae un id actualiza, no registra
public function Guardar(){
  $beneficiario= new Beneficiariorfc();
  $beneficiario->idBeneficiarioRFC = $_REQUEST['idBeneficiarioRFC'];
  $beneficiario->RFC=$_REQUEST['RFC'];
  $beneficiario->curp = $_REQUEST['curp'];
  $beneficiario->primerApellido= $_REQUEST['primerApellido'];
  $beneficiario->segundoApellido = $_REQUEST['segundoApellido'];
  $beneficiario->nombres = $_REQUEST['nombres'];
  $beneficiario->fechaAltaSat = $_REQUEST['fechaAltaSat'];
  if(substr($_REQUEST['curp'], 10,1) == "H")
  {
    $beneficiario->sexo=1;
  }
  else{
   $beneficiario->sexo=0;
 }
 $beneficiario->idAsentamientos =$_REQUEST['idAsentamientos'];
 $beneficiario->idLocalidad = $_REQUEST['idLocalidad'];
 $beneficiario->idTipoVialidad = $_REQUEST['idTipoVialidad'];
 $beneficiario->nombreVialidad = $_REQUEST['nombreVialidad'];
 $beneficiario->numeroExterior = $_REQUEST['noExterior'];
 $beneficiario->numeroInterior = $_REQUEST['noInterior'];
 $beneficiario->entreVialidades = $_REQUEST['entreVialidades'];
 $beneficiario->descripcionUbicacion = $_REQUEST['descripcionUbicacion'];
 $beneficiario->actividad=$_REQUEST['actividad'];
 $beneficiario->cobertura=$_REQUEST['cobertura'];


  //Datos de registro
 $beneficiario->usuario=$_SESSION['usuario'];
 $beneficiario->fechaAlta=date("Y-m-d H:i:s");

 $beneficiario->direccion=$_SESSION['direccion'];
 $beneficiario->estado="Activo";


 if($beneficiario->idBeneficiarioRFC > 0){
  $idRegistro=$this->model->ObtenerIdRegistro($beneficiario->idBeneficiarioRFC);
  $beneficiario->idRegistro=$idRegistro->idRegistro;
  $this->model->RegistraActualizacion($beneficiario);
  $this->model->Actualizar($beneficiario);

  $mensaje="Los datos del beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha actualizado correctamente";

}else{

  $beneficiario->idRegistro=$this->model->RegistraDatosRegistro($beneficiario);
  $this->model->Registrar($beneficiario);
  $mensaje="El beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha registrado correctamente";
}
$this->Index();
}


public function Inforegistro(){
  $idBeneficiarioRFC = $_POST['idBeneficiarioRFC'];
  $infoRegistro=$this->model->ObtenerInfoRegistro($idBeneficiarioRFC);
  $infoActualizacion=$this->model->ListarActualizacion($infoRegistro->idRegistro);

  echo   '
  <div class="modal-body">
  <div class="row">
  <div class="block-web">
  <div class="header">
  <div class="row" style="margin-bottom: 12px;">
  <div class="col-sm-12">
  <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Información general de registro</h2>
  </div>
  </div>
  </div>
  <div class="porlets-content" style="margin-bottom: -65px;">
  <table class="table table-striped">
  <tbody>
  <tr>
  <td>
  <div class="col-md-12">
  <label class="col-sm-6 lblinfo" style="margin-top: 5px;"><b>Beneficiario</b></label>
  </div>
  </td>
  </tr>
  <tr>
  <td>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><b>RFC Empresa:</b></label>
  <label class="col-sm-7 control-label">'.$infoRegistro->RFC.'</label>
  </div>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><b>Actividad:</b></label>
  <label class="col-sm-7 control-label">'.$infoRegistro->actividad.'</label>
  </div>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><b>CURP Representante legal:</b></label>
  <label class="col-sm-7 control-label">'.$infoRegistro->curp.'</label>
  </div>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><b>Nombre Representante legal:</b></label>
  <label class="col-sm-7 control-label">'.$infoRegistro->primerApellido.'&nbsp;'.$infoRegistro->segundoApellido.'&nbsp;'.$infoRegistro->nombres.'</label>
  </div>
  </td>
  </tr>
  <tr>
  <td>
  <div class="col-md-12">
  <label class="col-sm-5 lblinfo" style="margin-top: 5px;"><b>Información de registro</b></label>
  </div>
  </td>
  </tr>
  <tr>
  <td>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><strong>Usuario que registró:</strong></label>
  <label class="col-sm-6">'.$infoRegistro->usuario.'</label><br>
  </div>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><strong>Fecha y hora de registro:</strong></label>
  <label class="col-sm-6">'.$infoRegistro->fechaAlta.'</label><br>
  </div>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detallet"><strong>Estado de registro:</strong></label>
  <label class="col-sm-6" style="color:#64DD17"><b>'.$infoRegistro->estado.'</b></label><br>
  </div>
  </td>
  </tr>';
  if($infoActualizacion!=null) {
    echo '
    <tr>
    <td>
    <div class="col-md-12">
    <label class="col-sm-5 lblinfo" style="margin-top: 5px;"><b>Información de actualización</b></label>
    </div>
    </td>
    </tr>
    <tr><td><br>';
    $i=1;
    foreach ($infoActualizacion as $r):
      echo '
      <div class="col-md-6">
      <label class="col-md-12" lbl-detalle style="color:#607D8B;">'.$i.'° actualización</label>
      <label class="col-sm-5 lbl-detallet"><strong>Fecha y hora:</strong></label>
      <label class="col-sm-7">'.$r->fechaActualizacion.'</label><br>
      <label class="col-sm-5 lbl-detallet"><strong>Usuario:</strong></label>
      <label class="col-sm-7">'.$r->usuario.'</label><br>
      </div>
      ';
      if($i%2==0){
        echo "<hr>";
      }$i++;
    endforeach;
    echo '</td></tr>';
  }
  echo '
  </tbody>
  </table>
  </div><!--/porlets-content-->
  </div><!--/block-web-->
  </div>
  </div>
  <div class="modal-footer">
  <div class="row col-md-6 col-md-offset-6">
  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
  <a href="?c=Beneficiariorfc&a=Detalles&idBeneficiarioRFC='.$idBeneficiarioRFC.'" class="btn btn-info btn-sm">Ver detalles de beneficiario</a>
  </div>
  </div>';
}

public function Crud(){

  $beneficiario = new Beneficiariorfc();
  if(isset($_REQUEST['RFC'])){

    $beneficiario->RFC=$_REQUEST['RFC'];

    $verificaBen=$this->model->VerificaBeneficiarioRFC($beneficiario->RFC);

    if($verificaBen==null){
      $beneficiario_rfc=true;
      $beneficiarios=true;
      $page="view/beneficiario_rfc/beneficiario.php";
      require_once 'view/index.php';
    }else{
      $warning=true;
      $mensaje="El beneficiario ya esta registrado, <b>verifíque</b> que sus datos y la información de registro sean correctos y esten actualizados si no es así, porfavor, <a href='?c=Beneficiariorfc&a=Crud&idBeneficiarioRFC=".$beneficiario->idBeneficiarioRFC."'>actualice la información</a>.";
      $administracion = true;
      $inicio = false;
      $beneficiarios = false;
      $benrfc = $this->model->Listar($verificaBen->idBeneficiarioRFC);
      //echo "hola".$VerificaBeneficiario->idbeneficiarioRFC;
      $infoApoyo = $this->model->ObtenerInfoApoyo($verificaBen->idBeneficiarioRFC);
      $page="view/beneficiario_rfc/detalles.php";
      require_once 'view/index.php';
    }
  }if(isset($_REQUEST['idBeneficiarioRFC'])){
    $beneficiario_rfc=true;
    $beneficiarios=true;
    $beneficiario = $this->model->Listar($_REQUEST['idBeneficiarioRFC']);

    $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idBeneficiarioRFC']);

    $page="view/beneficiario_rfc/beneficiario.php";
    require_once 'view/index.php';

  }else{
    $warning=true;
    $mensaje="El beneficiario ya esta registrado, <b>verifíque</b> que sus datos y la información de registro sean correctos y esten actualizados si no es así, porfavor, <a href='?c=Beneficiariorfc&a=Crud&idBeneficiarioRFC=".$verificaBen->idBeneficiarioRFC."'>actualice la información</a>.";
    $administracion = true;
    $inicio = false;
    $beneficiarios = false;
    $ben = $this->model->Listar($verificaBen->idBeneficiarioRFC);
      //echo "hola".$VerificaBeneficiario->idbeneficiarioRFC;
    $infoApoyo = $this->model->ObtenerInfoApoyo($verificaBen->idBeneficiarioRFC);
    $page="view/beneficiario_rfc/detalles.php";
    require_once 'view/index.php';

  }
}


public function Detalles(){
  $beneficiario_rfc=true;
  $beneficiarios=true;
  $ben = new Beneficiariorfc();
  $ben = $this->model->Listar($_REQUEST['idBeneficiarioRFC']);
  $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idBeneficiarioRFC']);
  $page="view/beneficiario_rfc/detalles.php";
  require_once 'view/index.php';
}


public function RFC(){
  $tipoBen="RFC";
  $administracion = true;
  $inicio = false;
  $beneficiarios = true;
  $page="view/beneficiario_rfc/index.php";
  require_once 'view/index.php';
}



public function Eliminar(){
    $beneficiario_rfc=true; //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $beneficiario= new Beneficiariorfc();
    $beneficiario->idRegistro = $_REQUEST['idRegistro'];
    $beneficiario->estado='Inactivo';
    $this->model->Eliminar($beneficiario);
    header ('Location: index.php?c=Beneficiario&a=RFC');
  }
   public function Upload(){
    if(!isset($_FILES['file']['name'])){
      header('Location: ./?c=beneficiariorfc');
    }
    $archivo = $_FILES['file']['name'];
    $tipo = $_FILES['file']['type'];
    $destino = "./assets/files/".$archivo;
    if(copy($_FILES['file']['tmp_name'], $destino)){
      //echo "Archivo Cargado Con Éxito" . "<br><br>";
      $this->Importar();
      //mandar llamar todas las funciones a importar
    }
    else{
      $this->Index();
    }
  }

  public function Importar(){
    if (file_exists("./assets/files/beneficiariosrfc.xlsx")) {
  //Agregamos la librería
      require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
        //Variable con el nombre del archivo
      $nombreArchivo = './assets/files/beneficiariosrfc.xlsx';
        // Cargo la hoja de cálculo
      $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
        //Asigno la hoja de calculo activa
      $objPHPExcel->setActiveSheetIndex(0);
        //Obtengo el numero de filas del archivo
      $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
      $this->LeerArchivo($objPHPExcel,$numRows);
      $mensaje="Se ha leído correctamente el archivo <strong>beneficiariosrfc.xlsx</strong>.<br><i class='fa fa-check'></i> Se han insertado correctamente los datos de beneficiarios.";
      $beneficiarios = true;
      $beneficiario_rfc=true;
      $tipoBen="RFC";
      $page="view/beneficiario_rfc/index.php";
      require_once 'view/index.php';
    }
        //si por algo no cargo el archivo bak_
    else {

      
      $error=true;
      $mensaje="El archivo <strong>beneficiariosrfc.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
      $beneficiarios = true;
      $beneficiario_rfc=true;
      $page="view/beneficiario_rfc/index.php";
      require_once 'view/index.php';
    }
  }
  public function LeerArchivo($objPHPExcel,$numRows){
    try{
      $numRow=2;
      do {

            //echo "Entra";
       $benrfc = new Beneficiariorfc;
       $benrfc->RFC = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
       $benrfc->curp = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
       $benrfc->primerApellido = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
       $benrfc->segundoApellido = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
       $benrfc->nombres = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
       $benrfc->fechaAltaSat = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
       $benrfc->sexo = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
       $benrfc->idAsentamientos = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
       $benrfc->idLocalidad = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
       $benrfc->idTipoVialidad = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
       $benrfc->nombreVialidad = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
       $benrfc->numeroExterior = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();
       $benrfc->numeroInterior = $objPHPExcel->getActiveSheet()->getCell('M'.$numRow)->getCalculatedValue();
       $benrfc->entreVialidades = $objPHPExcel->getActiveSheet()->getCell('N'.$numRow)->getCalculatedValue();
       $benrfc->descripcionUbicacion = $objPHPExcel->getActiveSheet()->getCell('O'.$numRow)->getCalculatedValue();
       $benrfc->actividad = $objPHPExcel->getActiveSheet()->getCell('P'.$numRow)->getCalculatedValue();
       $benrfc->cobertura = $objPHPExcel->getActiveSheet()->getCell('Q'.$numRow)->getCalculatedValue();
       if (!$benrfc->RFC == null) {
       //Datos de registro
         $benrfc->usuario=$_SESSION['usuario'];
         $benrfc->fechaAlta=date("Y-m-d H:i:s");
         $benrfc->direccion=$_SESSION['direccion'];
         $benrfc->estado="Activo";
         $benrfc->idRegistro=$this->model->RegistraDatosRegistro($benrfc);
         $this->model->ImportarBeneficiarioRFC($benrfc);
       }
       $numRow+=1;
     } while(!$benrfc->RFC == null);
   }catch (Exception $e) {
    $error=true;
    $mensaje="Error al insertar datos del archivo";
    $beneficiarios = true;
    $beneficiario_rfc=true;
    $page="view/beneficiario_rfc/index.php";
    require_once 'view/index.php';
  }
}

}
