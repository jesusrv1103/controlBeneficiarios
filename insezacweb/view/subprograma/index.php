<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Inicio</h1>
   <h2 class="">SubProgramas</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=Inicio">Inicio</a></li>
     <li class="active">Subprogramas</a></li>
   </ol>
 </div>
</div>
<?php if(!isset($tabla)){ ?>
<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
            <div class="col-sm-6" style="margin-right: 100px;">
              <div class="actions"> </div>
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Subprogramas</h2>
            </div>
            <div class="col-sm-2" style="margin-top: -5px; margin-right: -100px;">
              <div class="minimal-blue single-row">
                <div class="checkbox ">
                  <input type="checkbox" id="verTabla" name="verTabla" checked="checked">
                  <label>Ver en tabla </label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="btn-group pull-right">
                <div class="minimal single-row">
                 <b>
                  <?php if($_SESSION['tipoUsuario']==1){?>
                  <div class="btn-group" style="margin-right: 10px;"> 
                    <a href="?c=Subprograma&a=Crud" class="btn btn-sm btn-success tooltips" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Registrar nuevo subprograma"> <i class="fa fa-plus"></i> Registrar </a>
                    <a class="btn btn-sm  tooltips btn-warning"  href="#modalImportar" style="margin-right: 10px;"  data-toggle="modal" data-target="#modalImportar" data-original-title="Importar subprogramas" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>
                    <a href="assets/files/subprogramas.xlsx" download="subprogramas.xlsx" class="btn btn-sm btn-primary tooltips" data-original-title="Descargar archivo subprogramas.xlsx" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""> <i class="fa  fa-download"></i>&nbsp;Descargar</a> 
                  </div>
                  <?php } ?>
                </b>
              </div>
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
          <table  class="display table table-bordered table-striped" id="dynamic-table">
            <thead>
              <tr>
                <th>Id subprograma</th>
                <th>Subprograma</th>
                <th>Programa</th>
                <?php if($_SESSION['tipoUsuario']==1){?>
                <td><center><b>Editar</b></center></td>
                <td><center><b>Borrar</b></center></td> 
                <?php } ?>
              </tr>
            </thead>
            <tbody>
             <?php foreach($this->model->Listar() as $r): ?>

              <tr class="gradeA">
                <td> <?php echo $r->idSubprograma; ?></td>
                <td><?php echo $r->subprograma; ?></td>
                <td> <?php echo $r->programa; ?></td>
                <?php if($_SESSION['tipoUsuario']==1){?>
                <td class="center">
                 <a class="btn btn-primary btn-sm" role="button" onclick="actualizarPrograma(<?php echo $r->idPrograma; ?>);" data-target="#modalCrud" href="#modalCrud" role="button" data-toggle="modal"><i class="fa fa-edit"></i></a>
               </td>
               <td class="center">
                <a onclick="eliminarPrograma(<?php echo $r->idPrograma;?>);" class="btn btn-danger btn-sm" href="#modalEliminar" style="margin-right: 10px;"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
              </td>
              <?php } ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
         <tr>
          <th>Id subprograma</th>
          <th>Subprograma</th>
          <th>Programa</th>
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
<?php } ?>
<div class="modal fade" id="modalImportar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> 
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Importar subprogramas</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -65px;">
              <p>Importa tu archivo excel con los datos de los subprogramas en caso de que haya algun cambio, si no tienes el archivo puedes descargarlo y agregar o eliminar los datos necesarios.</p>
              <p><strong>Nota: </strong>Al importar el archivo actualizado debe tener el nombre de <strong class="theme_color">subprogramas.xlsx</strong> para poder ser leído correctamente.</p>  
              <br>
              <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Seleccionar archivo</span>
                <!-- The file input field used as target for the file upload widget -->
                <input id="fileupload" type="file" name="files[]" multiple class="subprogramas">
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
          <a href="?c=Subprograma&a=Importar" class="btn btn-primary">Importar datos</a>
        </div>
      </div>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 
