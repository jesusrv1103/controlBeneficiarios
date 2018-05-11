 <style type="text/css">
 .lbldetalle{
  color:#424242;
  font-weight: bold;
}
.h3subtitulo{
  color:#2196F3;
  font-weight: bold;
}
</style>

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Beneficiarios</h1>
    <h2 class="">Detalles de beneficiario</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=beneficiario">Beneficiarios</a></li>
      <li class="active">Detalles de beneficiario</li>
    </ol>
  </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row col-md-12">
    <div class="block-web">
     <div class="header">
      <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
        <div class="col-sm-7">
          <div class="actions"> </div>
          <h2 class="content-header theme_color" style="margin-top: -10px;"><?php echo $ben->nombres." ".$ben->primerApellido." ".$ben->segundoApellido; ?></h2>
        </div>
        <div class="col-md-5">
          <div class="btn-group pull-right" style="margin-right: 10px;">
           <b> 
             <div class="btn-group">
              <a  href="#modalInfo"  data-target="#modalInfo" data-toggle="modal" onclick="infoRegistro(<?php echo $ben->idBeneficiarioRFC; ?>)" class="btn btn-sm tooltips btn-default" style="margin-right: 10px;" data-original-title="Ver información de registro y actualizaciones" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-info-circle"  role="button"></i></i>&nbsp;Ver info</a>
            </div>
            <div class="btn-group">
              <a class="btn btn-sm tooltips btn-success dropdown-toggle"  data-toggle="modal" data-target="#modalBuscarRFC" href="#modalBuscarRFC" style="margin-right: 10px;" data-original-title="Nuevo beneficiario con RFC" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-plus"></i></i>&nbsp;Registrar</a>
            </div>
            <div class="btn-group">

              <a href="?c=Beneficiariorfc&a=Crud&idBeneficiarioRFC=<?php echo $ben->idBeneficiarioRFC;?>" class="btn btn-sm tooltips btn-primary dropdown-toggle" style="margin-right: 10px;" data-original-title="Editar beneficiario" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-edit"></i></i>&nbsp;Editar</a>
            </div>
          </b>
        </b>
      </div>
    </div>    
  </div>
</div>

<?php if(isset($this->mensaje)){ if(!isset($this->warning)){?>
<div class="row" style="margin-bottom: -20px; margin-top: 20px">
  <div class="col-md-12">
    <div class="alert alert-success fade in">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <i class="fa fa-check"></i>&nbsp;<?php echo $this->mensaje; ?>
    </div>
  </div>
</div> 
<?php } if(isset($this->warning)){ ?>
<div class="row" style="margin-bottom: -20px; margin-top: 20px">
  <div class="col-md-12">
    <div class="alert alert-warning fade in">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <i class="fa fa-warning"></i>&nbsp;<?php echo $this->mensaje; ?>
    </div>
  </div>
</div>
<?php } }?>

<div class="row">
  <div class="col-md-6">
    <div class="block-web">
      <div class="header">
        <h3 class="content-header h3subtitulo">Datos fiscales</h3>
      </div>
      <div class="porlets-content">
        <div class="panel-body">
          <div class="col-md-12">
           <table class="table table-striped">
            <tbody>
              <tr>
                <td>
                  <div class="col-md-12">
                   <label class="col-sm-6 lbldetalle">RFC:</label>
                   <label class="col-sm-6 control-label"><?php echo $ben->RFC; ?></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
               <div class="col-md-12">
                 <label class="col-sm-6 lbldetalle">Fecha alta Sat:</label>
                 <label class="col-sm-6 control-label"><?php echo $ben->fechaAltaSat; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Actividad:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->actividad; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Cobertura:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->cobertura; ?></label>
           </div>
         </td>
       </tr>
     </tbody>
   </table>
 </div>
</div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-6-->
<div class="col-md-6">
  <div class="block-web">
    <div class="header">
      <h3 class="content-header h3subtitulo">Datos del representante legal</h3>
    </div>
    <div class="porlets-content">
      <div class="panel-body">
        <div class="col-md-12">
         <table class="table table-striped">
          <tbody>
            <tr>
              <td>
                <div class="col-md-12">
                  <label class="col-sm-6 lbldetalle">CURP:</label>
                  <label class="col-sm-6 control-label"><?php echo $ben->curp; ?></label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
               <div class="col-md-12">
                 <label class="col-sm-6 lbldetalle">Nombre(s):</label>
                 <label class="col-sm-6 control-label"><?php echo $ben->nombres; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Primer Apellido:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->primerApellido; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Segundo Apellido:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->segundoApellido; ?></label>
           </div>
         </td>
       </tr>
       <tr>
        <td>
         <div class="col-md-12">
           <label class="col-sm-6 lbldetalle">Sexo:</label>
           <label class="col-sm-6 control-label"><?php if($ben->sexo==1) echo "MASCULINO"; else echo "FEMENINO"; ?></label>
         </div>
       </td>
     </tr>
   </tbody>
 </table>
