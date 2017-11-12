<?php
require_once 'model/subprograma.php';

class SubprogramaController{

  public function __CONSTRUCT(){
    $this->model = new Subprograma();
  }
  public function Index(){
   $catalogos = true;
   $inicio = false;
   $subprogramas=true;
   $page="view/subprograma/index.php";
   require_once 'view/index.php';
 }
 public function Crud(){
   $programa = new Subprograma();
   if(isset($_REQUEST['idSubprograma'])){
    $subprograma = $this->model->Obtener($_REQUEST['idSubprograma']);
  }
  $page= "view/subprograma/subprograma.php";
  require_once 'view/index.php';
} 
public function Guardar(){
  $subprograma= new Subprograma();
  $subprograma->idSubprograma = $_REQUEST['idSubprograma'];
  $subprograma->subprograma = $_REQUEST['subprograma'];
  $subprograma->programa = $_REQUEST['programa'];
  $subprograma->idPrograma = $_REQUEST['idPrograma'];
  $subprograma->idSubprograma > 0 
  ? $this->model->Actualizar($subprograma)
  : $this->model->Registrar($subprograma);
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $subprogramas=true; //variable cargada para activar la opcion programas en el menu
    $page="view/subprograma/index.php";
    require_once 'view/index.php';
  } 
  public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $programas=true; //variable cargada para activar la opcion programas en el menu
    $this->model->Eliminar($_REQUEST['idSubprograma']);
    header ('Location: index.php?c=Subprograma&a=Index');
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
      $this->Subprogramas($objPHPExcel,$numRows);
  //  $this->model->Check(1);
      $mensaje="Se ha leído correctamente el archivo <strong>subprogramas.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los subprogramas.";
      $page="view/subprograma/index.php";
      $catalogos=true;
      require_once 'view/index.php';
    }
          //si por algo no cargo el archivo bak_ 
    else {
      $error=true;
      $mensaje="El archivo <strong>subprogramas.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
      $page="view/subprograma/index.php";
      $catalogos=true;
      require_once 'view/index.php';
    }
  }
  public function Subprogramas($objPHPExcel,$numRows){
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
   $error=true;
   $mensaje="Error al importar los datos de Subprogramas.";
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
           <div class="col-md-6">
             <a href="#" class="open_ticket_comment">
               <div class="open_ticket_thumnail">
                 <img src="assets/images/programa1.jpg" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">
               </div>
               <div class="ticket_problem" style="margin-top: 10px;">'.$sp->subprograma.'</div>
               <span>Descripción de subprograma 1</span>
               <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
               <div class="ticket_action" style="margin-top: -45px;">
                 <div class="ticket_action_view">i</div>
               </div>
             </a>
           </div>';
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
  $tabla=true;
  $page="view/subprograma/index.php";
  require_once "view/index.php";
}
}
?>