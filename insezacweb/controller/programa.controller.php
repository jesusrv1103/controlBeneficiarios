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
  $programa->idPrograma > 0 
  ? $this->model->Actualizar($programa)
  : $this->model->Registrar($programa);
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

  public function Crud(){
    $programa = new Programa();
    if(isset($_REQUEST['idPrograma'])){
         $programa = $this->model->Obtener($_REQUEST['idPrograma']);
    }
    echo '
        <div class="modal-body"> 
          <div class="row">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header theme_color">&nbsp;Registrar programa</h3>
              </div>
              <div class="porlets-content" style="margin-top: 70px;">
                <input hidden name="idPrograma"  value="'; echo $programa->idPrograma != null ? $programa->idPrograma : 0; echo'"/>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nombre</label>
                  <div class="col-sm-7">
                    <input name="programa" type="text" class="form-control" required value="'; echo $programa->idPrograma != null ? $programa->programa : 0; echo '" autofocus/>
                  </div>
                </div><!--/form-group-->
              </div><!--/porlets-content-->
            </div><!--/block-web--> 
          </div>
        </div>
        <div class="modal-footer">
          <div class="row col-md-5 col-md-offset-7">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a href="?c=Beneficiario&a=Importar" class="btn btn-primary">Guardar</a>
          </div>
        </div>
    ';
  }
}
