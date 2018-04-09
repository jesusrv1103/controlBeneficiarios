<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Inicio</h1>
   <h2 class="">SubProgramas</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=inicio">Inicio</a></li>
     <li class="active">Subprogramas</a></li>
   </ol>
 </div>
</div>
<?php if(isset($tabla)){ ?>
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
                  <a id="verTabla" href="?c=subprograma">
                    <label>Ocultar tabla</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="btn-group pull-right">
                  <div class="minimal single-row">
                   <b>
                    <?php if($_SESSION['tipoUsuario']==1){?>
                    <div class="btn-group" style="margin-right: 10px;">
                      <a href="?c=subprograma&a=Crud" class="btn btn-sm btn-success tooltips" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Registrar nuevo subprograma"> <i class="fa fa-plus"></i> Registrar </a>
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
         <?php if(isset($this->mensaje)){ if(!isset($this->error)){?>
      <br> <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success fade in">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-check"></i>&nbsp;<?php echo $this->mensaje; ?>
          </div>
        </div>
      </div> 
      <?php } if(isset($this->error)){ ?>
      <br> <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-warning"></i>&nbsp;<?php echo $this->mensaje; ?>
          </div>
        </div>
      </div>
      <?php } }?>
        <div class="porlets-content">
          <div class="table-responsive">
            <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
                <tr>
                  <th>Subprograma</th>
                  <th>Programa</th>
                  <th>Techo presupuestal</th>
                  <?php if($_SESSION['tipoUsuario']!=2 || $_SESSION['tipoUsuario']!=3){?>
                  <td><center><b>Ver</b></center></td>
                  <?php } ?>
                  <?php if($_SESSION['tipoUsuario']==1){?>
                  <td><center><b>Editar</b></center></td>
                  <td><center><b>Borrar</b></center></td>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
               <?php foreach($this->model->Listar() as $r): ?>

                <tr class="gradeA">
                  <td><?php echo $r->subprograma; ?></td>
                  <td> <?php echo $r->programa; ?></td>
                  <td><?php echo $r->techoPresupuestal; ?></td>
                  <td class="center">
                    <a class="btn btn-info btn-sm tooltips" role="button" href="?c=subprograma&a=Beneficiarios&subprograma=<?php echo $r->subprograma; ?>&idSubprograma=<?php echo $r->idSubprograma ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver beneficiarios de subprograma"><i class="fa fa-eye"></i></a>
                  </td>
                  <?php if($_SESSION['tipoUsuario']==1){?>
                  <td class="center">
                    <a href="index.php?c=subprograma&a=Crud&idSubprograma=<?php echo $r->idSubprograma ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-edit"></i></a>
                  </td>
                  <td class="center">
                    <a onclick="eliminarSubprograma(<?php echo $r->idSubprograma;?>);" class="btn btn-danger btn-sm" href="#modalEliminar" style="margin-right: 10px;"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
                  </td>
                  <?php } ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
             <tr>
              <th>Subprograma</th>
              <th>Programa</th>
              <th>Techo presupuestal</th>
              <?php if($_SESSION['tipoUsuario']!=2 || $_SESSION['tipoUsuario']!=3){?>
                <td><center><b>Ver</b></center></td>
                <?php } ?>
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
<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 50%;">
    <div class="modal-content" id="div-modal-content">
      <!--***********************En esta sección se incluye el modal de informacion del subprograma***************************-->
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->
<div class="modal fade" id="modalImportar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="?c=subprograma&a=Upload" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header theme_color">&nbsp;Importar catálogos de subprogramas</h3>
              </div>
              <div class="porlets-content" style="margin-bottom: -65px;">
                <p>Selecciona tu archivo excel con los catáogos de subprogramas para registrarlos en el sistema.</p>
                <p><strong>Nota: </strong>Al importar el archivo actualizado debe tener el nombre de <strong class="theme_color">subprogramas.xlsx</strong> para poder ser leído correctamente.</p> 
                <br>
                <div class="input-group">
                  <label class="input-group-btn">
                    <span class="btn btn-sm btn-success">
                      <i class="glyphicon glyphicon-plus"></i>
                      Seleccionar archivo<input  type="file" style="display: none;" id="inputArchivo" name="file" required>
                    </span>
                  </label>
                  <input type="text" class="form-control" id="input-sm" readonly>
                </div>
              </div><!--/porlets-content-->
            </div><!--/block-web-->
          </div>
        </div>
        <div class="modal-footer">
          <div class="row col-md-5 col-md-offset-7">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="btnImportar" class="btn btn-sm btn-primary">Importar datos</button>
          </div>
        </div>
      </form>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  panel default red_border horizontal_border_1">
      <div class="modal-body">
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Eliminar subprograma</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>¿Esta segúro que desea eliminar el subprograma?</h4>
            </div><!--/porlets-content-->
          </div><!--/block-web-->
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=subprograma&a=Eliminar" enctype="multipart/form-data" method="post">
            <input  hidden name="idSubprograma" id="txtIdSubprograma">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->
<?php if(!isset($tabla)){ ?>
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
          <div class="col-sm-3">
            <div class="input-group">
             <input type="text" class="form-control" id="buscar" onkeyup="consultaSubprogramas();">
             <span class="input-group-btn">
               <button type="button" class="btn btn-default"><i class="fa fa-search"></i> Buscar </button>
             </span>
           </div>
         </div>
         <div class="col-sm-2" style="margin-top: -3px;">
          <div class="minimal-blue single-row">
            <div class="checkbox ">
              <a id="verTabla" href="?c=subprograma&a=VerTabla">
                <label>Ver tabla </label>
              </a>
              </div>
            </div>
          </div>
          <div class="col-md-4" style=" margin-top: 3px;">
            <div class="btn-group pull-right">
              <b>
                <?php if($_SESSION['tipoUsuario']==1){?>
                <div class="btn-group" style="margin-right: 10px;">
                  <a href="?c=subprograma&a=Crud" class="btn btn-sm btn-success tooltips" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Registrar nuevo subprograma"> <i class="fa fa-plus"></i> Registrar </a>
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
<?php } ?>
<?php if (!isset($tabla)){ ?>
<div id="ajax">
</div>
<?php } ?>
<p></p>
<script type="text/javascript">
 window.onload=function(){
  consultaSubprogramas();
}
function consultaSubprogramas(){
 var busqueda=$("input#buscar").val();
 $.post("index.php?c=subprograma&a=Consultas", {valorBusqueda: busqueda}, function(mensaje) {
  $("#ajax").html(mensaje);
});
}
eliminarSubprograma = function(idSubprograma){
  $('#txtIdSubprograma').val(idSubprograma);
};
infoSubprograma = function (idSubprograma){
  var idSubprograma=idSubprograma;
  $.post("index.php?c=subprograma&a=infoSubprograma", {idSubprograma: idSubprograma}, function(info) {
    $("#div-modal-content").html(info);
  });
}
 deshabilitar = function (){
  $('#btnImportar').attr("disabled", true);
}
</script>