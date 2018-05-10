<style type="text/css">
.lblinfo{
  color:#2196F3;
}
</style>
<script type="text/javascript">

</script>
<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>Administración</h1>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Libro de beneficiarios con CURP</h2>
            </div>
            <div class="col-md-5">
              <div class="btn-group pull-right">
                <b>
                  <div class="btn-group" style="margin-right: 10px;">
                    <div class="btn-group">
                     <a data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle" style="margin-right: 10px;" type="button"> <i class="fa fa-eye"></i>&nbsp;<?php echo $periodo;?><span class="caret"></span></a>
                     <ul role="menu" class="dropdown-menu pull-right">
                      <li><a href="?c=beneficiario&periodo=Beneficiarios 2017">Beneficiarios 2017</a></li>
                      <li><a href="?c=beneficiario&periodo=Beneficiarios 2018">Beneficiarios 2018</a></li>
                      <li><a href="?c=beneficiario&periodo=Beneficiarios 2019">Beneficiarios 2019</a></li>
                      <li><a href="?c=beneficiario">Todos los beneficiarios</a></li>
                    </ul>
                  </div>
                  <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
                  <div class="btn-group">
                    <a data-toggle="modal" data-target="#modalBuscarCurp" href="#modalBuscarCurp" class="btn btn-sm btn-success" style="margin-right: 10px;" type="button"> <i class="fa fa-plus"></i>&nbsp;Registrar</a>
                  </div>
                  <div class="btn-group">
                    <a data-toggle="modal" data-target="#modalImportar" href="#modalImportar" class="btn btn-sm tooltips btn-warning dropdown-toggle" style="margin-right: 10px;" data-original-title="Importar catálogo para registrar beneficiarios" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>
                  </div>
                  <?php } ?>
                </div>
              </b>
            </div>
          </div>
        </div>
      </div>
      <?php if(isset($this->mensaje)){ if(!isset($this->error)){?>
      <div class="row" style="margin-bottom: -20px; margin-top: 20px">
        <div class="col-md-12">
          <div class="alert alert-success fade in">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-check"></i>&nbsp;<?php echo $this->mensaje; ?>
          </div>
        </div>
      </div>
      <?php } if(isset($this->error)){ ?>
      <div class="row" style="margin-bottom: -20px; margin-top: 20px">
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
          <?php if ($periodo=='Ver todos'){ ?>
          <table class="display table table-bordered table-striped" id="dynamic-table">
           <thead>
             <tr>
               <td><center><b>Info</b></center></td>
               <th>CURP</th>
               <th>Nombre de beneficiario</th>
               <th>Municipio</th>
               <td><center><b>Ver</b></center></td>
               <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
               <td><center><b>Editar</b></center></td>
               <td><center><b>Borrar</b></center></td>
               <?php } ?>
             </tr>
           </thead>
           <tbody>
            <?php foreach($this->model->ListarTodos() as $r): ?>
              <tr class="grade">
                <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro(<?php echo $r->idBeneficiario; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
                <td><?php echo $r->curp ?> </td>
                <td><?php echo $r->nombres." ".$r->primerApellido." ".$r->segundoApellido ?> </td>
                <td><?php echo $r->nombreMunicipio ?> </td>
                <td class="center">
                  <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
                </td>
                <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
                <td class="center">
                  <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
                </td>
                <td class="center">
                  <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario(<?php echo $r->idRegistro; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
                </td>
                <?php } ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
           <tr>
            <td><center><b>Info</b></center></td>
            <th>CURP</th>
            <th>Nombre de beneficiario</th>
            <th>Municipio</th>
            <td><center><b>Ver</b></center></td>
            <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
            <td><center><b>Editar</b></center></td>
            <td><center><b>Borrar</b></center></td>
            <?php } ?>
          </tr>
        </tfoot>
      </table>
      <?php } if($periodo=='Beneficiarios 2017'){ ?>
      <table class="display table table-bordered table-striped" id="dynamic-table">
       <thead>
         <tr>
           <td><center><b>Info</b></center></td>
           <th>CURP</th>
           <th>Nombre de beneficiario</th>
           <th>Municipio</th>
           <td><center><b>Ver</b></center></td>
           <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
           <td><center><b>Editar</b></center></td>
           <td><center><b>Borrar</b></center></td>
           <?php } ?>
         </tr>
       </thead>
       <tbody>
        <?php foreach($this->model->Listar1('2017') as $r): ?>
          <tr class="grade">
            <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro(<?php echo $r->idBeneficiario; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
            <td><?php echo $r->curp ?> </td>
            <td><?php echo $r->nombres." ".$r->primerApellido." ".$r->segundoApellido ?> </td>
            <td><?php echo $r->nombreMunicipio ?> </td>
            <td class="center">
              <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
            </td>
            <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
            <td class="center">
              <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
            </td>
            <td class="center">
              <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario(<?php echo $r->idRegistro; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
            </td>
            <?php } ?>
          </tr>
        <?php endforeach; ?>
        <?php foreach($this->model->Listar2('2017') as $r): ?>
          <tr class="grade">
            <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro(<?php echo $r->idBeneficiario; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
            <td><?php echo $r->curp ?> </td>
            <td><?php echo $r->nombres." ".$r->primerApellido." ".$r->segundoApellido ?> </td>
            <td><?php echo $r->nombreMunicipio ?> </td>
            <td class="center">
              <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
            </td>
            <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
            <td class="center">
              <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
            </td>
            <td class="center">
              <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario(<?php echo $r->idRegistro; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
            </td>
            <?php } ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
       <tr>
        <td><center><b>Info</b></center></td>
        <th>CURP</th>
        <th>Nombre de beneficiario</th>
        <th>Municipio</th>
        <td><center><b>Ver</b></center></td>
        <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
        <td><center><b>Editar</b></center></td>
        <td><center><b>Borrar</b></center></td>
        <?php } ?>
      </tr>
    </tfoot>
  </table>
  <?php } if($periodo=='Beneficiarios 2018'){ ?>
  <table class="display table table-bordered table-striped" id="dynamic-table">
   <thead>
     <tr>
       <td><center><b>Info</b></center></td>
       <th>CURP</th>
       <th>Nombre de beneficiario</th>
       <th>Municipio</th>
       <td><center><b>Ver</b></center></td>
       <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
       <td><center><b>Editar</b></center></td>
       <td><center><b>Borrar</b></center></td>
       <?php } ?>
     </tr>
   </thead>
   <tbody>
    <?php foreach($this->model->Listar1('2018') as $r): ?>
      <tr class="grade">
        <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro(<?php echo $r->idBeneficiario; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
        <td><?php echo $r->curp ?> </td>
        <td><?php echo $r->nombres." ".$r->primerApellido." ".$r->segundoApellido ?> </td>
        <td><?php echo $r->nombreMunicipio ?> </td>
        <td class="center">
          <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
        </td>
        <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
        <td class="center">
          <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
        </td>
        <td class="center">
          <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario(<?php echo $r->idRegistro; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
        </td>
        <?php } ?>
      </tr>
    <?php endforeach; ?>
    <?php foreach($this->model->Listar2('2018') as $r): ?>
      <tr class="grade">
        <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro(<?php echo $r->idBeneficiario; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
        <td><?php echo $r->curp ?> </td>
        <td><?php echo $r->nombres." ".$r->primerApellido." ".$r->segundoApellido ?> </td>
        <td><?php echo $r->nombreMunicipio ?> </td>
        <td class="center">
          <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
        </td>
        <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
        <td class="center">
          <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
        </td>
        <td class="center">
          <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario(<?php echo $r->idRegistro; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
        </td>
        <?php } ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
   <tr>
    <td><center><b>Info</b></center></td>
    <th>CURP</th>
    <th>Nombre de beneficiario</th>
    <th>Municipio</th>
    <td><center><b>Ver</b></center></td>
    <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
    <td><center><b>Editar</b></center></td>
    <td><center><b>Borrar</b></center></td>
    <?php } ?>
  </tr>
</tfoot>
</table>
<?php } if($periodo=='Beneficiarios 2019'){ ?>
<table class="display table table-bordered table-striped" id="dynamic-table">
 <thead>
   <tr>
     <td><center><b>Info</b></center></td>
     <th>CURP</th>
     <th>Nombre de beneficiario</th>
     <th>Municipio</th>
     <td><center><b>Ver</b></center></td>
     <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
     <td><center><b>Editar</b></center></td>
     <td><center><b>Borrar</b></center></td>
     <?php } ?>
   </tr>
 </thead>
 <tbody>
  <?php foreach($this->model->Listar1('2019') as $r): ?>
    <tr class="grade">
      <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro(<?php echo $r->idBeneficiario; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
      <td><?php echo $r->curp ?> </td>
      <td><?php echo $r->nombres." ".$r->primerApellido." ".$r->segundoApellido ?> </td>
      <td><?php echo $r->nombreMunicipio ?> </td>
      <td class="center">
        <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
      </td>
      <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
      <td class="center">
        <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
      </td>
      <td class="center">
        <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario(<?php echo $r->idRegistro; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
      </td>
      <?php } ?>
    </tr>
  <?php endforeach; ?>
  <?php foreach($this->model->Listar2('2019') as $r): ?>
    <tr class="grade">
      <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro(<?php echo $r->idBeneficiario; ?>)" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
      <td><?php echo $r->curp ?> </td>
      <td><?php echo $r->nombres." ".$r->primerApellido." ".$r->segundoApellido ?> </td>
      <td><?php echo $r->nombreMunicipio ?> </td>
      <td class="center">
        <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
      </td>
      <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
      <td class="center">
        <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario=<?php echo $r->idBeneficiario ?>"><i class="fa fa-edit"></i></a>
      </td>
      <td class="center">
        <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario(<?php echo $r->idRegistro; ?>)" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
      </td>
      <?php } ?>
    </tr>
  <?php endforeach; ?>
</tbody>
<tfoot>
 <tr>
  <td><center><b>Info</b></center></td>
  <th>CURP</th>
  <th>Nombre de beneficiario</th>
  <th>Municipio</th>
  <td><center><b>Ver</b></center></td>
  <?php if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){?>
  <td><center><b>Editar</b></center></td>
  <td><center><b>Borrar</b></center></td>
  <?php } ?>
