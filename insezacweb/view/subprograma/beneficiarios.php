<div class="pull-left breadcrumb_admin clear_both">
 <div class="pull-left page_title theme_color">
   <h1>INICIO</h1>
   <h2 class="">SUBPROGRAMAS</h2>
 </div>
 <div class="pull-right">
   <ol class="breadcrumb">
     <li><a href="?c=Inicio">Inicio</a></li>
     <li class="active"><a href="?c=subprograma">Subprogramas</a></li>
     <li class="active">Beneficiarios</li>
   </ol>
 </div>
</div>

<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
            <div class="col-sm-6" style="margin-right: 100px;">
              <div class="actions"> </div>
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;<?php echo $subprograma; ?></h2>
            </div>
            <div class="col-sm-2" style="margin-top: -5px; margin-right: -100px;">
              <div class="minimal-blue single-row">
                <div class="checkbox ">

                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="btn-group pull-right">
                  <div class="minimal single-row">

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
                  <th>Curp</th>
                  <th>Nombre(s)</th>
                  <th>Primer apellido</th>
                  <th>Segundo apellido</th>
                  <?php if($_SESSION['tipoUsuario']!=2){?>
                  <td><center><b>Ver</b></center></td>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
               <?php foreach($this->model->ListarBeneficiarios($idSubprograma) as $r): ?>
                <tr class="gradeA">
                  <td><?php echo $r->curp; ?></td>
                  <td><?php echo $r->nombres;?></td>
                  <td><?php echo $r->primerApellido?></td>
                  <td><?php echo $r->segundoApellido; ?></td>
                  <td class="center">
                    <a class="btn btn-info btn-sm tooltips" role="button" href="?c=Beneficiario&a=Detalles&idBeneficiario=<?php echo $r->idBeneficiario; ?>" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles del beneficiario"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
             <tr>
              <th>Curp</th>
              <th>Nombre(s)</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <?php if($_SESSION['tipoUsuario']!=2){?>
                <td><center><b>Ver</b></center></td>
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
