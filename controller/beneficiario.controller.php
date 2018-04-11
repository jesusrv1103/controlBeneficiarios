<?php
require_once 'model/beneficiario.php';
require_once 'model/catalogos.php';
require_once 'model/beneficiariorfc.php';
class BeneficiarioController{

  private $pdo;
  private $model;
  private $model2;
  private $model3;
  private $session;
  public $error;
  public $tipoBen;
  private $arrayError;
  private $numRegistros=0;
  private $numActualizados=0;


  public function __CONSTRUCT(){
    $this->model = new Beneficiario();
    $this->model2 = new Catalogos();
  }

  public function Index(){
    if(!isset($_REQUEST['periodo'])){
      $periodo='Ver todos';
    }else{
      $periodo=$_REQUEST['periodo'];
    }
    $beneficiarios = true;
    $beneficiario_curp=true;
    $page="view/beneficiario_curp/index.php";
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

    $beneficiario->idAsentamientos = $_REQUEST['idAsentamientos'];
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
    $verificaBen=$this->model->VerificaBeneficiario($beneficiario->curp);
    if($beneficiario->idBeneficiario > 0 || $verificaBen!=null){
      $idRegistro=$this->model->ObtenerIdRegistro($beneficiario->idBeneficiario);
      $beneficiario->idRegistro=$idRegistro->idRegistro;
      $this->model->RegistraActualizacion($beneficiario);
      $this->model->Actualizar($beneficiario);
      $ben = $this->model->Listar($beneficiario->idBeneficiario);
      $infoApoyo = $this->model->ObtenerInfoApoyo($ben->idBeneficiario);
      $mensaje="Los datos del beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha actualizado correctamente";
    }else{
      $beneficiario->idRegistro=$this->model->RegistraDatosRegistro($beneficiario);
      $idBeneficiario=$this->model->Registrar($beneficiario);
      $mensaje="El beneficiario <b>".$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido."</b> se ha registrado correctamente";
      $ben = $this->model->Listar($idBeneficiario);
      $infoApoyo = $this->model->ObtenerInfoApoyo($idBeneficiario);
    }
    $beneficiario_curp=true;
    $beneficiarios = false;
    $page="view/beneficiario_curp/detalles.php";
    require_once 'view/index.php';

  }

  public function Crud(){
    $beneficiario = new Beneficiario();
    if(isset($_REQUEST['curp'])){
      $beneficiario->curp=$_REQUEST['curp'];
      $verificaBen=$this->model->VerificaBeneficiario($beneficiario->curp);
      if($verificaBen==null){
        $beneficiarios=true;
        $beneficiario_curp=true;
        $page="view/beneficiario_curp/beneficiario.php";
        require_once 'view/index.php';
      }else{
        $beneficiario->idBeneficiario;
        $warning=true;
        $mensaje="El beneficiario ya esta registrado, <b>verifíque</b> que sus datos y la información de registro sean correctos y esten actualizados si no es así, porfavor, <a href='?c=Beneficiario&a=Crud&idBeneficiario=".$verificaBen->idBeneficiario."'>actualice la información</a>.";      
        $beneficiarios = false;
        $beneficiario_curp=true;
        $ben = $this->model->Listar($verificaBen->idBeneficiario);
        $infoApoyo = $this->model->ObtenerInfoApoyo($verificaBen->idBeneficiario);
        $page="view/beneficiario_curp/detalles.php";
        require_once 'view/index.php';
      }
    }if(isset($_REQUEST['idBeneficiario'])){
      $beneficiarios=true;
      $beneficiario_curp=true;
      $beneficiario = $this->model->Listar($_REQUEST['idBeneficiario']);
      $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idBeneficiario']);
      $page="view/beneficiario_curp/beneficiario.php";
      require_once 'view/index.php';
    }
  }


