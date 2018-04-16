
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
    <h1>Apoyos</h1>
    <h2 class="">Detalles de apoyo</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=apoyos">Apoyos</a></li>
      <li class="active">Detalles de apoyo</li>
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

      <div class="row">
        <div class="col-sm-12">
          <div class="todo_body ">
           <?php if($_SESSION['numRegErroneos']>0){ ?>
           <h5 class="red_bg"> <i class="fa fa-warning"></i>  Error en el registro (
            <small><?php echo $_SESSION['numRegErroneos']; ?></small>
          )</h5>

          <div class="row" style="margin-bottom: -40px;">

            <?php $idColl=0; foreach ($this->arrayError as $posicion) { $idColl++; ?>

            <div class="col-md-6">
             <div class="panel-group accordion accordion-semi" id="accordion3">

               <section class="panel default red_border vertical_border h1">
                <div class="panel-heading">



                  <div class="task-header red_task"><a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#<?php echo $idColl;?>"> <i class="fa fa-angle-right"></i> LINEA <?php echo $posicion['fila']; ?> DE ARCHIVO<span><i class="fa fa-times-circle"></i><?php echo $posicion['numeroErrores']; echo $posicion['numeroErrores']==1 ? " error": " errores"; ?></span> </a></div>

                </div>

                <div style="height: 0px;" id="<?php echo $idColl;?>" class="panel-collapse collapse">

                  <div class="row task_inner inner_padding" style="margin-left: 20px; margin-right: 15px;">
                    <div class="col-sm-9">
                     <?php foreach ($posicion as $propiedad=>$valor){

                       if($propiedad!="fila"){ if($propiedad!="numeroErrores"){ if($valor!='0'){ ?>
                       <p style="color:black"><i class="fa fa-times" style="color:red"></i> <?php echo $propiedad; ?></p>
                       <?php } } } } ?>
                     </div>
                     <div class="col-sm-3">
                      <?php foreach ($posicion as $propiedad=>$valor){ 
                        if($propiedad!="fila"){ if($propiedad!="numeroErrores"){ if($valor!='0'){ ?>
                        <p class="pull-right" style="color:black"> <?php echo $valor; ?> </p>
                        <?php } } } } ?>
                      </div>
                    </div>

                    <?php $porcentaje = $posicion['numeroErrores']/40*100; ?>

                    <div class="task-footer" style="margin-left: 30px;">
                      <label class="pull-left">
                        <div class="progress">
                          <div style="width:<?php echo $porcentaje; ?>%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-danger"></div>
                        </div>
                      </label>
                      <span class="label btn-danger"><?php echo $porcentaje; ?>% de error</span>
                      <div class="pull-right">
                        <ul class="footer-icons-group">
                          <li><a href="#"><i class="fa fa-pencil"></i></a></li>
                          <!--li><a href="#"><i class="fa fa-trash-o"></i></a></li-->
                        </ul>
                      </div>
                    </div>
                  </div><!--/panel-collapse collapse-->
                </section>
              </div><!--/panel-group accordion accordion-semi-->
            </div><!--/col-md6-->

            <?php } } ?>

          </div><!--/row-->


<!-- REGISTROS BIEN -->

      </div><!--col-12-->
    </div><!--/row-->

  </div><!--/block-web-->
</div><!--/row-col-md-12-->
</div><!--/container clear_both padding_fix-->
<div class="modal fade" id="modalBuscarCurp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content panel default blue_border horizontal_border_1">
      <form action="?c=apoyos&a=Crud" enctype="multipart/form-data" method="post" parsley-validate novalidate>
        <div class="modal-body">
          <div class="row">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header h3subtitulo">&nbsp;apoyo por CURP</h3>
              </div>
              <div class="porlets-content" style="margin-bottom: -50px;">
                <div class="form-group">
                  <div class="col-sm-10">
                    <input name="curp"  maxlength="18" id="curp" type="text" required parsley-regexp="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required parsley-rangelength="[18,18]"  onkeyup="mayus(this);" class="form-control" required placeholder="Ingrese la curp del apoyo" autofocus>
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
  infoRegistro = function (idApoyo){
    var idApoyo=idApoyo;
    $.post("index.php?c=apoyos&a=Inforegistro", {idApoyo: idApoyo}, function(info) {
      $("#div-modal-content").html(info);
    });
  }
</script>
