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
   $administracion = true;
   $apoyos = true;
   $page="view/apoyos/index.php";
   require_once 'view/index.php';
 }
 public function Crud(){
  $apoyo = new Apoyos();
  if(isset($_REQUEST['idApoyo'])){
    $_REQUEST['idApoyo'];
    $apoyo = $this->model->Obtener($_REQUEST['idApoyo']);
  }
  $administracion = true;
  $apoyos = true;
  $page="view/apoyos/apoyos.php";
  require_once 'view/index.php';
}
public function Eliminar(){
  $this->model->Eliminar($_REQUEST['idApoyo']);
  $administracion = true;
  $apoyos = true;
  $page="view/apoyos/index.php";
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
$administracion = true;
$apoyos = true;
$page="view/apoyos/index.php";
require_once 'view/index.php';
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
    $this->Apoyos($objPHPExcel,$numRows);
    $mensaje="Se ha leído correctamente el archivo <strong>apoyos.xlsx</strong>.<br><i class='fa fa-check'></i> Se han importado correctamente los datos de Apoyos.";
    $page="view/apoyos/index.php";
    $administracion=true;
    $apoyos=true;
    require_once 'view/index.php';
  }
        //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>apoyos.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/apoyos/index.php";
    $administracion = true;
    $apoyos=true;
    require_once 'view/index.php';
  }
}
public function Apoyos($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("apoyos");
  $numRow=2;
  do {

    $apoyos = new Apoyos();
    $curp = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $apoyos->idOrigen = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    $apoyos->idSubprograma = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
    $apoyos->idCaracteristica = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
    $apoyos->importeApoyo = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
    $apoyos->numerosApoyo = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
    $apoyos->fechaApoyo = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
    $apoyos->idPeriodicidad = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
    $apoyos->idProgramaSocial = null;
    $apoyos->clavePresupuestal = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
    if (! $curp == null) {
      echo 'Entro al metodo';
      $apoyos->usuario=$_SESSION['usuario'];
      $apoyos->fechaAlta=date("Y-m-d H:i:s");
      $apoyos->direccion=$_SESSION['direccion'];
      $apoyos->estado="Activo";
      //$consult = $this->model->ObtenerIdBen($curp);
      echo $curp;
      $apoyos->idBeneficiario=1;
      echo $apoyos->idBeneficiario;
      //echo $ben->curp;
      $apoyos->idRegistroApoyo=$this->model->RegistraDatosRegistro($apoyos);
      $this->model->ImportarApoyo($apoyos);
    }
    $numRow+=1;
  } while ( !$curp == null);
} catch (Exception $e) {
 $mensaje="error al importar los datos de los apoyos";
 $page="view/apoyos/index.php";
 $administracion=true;
 $apoyos=true;
 require_once 'view/index.php';
}
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

