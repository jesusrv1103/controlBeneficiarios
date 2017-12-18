<?php
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

   require_once "controller/beneficiario.controller.php";
    $controller = new BeneficiarioController;
    $accion='RFC';
   
    // Llama la accion
    call_user_func( array( $controller, $accion ));
}


 public function Inforegistro(){

    $idBeneficiarioRFC = $_POST['idBeneficiarioRFC'];
    echo     $idBeneficiarioRFC = $_POST['idBeneficiarioRFC'];
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
    <label class="col-sm-4 lbl-detalle"><b>Curp:</b></label>
    <label class="col-sm-7 control-label">'.$infoRegistro->curp.'</label>
    </div>
    <div class="col-md-12">
    <label class="col-sm-4 lbl-detalle"><b>Primer apellido:</b></label>
    <label class="col-sm-7 control-label">'.$infoRegistro->primerApellido.'</label>
    </div>
    <div class="col-md-12">
    <label class="col-sm-4 lbl-detalle"><b>Segundo apellido:</b></label>
    <label class="col-sm-7 control-label">'.$infoRegistro->segundoApellido.'</label>
    </div>
    <div class="col-md-12">
    <label class="col-sm-4 lbl-detalle"><b>Nombre(s):</b></label>
    <label class="col-sm-7 control-label">'.$infoRegistro->nombres.'</label>
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
    <label class="col-sm-4 lbl-detalle"><strong>Dirección:</strong></label>
    <label class="col-sm-6">'.$infoRegistro->direccion.'</label><br>
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

    $verificaBen=$this->model->VerificaBeneficiario($beneficiario->RFC);

    if($verificaBen==null){
      $administracion=true;
      $beneficiarios=true;
      $page="view/beneficiario/beneficiariorfc.php";
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
      $page="view/beneficiario/detallesRFC.php";
      require_once 'view/index.php';
    }
  }if(isset($_REQUEST['idBeneficiarioRFC'])){
    $administracion=true;
    $beneficiarios=true;
    $beneficiario = $this->model->Listar($_REQUEST['idBeneficiarioRFC']);
    
    $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idBeneficiarioRFC']);

    $page="view/beneficiario/beneficiariorfc.php";
    require_once 'view/index.php';
  }
}


public function Detalles(){
  $administracion=true;
  $beneficiarios=true;
  $ben = new Beneficiariorfc();
  $ben = $this->model->Listar($_REQUEST['idBeneficiarioRFC']);
  $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idBeneficiarioRFC']);
  $page="view/beneficiario/detallesRFC.php";
  require_once 'view/index.php';
}


public function RFC(){
  $tipoBen="RFC";
  $administracion = true;
  $inicio = false;
  $beneficiarios = true;
  $page="view/beneficiario/index.php";
  require_once 'view/index.php';
}



public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $beneficiario= new Beneficiariorfc();
    $beneficiario->idRegistro = $_REQUEST['idRegistro'];
    $beneficiario->estado='Inactivo';
    $this->model->Eliminar($beneficiario);
    header ('Location: index.php?c=Beneficiario&a=RFC');
  }

}