</div>
</div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-6-->
</div><!--/row-->
<div class="row">
  <div class="col-md-6">
    <div class="block-web">
      <div class="header">
        <h3 class="content-header h3subtitulo">Domicilio fiscal</h3>
      </div>
      <div class="porlets-content">
        <div class="panel-body">
          <div class="col-md-12">
           <table class="table table-striped">
            <tbody>
              <tr>
                <td>
                  <div class="col-md-12">
                    <label class="col-sm-6 lbldetalle">Vialidad:</label>
                    <label class="col-sm-6 control-label"><?php echo $ben->tipoVialidad; ?></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                 <div class="col-md-12">
                   <label class="col-sm-6 lbldetalle">Nombre de la vialidad:</label>
                   <label class="col-sm-6 control-label"><?php echo $ben->nombreVialidad; ?></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
               <div class="col-md-12">
                 <label class="col-sm-6 lbldetalle">Numero Exterior:</label>
                 <label class="col-sm-6 control-label"><?php echo $ben->numeroExterior; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Numero Interior:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->numeroInterior; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Municipio:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->nombreMunicipio; ?></label>
           </div>
         </td>
       </tr>
       <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Localidad:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->localidad; ?></label>
           </div>
         </td>
       </tr>
       <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Asentamiento:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->nombreAsentamiento; ?></label>
           </div>
         </td>
       </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Asentamientos:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->nombreAsentamiento?></label>
           </div>
         </td>
       </tr>
     </tbody>
   </table>
 </div>
</div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-6-->
</div><!--/row-->
<div class="row">
  <div class="col-md-12">
    <div class="block-web">
      <div class="header">
        <h3 class="content-header h3subtitulo">Apoyos generados</h3>
      </div>
      <div class="porlets-content">
        <div class="panel-body">
          <?php if($infoApoyo!=null){ $i=1; foreach ($infoApoyo as $infoApoyo): ?>
            <div class="col-md-6">
             <table class="table table-striped">
              <tbody>
                <tr>
                  <td>
                    <div class="col-md-12">   
                     <label class="col-sm-5 lblinfo" style="margin-top: 5px; color:#607D8B;"><b>Información del <?php echo $i ?>° apoyo</b></label>
                   </div>
                 </td>
               </tr>
               <tr>
                <td>
                  <div class="col-md-12">
                   <label class="col-sm-4 lbl-detalle"><b>Dirección que lo apoya:</b></label>
                   <label class="col-sm-7 control-label"><?php echo $infoApoyo->direccion ?></label>
                 </div>
                 <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Tipo de apoyo:</b></label>
                  <label class="col-sm-7 control-label"><?php echo $infoApoyo->tipoApoyo; ?></label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Origen:</b></label>
                  <label class="col-sm-7 control-label"><?php echo $infoApoyo->origen; ?></label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Programa:</b></label>
                  <label class="col-sm-7 control-label"><?php echo $infoApoyo->programa; ?></label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Subprograma:</b></label>
                  <label class="col-sm-7 control-label"><?php echo $infoApoyo->subprograma; ?></label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Periodicidad:</b></label>
                  <label class="col-sm-7 control-label"><?php echo $infoApoyo->periodicidad; ?></label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Programa social:</b></label>
                  <label class="col-sm-7 control-label" style="color:red"><strong>P E N D I E N T E</strong></label>
                </div>
                <div class="col-md-12">
                  <label class="col-sm-4 lbl-detalle"><b>Importe:</b></label>
                  <label class="col-sm-7 control-label">$ <?php echo $infoApoyo->importeApoyo; ?></label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php  
      if ($i%2==0){
        echo "<hr>";
      }$i++;
    endforeach; }else{
      echo "<h3>No se han registrado apoyos a este beneficiario<h3>";
    }
    ?>
  </div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--/block-web--> 
</div><!--/row-col-md-12--> 
</div><!--/container clear_both padding_fix-->
<div class="modal fade" id="modalBuscarRFC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default blue_border horizontal_border_1">
     <form action="?c=Beneficiariorfc&a=Crud" enctype="multipart/form-data" method="post" parsley-validate novalidate>
      <div class="modal-body"> 
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header h3subtitulo">&nbsp;Beneficiario por RFC</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <div class="form-group">
                <div class="col-sm-10">
                  <input name="RFC"  maxlength="13" id="RFC" type="text" required parsley-regexp="([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})"   required parsley-rangelength="[12,13]"  onkeyup="mayus(this);" class="form-control" required placeholder="Ingrese el RFC del beneficiario">
                </div>
              </div><!--/form-group-->
            </div><!--/porlets-content--> 
          </div><!--/block-web--> 
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
        </div>
      </div>
    </form>
  </div><!--/modal-content--> 
</div><!--/modal-dialog--> 
</div><!--/modal-fade--> 
<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 60%;">
    <div class="modal-content" id="div-modal-content">
      <!--************************En esta sección se incluye el modal de informacion de registro y apoyo***************************-->
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 
<script>
  infoRegistro = function (idBeneficiario){
    var idBeneficiario=idBeneficiario;
    $.post("index.php?c=beneficiario&a=Inforegistro", {idBeneficiario: idBeneficiario}, function(info) {
      $("#div-modal-content").html(info);
    }); 
  }
</script>

