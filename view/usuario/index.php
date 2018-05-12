<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Administración</h1>
   <h2 class="">Usuarios</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=Inicio">Inicio</a></li>
     <li class="active">Usuarios</a></li>
   </ol>
 </div>
</div>
<div class="container clear_both padding_fix">
 <div class="row">
   <div class="col-md-12">
     <div class="block-web">
       <div class="header">
         <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
          <div class="col-sm-8">
            <div class="actions"> </div>
            <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Administración de usuarios</h2>
          </div>
          <div class="col-sm-4">
           <div class="btn-group pull-right" style="margin-right: 10px;">
             <div class="btn-group"> <a class="btn btn-sm btn-default" href="?c=Usuario&a=Crud"> <i class="fa fa-user"></i> Alta de usuario </a> </div>
           </div>
         </div>
       </div>
     </div>
     <?php if(isset($this->mensaje) && !isset($this->error)){?>
     <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success fade in">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-check"></i>&nbsp;<?php echo $this->mensaje; ?>
        </div>
      </div>
    </div> 
    <?php } if(isset($this->mensaje) && isset($this->error)){ ?>
    <div class="row">
      <div class="col-md-12">
        <div class="fa fa-warning">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-times"></i>&nbsp;<?php echo $this->mensaje; ?>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="porlets-content">
     <div class="table-responsive">
       <table  class="display table table-bordered table-striped" id="dynamic-table">
         <thead>
           <tr>
             <th>Usuario</th>
             <th>Dirección</th>
             <th>Tipo usuario</th>
             <td align="center"><b>Editar</b></td></center>
             <td align="center"><b>Borrar</b></td>
           </tr>
         </thead>
         <tbody>
      <?php foreach($this->model->Listar() as $r): ?>
            <tr style="color:#5cb85c; font-weight:bold">
              <td><?php echo $r->usuario; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php 
            switch ($r->tipoUsuario) {
              case 1:
              echo "Administrador";
              break;
              case 2:
              echo "Secretario";
              break;
              case 3:
              echo "Regular";
              break;
            }?></td>
            <td class="center">
              <a href="index.php?c=Usuario&a=Crud&idUsuario=<?php echo $r->idUsuario; ?>" class="btn btn-primary" role="button"><i class="fa fa-edit"></i></a>
            </td>
            <td class="center">
           </td>
         </tr>
       <?php endforeach; ?>
                <?php foreach($this->model->ListarSuS() as $r): ?>
           <tr class="gradeA">
            <td><?php echo $r->usuario; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php 
            switch ($r->tipoUsuario) {
              case 1:
              echo "Administrador";
              break;
              case 2:
              echo "Secretario";
              break;
              case 3:
              echo "Regular";
              break;
            }?></td>
            <td class="center">
              <a href="index.php?c=Usuario&a=Crud&idUsuario=<?php echo $r->idUsuario; ?>" class="btn btn-primary" role="button"><i class="fa fa-edit"></i></a>
            </td>
            <td class="center">
             <a onclick="eliminarUsuario(<?php echo $r->idUsuario;?>);" class="btn btn-danger" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
     <tfoot>
       <tr>
        <th>Usuario</th>
        <th>Dirección</th>
        <th>Tipo usuario</th>
        <td align="center"><b>Editar</b></td></center>
        <td align="center"><b>Borrar</b></td>
      </tr>
    </tfoot>
  </table>
</div><!--/table-responsive-->
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--container clear_both padding_fix-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default red_border horizontal_border_1">
      <div class="modal-body"> 
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header theme_color">&nbsp;Eliminar usuario</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>¿Esta segúro que desea eliminar al usuario?</h4>
            </div><!--/porlets-content--> 
          </div><!--/block-web--> 
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=Usuario&a=Eliminar" enctype="multipart/form-data" method="post">
          <input hidden type="text" name="idUsuario" id="txtIdUsuario">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content--> 
  </div><!--/modal-dialog--> 
</div><!--/modal-fade--> 
<script>
  eliminarUsuario = function(idUsuario){
    $('#txtIdUsuario').val(idUsuario);
    //$('#txtUsuario').val(usuario);  
  };
  
</script>
