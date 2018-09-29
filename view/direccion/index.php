<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Catálogos</h1>
    <h2 class="">Dependencia</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?cnicio">Inicio</a></li>
      <li class="active">Dependencia</a></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Dependencias</h2>
            </div>
            <div class="col-md-5">
              <div class="btn-group pull-right">
                <b>
                  <?php if($_SESSION['tipoUsuario']==1){?>
                  <div class="btn-group" style="margin-right: 10px;">
                    <a class="btn btn-sm btn-success tooltips" href="?c=direccion&a=Crud&nuevoRegistro=true" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Registrar nueva Direccion"> <i class="fa fa-plus"></i> Registrar </a>
                    <a class="btn btn-sm  tooltips btn-warning"  href="#modalImportar" style="margin-right: 10px;"  data-toggle="modal" data-target="#modalImportar" data-original-title="Importar Dependencias" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>
                    <a href="assets/files/direcciones.xlsx" download="direcciones.xlsx" class="btn btn-sm btn-primary tooltips" data-original-title="Descargar archivo direcciones.xlsx" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""> <i class="fa  fa-download"></i>&nbsp;Descargar</a>
                  </div>
                  <?php } ?>
                </b>
 
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
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Titular</th>
                  <?php if($_SESSION['tipoUsuario']==1){?>
                  <td><center><b>Editar</b></center></td>
                  <td><center><b>Borrar</b></center></td>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
               <?php foreach($this->model->Listar() as $r): ?>
                <tr class="gradeA">

                <td><?php echo $r->direccion; ?></td>
                <td><?php echo $r->descripcion; ?></td>
                <td><?php echo $r->titular; ?></td>
               <?php if($_SESSION['tipoUsuario']==1){?>
                    <td class="center">
                      <a href="index.php?c=direccion&a=Crud&idDireccion=<?php echo $r->idDireccion ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-edit"></i></a>
                    </td>
                    <td class="center">
                      <a onclick="eliminarDireccion(<?php echo $r->idDireccion;?>);" class="btn btn-danger btn-sm" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
                    </td>
                    <?php } ?>
                  </tr>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Titular</th>
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
      <form action="?c=direccion&a=Upload" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header theme_color">&nbsp;Importar catálogos de Dependecias</h3>
              </div>
              <div class="porlets-content" style="margin-bottom: -65px;">
                <p>Selecciona tu archivo excel con los catáogos de Dependencias para registrarlos en el sistema.</p>
                <p><strong>Nota: </strong>Al importar el archivo actualizado debe tener el nombre de <strong class="theme_color">Dependencias.xlsx</strong> para poder ser leído correctamente.</p> 
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
<div class="modal fade" div-modal-content id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 50%;">
    <div class="modal-content" id="div-modal-content">
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
              <h3 class="content-header theme_color">&nbsp;Eliminar Dependencia</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>¿Esta segúro que desea eliminar la  Dependencia?</h4>
            </div><!--/porlets-content-->
          </div><!--/block-web-->
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=direccion&a=Eliminar" enctype="multipart/form-data" method="post">
            <input  type="hidden" name="idDireccion" id="txtIdDireccion">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->
<script>
/* ----Funcion para buscar en una tabla------

  function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}*/

eliminarDireccion = function(idDireccion){
  $('#txtIdDireccion').val(idDireccion);
};

deshabilitar = function (){
  $('#btnImportar').attr("disabled", true);
}
</script>
