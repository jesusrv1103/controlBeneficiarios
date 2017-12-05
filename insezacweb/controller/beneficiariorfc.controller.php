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

  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/beneficiario/index.php";
  require_once 'view/index.php';
}


public function Crud(){
  $beneficiario = new Beneficiariorfc();
  if(isset($_REQUEST['RFC'])){
    $beneficiario->RFC=$_REQUEST['RFC'];
    //$verificaBen=$this->model->VerificaBeneficiario($beneficario->curp);
    echo $beneficiario->RFC;
    $verificaBen=1;
    if($verificaBen==1){
      echo "xxxxxxxxxxxxxholaxxxxxxxxxxxxxx";
      $administracion=true;
      $beneficiarios=true;
      $page="view/beneficiario/beneficiariorfc.php";
      require_once 'view/index.php';
    }else{
      echo "zzzzzzzzzzzzzzzholazzzzzzzzzzzzz";
      $mensaje="El beneficiario ya existe, este mensaje aparecera en un recuadro amarillo";
      $administracion = true;
      $inicio = false;
      $beneficiarios = false;
      $tipoBen="RFC";
      $page="view/beneficiario/index.php";
      require_once 'view/index.php';
    }
  }
  if(isset($_REQUEST['idBeneficiarioRFC'])){
    $beneficiario = $this->model->Listar($_REQUEST['idBeneficiarioRFC']);  
    echo "hola".$beneficiario->idBeneficiarioRFC;
  }
}



public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $beneficiario= new Beneficiariorfc();
    $beneficiario->idRegistro = $_REQUEST['idRegistro'];
    $beneficiario->estado='Inactivo';
    $this->model->Eliminar($beneficiario);
    header ('Location: index.php?c=Beneficiario&a=Index');
  }

}


