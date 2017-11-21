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
  $beneficiario->fechaNacimiento=$_REQUEST['fechaNacimiento'];


  if(substr($_REQUEST['curp'], 10,1) == "H")
  {
    $beneficiario->genero=1;
  }
  else{
   $beneficiario->genero=0;
 }
  //echo $genero;
 $beneficiario->idMunicipio=$_REQUEST['idMunicipio'];
 $beneficiario->email=$_REQUEST['email'];
 $beneficiario->telefono=$_REQUEST['telefono'];;
 $beneficiario->perfilSociodemografico=111;

  //vialidad
 $beneficiario->idTipoVialidad = $_REQUEST['idTipoVialidad'];
 $beneficiario->nombreVialidad = $_REQUEST['nombreVialidad'];
 $beneficiario->noExterior = $_REQUEST['noExterior'];
 $beneficiario->noInterior = $_REQUEST['noInterior'];
 $beneficiario->idAsentamientos =$_REQUEST['idAsentamientos'];
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
 isset($_REQUEST['viviendaElectricidad'])? $beneficiario->viviendaElectricidad="1": $beneficiario->viviendaElectricidad="0";
 isset($_REQUEST['viviendaAgua'])? $beneficiario->viviendaAgua="1": $beneficiario->viviendaAgua="0";
 isset($_REQUEST['viviendaDrenaje'])? $beneficiario->viviendaDrenaje="1": $beneficiario->viviendaDrenaje="0";
 isset($_REQUEST['viviendaGas'])? $beneficiario->viviendaGas="1": $beneficiario->viviendaGas="0";
 isset($_REQUEST['viviendaTelefono'])? $beneficiario->viviendaTelefono="1": $beneficiario->viviendaTelefono="0";
 isset($_REQUEST['viviendaInternet'])? $beneficiario->viviendaInternet="1": $beneficiario->viviendaInternet="0";

  //Datos de registro
 $beneficiario->usuario=$_SESSION['usuario'];
 $beneficiario->fechaAlta=date("Y-m-d H:i:s");

 $beneficiario->direccion=$_SESSION['direccion'];
 $beneficiario->estado="Activo";

 if($beneficiario->idBeneficiario > 0){ 
  $idRegistro=$this->model->ObtenerIdRegistro($beneficiario->idBeneficiario);
  $beneficiario->idRegistro=$idRegistro->idRegistro;
  $this->model->RegistraActualizacion($beneficiario);
  $this->model->Actualizar($beneficiario);

  $mensaje="Los datos del beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha actualizado correctamente";
}else{

  $beneficiario->idRegistro=$this->model->RegistraDatosRegistro($beneficiario);
  $this->model->Registrar($beneficiario);
  echo "entre </b>";
  echo $beneficiario->idRegistro;
  $mensaje="El beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha registrado correctamente";
}

$administracion = true;
$inicio = false;
$beneficiarios = false;
$page="view/beneficiario/index.php";
require_once 'view/index.php';

}

public function Crud(){
 $beneficiario = new Beneficiario();
 if(isset($_REQUEST['idBeneficiario'])){
  $beneficiario = $this->model->Listar($_REQUEST['idBeneficiario']);  
}
$administracion=true;
$beneficiarios=true;
$page="view/beneficiario/beneficiario.php";
require_once 'view/index.php';
}

