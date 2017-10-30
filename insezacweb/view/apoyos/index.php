<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Apoyos</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li class="active">Apoyos</a></li>
    </ol>
  </div>
</div>

<?php
if(isset($mensaje))
{
  ?>
  <div class="container clear_both padding_fix">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <center><strong><i class="fa fa-check"></i>&nbsp;<?php echo $mensaje ?></strong> </center>
        </div>

      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="row">
            <div class="col-sm-4">
              <div class="actions"> </div>
              <h3 class="content-header">Catalogo de Apoyos</h3>
            </div>
            <div class="col-sm-8">
              <div class="btn-group pull-right">
                <!--div class="btn-group"> <a class="btn btn-sm btn-success" href="?c=Apoyos&a=Registro"> <i class="fa fa-plus"></i> Registrara apoyo </a> </div>&nbsp;-->
                <div class="btn-group"> <a class="btn btn-sm btn-success" href="apoyos.php"> <i class="fa fa-plus"></i> Registrara apoyo </a> </div>


              </div>
            </div>
          </div>
        </div>
        <div class="porlets-content">
          <div class="table-responsive">
            <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
                <tr>
                  <th>Origen</th>
                  <th>Programa</th>
                  <th>Subprograma</th>
                  <th>Tipo de Apoyo</th>
                  <th>Caracteristicas</th>
                  <th>Importe del apoyo</th>
                  <th>Numero de apoyos</th>
                  <th>Ultimo apoyo</th>
                  <th>Periocidad</th>
                  <?php if($_SESSION['tipoUsuario']==1){?>
                  <th>Editar</th>
                  <th>Eliminar</th> 
                  <?php } ?>

                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">
                  <td>Origen</td>
                  <td>Programa</td>
                  <td>Subprograma</td>
                  <td>Tipo de Apoyo</td>
                  <td>Caracteristicas</td>
                  <td>Importe del apoyo</td>
                  <td>Numero de apoyos</td>
                  <td>Ultimo apoyo</td>
                  <td>Periocidad</td>
                  <?php if($_SESSION['tipoUsuario']==1){?><td>Editar</td><?php } ?>
                  <?php if($_SESSION['tipoUsuario']==1){?><td>Eliminar</td><?php } ?>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Origen</th>
                  <th>Programa</th>
                  <th>Subprograma</th>
                  <th>Tipo de Apoyo</th>
                  <th>Caracteristicas</th>
                  <th>Importe del apoyo</th>
                  <th>Numero de apoyos</th>
                  <th>Ultimo apoyo</th>
                   <?php if($_SESSION['tipoUsuario']==1){?>
                  <th>Editar</th>
                  <th>Eliminar</th> 
                  <?php } ?>
              </tfoot>
            </table>
          </div><!--/table-responsive-->
        </div><!--/porlets-content-->


      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header">Importar beneficiario</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <p>Importa tu archivo excel con los datos del beneficiario para agregarlo a la base de datos</p>
              <br>
              <form name="importar" action="?c=Beneficiario&a=Upload" method="post" enctype="multipart/form-data">
                <!--div class="fallback"-->
                <input name="file" type="file"/>
                <!--/div-->

              </div><!--/porlets-content-->
            </div><!--/block-web-->
          </div>
        </div>
        <div class="modal-footer">
          <div class="row col-md-5 col-md-offset-7">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
