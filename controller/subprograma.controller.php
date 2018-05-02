<?php
require_once 'model/subprograma.php';

class SubprogramaController{
  private $model;
  private $error;
  private $mensaje;

  public function __CONSTRUCT(){
    $this->model = new Subprograma();
  }
  public function Index(){
   $catalogos = true;
   $subprogramas=true;
   $page="view/subprograma/index.php";
   require_once 'view/index.php';
 }
 public function Crud(){
   $subprograma = new Subprograma();
   if(isset($_REQUEST['idSubprograma'])){
    $subprograma = $this->model->Obtener($_REQUEST['idSubprograma']);
  }
  $catalogos=true;
  $subprogramas=true;
  $page= "view/subprograma/subprograma.php";
  require_once 'view/index.php';
}
public function Guardar(){
  $subprograma= new Subprograma();
  $subprograma->idSubprograma = $_REQUEST['idSubprograma'];
  $subprograma->subprograma = $_REQUEST['subprograma'];
  $subprograma->techoPresupuestal = $_REQUEST['techoPresupuestal'];
  $subprograma->idPrograma = $_REQUEST['idPrograma'];
  $programa=$this->model->ConsultaPrograma($subprograma->idPrograma);
  $subprograma->programa=$programa->programa;
  if($subprograma->idSubprograma > 0){
    $this->model->Actualizar($subprograma);
    $this->mensaje="Se ha actualizado correctamente el techo presupuestal de <strong>$subprograma->subprograma</strong>";
  }
  else{
    $this->model->Registrar($subprograma);
    $this->mensaje="Se ha registrado correctamente subprograma";
  }
  $tabla=true;
    $catalogos=true; //variable cargada para activar la opcion catalogos en el menu
    $subprogramas=true; //variable cargada para activar la opcion programas en el menu
    $page="view/subprograma/index.php";
    require_once 'view/index.php';
  }
  public function Eliminar(){
   $this->model->Eliminar($_REQUEST['idSubprograma']);
   $catalogos = true;
   $subprograma = true;
   $tabla=true;
   $page="view/subprograma/index.php";
   $this->mensaje="Se ha eliminado correctamente el subprograma";
   require_once 'view/index.php';
 }

public function Upload(){
  if(!isset($_FILES['file']['name'])){
    header('Location: ./?c=subprograma');
  }
  $archivo=$_FILES['file'];
  if($archivo['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
    if($archivo['name']=="subprogramas.xlsx"){
      $nameArchivo = $archivo['name'];
      $tmp = $archivo['tmp_name'];
      $archivo['type'];
      $src = "./assets/files/".$nameArchivo;
      if(move_uploaded_file($tmp, $src)){
        $this->Importar();
      }  
    }else{
      $this->error=true;
      $this->mensaje="El nombre del archivo es invalido, porfavor verifique que el nombre del archivo sea <strong>subprogramas.xlsx</strong>";
      $this->Index();
    }
  }else{
    $this->error=true;
    $this->mensaje="El tipo de archivo es invalido, porfavor verifique que el archivo sea <strong>.xlsx</strong>";
    $this->Index();
  }
}

 public function Importar(){
  if (file_exists("./assets/files/subprogramas.xlsx")) {

          //Agregamos la librería
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
    //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/subprogramas.xlsx';
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
   // $this->model->Check(0);
    $this->LeerArchivo($objPHPExcel,$numRows);
   // $this->model->Check(1);
    $this->mensaje="Se ha leído correctamente el archivo <strong>subprogramas.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los subprogramas.";
    $page="view/subprograma/index.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
          //si por algo no cargo el archivo bak_
  else {
    $this->error=true;
    $this->mensaje="El archivo <strong>subprogramas.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/subprograma/index.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
}

public function LeerArchivo($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("subprograma");
  $numRow=3;

  do {
         //echo "Entra";
    $subprog = new Subprograma();
    $subprog->idSubprograma = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $subprog->subprograma = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    $subprog->programa = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();
    $subprog->idPrograma = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();
    if (!$subprog->idSubprograma == null) {
      $this->model->ImportarSubprograma($subprog);
    }
    $numRow+=1;
  } while ( !$subprog->idSubprograma == null);

} catch (Exception $e) {
 $this->error=true;
 $this->mensaje="Error al importar los datos de Subprogramas.";
 $page="view/subprograma/index.php";
 $catalogos=true;
 require_once 'view/index.php';
}
}

public function Consultas(){
  $subprograma=$_REQUEST['valorBusqueda'];
  //$programas=$this->model->ConsultaProgramas();
  $subprogramas=$this->model->ConsultaSubprogramas($subprograma);
  $programa="";
  foreach ($subprogramas as $p) :
    if($programa!=$p->programa){ $programa=$p->programa;
     echo '
     <div class="container clear_both padding_fix">
     <div class="row">
     <div class="col-md-12">
     <div class="block-web">
     <div class="header">
     <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
     <h3 class="content-header lblheader">'.$p->programa.'</h3>
     </div>
     <div class="porlets-content">
     <div class="row"> ';
     foreach ($subprogramas as $sp) :
      if($sp->programa==$p->programa){
        echo '
        <a href="#" class="tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoSubprograma('.$sp->idSubprograma.')" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro">
        <div class="col-md-6">
        <div class="row-fluid"><br>
        <div class="well well-large"><p style="color:#37474F">'.$sp->subprograma.'</p></div>
        </div>
        </div>
        </a>';
      }
    endforeach;
    echo '
    </div>
    </div><!--/porlets-content-->
    </div><!--/block-web-->
    </div><!--/col-md-12-->
    </div><!--/row-->
    </div><!--/container clear_both padding_fix-->';
  }
endforeach;
}

public function VerTabla(){
  $catalogos=true;
  $subprogramas=true;
  $tabla=true;
  $page="view/subprograma/index.php";
  require_once "view/index.php";
}

public function infoSubprograma(){
  $subprograma = $this->model->Obtener($_REQUEST['idSubprograma']);
  echo '<div class="modal-body">
  <div class="row">
  <div class="block-web">
  <div class="header">
  <div class="row" style="margin-bottom: 12px;">
  <div class="col-sm-12">
  <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Detalles de subprograma</h2>
  </div>
  </div>
  </div>
  <div class="porlets-content" style="margin-bottom: -65px;">
  <table class="table table-striped">
  <tbody>
  <tr>
  <td>
  <div class="col-md-12">
  <label class="col-sm-6 lblinfo" style="margin-top: 5px;"><b>Información de subprograma</b></label>
  </div>
  </td>
  </tr>
  <tr>
  <td>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><strong>Subprograma:</strong></label>
  <label class="col-sm-8">'.$subprograma->subprograma.'</label><br>
  </div>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detalle"><strong>Programa:</strong></label>
  <label class="col-sm-8">'.$subprograma->programa.'</label><br>
  </div>
  <div class="col-md-12">
  <label class="col-sm-4 lbl-detallet"><strong>Techo presupuestal:</strong></label>
  <label class="col-sm-8">$ '.$subprograma->techoPresupuestal.'</label><br>
  </div>
  </td>
  </tr>
  </tbody>
  </table>
  </div><!--/porlets-content-->
  </div><!--/block-web-->
  </div>
  </div>
  <div class="modal-footer">
  <div class="row col-md-6 col-md-offset-6">
  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
  <a href="?c=Subprograma&a=Beneficiarios&subprograma='.$subprograma->subprograma .'&idSubprograma='.$subprograma->idSubprograma.'" class="btn btn-info btn-sm">Ver beneficiarios de subprograma</a>
  </div>
  </div>';

}

public function Beneficiarios(){
  $subprograma=$_REQUEST['subprograma'];
  $idSubprograma=$_REQUEST['idSubprograma'];
  $catalogos=true;
  $subprogramas=true;
  $page="view/subprograma/beneficiarios.php";
  require_once "view/index.php";
}
}
?>