</tr>
</tfoot>
</table>
<?php } ?>
</div><!--/table-responsive-->
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div>
<div class="modal fade" id="modalImportar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="?c=beneficiario&a=Upload" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header theme_color">&nbsp;Importar beneficiarios con CURP</h3>
              </div>
              <div class="porlets-content" style="margin-bottom: -65px;">
                <p>Selecciona tu archivo excel con los datos de los beneficiarios para registrarlos.</p>
                <p><strong>Nota: </strong>El archivo debe conener la extención <strong class="theme_color">.xlsx</strong> para poder ser leído correctamente.</p>
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
<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 60%;">
    <div class="modal-content" id="div-modal-content">
      <!--*********En esta sección se incluye el modal de informacion de registro y apoyo**********-->
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
          <form action="?c=beneficiario&a=Eliminar" enctype="multipart/form-data" method="post">
            <input hidden type="text" name="idRegistro" id="txtIdRegistro">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->

<div class="modal fade" id="modalBuscarCurp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default blue_border horizontal_border_1">
     <form action="?c=beneficiario&a=Crud" id="form-curp" enctype="multipart/form-data" method="post" parsley-validate novalidate-->
      <div class="modal-body">
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header h3subtitulo">&nbsp;Beneficiario por CURP</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <div class="form-group">
                <div class="col-sm-10">
                  <input name="curp"  maxlength="18" id="curp" type="text" required parsley-regexp="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required parsley-rangelength="[18,18]"  onkeyup="mayus(this);" class="form-control" required placeholder="Ingrese la curp del beneficiario">
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