  public function Upload(){
    if(!isset($_FILES['file']['name'])){
      header('Location: ./?c=beneficiario');
    }
    $archivo = $_FILES['file']['name'];
    $tipo = $_FILES['file']['type'];
    $destino = "./assets/files/".$archivo;
    if(copy($_FILES['file']['tmp_name'], $destino)){
      //echo "Archivo Cargado Con Éxito" . "<br><br>";
      $this->Importar();
      //mandar llamar todas las funciones a importar
    }
    else{
      $this->Index();
    }
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
      $this->LeerArchivo($objPHPExcel,$numRows);
      $mensaje="Se ha leído correctamente el archivo <strong>beneficiarios.xlsx</strong>. Se ha importado correctamente los datos de los beneficiarios.";

      if($_SESSION['numRegErroneos']>0){
        $beneficiarios = true;
        $beneficiario_curp=true;
        $tipoBen="CURP";
      //$page="view/beneficiario_curp/index.php";
        $page="view/beneficiario_curp/resumenImportar.php";
        require_once 'view/index.php';
      }else{
       $beneficiarios = true;
       $beneficiario_curp=true;
       $tipoBen="CURP";
       $page="view/beneficiario_curp/index.php";
       require_once 'view/index.php';
     }
     /* if($this->numRegistros>0)
        $mensaje = $mensaje . "<br><i class='fa fa-check'></i> Se han registrado correctamente $this->numRegistros beneficiarios.";
      if($this->numActualizados>0)
      $mensaje = $mensaje . "<br><i class='fa fa-check'></i> Se han actualizado $this->numActualizados registros.";*/
      
    }
    //si por algo no cargo el archivo bak_
    else {
      $error=true;
      $mensaje="El archivo <strong>beneficiarios.xlsx</strong> no existe. Seleccione el archivo para poder importar los datos";
      $page="view/beneficiarios/index.php";
      $beneficiarios = true;
      $beneficiario_curp=true;
      require_once 'view/index.php';
    }
  }

  public function LeerArchivo($objPHPExcel,$numRows){
    try{
      unset($_SESSION['numRegErroneos']);
      $numRow=2;
      $arrayError=array();
      $numRegErroneos=0;
      do {  

        $numError=0;
        $ben = new Beneficiario;

        //----------VALIDANDO LA CURP--------------------

        $ben->curp = $objPHPExcel->getActiveSheet()->getCell('A'.$numRow)->getCalculatedValue();

        if(!$this->validate_curp($ben->curp)){
          $row_array['Curp']=$ben->curp;
          $numError++;
        }else{
          $row_array['Curp']='0';
        }

       //------------VALIDANDO PRIMER APELLIDO--------------

        $ben->primerApellido = $objPHPExcel->getActiveSheet()->getCell('B'.$numRow)->getCalculatedValue();

        if($ben->primerApellido==""){
          $row_array['Primer apellido']="Campo vacío";
          $numError++;
        }else{
          $row_array['Primer apellido']='0';
        }


        //------------SEGUNDO APELLIDO NO VALIDADO ---------------

        $ben->segundoApellido = $objPHPExcel->getActiveSheet()->getCell('C'.$numRow)->getCalculatedValue();

        //---------------- VALIDANDO NOMBRE ------------------

        $ben->nombres = $objPHPExcel->getActiveSheet()->getCell('D'.$numRow)->getCalculatedValue();

        if($ben->nombres==""){
          $row_array['Nombres']="Campo vacío";
          $numError++;
        }else{
          $row_array['Nombres']='0';
        }

        //-------------------- VALIDANDO ID IDENTIFICACION ---------------

        $ben->idIdentificacion = $objPHPExcel->getActiveSheet()->getCell('E'.$numRow)->getCalculatedValue();

        if(!is_numeric($ben->idIdentificacion)){
          $row_array['Id de identificacion']=$ben->idIdentificacion;
          $numError++;
        }else{
          if($ben->idIdentificacion>7 || $ben->idIdentificacion<1){
            $row_array['Id de identificacion']=$ben->idIdentificacion;
            $numError++;
          }else{
            $row_array['Id de identificacion']='0';
          }
        }
        //-------------------- VALIDANDO ID TIPO VIALIDAD ---------------

        $ben->idTipoVialidad = $objPHPExcel->getActiveSheet()->getCell('F'.$numRow)->getCalculatedValue();
        if(!is_numeric($ben->idTipoVialidad)){
          $row_array['Id tipo vialidad']=$ben->idTipoVialidad;
          $numError++;
        }else{
          if($ben->idTipoVialidad>22 || $ben->idTipoVialidad<1){
            $row_array['Id tipo vialidad']=$ben->idTipoVialidad;
            $numError++;
          }else{
            $row_array['Id tipo vialidad']='0';
          }
        }
         //-------------------- VALIDANDO NOMBRE VIALIDAD ---------------

        $ben->nombreVialidad = $objPHPExcel->getActiveSheet()->getCell('G'.$numRow)->getCalculatedValue();
        if($ben->nombreVialidad==""){
          $row_array['Nombre vialidad']="Campo vacío";
          $numError++;
        }else{
          $row_array['Nombre vialidad']='0';
        }
   //-------------------- VALIDANDO No EXTERIOR ---------------

        $ben->noExterior = $objPHPExcel->getActiveSheet()->getCell('H'.$numRow)->getCalculatedValue();
        if(!is_numeric($ben->noExterior)){
          $row_array['No Exterior']=$ben->noExterior;
          $numError++;
        }else{ 
         if($ben->noExterior==""){
          $row_array['No Exterior']="Campo vacío";
          $numError++;
        }else{
          $row_array['No Exterior']='0';
        }
      }
          //-------------------- No INTERIOR NO VALIDADO ---------------
      $ben->noInterior = $objPHPExcel->getActiveSheet()->getCell('I'.$numRow)->getCalculatedValue();

          //-------------------- VALIDANDO ID ASENTAMIENTOS ---------------

      $ben->idAsentamientos = $objPHPExcel->getActiveSheet()->getCell('J'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idAsentamientos)){
        $row_array['Id Asentamientos']=$ben->idAsentamientos;
        $numError++;
      }else{
        if($ben->idAsentamientos==""){
          $row_array['Id Asentamientos']="Campo vacío";
          $numError++;
        }
      }
          //-------------------- VALIDANDO ID LOCALIDADES ---------------

      $ben->idLocalidad = $objPHPExcel->getActiveSheet()->getCell('K'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idLocalidad)){
        $row_array['Id Localidad']=$ben->idLocalidad;
        $numError++;
      }else{
        if($ben->idLocalidad==""){
          $row_array['Id Localidad']="Campo vacío";
          $numError++;
        }
      }
        //-------------------- VALIDANDO ENTRE VIALIDADES ---------------

      $ben->entreVialidades = $objPHPExcel->getActiveSheet()->getCell('L'.$numRow)->getCalculatedValue();

      if($ben->entreVialidades==""){
        $row_array['Entre vialidades']="Campo vacío";
        $numError++;
      }else{
        $row_array['Entre vialidades']='0';
      }
         //-------------------- VALIDANDO DESCRIPCION DE UBICACION ---------------

      $ben->descripcionUbicacion = $objPHPExcel->getActiveSheet()->getCell('M'.$numRow)->getCalculatedValue();

      if($ben->descripcionUbicacion==""){
        $row_array['Descripción de ubicación']="Campo vacío";
        $numError++;
      }else{
        $row_array['Descripción de ubicación']='0';
      }
         //-------------------- VALIDANDO ESTUDIO SOCIOECONOMICO ---------------

      $ben->estudioSocioeconomico = $objPHPExcel->getActiveSheet()->getCell('N'.$numRow)->getCalculatedValue();

      if($ben->estudioSocioeconomico==""){
        $row_array['Estudio Socioeconomico']="Campo vacío";
        $numError++;
      }else{
        $row_array['Estudio Socioeconomico']='0';
      }
            //-------------------- VALIDANDO ID ESTADO CIVIL ---------------

      $ben->idEstadoCivil = $objPHPExcel->getActiveSheet()->getCell('O'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idEstadoCivil)){
        $row_array['Id Estado civil']=$ben->idEstadoCivil;
        $numError++;
      }else{
        if($ben->idEstadoCivil>5 || $ben->idEstadoCivil<1){
          $row_array['Id Estado civil']=$ben->idEstadoCivil;
          $numError++;
        }else{
          $row_array['Id Estado civil']='0';
        }
      }
         //-------------------- VALIDANDO JEFE DE FAMILIA ---------------

      $ben->jefeFamilia = $objPHPExcel->getActiveSheet()->getCell('P'.$numRow)->getCalculatedValue();

      if($ben->jefeFamilia==""){
        $row_array['Jefe de familia']="Campo vacío";
        $numError++;
      }else{
        $row_array['Jefe de familia']='0';
      }
            //-------------------- VALIDANDO ID OCUPACION ---------------

      $ben->idOcupacion = $objPHPExcel->getActiveSheet()->getCell('Q'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idOcupacion)){
        $row_array['Id Ocupación']=$ben->idOcupacion;
        $numError++;
      }else{
        if($ben->idOcupacion>11 || $ben->idOcupacion<1){
          $row_array['Id Ocupación']=$ben->idOcupacion;
          $numError++;
        }else{
          $row_array['Id Ocupación']='0';
        }
      }
        //-------------------- VALIDANDO ID INGRESO MENSUAL ---------------

      $ben->idIngresoMensual = $objPHPExcel->getActiveSheet()->getCell('R'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idIngresoMensual)){
        $row_array['Id Ingreso mensual']=$ben->idIngresoMensual;
        $numError++;
      }else{
        if($ben->idIngresoMensual>7 || $ben->idIngresoMensual<1){
          $row_array['Id Ingreso mensual']=$ben->idIngresoMensual;
          $numError++;
        }else{
          $row_array['Id Ingreso mensual']='0';
        }
      }
        //-------------------- VALIDANDO INTEGRANTES DE FAMILIA ---------------

      $ben->integrantesFamilia = $objPHPExcel->getActiveSheet()->getCell('S'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->integrantesFamilia)){
        $row_array['Integrantes de familia']=$ben->integrantesFamilia;
        $numError++;
      }else{
        if($ben->integrantesFamilia==""){
          $row_array['Integrantes de familia']="Campo vacío";
          $numError++;
        }else{
          $row_array['Integrantes de familia']='0';
        }
      }
         //-------------------- VALIDANDO DEPENDIENTES ECONOMICOS ---------------

      $ben->dependientesEconomicos = $objPHPExcel->getActiveSheet()->getCell('T'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->dependientesEconomicos)){
        $row_array['Dependientes Economicos']=$ben->dependientesEconomicos;
        $numError++;
      }else{
        if($ben->dependientesEconomicos==""){
          $row_array['Dependientes Economicos']="Campo vacío";
          $numError++;
        }else{
          $row_array['Dependientes Economicos']='0';
        }
      }
        //-------------------- VALIDANDO ID VIVIENDA ---------------

      $ben->idVivienda =$objPHPExcel->getActiveSheet()->getCell('U'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idVivienda)){
        $row_array['Id vivienda']=$ben->idVivienda;
        $numError++;
      }else{
        if($ben->idVivienda>3 || $ben->idVivienda<1){
          $row_array['Id vivienda']=$ben->idVivienda;
          $numError++;
        }else{
          $row_array['Id vivienda']='0';
        }
      }
        //-------------------- VALIDANDO NUMERO DE HABITANTES ---------------

      $ben->noHabitantes = $objPHPExcel->getActiveSheet()->getCell('V'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->noHabitantes)){
        $row_array['Numero de habitantes']=$ben->noHabitantes;
        $numError++;
      }else{
        if($ben->noHabitantes==""){
          $row_array['Numero de habitantes']="Campo vacío";
          $numError++;
        }else{
          $row_array['Numero de habitantes']='0';
        }
      }
         //-------------------- VALIDANDO VIVIENDA ELECTRICIDAD ---------------

      $ben->viviendaElectricidad = $objPHPExcel->getActiveSheet()->getCell('W'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->viviendaElectricidad)){
        $row_array['Vivienda Electricidad']=$ben->viviendaElectricidad;
        $numError++;
      }else{
        if($ben->viviendaElectricidad>2 || $ben->idVivienda<1){
          $row_array['Vivienda Electricidad']=$ben->viviendaElectricidad;
          $numError++;
        }else{
          $row_array['Vivienda Electricidad']='0';
        }
      }
        //-------------------- VALIDANDO VIVIENDA AGUA ---------------

      $ben->viviendaAgua = $objPHPExcel->getActiveSheet()->getCell('X'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->viviendaAgua)){
        $row_array['Vivienda Agua']=$ben->viviendaAgua;
        $numError++;
      }else{
        if($ben->viviendaAgua>2 || $ben->viviendaAgua<1){
          $row_array['Vivienda Agua']=$ben->viviendaAgua;
          $numError++;
        }else{
          $row_array['Vivienda Agua']='0';
        }
      }
         //-------------------- VALIDANDO VIVIENDA DRENAJE ---------------

      $ben->viviendaDrenaje = $objPHPExcel->getActiveSheet()->getCell('Y'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->viviendaDrenaje)){
        $row_array['Vivienda Drenaje']=$ben->viviendaDrenaje;
        $numError++;
      }else{
        if($ben->viviendaDrenaje>2 || $ben->viviendaDrenaje<1){
          $row_array['Vivienda Drenaje']=$ben->viviendaDrenaje;
          $numError++;
        }else{
          $row_array['Vivienda Drenaje']='0';
        }
      }
         //-------------------- VALIDANDO VIVIENDA GAS ---------------

      $ben->viviendaGas = $objPHPExcel->getActiveSheet()->getCell('Z'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->viviendaGas)){
        $row_array['Vivienda Gas']=$ben->viviendaGas;
        $numError++;
      }else{
        if($ben->viviendaGas>2 || $ben->viviendaGas<1){
          $row_array['Vivienda Gas']=$ben->viviendaGas;
          $numError++;
        }else{
          $row_array['Vivienda Gas']='0';
        }
      }
         //-------------------- VALIDANDO VIVIENDA GAS ---------------

      $ben->viviendaTelefono = $objPHPExcel->getActiveSheet()->getCell('AA'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->viviendaTelefono)){
        $row_array['Vivienda Telefono']=$ben->viviendaTelefono;
        $numError++;
      }else{
        if($ben->viviendaTelefono>2 || $ben->viviendaTelefono<1){
          $row_array['Vivienda Telefono']=$ben->viviendaTelefono;
          $numError++;
        }else{
          $row_array['Vivienda Telefono']='0';
        }
      }
        //-------------------- VALIDANDO VIVIENDA INTERNET ---------------

      $ben->viviendaInternet = $objPHPExcel->getActiveSheet()->getCell('AB'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->viviendaInternet)){
        $row_array['Vivienda Internet']=$ben->viviendaInternet;
        $numError++;
      }else{
        if($ben->viviendaInternet>2 || $ben->viviendaInternet<1){
          $row_array['Vivienda Internet']=$ben->viviendaInternet;
          $numError++;
        }else{
          $row_array['Vivienda Internet']='0';
        }
      }
         //-------------------- VALIDANDO NIVEL DE ESTUDIOS ---------------

      $ben->idNivelEstudios = $objPHPExcel->getActiveSheet()->getCell('AC'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idNivelEstudios)){
        $row_array['Id Nivel de estudios']=$ben->idNivelEstudios;
        $numError++;
      }else{
        if($ben->idNivelEstudios>7 || $ben->idNivelEstudios<1){
          $row_array['Id Nivel de estudios']=$ben->idNivelEstudios;
          $numError++;
        }else{
          $row_array['Id Nivel de estudios']='0';
        }
      }
        //-------------------- VALIDANDO ID SEGURIDAD SOCIAL ---------------

      $ben->idSeguridadSocial = $objPHPExcel->getActiveSheet()->getCell('AD'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idSeguridadSocial)){
        $row_array['Id Seguridad Social']=$ben->idSeguridadSocial;
        $numError++;
      }else{
        if($ben->idSeguridadSocial>6 || $ben->idSeguridadSocial<1){
          $row_array['Id Seguridad Social']=$ben->idSeguridadSocial;
          $numError++;
        }else{
          $row_array['Id Seguridad Social']='0';
        }
      }
        //-------------------- VALIDANDO ID SEGURIDAD SOCIAL ---------------

      $ben->idDiscapacidad = $objPHPExcel->getActiveSheet()->getCell('AE'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idDiscapacidad)){
        $row_array['Id Discapacidad']=$ben->idDiscapacidad;
        $numError++;
      }else{
        if($ben->idDiscapacidad>8 || $ben->idDiscapacidad<1){
          $row_array['Id Discapacidad']=$ben->idDiscapacidad;
          $numError++;
        }else{
          $row_array['Id Discapacidad']='0';
        }
      }
         //-------------------- VALIDANDO ID GRUPO VULNERABLE ---------------

      $ben->idGrupoVulnerable = $objPHPExcel->getActiveSheet()->getCell('AF'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->idGrupoVulnerable)){
        $row_array['Id Grupo Vulnerable']=$ben->idGrupoVulnerable;
        $numError++;
      }else{
        if($ben->idGrupoVulnerable>6 || $ben->idGrupoVulnerable<1){
          $row_array['Id Grupo Vulnerable']=$ben->idGrupoVulnerable;
          $numError++;
        }else{
          $row_array['Id Grupo Vulnerable']='0';
        }
      }
        //-------------------- VALIDANDO BENEFICIARIO COLECTIVO ---------------

      $ben->beneficiarioColectivo = $objPHPExcel->getActiveSheet()->getCell('AG'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->beneficiarioColectivo)){
        $row_array['Beneficiario colectivo']=$ben->beneficiarioColectivo;
        $numError++;
      }else{
        if($ben->beneficiarioColectivo>2 || $ben->beneficiarioColectivo<1){
          $row_array['Beneficiario colectivo']=$ben->beneficiarioColectivo;
          $numError++;
        }else{
          $row_array['Beneficiario colectivo']='0';
        }
      }
         //-------------------- VALIDANDO EMAIL ---------------

      $ben->email = $objPHPExcel->getActiveSheet()->getCell('AH'.$numRow)->getCalculatedValue();

      if($ben->email==""){
        $row_array['Email']="Campo vacío";
        $numError++;
      }else{
        $row_array['Email']='0';
      }
        //-------------------- VALIDANDO FECHA ---------------

      $ben->fechaNacimiento = $objPHPExcel->getActiveSheet()->getCell('AI'.$numRow)->getCalculatedValue();

      if($ben->fechaNacimiento==""){
        $row_array['Fecha de nacimiento']="Campo vacío";
        $numError++;
      }else{
        $row_array['Fecha de nacimiento']='0';
      }

         //-------------------- VALIDANDO GENERO ---------------

      $ben->genero = $objPHPExcel->getActiveSheet()->getCell('AJ'.$numRow)->getCalculatedValue();

      if($ben->genero==""){
        $row_array['Genero']="Campo vacío";
        $numError++;
      }else{
        $row_array['Genero']='0';
      }
         //-------------------- VALIDANDO PERFIL SOCIODEMOGRAFICO ---------------

      $ben->perfilSociodemografico = $objPHPExcel->getActiveSheet()->getCell('AK'.$numRow)->getCalculatedValue();

      if($ben->perfilSociodemografico==""){
        $row_array['Perfil Sociodemografico']="Campo vacío";
        $numError++;
      }else{
        $row_array['Perfil Sociodemografico']='0';
      }
        //-------------------- VALIDANDO PERFIL SOCIODEMOGRAFICO ---------------

      $ben->perfilSociodemografico = $objPHPExcel->getActiveSheet()->getCell('AK'.$numRow)->getCalculatedValue();

      if($ben->perfilSociodemografico==""){
        $row_array['Perfil Sociodemografico']="Campo vacío";
        $numError++;
      }else{
        $row_array['Perfil Sociodemografico']='0';
      }
        //-------------------- VALIDANDO TELEFONO ---------------

      $ben->telefono = $objPHPExcel->getActiveSheet()->getCell('AL'.$numRow)->getCalculatedValue();

      if(!is_numeric($ben->telefono)){
        $row_array['Telefono']=$ben->telefono;
        $numError++;
      }else{
        if($ben->telefono==""){
          $row_array['Telefono']="Campo vacío";
          $numError++;
        }else{
          $row_array['Telefono']='0';
        }
      }
        //-------------------- VALIDANDO CLAVE MUNICIPIO ---------------

      $claveMunicipio = $objPHPExcel->getActiveSheet()->getCell('AM'.$numRow)->getCalculatedValue();

      if(!is_numeric($claveMunicipio)){
        $row_array['Clave municipio']=$claveMunicipio;
        $numError++;
      }else{
        if($claveMunicipio==""){
          $row_array['Clave municipio']="Campo vacío";
          $numError++;
        }else{
          $row_array['Clave municipio']='0';
        }
      }

      $ben->usuario=$_SESSION['usuario'];
      $ben->fechaAlta=date("Y-m-d H:i:s");
      $ben->direccion=$_SESSION['direccion'];
      $ben->estado="Activo";

      if (!$ben->curp == null){
        if($numError>0){
          $numRegErroneos+=1;
          $row_array['fila']=$numRow;
          $row_array['numeroErrores']=$numError;
          array_push($arrayError, $row_array); 
        }
        $verificaBen=$this->model->VerificaBeneficiario($ben->curp);
        if($verificaBen==null){
            //Datos de registro
          $consult = $this->model->ObtenerIdMunicipio($claveMunicipio);
          $ben->idMunicipio=$consult->idMunicipio;
          $ben->idRegistro=$this->model->RegistraDatosRegistro($ben);
          $this->model->ImportarBeneficiario($ben);
          $this->numRegistros=$this->numRegistros+1;
        }else{
          $obtenerIdBeneficiario=$this->model->ObtenerIdBeneficiario($ben->curp);
          $idRegistro=$this->model->ObtenerIdRegistro($obtenerIdBeneficiario->idBeneficiario);
          $ben->idRegistro=$idRegistro->idRegistro;
          $this->model->RegistraActualizacion($ben);
          $this->model->Actualizar($ben);
          $this->numActualizados=$this->numActualizados+1;
        }
      }



      $numRow+=1;
    } while(!$ben->curp == null);

    $_SESSION['numRegErroneos']=$numRegErroneos; 

    if($numRegErroneos>0){

     $this->arrayError=$arrayError;

   }
   
     //echo  '<br>'.json_encode($arrayError, JSON_FORCE_OBJECT);
 }catch (Exception $e) {
  $error=true;
  $mensaje="Error al insertar datos del archivo";
  $page="view/beneficiario_curp/index.php";
  $beneficiarios = true;
  $beneficiario_curp=true;
  require_once 'view/index.php';
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

public function Eliminar(){ //variable cargada para activar la opcion administracion en el menu
    $beneficiarios=true; //variable cargada para activar la opcion programas en el menu
    $beneficiario= new Beneficiario();
    $beneficiario->idRegistro = $_REQUEST['idRegistro'];
    $beneficiario->estado='Inactivo';
    $this->model->Eliminar($beneficiario);
    header ('Location: index.php?c=Beneficiario&a=Index');
  }

  public function Detalles(){
    $beneficiario_curp=true;
    $beneficiarios=true;
    $ben = new Beneficiario();
    $ben = $this->model->Listar($_REQUEST['idBeneficiario']);
    $infoApoyo = $this->model->ObtenerInfoApoyo($_REQUEST['idBeneficiario']);
    $page="view/beneficiario_curp/detalles.php";
    require_once 'view/index.php';
  }

  public function Consultas(){
    $periodo=$_REQUEST['periodo'];
    foreach ($this->model->Listar1($periodo) as $r):
      echo '
      <tr class="grade">
      <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro('; echo $r->idBeneficiario; echo ')" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
      <td>'. $r->curp .'</td>
      <td>'. $r->nombres." ".$r->primerApellido." ".$r->segundoApellido .'</td>
      <td>'. $r->nombreMunicipio .'</td>
      <td class="center">
      <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario='. $r->idBeneficiario .'" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
      </td>';
      if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){
        echo 
        '<td class="center">
        <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario='. $r->idBeneficiario .'"><i class="fa fa-edit"></i></a>
        </td>
        <td class="center">
        <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario('; echo $r->idRegistro; echo ')" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
        </td>';
      } 
      echo '</tr>';
    endforeach; 
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
    <a href="?c=Beneficiario&a=Detalles&idBeneficiario='.$idBeneficiario.'" class="btn btn-info btn-sm">Ver detalles de beneficiario</a>
    </div>
    </div>';
  }

  public function ListarLocalidades(){
    header('Content-Type: application/json');
    $idMunicipio=$_REQUEST['idMunicipio'];
    $obMunicipio=$this->model->ObtenerMunicipio($idMunicipio);

    if($obMunicipio!=null){

      $municipio=$obMunicipio->nombreMunicipio;
      $datos = array();
      $row_array['estado']='ok';
      array_push($datos, $row_array);

      foreach ($this->model->ListarLocalidades($municipio) as $localidad):
        $row_array['idLocalidad']  = $localidad->idLocalidad;
        $row_array['localidad']  = $localidad->localidad;
        array_push($datos, $row_array);
      endforeach;
    }
    echo json_encode($datos, JSON_FORCE_OBJECT);
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
