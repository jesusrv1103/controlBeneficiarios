<?php
require_once 'model/programa.php';

class ProgramaController{

  private $model;
  //private $session;
  public $error;

  //Constructor
  public function __CONSTRUCT(){
    $this->model = new Programa();
  }


  //Index 
  public function Index(){
<<<<<<< HEAD

   $page="view/programa/index.php";
   require_once 'view/index.php';
 	} 


 	//Metodo Crud *** Mandara llamar a Metodo Crear select editar y eliminar
  public function Crud(){
  	$programa = new Programa();
    

    if(isset($_REQUEST['idPrograma'])){
            $programa = $this->model->Obtener($_REQUEST['idPrograma']);
        }
        $page= "view/programa/programa.php";
       require_once 'view/index.php';
  } 

  //Metodo Guardar  si trae un id  actualiza si no registra
 	public function Guardar(){
        $programa= new Programa();
        //echo "entre";
        //echo  $programa->idPrograma
        $programa->idPrograma = $_REQUEST['idPrograma'];
        $programa->programa = $_REQUEST['programa'];
        $programa->idPrograma > 0 
            ? $this->model->Actualizar($programa)
            : $this->model->Registrar($programa);
        $page="view/programa/index.php";
   			require_once 'view/index.php';
    }
    //Metodo  para eliminar
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idPrograma']);
        echo $idPrograma;
   			$page="view/programa/index.php";
   			require_once 'view/index.php';
    }
=======
   $administracion = true;
   $inicio = false;
   $programas=true;
   $page="view/programa/index.php";
   require_once 'view/index.php';
 }  
 public function Alta(){
  $administracion = true;
  $inicio = false;
  $beneficiarios = false;
  $page="view/subprograma/subprograma.php";
  require_once 'view/index.php';
} 
public function Create(){
}
public function Update(){
  
}
public function Delete(){
  
}
>>>>>>> c43d4553c5e729aa4c8c5efd67c514c7c9bd0670
}
