<?php
require_once 'model/beneficiario.php';
require_once 'model/catalogos.php';
require_once 'model/beneficiariorfc.php';
class BeneficiariorfcController{
  private $pdo;
  private $model;
  private $model2;
  private $session;
  private $error;
  private $mensaje;

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


public function Consultas(){
  $periodo=$_REQUEST['periodo'];
  foreach ($this->model->Listar1($periodo) as $r):
    echo '
  <tr class="grade">
  <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro('; echo $r->idBeneficiarioRFC; echo ')" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
    <td>'. $r->curp .'</td>
    <td>'. $r->nombres." ".$r->primerApellido." ".$r->segundoApellido .'</td>
    <td>'. $r->nombreMunicipio .'</td>
    <td class="center">
      <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiariorfc&a=Detalles&idBeneficiarioRFC='. $r->idBeneficiarioRFC .'" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
    </td>';
    if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){
      echo 
      '<td class="center">
      <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiariorfc&a=Crud&idBeneficiarioRFC='. $r->idBeneficiario .'"><i class="fa fa-edit"></i></a>
    </td>
    <td class="center">
      <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario('; echo $r->idRegistro; echo ')" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
    </td>';
  } 
  echo '</tr>';
  endforeach; 
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
 $beneficiario->idMunicipio = $_REQUEST['idMunicipio'];
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

