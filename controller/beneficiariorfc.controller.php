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
  public $tipoBen;
  private $arrayError;
  private $arrayActualizados;
  private $arrayRegistrados;
  private $numRegistros=0;
  private $numActualizados=0;


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
  try {
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
} catch (Exception $e) {
  $this->error=true;
  $this->mensaje="Ha ocurrido un error al intentar guardar el beneficiario";
  $this->Index();
}
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
    try {
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
          $this->warning=true;
          $this->mensaje="El beneficiario ya esta registrado, <b>verifíque</b> que sus datos y la información de registro sean correctos y esten actualizados si no es así, porfavor, <a href='?c=beneficiariorfc&a=Crud&idBeneficiarioRFC=".$verificaBen->idBeneficiarioRFC."'>actualice la información</a>.";
          $beneficiario_rfc=true;
          $beneficiarios = true;
          $ben = $this->model->Listar($verificaBen->idBeneficiarioRFC);
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
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Ha ocurrido un error al intentar obtener la información del beneficiario";
      $this->Index();
      echo $e->getMessage();
    }
  }

  public function Detalles(){
    try {
      $beneficiario_rfc=true;
      $beneficiarios=true;
      $ben = new Beneficiariorfc();
      $ben = $this->model->Listar($_REQUEST['idBeneficiarioRFC']);
      $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idBeneficiarioRFC']);
      $page="view/beneficiario_rfc/detalles.php";
      require_once 'view/index.php';
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Ha ocurrido un error al obtener la información del beneficiario";
      $this->Index();
    }
  }

  public function Eliminar(){
    try {
      $beneficiario_rfc=true;
      $beneficiarios=true;
      $beneficiario= new Beneficiariorfc();
      $beneficiario->idRegistro = $_REQUEST['idRegistro'];
      $beneficiario->estado='Inactivo';
      $this->model->Eliminar($beneficiario);
      $this->mensaje="Se ha eliminado correctamente el beneficiario";
      $this->Index();
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Ha ocurrido un error al intentar dar de baja al beneficiario";
      $this->Index();
    }
  }

  public function Upload(){
    try {
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
    } catch (Exception $e) {
      $this->error=true;
      $this->mensaje="Ha ocurrido un error al subir el archivo";
      $this->Index();
    }
  }

  public function Importar($src){
  try {
      //Agregamos la librería
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
      //Variable con el nombre del archivo
    $nombreArchivo = $src;
      // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
      //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
      //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $this->LeerArchivo($objPHPExcel,$numRows);
    if($_SESSION['numRegErroneos']>0 || $_SESSION['numActualizados']){
      $beneficiarios = true;
      $beneficiario_rfc=true;
      $page="view/beneficiario_rfc/resumenImportar.php";
      require_once 'view/index.php';
    }else{
      $this->mensaje="Se han importado correctamente los datos del archivo <strong>beneficiariosrfc.xlsx</strong>";
      $this->Index();
    }
  } catch (Exception $e) {
    $this->error=true;
    $this->mensaje="Ocurrio un error al importar el archivo";
    $this->Index();
  }
}

  public function LeerArchivo($objPHPExcel,$numRows){
    try {
      unset($_SESSION['numRegErroneos']);
      $numRow=2;
      $arrayError=array();
      $arrayActualizados=array();
      $arrayRegistrados=array();
      $numRegErroneos=0;
      do {
        $numError=0;
        $benrfc = new Beneficiariorfc;

        $benrfc->RFC = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
        if( $benrfc->RFC==""){
          $row_array['RFC']="Campo vacío";
          $numError++;
        }else{
            $row_array['RFC']='0';
          }
        
        //----------VALIDANDO LA CURP--------------------

        $benrfc->curp = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
        if( $benrfc->curp==""){
          $row_array['Curp']="Campo vacío";
          $numError++;
        }else{
          if(!$this->validate_curp($benrfc->curp)){
           $row_array['Curp']=$benrfc->curp;
           $numError++;
         }else{
          $row_array['Curp']='0';
        }
      }

          //------------VALIDANDO PRIMER APELLIDO--------------

      $benrfc->primerApellido = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();

      if($benrfc->primerApellido==""){
        $row_array['Primer apellido']="Campo vacío";
        $numError++;
      }else{
        $row_array['Primer apellido']='0';
      }


          //------------SEGUNDO APELLIDO NO VALIDADO ---------------

      $benrfc->segundoApellido = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
      $row_array['Segundo apellido']='0';

          //---------------- VALIDANDO NOMBRE ------------------

      $benrfc->nombres = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();

      if($benrfc->nombres==""){
        $row_array['Nombres']="Campo vacío";
        $numError++;
      }else{
        $row_array['Nombres']='0';
      }
          //---------------- VALIDANDO FECHA ALTA SAT ------------------

      $benrfc->fechaAltaSat = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
      if($benrfc->fechaAltaSat==""){
        $row_array['Fecha de alta en Sat']="Campo vacío";
        $numError++;
      }else{
        $row_array['Fecha de alta en Sat']='0';
      }
          //---------------- VALIDANDO SEXO ------------------

      $benrfc->sexo = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
      if($benrfc->sexo==""){
        $row_array['Sexo']="Campo vacío";
        $numError++;
      }else{
        $row_array['Sexo']='0';
      }
        //-------------------- VALIDANDO CLAVE MUNICIPIO ---------------

      $claveMunicipio = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
      if($claveMunicipio==""){
        $row_array['Clave municipio']="Campo vacío";
        $numError++;
      }else{
        if(!is_numeric($claveMunicipio)){
          $row_array['Clave municipio']=$claveMunicipio;
          $numError++;
        }else{
          $row_array['Clave municipio']='0';
        }
      }

          //-------------------- VALIDANDO ID ASENTAMIENTOS ---------------

      $benrfc->idAsentamientos = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();
      if($benrfc->idAsentamientos==""){
        $benrfc->idAsentamientos=1;
      }else{
        if(!is_numeric($benrfc->idAsentamientos)){
          $row_array['Id Asentamientos']=$benrfc->idAsentamientos;
          $numError++;
        }
      }
          //-------------------- VALIDANDO ID LOCALIDADES ---------------

      $benrfc->idLocalidad = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();
      if($benrfc->idLocalidad==""){
        $row_array['Id Localidad']="Campo vacío";
        $numError++;
      }else{
        if(!is_numeric($benrfc->idLocalidad)){
          $row_array['Id Localidad']=$benrfc->idLocalidad;
          $numError++;
        }
      }
        //-------------------- VALIDANDO ID TIPO VIALIDAD ---------------

      $benrfc->idTipoVialidad = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();
      if($benrfc->idTipoVialidad==""){
        $row_array['Id tipo vialidad']="Campo vacío";
        $numError++;
      }else{
        if(!is_numeric($benrfc->idTipoVialidad)){
          $row_array['Id tipo vialidad']=$benrfc->idTipoVialidad;
          $numError++;
        }else{
          if($benrfc->idTipoVialidad>"22" || $benrfc->idTipoVialidad<"1"){
            $row_array['Id tipo vialidad']=$benrfc->idTipoVialidad;
            $numError++;
          }else{
            $row_array['Id tipo vialidad']='0';
          }
        }
      }
         //-------------------- VALIDANDO NOMBRE VIALIDAD ---------------

      $benrfc->nombreVialidad = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();
      if($benrfc->nombreVialidad==""){
        $row_array['Nombre vialidad']="Campo vacío";
        $numError++;
      }else{
        $row_array['Nombre vialidad']='0';
      }
        //-------------------- VALIDANDO No EXTERIOR ---------------

      $benrfc->noExterior = $objPHPExcel->getActiveSheet()->getCell('M'.$numRow)->getCalculatedValue();

      if($benrfc->noExterior==""){
        $row_array['No exterior']="Campo vacío";
        $numError++;
      }else{
        if(!is_numeric($benrfc->noExterior)){
          $row_array['No exterior']=$benrfc->noExterior;
          $numError++;
        }else{
          $row_array['No exterior']='0';
        }
      }
         //-------------------- No INTERIOR NO VALIDADO ---------------
      $benrfc->numeroInterior = $objPHPExcel->getActiveSheet()->getCell('N'.$numRow)->getCalculatedValue();
        //-------------------- VALIDANDO ENTRE VIALIDADES ---------------

      $benrfc->entreVialidades = $objPHPExcel->getActiveSheet()->getCell('O'.$numRow)->getCalculatedValue();

      if($benrfc->entreVialidades==""){
        $row_array['Entre vialidades']="Campo vacío";
        $numError++;
      }else{
        $row_array['Entre vialidades']='0';
      }
         //-------------------- VALIDANDO DESCRIPCION DE UBICACION ---------------

      $benrfc->descripcionUbicacion = $objPHPExcel->getActiveSheet()->getCell('P'.$numRow)->getCalculatedValue();

      if($benrfc->descripcionUbicacion==""){
        $row_array['Descripción de ubicación']="Campo vacío";
        $numError++;
      }else{
        $row_array['Descripción de ubicación']='0';
      }
         //-------------------- VALIDANDO ACTIVIDAD ---------------

      $benrfc->actividad = $objPHPExcel->getActiveSheet()->getCell('Q'.$numRow)->getCalculatedValue();
      if($benrfc->actividad==""){
        $row_array['Actividad']="Campo vacío";
        $numError++;
      }else{
        $row_array['Actividad']='0';
      }
         //-------------------- VALIDANDO COBERTURA ---------------

      $benrfc->cobertura = $objPHPExcel->getActiveSheet()->getCell('R'.$numRow)->getCalculatedValue();
      if($benrfc->cobertura==""){
        $row_array['Cobertura']="Campo vacío";
        $numError++;
      }else{
        $row_array['Cobertura']='0';
      }

      $benrfc->usuario=$_SESSION['usuario'];
      $benrfc->fechaAlta=date("Y-m-d H:i:s");
      $benrfc->direccion=$_SESSION['direccion'];
      $benrfc->estado="Activo";
      if (!$benrfc->RFC == null) {
        if($numError>0){
          $numRegErroneos+=1;
          $row_array['fila']=$numRow;
          $row_array['numeroErrores']=$numError;
          array_push($arrayError, $row_array); 
        }
        $verificaBenrfc=$this->model->VerificaBeneficiarioRFC($benrfc->RFC);
        if($verificaBenrfc==null && $numError==0){
          $consult = $this->model->ObtenerIdMunicipio($claveMunicipio);
          $benrfc->idMunicipio=$consult->idMunicipio; 
          $benrfc->idRegistro=$this->model->RegistraDatosRegistro($benrfc);
          $this->model->ImportarBeneficiarioRFC($benrfc);
          $this->numRegistros=$this->numRegistros+1;
          $row_array['RFC']=$benrfc->RFC;
          $row_array['Nombres']=$benrfc->nombres;
          $row_array['Primer apellido']=$benrfc->primerApellido;
          $row_array['Segundo apellido']=$benrfc->segundoApellido;
          array_push($arrayRegistrados, $row_array);
        }else if($verificaBenrfc!=null && $numError==0){
          $obtenerIdBeneficiariorfc=$this->model->ObtenerIdBeneficiarioRFC($benrfc->RFC);
          $idRegistro=$this->model->ObtenerIdRegistro($obtenerIdBeneficiariorfc->idBeneficiarioRFC);
          $benrfc->idRegistro=$idRegistro->idRegistro;
          $this->model->RegistraActualizacion($benrfc);
          $this->model->Actualizar($benrfc);
          $this->model->Activar($benrfc->idRegistro);
          $this->numActualizados=$this->numActualizados+1;
          $row_array['RFC']=$benrfc->RFC;
          $row_array['Nombres']=$benrfc->nombres;
          $row_array['Primer apellido']=$benrfc->primerApellido;
          $row_array['Segundo apellido']=$benrfc->segundoApellido;
          array_push($arrayActualizados, $row_array);
        }
      }
      $numRow+=1;
    } while(!$benrfc->RFC == null);
    $_SESSION['numRegErroneos']=$numRegErroneos; 
    $_SESSION['numRegistrados']=$this->numRegistros;
    $_SESSION['numActualizados']=$this->numActualizados;
    if($numRegErroneos>0)
     $this->arrayError=$arrayError;
   if($this->numRegistros>0)
    $this->arrayRegistrados=$arrayRegistrados;
  if($this->numActualizados>0)
    $this->arrayActualizados=$arrayActualizados;

} catch (Exception $e) {
  $this->error=true;
  $this->mensaje="Error al insertar datos del archivo";
  $this->Index();
  //echo $e->getMessage();
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
