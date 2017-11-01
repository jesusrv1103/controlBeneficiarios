<?php
require_once 'model/programa.php';

class ProgramaController{

  private $model;
  public $error;

  //Constructor
  public function __CONSTRUCT(){
    $this->model = new Programa();
  }
  //Index 
  public function Index(){
    $catalogos=true; //variable cargada para activar la opcion administracion en el menu
    $programas=true; //variable cargada para activar la opcion programas en el menu
   $page="view/programa/index.php"; //Vista principal donde se enlistan los programas
   require_once 'view/index.php';
 } 

  //Metodo Guardar  si trae un id actualiza, no registra
public function Guardar(){
  $programa= new Programa();
        //echo "entre";
        //echo  $programa->idPrograma
  $programa->idPrograma = $_REQUEST['idPrograma'];
  $programa->programa = $_REQUEST['programa'];
  if($programa->idPrograma > 0){
    $this->model->Actualizar($programa);
    $mensaje="El nombre de programa se ha actualizado correctamente";
  } else {
    $this->model->Registrar($programa);
      $mensaje="Se ha registrado correctamente el programa";
  } 
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $programas=true; //variable cargada para activar la opcion programas en el menu
    $page="view/programa/index.php";
    require_once 'view/index.php';
  }
    //Metodo  para eliminar
  public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $programas=true; //variable cargada para activar la opcion programas en el menu
    $this->model->Eliminar($_REQUEST['idPrograma']);
    header ('Location: index.php?c=Programa&a=Index');
  }

  public function Importar(){
  if (file_exists("./assets/files/programas.xlsx")) {

          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
    //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/programas.xlsx';
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
   // $this->model->Check(0);
    $this->Programas($objPHPExcel,$numRows);
  //  $this->model->Check(1);
    $mensaje="Se ha leído correctamente el archivo <strong>programas.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los programas.";
    $page="view/programa/index.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
          //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>programas.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/programa/programa.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
}
public function Programas($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("programa");
  $numRow=3;

  do {
         //echo "Entra";
    $prog = new Programa();
    $prog->idPrograma = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $prog->programa = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    if (!$prog->idPrograma == null) {

      $this->model->ImportarPrograma($prog);

    }
    $numRow+=1;
  } while ( !$prog->idPrograma == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de Programas.";
 $page="view/programa/programa.php";
 //$beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}

  public function Crud(){
    $programa = new Programa();
    if($_REQUEST['idPrograma']!=null){
         $programa = $this->model->Obtener($_REQUEST['idPrograma']);
    }
    echo '
     <form action="?c=Programa&a=Guardar';if($_REQUEST['idPrograma']!=null){ echo '&idPrograma='.$_REQUEST['idPrograma']; } echo'" method="post" class="form-horizontal row-border">
        <div class="modal-body"> 
          <div class="row">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header theme_color">&nbsp;'; echo $programa->idPrograma !=null ? "Actualizar programa" : "Registrar Programa"; echo '</h3>
              </div>
              <div class="porlets-content" style="margin-top: 70px;">
                <input hidden name="idPrograma"  value="'; echo $programa->idPrograma != null ? $programa->idPrograma : 0; echo '"/>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nombre</label>
                  <div class="col-sm-7">
                    <input name="programa" type="text" class="form-control" required value="'; echo $programa->idPrograma != null ? $programa->programa : ""; echo '" autofocus/>
                  </div>
                </div><!--/form-group-->
              </div><!--/porlets-content-->
            </div><!--/block-web--> 
          </div>
        </div>
        <div class="modal-footer">
          <div class="row col-md-5 col-md-offset-7">
            <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </form>
    ';
  }

}
