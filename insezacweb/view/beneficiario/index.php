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
             <h3 class="content-header">Libro de beneficiarios</h3>
           </div>
           <div class="col-sm-8">
             <div class="btn-group pull-right">
               <div class="btn-group"> <a class="btn btn-sm btn-success" href="?c=Beneficiario&a=Alta"> <i class="fa fa-plus"></i> Registrar beneficiario </a> </div>&nbsp;
               <b>
                 <button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#myModal"><i class="fa fa-cloud-upload"></i></button>
               </b>
               <b>
                 <button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
               </b>
             </div>
           </div>
         </div>
       </div>
       <div class="porlets-content">
         <div class="table-responsive">
           <table  class="display table table-bordered table-striped" id="dynamic-table">
             <thead>
               <tr>
                 <th>CURP</th>
                 <th>Primer apellido</th>
                 <th>Segunda apellido</th>
                 <th>Nombre</th>
                 <th>Tipo Identifcacion</th>
                 <th>Edit</th>
                 <th>Borrar</th>
                 <th>Ver</th>
               </tr>
             </thead>
             <tbody>
              <?php foreach($this->model->ListarDatosPersonales() as $r): ?>
               <tr class="gradeA">
                  <th><?php echo $r->curp; ?></th>
                 <th><?php echo $r->primerApellido; ?></th>
                 <th><?php echo $r->segundoApellido; ?></th>
                 <th><?php echo $r->nombres; ?></th>
                 <th><?php echo $r->nombreId; ?></th>
                 <td class="center">
                  <a class="btn btn-primary"  role="button" href="?c=Programa&a=Crud&idPrograma=<?php echo $r->idPrograma; ?>"><i class="fa fa-edit"></i>Editar</a>
                </td>
                <td class="center">
                 <a class="btn btn-danger"  role="button" href="?c=Programa&a=Crud&idPrograma=<?php echo $r->idPrograma; ?>"><i class="fa fa-eraser"></i>Borrar</a>
               </td>
               <td class="center">
                <a class="btn btn-info"  role="button" href="?c=Programa&a=Crud&idPrograma=<?php echo $r->idPrograma; ?>"><i class="fa fa-eye"></i>Ver</a>
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
                 <th>Id idnetificacion</th>
                 <th>Edit</th>
                 <th>Borrar</th>
                 <th>Ver</th>
               </tr>
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
