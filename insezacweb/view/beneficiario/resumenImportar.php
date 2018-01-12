
<style type="text/css">
.lbldetalle{
  color:#424242;
  font-weight: bold;
}
.h3subtitulo{
  color:#2196F3;
  font-weight: bold;
}
</style>

<script type="text/javascript">
window.history.forward();
</script>

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Beneficiarios</h1>
    <h2 class="">Detalles de beneficiario</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=beneficiario">Beneficiarios</a></li>
      <li class="active">Detalles de beneficiario</li>
    </ol>
  </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row col-md-12">
    <div class="block-web">
      <div class="header">
        <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
          <div class="col-sm-12">
            <div class="actions"> </div>
            <h2 class="content-header theme_color" style="margin-top: -10px;">Resumen de importación</h2>
          </div>
        </div>
      </div>

      <?php if(isset($mensaje)){ if(!isset($warning)){?>
        <div class="row" style="margin-bottom: -20px; margin-top: 20px">
          <div class="col-md-12">
            <div class="alert alert-success fade in">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <i class="fa fa-check"></i>&nbsp;<?php echo $mensaje; ?>
            </div>
          </div>
        </div>
      <?php } if(isset($warning)){ ?>
        <div class="row" style="margin-bottom: -20px; margin-top: 20px">
          <div class="col-md-12">
            <div class="alert alert-warning fade in">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <i class="fa fa-warning"></i>&nbsp;<?php echo $mensaje; ?>
            </div>
          </div>
        </div>
      <?php } }?>
      <div class="row">
        <div class="col-sm-12">


          <div class="todo_body ">
            <!--h5 class="red_bg"> <i class="fa fa-warning"></i>  Error en el registro (
              <small>1</small>
              )</h5>
              <ul class="group_sortable1">
                <li>
                  <p><strong>AAAA830602MZSRVL02</strong>
                    - ALMA LETICIA ARANDA DE AVILA . [
                    <a class="font-xs" href="javascript:void(0);">More Details</a>]
                  </p>
                </li>
              </ul-->
              <h5 class="orange_bg"> <i class="fa fa-warning"></i> Registros duplicados (
                <small>3</small>
                )</h5>
                <ul class="group_sortable1">
                  <li>
                      <span class=""><i class="fa fa-warning" style="color:#FF9800"></i></span>
                    <p><strong>AAAA830602MZSRVL02</strong>
                      - ALMA LETICIA ARANDA DE AVILA .
                    </p>
                  </li>
                </ul>
                <ul class="group_sortable1">
                  <li>
                      <span class=""><i class="fa fa-warning" style="color:#FF9800"></i></span>
                    <p><strong>AAAA830602MZSRVL02</strong>
                      - ALMA LETICIA ARANDA DE AVILA .
                    </p>
                  </li>
                </ul>
                <ul class="group_sortable1">
                  <li>
                      <span class=""><i class="fa fa-warning" style="color:#FF9800"></i></span>
                    <p><strong>AAAA830602MZSRVL02</strong>
                      - ALMA LETICIA ARANDA DE AVILA .
                    </p>
                  </li>
                </ul>
                <h5 class="green_bg"> <i class="fa fa-warning"></i> Registros completos (
                  <small>2</small>
                  )</h5>
                  <ul class="group_sortable1">
                    <li>
                      <span class=""><i class="fa fa-check" style="color:#00C853"></i></span>
                      <p><strong>AAAA830602MZSRVL02</strong>
                        - ALMA LETICIA ARANDA DE AVILA .[
                        <a class="font-xs" href="javascript:void(0);">Ver detalles</a>]
                      </p>
                    </li>
                  </ul>
                  <ul class="group_sortable1">
                    <li>
                      <span class=""><i class="fa fa-check" style="color:#00C853"></i></span>
                      <p><strong>AAAA830602MZSRVL02</strong>
                        - ALMA LETICIA ARANDA DE AVILA .[
                        <a class="font-xs" href="javascript:void(0);">Ver detalles</a>]
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div><!--/block-web-->
        </div><!--/row-col-md-12-->
      </div><!--/container clear_both padding_fix-->
      <div class="modal fade" id="modalBuscarCurp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content panel default blue_border horizontal_border_1">
            <form action="?c=Beneficiario&a=Crud" enctype="multipart/form-data" method="post" parsley-validate novalidate>
              <div class="modal-body">
                <div class="row">
                  <div class="block-web">
                    <div class="header">
                      <h3 class="content-header h3subtitulo">&nbsp;Beneficiario por CURP</h3>
                    </div>
                    <div class="porlets-content" style="margin-bottom: -50px;">
                      <div class="form-group">
                        <div class="col-sm-10">
                          <input name="curp"  maxlength="18" id="curp" type="text" required parsley-regexp="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required parsley-rangelength="[18,18]"  onkeyup="mayus(this);" class="form-control" required placeholder="Ingrese la curp del beneficiario" autofocus>
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
      <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;">
          <div class="modal-content" id="div-modal-content">
            <!--************************En esta sección se incluye el modal de informacion de registro y apoyo***************************-->
          </div><!--/modal-content-->
        </div><!--/modal-dialog-->
      </div><!--/modal-fade-->
      <script>
      infoRegistro = function (idBeneficiario){
        var idBeneficiario=idBeneficiario;
        $.post("index.php?c=beneficiario&a=Inforegistro", {idBeneficiario: idBeneficiario}, function(info) {
          $("#div-modal-content").html(info);
        });
      }
      </script>
