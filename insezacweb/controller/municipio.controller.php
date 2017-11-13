<?php
require_once 'model/municipio.php';

class MunicipioController{

  private $model;
  public $error;

  //Constructor
  public function __CONSTRUCT(){
    $this->model = new Municipio();
  }
  //Index 
  public function Index(){
    $catalogos=true; //variable cargada para activar la opcion administracion en el menu
    $municipios=true; //variable cargada para activar la opcion municipios en el menu
   $page="view/municipio/index.php"; //Vista principal donde se enlistan los municipios
   require_once 'view/index.php';
 } 

  //Metodo Guardar  si trae un id actualiza, no registra
public function Guardar(){
  $municipio= new Municipio();
        //echo "entre";
        //echo  $municipio->idMunicipio
  $municipio->idMunicipio = $_REQUEST['idMunicipio'];
  $municipio->nombreMunicipio = $_REQUEST['nombreMunicipio'];
  if($municipio->idMunicipio > 0){
    $this->model->Actualizar($municipio);
    $mensaje="El nombre de municipio se ha actualizado correctamente";
  } else {
    $this->model->Registrar($municipio);
      $mensaje="Se ha registrado correctamente el municipio";
  } 
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $municipios=true; //variable cargada para activar la opcion municipios en el menu
    $page="view/municipio/index.php";
    require_once 'view/index.php';
  }
    //Metodo  para eliminar
  public function Eliminar(){
    $administracion=true; //variable cargada para activar la opcion administracion en el menu
    $municipios=true; //variable cargada para activar la opcion municipios en el menu
    $this->model->Eliminar($_REQUEST['idMunicipio']);
    header ('Location: index.php?c=municipio&a=Index');
  }

  public function Importar(){
  if (file_exists("./assets/files/municipios.xlsx")) {

          //Agregamos la librería 
    require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';
    //Variable con el nombre del archivo
    $nombreArchivo = './assets/files/municipios.xlsx';
    // Cargo la hoja de cálculo
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
    $objPHPExcel->setActiveSheetIndex(0);
    //Obtengo el numero de filas del archivo
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
   // $this->model->Check(0);
    $this->municipios($objPHPExcel,$numRows);
  //  $this->model->Check(1);
    $mensaje="Se ha leído correctamente el archivo <strong>municipios.xlsx</strong>.<br><i class='fa fa-check'></i> Se han registrado correctamente los municipios.";
    $page="view/municipio/index.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
          //si por algo no cargo el archivo bak_ 
  else {
    $error=true;
    $mensaje="El archivo <strong>municipios.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
    $page="view/municipio/municipio.php";
    $catalogos=true;
    require_once 'view/index.php';
  }
}
public function municipios($objPHPExcel,$numRows){
 try{
  $this->model->Limpiar("municipio");
  $numRow=3;

  do {
         //echo "Entra";
    $mun = new Municipio();
    $mun->idMunicipio = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();
    $mun->nombreMunicipio = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();
    if (!$mun->idMunicipio == null) {

      $this->model->Importarmunicipio($mun);

    }
    $numRow+=1;
  } while ( !$mun->idMunicipio == null);

} catch (Exception $e) {
 $error=true;
 $mensaje="Error al importar los datos de municipios.";
 $page="view/municipio/municipio.php";
 //$beneficiarios2 = true;
 $catalogos=true;
 require_once 'view/index.php';
}
}

  public function Crud(){
    $municipio = new Municipio();
    if($_REQUEST['idMunicipio']!=null){
         $municipio = $this->model->Obtener($_REQUEST['idMunicipio']);
    }
    echo '
     <form action="?c=municipio&a=Guardar';if($_REQUEST['idMunicipio']!=null){ echo '&idMunicipio='.$_REQUEST['idMunicipio']; } echo'" method="post" class="form-horizontal row-border">
        <div class="modal-body"> 
          <div class="row">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header theme_color">&nbsp;'; echo $municipio->idMunicipio !=null ? "Actualizar municipio" : "Registrar municipio"; echo '</h3>
              </div>
              <div class="porlets-content" style="margin-top: 70px;">
                <input hidden name="idMunicipio"  value="'; echo $municipio->idMunicipio != null ? $municipio->idMunicipio : 0; echo '"/>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nombre</label>
                  <div class="col-sm-7">
                    <input name="municipio" type="text" class="form-control" required value="'; echo $municipio->idMunicipio != null ? $municipio->nombreMunicipio : ""; echo '" autofocus/>
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