  $this->mensaje="Los datos del beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha actualizado correctamente";

}else{

  $beneficiario->idRegistro=$this->model->RegistraDatosRegistro($beneficiario);
  $this->model->Registrar($beneficiario);
  $this->mensaje="El beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha registrado correctamente";
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

  public function VerificarBeneficiario()
  {
    $rfc=$_REQUEST['rfc'];
    $verificacion=$this->model->VerificaBeneficiarioRFC($rfc);
    if($verificacion!=null){
      if($verificacion->estado=="Activo")
        echo "Activo";
      else
        echo "Inactivo";
    }else{
      echo 'null';
    }
  }

  public function ActivarBeneficiario()
  {
    $rfc=$_REQUEST['rfc'];
    $verificaBen=$this->model->VerificaBeneficiarioRFC($rfc);
    $idRegistro = $verificaBen->idRegistro;
    $this->model->Activar($idRegistro);
    $beneficiario = new Beneficiario();
    $this->mensaje="Se ha activado correctamente el beneficiario, porfavor compruebe que la información que nosotros tenemos este actualizada, si no es así, ayudenos a <a href='?c=Beneficiario&a=Crud&idBeneficiario=".$verificaBen->idBeneficiarioRFC."'>actualizar la información</a>.";     
    $beneficiarios = false;
    $beneficiario_rfc=true;
    $ben = $this->model->Listar($verificaBen->idBeneficiarioRFC);
    $infoApoyo = $this->model->ObtenerInfoApoyo($verificaBen->idBeneficiarioRFC);
    $page="view/beneficiario_rfc/detalles.php";
    require_once 'view/index.php';
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
        $this->mensaje="El beneficiario ya esta registrado, <b>verifíque</b> que sus datos y la información de registro sean correctos y esten actualizados si no es así, porfavor, <a href='?c=beneficiariorfc&a=Crud&idBeneficiarioRFC=".$beneficiario->idBeneficiarioRFC."'>actualice la información</a>.";
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

  public function Eliminar(){
    $beneficiario_rfc=true; //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $beneficiario= new Beneficiariorfc();
    $beneficiario->idRegistro = $_REQUEST['idRegistro'];
    $beneficiario->estado='Inactivo';
    $this->model->Eliminar($beneficiario);
    $this->mensaje="Se ha eliminado correctamente el beneficiario";
    $this->Index();
  }

  public function Upload(){
    if(!isset($_FILES['file']['name'])){
      header('Location: ./?c=beneficiariorfc');
    }
    $archivo=$_FILES['file'];
    if($archivo['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
      $nameArchivo = $archivo['name'];
      $tmp = $archivo['tmp_name'];
      $src = "./assets/files/".$nameArchivo;
      if(move_uploaded_file($tmp, $src)){
        $this->Importar($src);

        if (is_file($src)) {
          //chmod($src,0777);
          unlink($src);
        }  
      }else{
        $this->error=true;
        $this->mensaje=$this->mensaje."El tipo de archivo es invalido, porfavor verifique que el archivo sea <strong>.xlsx</strong>";
        $this->Index();
      }
    }
  }

  public function Importar($src){
   require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
   $nombreArchivo = $src;
   $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
   $objPHPExcel->setActiveSheetIndex(0);
   $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
   $this->LeerArchivo($objPHPExcel,$numRows);
   $this->mensaje="Se ha leído correctamente el archivo <strong>beneficiariosrfc.xlsx</strong>.<br><i class='fa fa-check'></i> Se han insertado correctamente los datos de beneficiarios.";
   $this->Index();

 }

 public function LeerArchivo($objPHPExcel,$numRows){
  $numRow=2;
  do {
   $benrfc = new Beneficiariorfc;
   $benrfc->RFC = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
   $benrfc->curp = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
   $benrfc->primerApellido = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
   $benrfc->segundoApellido = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
   $benrfc->nombres = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
   $benrfc->fechaAltaSat = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
   $claveMunicipio = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
   $benrfc->sexo = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
   $benrfc->idAsentamientos = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
   $benrfc->idLocalidad = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
   $benrfc->idTipoVialidad = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
   $benrfc->nombreVialidad = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();
   $benrfc->numeroExterior = $objPHPExcel->getActiveSheet()->getCell('M'.$numRow)->getCalculatedValue();
   $benrfc->numeroInterior = $objPHPExcel->getActiveSheet()->getCell('N'.$numRow)->getCalculatedValue();
   $benrfc->entreVialidades = $objPHPExcel->getActiveSheet()->getCell('O'.$numRow)->getCalculatedValue();
   $benrfc->descripcionUbicacion = $objPHPExcel->getActiveSheet()->getCell('P'.$numRow)->getCalculatedValue();
   $benrfc->actividad = $objPHPExcel->getActiveSheet()->getCell('Q'.$numRow)->getCalculatedValue();
   $benrfc->cobertura = $objPHPExcel->getActiveSheet()->getCell('R'.$numRow)->getCalculatedValue();
   if (!$benrfc->RFC == null) {
     $consult = $this->model->ObtenerIdMunicipio($claveMunicipio);
     $benrfc->idMunicipio=$consult->idMunicipio;
     $benrfc->usuario=$_SESSION['usuario'];
     $benrfc->fechaAlta=date("Y-m-d H:i:s");
     $benrfc->direccion=$_SESSION['direccion'];
     $benrfc->estado="Activo";
     $benrfc->idRegistro=$this->model->RegistraDatosRegistro($benrfc);
     $this->model->ImportarBeneficiarioRFC($benrfc);
   }
   $numRow+=1;
 } while(!$benrfc->RFC == null);

}

public function ListarAsentamientos(){
  header('Content-Type: application/json');
  $idLocalidad=$_REQUEST['idLocalidad'];
  $obLocalidad=$this->model->ObtenerLocalidad($idLocalidad);
  if($obLocalidad!=null){
    $localidad=$obLocalidad->localidad;
    $datos = array();
    $row_array['estado']='ok';
    array_push($datos, $row_array);
    foreach ($this->model->ListarAsentamientos($localidad) as $asentamiento):
      $row_array['idAsentamientos']  = $asentamiento->idAsentamientos;
    $row_array['nombreAsentamiento']  = $asentamiento->nombreAsentamiento;
    array_push($datos, $row_array);
    endforeach;
  }
  echo json_encode($datos, JSON_FORCE_OBJECT);
}

}
