<?php
require_once 'model/apoyos.php';

class ApoyosController{

  private $model;
  private $session;
  public $error;
  public function __CONSTRUCT(){
    $this->model = new Apoyos();
  }
  public function Index(){
   $apoyos = true;
   $page="view/apoyos_curp/index.php";
   require_once 'view/index.php';
 }
 public function Crud(){
  $apoyo = new Apoyos();
  if(isset($_REQUEST['idApoyo'])){
    $_REQUEST['idApoyo'];
    $apoyo = $this->model->Obtener($_REQUEST['idApoyo']);
  }
  $apoyos = true;
  $page="view/apoyos_curp/apoyos.php";
  require_once 'view/index.php';
}

public function Upload(){
  if(!isset($_FILES['file']['name'])){
    header('Location: ./?c=apoyos');
  }
  $archivo=$_FILES['file'];
  if($archivo['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
    if($archivo['name']=="apoyos.xlsx"){
      $nameArchivo = $archivo['name'];
      $tmp = $archivo['tmp_name'];
      $archivo['type'];
      $src = "./assets/files/".$nameArchivo;
      if(move_uploaded_file($tmp, $src)){
        $this->Importar();
      }  
    }else{
      $this->error=true;
      $this->mensaje="El nombre del archivo es invalido, porfavor verifique que el nombre del archivo sea <strong>apoyos.xlsx</strong>";
      $this->Index();
    }
  }else{
    $this->error=true;
    $this->mensaje="El tipo de archivo es invalido, porfavor verifique que el archivo sea <strong>.xlsx</strong>";
    $this->Index();
  }
}

public function Importar(){
  if (file_exists("./assets/files/apoyos.xlsx")) {
      //Agregamos la librería
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
      //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/apoyos.xlsx';
      // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
      //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
      //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->LeerArchivo($objPHPExcel,$numRows);
    $this->mensaje="Se ha leído correctamente el archivo <strong>apoyos.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de apoyos.";
    if($_SESSION['numRegErroneos']>0){
      $page="view/apoyos_curp/resumenImportar.php";
      $apoyos = true;
      $catalogos=true;
      require_once 'view/index.php';
    }else{
     $apoyos = true;
     $catalogos=true;
     $tipoBen="CURP";
     $page="view/apoyos_curp/index.php";
     require_once 'view/index.php';
   }

 }
    //si por algo no cargo el archivo bak_
 else {
  $this->error=true;
  $this->mensaje="El archivo <strong>apoyos.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
  $page="view/apoyos_curp/index.php";
  $apoyos = true;
  $catalogos=true;
  require_once 'view/index.php';
}
}

public function LeerArchivo($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("apoyos");
  unset($_SESSION['numRegErroneos']);
  $numRow=2;
  $arrayError=array();
  $numRegErroneos=0;
  do {
    $numError=0;
    $apoyos = new Apoyos();

    //----------VALIDANDO LA CURP--------------------
    $curp = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    if(!$this->validate_curp($curp)){
      $row_array['Curp']=$curp;
      $numError++;
    }else{
      $row_array['Curp']='0';
    }
    //----------VALIDANDO LA Id ORIGEN--------------------
    $apoyos->idOrigen = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    if(!is_numeric($apoyos->idOrigen)){
      $row_array['Id Origen']=$apoyos->idOrigen;
      $numError++;
    }else{
      if($apoyos->idOrigen>4 || $apoyos->idOrigen<1){
        $row_array['Id Origen']=$apoyos->idOrigen;
        $numError++;
      }else{
        $row_array['Id Origen']='0';
      }
    }
    //----------VALIDANDO Id SUBPROGRAMA--------------------
    $apoyos->idSubprograma = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
    if(!is_numeric($apoyos->idSubprograma)){
      $row_array['Id Subprograma']=$apoyos->idSubprograma;
      $numError++;
    }else{
      if($apoyos->idSubprograma==""){
        $row_array['Id Subprograma']="Campo vacío";
        $numError++;
      }else{
        $row_array['Id idSubprograma']='0';
      }
    }
    //----------VALIDANDO Id CARACTERISTICA--------------------
    $apoyos->idCaracteristica = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
    if(!is_numeric($apoyos->idCaracteristica)){
      $row_array['Id Caracteristica']=$apoyos->idCaracteristica;
      $numError++;
    }else{
      if($apoyos->idCaracteristica>54 || $apoyos->idCaracteristica<1){
        $row_array['Id Caracteristica']=$apoyos->idCaracteristica;
        $numError++;
      }else{
        $row_array['Id Caracteristica']='0';
      }
    }
    //----------VALIDANDO IMPORTE APOYO--------------------
    $apoyos->importeApoyo = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
    if(!is_numeric($apoyos->importeApoyo)){
      $row_array['Importe Apoyo']=$apoyos->importeApoyo;
      $numError++;
    }else{
      if($apoyos->importeApoyo==""){
        $row_array['Importe Apoyo']="Campo vacío";
        $numError++;
      }else{
        $row_array['Importe Apoyo']='0';
      }
    }
    //----------VALIDANDO NUMEROS APOYO--------------------
    $apoyos->numerosApoyo = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
    if(!is_numeric($apoyos->numerosApoyo)){
      $row_array['Numeros Apoyo']=$apoyos->numerosApoyo;
      $numError++;
    }else{
      if($apoyos->numerosApoyo==""){
        $row_array['Numeros Apoyo']="Campo vacío";
        $numError++;
      }else{
        $row_array['Numeros Apoyo']='0';
      }
    }
    //----------VALIDANDO FECHA APOYO--------------------
    $apoyos->fechaApoyo = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
    if($apoyos->fechaApoyo==""){
      $row_array['Fecha de apoyo']="Campo vacío";
      $numError++;
    }else{
      $row_array['Fecha de apoyo']='0';
    }
    //----------VALIDANDO ID PERIODICIDAD--------------------
    $apoyos->idPeriodicidad = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
    if(!is_numeric($apoyos->idPeriodicidad)){
      $row_array['Id Periodicidad']=$apoyos->idPeriodicidad;
      $numError++;
    }else{
      if($apoyos->idPeriodicidad>7 || $apoyos->idPeriodicidad<1){
        $row_array['Id Periodicidad']=$apoyos->idPeriodicidad;
        $numError++;
      }else{
        $row_array['Id Periodicidad']='0';
      }
    }
    //----------VALIDANDO CLAVE PRESUPUESTAL--------------------
    $apoyos->clavePresupuestal = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
    if(!is_numeric($apoyos->clavePresupuestal)){
      $row_array['Clave Presupuestal']=$apoyos->clavePresupuestal;
      $numError++;
    }else{
      if($apoyos->clavePresupuestal==""){
        $row_array['Clave Presupuestal']="Campo vacío";
        $numError++;
      }else{
        $row_array['Clave Presupuestal']='0';
      }
    }

    if (!$curp == null) {
      $apoyos->usuario=$_SESSION['usuario'];
      $apoyos->fechaAlta=date("Y-m-d H:i:s");
      $apoyos->direccion=$_SESSION['direccion'];
      $apoyos->estado="Activo";
      $consult = $this->model->ObtenerIdBen($curp);
      $apoyos->idBeneficiario=$consult->idBeneficiario;
      //echo $apoyos->idBeneficiario;
      $apoyos->idRegistroApoyo=$this->model->RegistraDatosRegistro($apoyos);
      $this->model->ImportarApoyo($apoyos);
    }
    $numRow+=1;
  } while (!$curp == null);
  $_SESSION['numRegErroneos']=$numRegErroneos; 

  if($numRegErroneos>0){

   $this->arrayError=$arrayError;

 }
} catch (Exception $e) {
 $mensaje="error al importar los datos de los apoyos";
 $page="view/apoyos_curp/index.php";
 $administracion=true;
 $apoyos=true;
 require_once 'view/index.php';
}
}

function validate_curp($valor) {     
 if(strlen($valor)==18){         
  $letras     = substr($valor, 0, 4);
  $numeros    = substr($valor, 4, 6);         
  $sexo       = substr($valor, 10, 1);
  $mxState    = substr($valor, 11, 2); 
  $letras2    = substr($valor, 13, 3); 
  $homoclave  = substr($valor, 16, 2);
  if(ctype_alpha($letras) && ctype_alpha($letras2) && ctype_digit($numeros) && ctype_digit($homoclave) && $this->is_mx_state($mxState) && $this->is_sexo_curp($sexo)){ 
    return true; 
  }         
  return false;
}else{
 return false; 
} 
}


function is_mx_state($state){     
  $mxStates = [         
  'AS','BS','CL','CS','DF','GT',         
  'HG','MC','MS','NL','PL','QR',         
  'SL','TC','TL','YN','NE','BC',         
  'CC','CM','CH','DG','GR','JC',         
  'MN','NT','OC','QT','SP','SR',         
  'TS','VZ','ZS'    
  ];     
  if(in_array(strtoupper($state),$mxStates)){         
    return true;     
  }     
  return false; 
}

function is_sexo_curp($sexo){     
  $sexoCurp = ['H','M'];     
  if(in_array(strtoupper($sexo),$sexoCurp)){         
   return true;     
 }     
 return false; 
}
public function Eliminar(){
  $this->model->Eliminar($_REQUEST['idApoyo']);
  
  $apoyos = true;
  $page="view/apoyos_curp/index.php";
  $mensaje="Se ha eliminado correctamente el apoyo";
  require_once 'view/index.php';
}
public function Guardar(){
  $apoyo= new Apoyos();
  $apoyo->idApoyo = $_REQUEST['idApoyo'];
  $apoyo->idBeneficiario = $_REQUEST['idBeneficiario'];
  $apoyo->idOrigen = $_REQUEST['idOrigen'];
  $apoyo->idSubprograma = $_REQUEST['idSubprograma'];
  $apoyo->idCaracteristica = $_REQUEST['idCaracteristica'];
  $apoyo->importeApoyo = $_REQUEST['importeApoyo'];
  $apoyo->numeroApoyo = 2;
  $apoyo->fechaApoyo = $_REQUEST['fechaApoyo'];
  $apoyo->idPeriodicidad = $_REQUEST['idPeriodicidad'];
  $apoyo->usuario=$_SESSION['usuario'];
  $apoyo->direccion=$_SESSION['direccion'];
  $apoyo->fechaAlta=date("Y-m-d H:i:s");
  $apoyo->estado="ACTIVO";
  if($apoyo->idApoyo>0){
   $idRegistro=$this->model->ObtenerIdRegistro($apoyo->idApoyo);
   $apoyo->idRegistroApoyo=$idRegistro->idRegistroApoyo;
   $this->model->Actualizar($apoyo);
   $this->model->RegistraActualizacion($apoyo);
   $mensaje="Se han actualizado correctamente los datos del Apoyo";
 }else{
  $apoyo->idRegistroApoyo=$this->model->RegistraDatosRegistro($apoyo);
  $this->model->Registrar($apoyo);
  $mensaje="Se han registrado correctamente los datos del Apoyo";
} 

$apoyos = true;
$page="view/apoyos_curp/index.php";
require_once 'view/index.php';
}


public function ListarSubprogramas(){
  header('Content-Type: application/json');
  $idPrograma=$_REQUEST['idPrograma'];
  $datos = array();
  $row_array['estado']='ok';
  array_push($datos, $row_array);

  foreach ($this->model->ListarSubprogramas($idPrograma) as $subprograma): 
    $row_array['idSubprograma']  = $subprograma->idSubprograma;
  $row_array['subprograma']  = $subprograma->subprograma;
  array_push($datos, $row_array);
  endforeach;

  echo json_encode($datos, JSON_FORCE_OBJECT);
}

public function InfoApoyo(){
  $idApoyo = $_POST['idApoyo'];
  $infoApoyo=$this->model->ObtenerInfoApoyo($idApoyo);
  $infoActualizacion=$this->model->ListarActualizacion($infoApoyo->idRegistroApoyo);
  echo   '  
  <div class="modal-body"> 
    <div class="row">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-bottom: 12px;">
            <div class="col-sm-12">
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Información de apoyo y registro</h2>
            </div> 
          </div>
        </div>        
        <div class="porlets-content" style="margin-bottom: -65px;">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>
                  <div class="col-md-12">   
                    <label class="col-sm-6 lblinfo" style="margin-top: 5px;"><b>Información del beneficiario</b></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><b>Curp:</b></label>
                    <label class="col-sm-7 control-label">'.$infoApoyo->curp.'</label>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><b>Primer apellido:</b></label>
                    <label class="col-sm-7 control-label">'.$infoApoyo->primerApellido.'</label>
                    <label class="col-sm-4 lbl-detalle"><b>Segundo apellido:</b></label>
                    <label class="col-sm-7 control-label">'.$infoApoyo->segundoApellido.'</label>
                    <label class="col-sm-4 lbl-detalle"><b>Nombre(s):</b></label>
                    <label class="col-sm-7 control-label">'.$infoApoyo->nombres.'</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col-md-12">   
                    <label class="col-sm-5 lblinfo" style="margin-top: 5px;"><b>Información de apoyo</b></label>
                  </div>
                </td>
              </tr>
              <tr><td>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Dirección que lo apoya:</b></label>
                  <label class="col-sm-7 control-label">'.$infoApoyo->direccion.'</label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Tipo de apoyo:</b></label>
                  <label class="col-sm-7 control-label">'.$infoApoyo->tipoApoyo.'</label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Origen:</b></label>
                  <label class="col-sm-7 control-label">'.$infoApoyo->origen.'</label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Programa:</b></label>
                  <label class="col-sm-7 control-label">'.$infoApoyo->programa.'</label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Subprograma:</b></label>
                  <label class="col-sm-7 control-label">'.$infoApoyo->subprograma.'</label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Periodicidad:</b></label>
                  <label class="col-sm-7 control-label">'.$infoApoyo->periodicidad.'</label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Programa social:</b></label>
                  <label class="col-sm-7 control-label" style="color:red"><strong>P E N D I E N T E</strong></label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Importe:</b></label>
                  <label class="col-sm-7 control-label">$ '.$infoApoyo->importeApoyo.'.00</label>
                </div>
              </td></tr>
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
                    <label class="col-sm-4 lbl-detalle"><strong>Fecha de registro:</strong></label>
                    <label class="col-sm-7">'.$infoApoyo->fechaAlta.'</label><br>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detalle"><strong>Usuario que registró:</strong></label>
                    <label class="col-sm-6">'.$infoApoyo->usuario.'</label><br>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-4 lbl-detallet"><strong>Estado de registro:</strong></label>
                    <label class="col-sm-6" style="color:#64DD17"><b>'.$infoApoyo->estado.'</b></label><br>
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
                <tr><td>';
                  $i=1;
                  foreach ($infoActualizacion as $r):
                    echo '
                  <div class="col-md-6">
                    <label class="col-md-12" lbl-detalle style="color:#607D8B;">'.$i.'° actualización</label>
                    <label class="col-sm-5 lbl-detallet"><strong>Fecha y hora:</strong></label>
                    <label class="col-sm-7">'.$r->fechaActualizacion.'</label><br>

                    <label class="col-sm-5 lbl-detalle"><strong>Usuario:</strong></label>
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
        <a href="?c=Beneficiario&a=Detalles&idBeneficiario='.$infoApoyo->idBeneficiario.'" class="btn btn-info btn-sm">Ver detalles de beneficiario</a>
      </div>
    </div>';
  }
}