<div class="container clear_both padding_fix">
 <div class="row">
   <div class="col-md-12">
    <div class="invoice_header">
      <div class="block-web">
       <div class="header" style="margin-bottom: -49px;">
        <div class="row" style="margin-top: 10px; margin-bottom: 20px;">
          <div class="col-sm-3">
            <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Subprogramas</h2>
          </div>
          <div class="col-sm-4" >
            <div class="input-group">
             <input type="text" class="form-control">
             <span class="input-group-btn">
               <button type="button" class="btn btn-default"><i class="fa fa-search"></i> Buscar </button>
             </span>
           </div>
         </div>
         <div class="col-sm-2" style="margin-top: -3px; margin-right: -91px;">
          <div class="minimal-blue single-row">
            <div class="checkbox ">
              <input type="checkbox" id="verTabla2" class="verTabla2" onclick="verTabla(this);">
              <label>Ver en tabla </label>
            </div>
          </div>
        </div>

        <div class="col-md-4" style=" margin-top: 3px;">
          <div class="btn-group pull-right">
            <b>
              <?php if($_SESSION['tipoUsuario']==1){?>
              <div class="btn-group" style="margin-right: 10px;"> 
                <a href="?c=Subprograma&a=Crud" class="btn btn-sm btn-success tooltips" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Registrar nuevo subprograma"> <i class="fa fa-plus"></i> Registrar </a>
                <a class="btn btn-sm  tooltips btn-warning"  href="#modalImportar" style="margin-right: 10px;"  data-toggle="modal" data-target="#modalImportar" data-original-title="Importar subprogramas" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>
                <a href="assets/files/subprogramas.xlsx" download="subprogramas.xlsx" class="btn btn-sm btn-primary tooltips" data-original-title="Descargar archivo subprogramas.xlsx" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""> <i class="fa  fa-download"></i>&nbsp;Descargar</a> 
              </div>
              <?php } ?>
            </b>
          </div>
        </div>    
      </div>
      <?php if(isset($mensaje)){ if(!isset($error)){?>
      <div class="row" style="margin-bottom: -5px; margin-top: 10px">
        <div class="col-md-12">
          <div class="alert alert-success fade in">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-check"></i>&nbsp;<?php echo $mensaje; ?>
          </div>
        </div>
      </div> 
      <?php } if(isset($error)){ ?>
      <div class="row" style="margin-bottom: -5px; margin-top: 10px">
        <div class="col-md-12">
          <div class="alert alert-danger">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-warning"></i>&nbsp;<?php echo $mensaje; ?>
          </div>
        </div>
      </div>
      <?php } }?>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="container clear_both padding_fix">
 <div class="row">
   <div class="col-md-12">
     <div class="block-web">
      <div class="header">
        <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
        <h3 class="content-header lblheader">Programa 1</h3>
      </div>
      <div class="porlets-content">
        <div class="row">
         <div class="col-md-6">
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa1.jpg" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">
             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 1</div>
             <span>Descripción de subprograma 1</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
         </div>
         <div class="col-md-6">
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa2.jpg" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">

             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 2</div>
             <span>Descripción de subprograma 2</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
         </div>
         <div class="col-md-6">
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa3.jpg" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">

             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 3</div>
             <span>Descripción de subprograma 3</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
         </div>
         <div class="col-md-6">
           <!--div class="ticket_open"-->
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa4.png" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">

             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 4</div>
             <span>Descripción de subprograma 4</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
           <!--/div-->
         </div>
       </div>
     </div><!--/porlets-content-->
   </div><!--/block-web-->
 </div><!--/col-md-12-->
</div><!--/row-->
</div><!--/container clear_both padding_fix-->
<p></p>
<script type="text/javascript">
  verTabla = function(cambio){
    <?php $tabla=true;?>
  }
</script>
