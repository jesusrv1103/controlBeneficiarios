<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Inicio</h1>
   <h2 class="">Usuarios</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=Inicio">Inicio</a></li>
     <li class="active">Usuarios</a></li>
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
             <h3 class="content-header">Administración de usuarios</h3>
           </div>
           <div class="col-sm-8">
             <div class="btn-group pull-right">
               <div class="btn-group"> <a class="btn btn-sm btn-success" href="?c=Usuario&a=Crud"> <i class="fa fa-plus"></i> Alta de usuario </a> </div>
             </div>
           </div>
         </div>
       </div>
       <div class="porlets-content">
         <div class="table-responsive">
           <table  class="display table table-bordered table-striped" id="dynamic-table">
             <thead>
               <tr>
                 <th>Usuario</th>
                 <th>Dirección</th>
                 <th>Tipo usuario</th>
                 <th>Editar</th>
                 <th>Borrar</th>

               </tr>
             </thead>
             <tbody>
              <?php foreach($this->model->Listar() as $r): ?>
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
                 <a class="btn btn-danger" role="button" href="?c=Usuario&a=Eliminar&idUsuario=<?php echo $r->idUsuario; ?>"><i class="fa fa-eraser"></i></a>
               </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
         <tfoot>
           <tr>
            <th>Usuario</th>
            <th>Dirección</th>
            <th>Tipo usuario</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </tfoot>
      </table>
    </div><!--/table-responsive-->
  </div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div>

