
<style type="text/css">
  .lblinfo{
    color:#2196F3;
  }

</style>
<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Administración</h1>
   <h2 class="">Apoyos</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=Inicio">Inicio</a></li>
     <li class="active">Apoyos</a></li>
   </ol>
 </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
            <div class="col-sm-7">
              <div class="actions"> </div>
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Libro de apoyos</h2>
            </div>
            <div class="col-md-5">
              <div class="btn-group pull-right">
                <b> 
                 <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
                 <div class="btn-group" style="margin-right: 10px;">

                  <div class="btn-group">
                   <a data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle" style="margin-right: 10px;" type="button"> <i class="fa fa-eye"></i>&nbsp;Ver<span class="caret"></span></a>
                   <ul role="menu" class="dropdown-menu">
                     <li><a href="#modalProceso"  data-toggle="modal" data-target="#modalProceso">Apoyos con curp</a></li>
                     <li><a href="#">Apoyo con RFC</a></li>
                   </ul>
                 </div> 


                 <div class="btn-group">
                  <a data-toggle="dropdown" class="btn btn-sm btn-success dropdown-toggle" style="margin-right: 10px;" type="button"> <i class="fa fa-plus"></i>&nbsp;Registrar<span class="caret"></span></a>
                  <ul role="menu" class="dropdown-menu" >
                    <li><a href="?c=apoyos&a=Crud">Apoyo CURP</a></li>
                    <li><a  data-toggle="modal" data-target="#modalProceso" href="#modalProceso">Apoyo RFC</a></li>
                  </ul>
                </div>

                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-sm tooltips btn-warning dropdown-toggle" style="margin-right: 10px;" data-original-title="Importar catálogo para registrar beneficiarios" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-upload"></i>&nbsp;Importar<span class="caret"></span></button>
                  <ul role="menu" class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#modalImportar" href="#modalImportar">Con CURP</a></li>
                    <li><a data-toggle="modal" data-target="#modalProceso" href="#modalProceso">Con RFC</a></li>
                  </ul>
                </div>
                
                
              </div>
              <?php } ?>
            </b>
          </div>
        </div>    
      </div>
    </div>
    <?php if(isset($mensaje)){ if(!isset($error)){?>
    <div class="row" style="margin-bottom: -20px; margin-top: 20px">
      <div class="col-md-12">
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-check"></i>&nbsp;<?php echo $mensaje; ?>
        </div>
      </div>
    </div> 
    <?php } if(isset($error)){ ?>
    <div class="row" style="margin-bottom: -20px; margin-top: 20px">
      <div class="col-md-12">
        <div class="alert alert-danger">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-warning"></i>&nbsp;<?php echo $mensaje; ?>
        </div>
      </div>
    </div>
    <?php } }?>
    <div class="porlets-content">
      <div class="table-responsive">
        <table class="display table table-bordered table-striped" id="dynamic-table">
         <thead>
           <tr>
             <td><center><b>Info</b></center></td>
             <th>CURP</th>
             <th>Fecha</th> 
             <th width="22%">Programa</th>
             <th>Subprograma</th>
             <!--th>Prog social</th-->
             <th>Tipo</th>
             <th>Caracteristica</th>
             <th>Origen</th> 
             <th>Importe</th>
             <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
             <td><center><b>Editar</b></center></td>
             <?php if($_SESSION['tipoUsuario']==1){?>
             <td><center><b>Borrar</b></center></td>
             <?php } ?>
             <?php } ?>
           </tr>
         </thead>
         <tbody>
          <?php foreach($this->model->Listar() as $r): ?>
            <tr class="grade">
              <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoApoyo(<?php echo $r->idApoyo; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
              <td><?php echo $r->curp ?> </td>
              <td><?php echo $r->fechaApoyo ?> </td>
              <td><?php echo $r->programa; ?> </td>
              <td><?php echo $r->subprograma; ?> </td>
              <!--td><?php echo "r->programaSocial;" ?></td-->
              <td><?php echo $r->tipoApoyo; ?> </td>
              <td><?php echo $r->caracteristicasApoyo; ?> </td>
              <td><?php echo $r->origen; ?> </td>
              <td>$<?php echo $r->importeApoyo; ?></td>
              <?php if($_SESSION['tipoUsuario']==1){?>
              <td class="center">
                <a class="btn btn-primary btn-sm" role="button" href="?c=apoyos&a=Crud&idApoyo=<?php echo $r->idApoyo ?>"><i class="fa fa-edit"></i></a>
              </td>
              <td class="center">
               <a class="btn btn-danger btn-sm" onclick="eliminarApoyo(<?php echo $r->idApoyo;?>);" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
             </td>
             <?php } ?>
           </tr>
         <?php endforeach; ?>
       </tbody>
       <tfoot>
        <tr>
         <td><center><b>Info</b></center></td>
         <th>CURP</th>
         <th>Fecha</th>
         <th>Programa</h> 
           <th>Subprograma</th>
           <!--th>Prog social</th-->
           <th>Tipo</th>
           <th>Caracteristica</th>
           <th>Origen</th> 
           <th>Importe</th>
           <?php if($_SESSION['tipoUsuario']==1){?>
           <td><center><b>Editar</b></center></td>
           <td><center><b>Borrar</b></center></td>
           <?php } ?>
         </tr>
       </tfoot>
     </table>
   </div><!--/table-responsive-->
 </div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div>
<div class="modal fade" id="modalImportar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> 
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Importar Apoyos</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -65px;">
              <p>Importa tu archivo excel con los datos de los Apoyos para registrarlos.</p>
              <p><strong>Nota: </strong>El archivo debe conener el nombre de <strong class="theme_color">apoyos.xlsx</strong> para poder ser leído correctamente.</p> 
              <br>
              <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Seleccionar archivo</span>
                <!-- The file input field used as target for the file upload widget -->
                <input id="fileupload" type="file" name="files[]" multiple class="apoyos">
              </span>
              <br>
              <br>
              <!-- The global progress bar -->
              <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
              </div>
              <!-- The container for the uploaded files -->
              <div id="files" class="files"></div>
            </div><!--/porlets-content--> 
          </div><!--/block-web--> 
        </div>
      </div>
      <div class="modal-footer">
        <div class="row col-md-5 col-md-offset-7">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <a href="?c=apoyos&a=Importar" onclick="deshabilitar();" class="btn btn-primary">Importar datos</a>
        </div>
      </div>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 


<div class="modal fade" id="modalProceso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default red_border horizontal_border_1">
      <div class="modal-body"> 
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Información</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>Funcion en Proceso</h4>
            </div><!--/porlets-content--> 
          </div><!--/block-web--> 
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">


          <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>

          
        </div>
      </div>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade-->

<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default red_border horizontal_border_1">
      <div class="modal-body"> 
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Eliminar Apoyo</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>¿Esta segúro que desea eliminar el Apoyo?</h4>
            </div><!--/porlets-content--> 
          </div><!--/block-web--> 
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=apoyos&a=Eliminar" enctype="multipart/form-data" method="post">
            <input  type="hidden" name="idApoyo" id="txtIdApoyo">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 
<script>
  eliminarApoyo = function(idApoyo){
    $('#txtIdApoyo').val(idApoyo);  
  };
  infoApoyo = function (idApoyo){
    var idApoyo=idApoyo;
    $.post("index.php?c=apoyos&a=InfoApoyo", {idApoyo: idApoyo}, function(info) {
      $("#div-modal-content").html(info);
    }); 
  }
  deshabilitar = function (){
    $('#btnImportar').attr("disabled", true);
  }
</script>