<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Inicio</h1>
   <h2 class="">Beneficiarios</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=Inicio">Inicio</a></li>
     <li class="active">Beneficiarios</a></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Libro de beneficiarios</h2>
            </div>
            <div class="col-md-5">
              <div class="btn-group pull-right">
                <b> 
                  <?php if($_SESSION['user_type']==1){?>
                  <div class="btn-group" style="margin-right: 10px;"> 
                    <a class="btn btn-sm btn-success" href="?c=beneficiario&a=crud" style="margin-right: 10px;" data-toggle="tooltip" data-placement="left" title=""> <i class="fa fa-plus"></i> Registrar beneficiario </a>
                    <a class="btn btn-sm  tooltips btn-warning"  href="#modalImportar" style="margin-right: 10px;"  data-toggle="modal" data-target="#modalImportar" data-original-title="Importar catálogo" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="left" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>
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
            <table  class="display table table-bordered table-striped" id="dynamic-table">
             <thead>
               <tr>
                 <th>CURP</th>
                 <th>Primer apellido</th>
                 <th>Segunda apellido</th>
                 <th>Nombre</th>
                 <?php if($_SESSION['user_type']==1){?>
                 <td><center><b>Editar</b></center></td>
                 <td><center><b>Borrar</b></center></td>
                 <?php } ?>
                 <td><center><b>Ver</b></center></td>
               </tr>
             </thead>
             <tbody>
              <?php foreach($this->model->Listar1() as $r): ?>
                <tr class="grade">
                  <td><?php echo $r->curp ?> </td>
                  <td><?php echo $r->primerApellido ?> </td>
                  <td><?php echo $r->segundoApellido ?> </td>
                  <td><?php echo $r->nombres ?> </td>
                  <?php if($_SESSION['user_type']==1){?>

                  <td class="center">
                    <a class="btn btn-primary"  role="button" href="?c=Beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
                  </td>
                  <td class="center">
                   <a class="btn btn-danger" onclick="eliminarBeneficiario(<?php echo $r->idBeneficiario;?>);" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
                 </td>
                 <?php } ?>
                 <td class="center">
                  <a class="btn btn-info"  role="button" href="?c=Beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>"><i class="fa fa-eye"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
           <tr>
             <th>CURP</th>
             <th>Primer apellido</th>
             <th>Segunda apellido</th>
             <th>Nombre</th>
             <?php if($_SESSION['user_type']==1){?>
             <th><center><b>Editar</b></center></th>
             <td><center><b>Borrar</b></center></td>
             <?php } ?>
             <td><center><b>Ver</b></center></td>
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
              <h3 class="content-header theme_color">&nbsp;Importar beneficiarios</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -65px;">
              <p>Importa tu archivo excel con los datos de los beneficiarios para registrarlos.</p>
              <p><strong>Nota: </strong>El archivo debe conener el nombre de <strong class="theme_color">beneficiarios.xmls</strong> para poder ser leído correctamente.</p> 
              <br>
              <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Seleccionar archivo</span>
                <!-- The file input field used as target for the file upload widget -->
                <input id="fileupload" type="file" name="files[]" multiple class="beneficiarios">
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
          <a href="?c=Beneficiario&a=Importar" class="btn btn-primary">Importar datos</a>
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
              <h3 class="content-header theme_color">&nbsp;Eliminar Beneficiario</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>¿Esta segúro que desea eliminar el Beneficiario?</h4>
            </div><!--/porlets-content--> 
          </div><!--/block-web--> 
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=Beneficiario&a=Eliminar" enctype="multipart/form-data" method="post">
            <input hidden type="text" name="idBeneficiario" id="txtIdBeneficiario">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 
<script>
  eliminarBeneficiario = function(idBeneficiario){
    $('#txtIdBeneficiario').val(idBeneficiario);  
  };
</script>