public function Importar(){
  if (file_exists("./assets/files/beneficiarios.xlsx")) {
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
    $this->Leearchivo($objPHPExcel,$numRows);
    $mensaje="Se ha leído correctamente el archivo <strong>beneficiarios.xlsx</strong>.<br><i class='fa fa-check'></i> Se han insertado correctamente los datos de beneficiarios.";
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
public function Leearchivo($objPHPExcel,$numRows){
  try{
    $numRow=2;
    do {
            //echo "Entra";
     $ben= new Beneficiario;
     $ben->curp = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
     $ben->primerApellido = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
     $ben->segundoApellido = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
     $ben->nombres = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
     $ben->idIdentificacion = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();
     $ben->idTipoVialidad = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
     $ben->nombreVialidad = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
     $ben->noExterior = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
     $ben->noInterior = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
     $ben->idAsentamientos = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
     $ben->idLocalidad = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
     $ben->entreVialidades = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();
     $ben->descripcionUbicacion = $objPHPExcel->getActiveSheet()->getCell('M'.$numRow)->getCalculatedValue();
     $ben->estudioSocioeconomico = $objPHPExcel->getActiveSheet()->getCell('N'.$numRow)->getCalculatedValue();
     $ben->idEstadoCivil = $objPHPExcel->getActiveSheet()->getCell('O'.$numRow)->getCalculatedValue();
     $ben->jefeFamilia = $objPHPExcel->getActiveSheet()->getCell('P'.$numRow)->getCalculatedValue();
     $ben->idOcupacion = $objPHPExcel->getActiveSheet()->getCell('Q'.$numRow)->getCalculatedValue();
     $ben->idIngresoMensual = $objPHPExcel->getActiveSheet()->getCell('R'.$numRow)->getCalculatedValue();
     $ben->integrantesFamilia = $objPHPExcel->getActiveSheet()->getCell('S'.$numRow)->getCalculatedValue();
     $ben->dependientesEconomicos = $objPHPExcel->getActiveSheet()->getCell('T'.$numRow)->getCalculatedValue();
     $ben->idVivienda =$objPHPExcel->getActiveSheet()->getCell('U'.$numRow)->getCalculatedValue();
     $ben->noHabitantes = $objPHPExcel->getActiveSheet()->getCell('V'.$numRow)->getCalculatedValue();
     $ben->viviendaElectricidad = $objPHPExcel->getActiveSheet()->getCell('W'.$numRow)->getCalculatedValue();
     $ben->viviendaAgua = $objPHPExcel->getActiveSheet()->getCell('X'.$numRow)->getCalculatedValue();
     $ben->viviendaDrenaje = $objPHPExcel->getActiveSheet()->getCell('Y'.$numRow)->getCalculatedValue();
     $ben->viviendaGas = $objPHPExcel->getActiveSheet()->getCell('Z'.$numRow)->getCalculatedValue();
     $ben->viviendaTelefono = $objPHPExcel->getActiveSheet()->getCell('AA'.$numRow)->getCalculatedValue();
     $ben->viviendaInternet = $objPHPExcel->getActiveSheet()->getCell('AB'.$numRow)->getCalculatedValue();
     $ben->idNivelEstudios = $objPHPExcel->getActiveSheet()->getCell('AC'.$numRow)->getCalculatedValue();
     $ben->idSeguridadSocial = $objPHPExcel->getActiveSheet()->getCell('AD'.$numRow)->getCalculatedValue();
     $ben->idDiscapacidad = $objPHPExcel->getActiveSheet()->getCell('AE'.$numRow)->getCalculatedValue();        
     $ben->idGrupoVulnerable = $objPHPExcel->getActiveSheet()->getCell('AF'.$numRow)->getCalculatedValue();
     $ben->beneficiarioColectivo = $objPHPExcel->getActiveSheet()->getCell('AG'.$numRow)->getCalculatedValue();
     $ben->email = $objPHPExcel->getActiveSheet()->getCell('AH'.$numRow)->getCalculatedValue();
     $ben->fechaNacimiento = $objPHPExcel->getActiveSheet()->getCell('AI'.$numRow)->getCalculatedValue();
     $ben->genero = $objPHPExcel->getActiveSheet()->getCell('AJ'.$numRow)->getCalculatedValue();
     $ben->perfilSociodemografico = $objPHPExcel->getActiveSheet()->getCell('AK'.$numRow)->getCalculatedValue();        
     $ben->telefono = $objPHPExcel->getActiveSheet()->getCell('AL'.$numRow)->getCalculatedValue();
     $claveMunicipio = $objPHPExcel->getActiveSheet()->getCell('AM'.$numRow)->getCalculatedValue();
    // echo $claveMunicipio;
    $consult=$this->model->ObtenerIdMunicipio($claveMunicipio);
     //$ben->idMunicipio=315;


     // $idRegistro=$this->model->ObtenerIdRegistro($beneficiario->idBeneficiario);

    // echo  $this->model->ObtenerIdMunicipio($claveMunicipio);
     $ben->idMunicipio=$municipio->idMunicipio;
    // echo  $ben->$idMunicipio;
       //Datos de registro
     $ben->usuario=$_SESSION['usuario'];
     $ben->fechaAlta=date("Y-m-d H:i:s");
     $ben->direccion=$_SESSION['direccion'];
     $ben->estado="Activo";
     if (!$ben->curp == null) {
      $ben->idRegistro=$this->model->RegistraDatosRegistro($ben);
      $this->model->ImportarBeneficiario($ben);
    }
    $numRow+=1;
  } while(!$ben->curp == null);

}catch (Exception $e) {
  $error=true;
  $mensaje="Error al insertar datos del archivo";
  $page="view/beneficiario/index.php";
  $beneficiarios = true;
  $catalogos=true;
  require_once 'view/index.php';
}
}
public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $beneficiario= new Beneficiario();
    $beneficiario->idRegistro = $_REQUEST['idRegistro'];
    $beneficiario->estado='Inactivo';
    $this->model->Eliminar($beneficiario);
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

  public function Inforegistro(){
    $idBeneficiario = $_POST['idBeneficiario'];
    $infoRegistro=$this->model->ObtenerInfoRegistro($idBeneficiario);
    $infoActualizacion=$this->model->ListarActualizacion($infoRegistro->idRegistro);

    echo   '  
    <div class="modal-body"> 
      <div class="row">
        <div class="block-web">
         <div class="header">
          <div class="row" style="margin-bottom: 12px;">
            <div class="col-sm-9">
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Detalles de apoyo y registro</h2>
            </div>
            <div class="col-md-3">
              <div class="btn-group pull-right">
                <b> 
                  <div class="btn-group" style="margin-right: 10px; margin-top: 5px;"> 
                    <a class="btn btn-sm btn-primary tooltips" href="?c=beneficiario&a=crud" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" data-original-title="Registrar nuevo beneficiario"> <i class="fa fa-print"></i></a>
                  </div>
                </b>
              </div>
            </div>    
          </div>
        </div>        
        <div class="porlets-content" style="margin-bottom: -65px;">
          <table class="table table-striped">
            <tbody>
              <tr>
               <td>
                 <div class="col-md-12">   
                   <label class="col-sm-6 lblinfo" style="margin-top: 5px;"><b>Información de apoyo a beneficiario</b></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
                <div class="col-md-12">
                 <label class="col-sm-4 lbl-detalle"><b>Primer apellido:</b></label>
                 <label class="col-sm-7 control-label">'.$infoRegistro->nombres." ".$infoRegistro->primerApellido." ".$infoRegistro->segundoApellido.'</label>
               </div>
               <div class="col-md-12">
                 <label class="col-sm-4 lbl-detalle"><b>Segundo apellido:</b></label>
                 <label class="col-sm-7 control-label">Valparaíso</label>
               </div>
               <div class="col-md-12">
                 <label class="col-sm-4 lbl-detalle"><b>Dirección que lo apoya:</b></label>
                 <label class="col-sm-7 control-label">'.$infoRegistro->direccion.'</label>
               </div>
              <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Apoyos:</b></label>
                <label class="col-sm-7 control-label">5</label>
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
             <label class="col-sm-4 lbl-detalle"><strong>Fecha y hora de registro:</strong></label>
             <label class="col-sm-6">'.$infoRegistro->fechaAlta.'</label><br>
           </div>
           <div class="col-md-12">
             <label class="col-sm-4 lbl-detalle"><strong>Usuario que registró:</strong></label>
             <label class="col-sm-6">'.$infoRegistro->usuario.'</label><br>
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
    <a href="?c=Beneficiario&a=Detalles&idBeneficiario='.$idBeneficiario.'" class="btn btn-info btn-sm">Ver detalles de beneficiario</a>
  </div>
</div>';
}
}