<div class="modal fade" id="mActivarBeneficiario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default horizontal_border_1">
      <div class="modal-body">
        <div class="row">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header h3subtitulo">&nbsp;Activar Beneficiario</h3>
            </div>
            <div class="porlets-content" style="margin-bottom: -50px;">
              <h4>El beneficiario que esta ingresando ya ha sido dado de alta en el sistema anteriormente y ha sido eliminado. ¿Desea volverlo a activar?</h4>
            </div><!--/porlets-content-->
          </div><!--/block-web-->
        </div>
      </div>
      <div class="modal-footer" style="margin-top: -10px;">
        <div class="row col-md-5 col-md-offset-7" style="margin-top: -5px;">
          <form action="?c=beneficiario&a=ActivarBeneficiario" enctype="multipart/form-data" method="post">
            <input type="hidden" name="curp" id="txtCurpActivar">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Activar</button>
          </form>
        </div>
      </div>
    </div><!--/modal-content-->
  </div><!--/modal-dialog-->
</div><!--/modal-fade-->

<script src="assets/js/jquery-2.1.0.js"></script>
<script type="text/javascript">



  $(document).ready(function(){

    $('#form-curp').submit(function() {
      VerificarBeneficiario();
      return false;
    });
  });

  var curp="";
  VerificarBeneficiario = function(){
    curp=$("#curp").val();
    $.post("index.php?c=beneficiario&a=VerificarBeneficiario", {curp: curp}, function(respuesta) {
      if(respuesta=="Inactivo"){
        $('#txtCurpActivar').val(curp);
        $('#mActivarBeneficiario').modal('toggle');
      }else {
        location.href="?c=beneficiario&a=Crud&curp="+curp;
      }
    });
  }

  consultas=function(){
    periodo='2018';
    $.post("index.php?c=beneficiario&a=Consultas", {periodo: periodo}, function(mensaje) {
      console.log(mensaje);
      $("#div_tabla").html(mensaje);
    });
  }
  eliminarBeneficiario = function(idRegistro){
    $('#txtIdRegistro').val(idRegistro);
  };

  eliminarBeneficiarioRFC = function(idRegistro){
    $('#txtIdRegistroRFC').val(idRegistro);
  };
  infoRegistro = function (idBeneficiario){
   $.post("index.php?c=beneficiario&a=Inforegistro", {idBeneficiario: idBeneficiario}, function(info) {
    $("#div-modal-content").html(info);
  });
 }

 infoRegistroRFC = function (idBeneficiarioRFC){
   $.post("index.php?c=beneficiariorfc&a=Inforegistro", {idBeneficiarioRFC: idBeneficiarioRFC}, function(info) {
    $("#div-modal-content").html(info);
  });
 }
 buscarBeneficiarioCurp = function (){

 }
 deshabilitar = function (){
  $('#btnImportar').attr("disabled", true);
}
deshabilitar2 = function (){
  $('#btnImportar2').attr("disabled", true);
} 
</script>
