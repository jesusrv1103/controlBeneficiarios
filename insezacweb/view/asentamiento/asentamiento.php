 <div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Asentamientos</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=asentamiento">Asentamientos</a></li>
      <li class="active"><?php echo $asentamiento->idAsentamientos != null ? 'Actualizar asentamiento' : 'Alta asentamiento'; ?></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $asentamiento->idAsentamientos != null ? '&nbsp; Actualizar asentamiento' : '&nbsp; Registrar asentamiento'; ?></h2> 
            </div>
            <div class="col-md-4">
              <div class="btn-group pull-right">
                <div class="actions"> 
                </div>
              </div>
            </div>    
          </div>
        </div>
        <div class="porlets-content">
          <form action="?c=asentamiento&a=Guardar" method="post" class="form-horizontal row-border" parsley-validate novalidate>
            <input hidden name="idAsentamientos"  value="<?php echo $asentamiento->idAsentamientos != null ? $asentamiento->idAsentamientos : 0;  ?>"/>
            <div class="form-group">
              <label class="col-sm-3 control-label">Clave de asentamiento<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
               <input name="idAsentamientos" parsley-type="number" class="form-control" <?php if ($asentamiento->idAsentamientos!= null){ ?> disable <?php } ?> required value="<?php echo $asentamiento->idAsentamientos != null ? $asentamiento->idAsentamientos  : "";  ?>" placeholder="Ingrese la clave del asentamiento"  <?php if($asentamiento->idAsentamientos != null){ ?> disabled<?php } ?>/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Municipio<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <input name="asentamiento" type="text" class="form-control" required value="<?php echo $asentamiento->idAsentamientos != null ? $asentamiento->municipio : "";  ?>" placeholder="Ingrese el municipio del asentamiento"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Localidad<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <input name="asentamiento" type="text" class="form-control" required value="<?php echo $asentamiento->idAsentamientos != null ? $asentamiento->localidad : "";  ?>" placeholder="Ingrese la localidad del asentamiento"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Nombre asentamiento<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <input name="asentamiento" type="text" class="form-control" required value="<?php echo $asentamiento->idAsentamientos != null ? $asentamiento->nombreAsentamiento : "";  ?>" placeholder="Ingrese nombre del asentamiento"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Tipo asentamiento<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <input name="asentamiento" parsley-type="number" class="form-control" required value="<?php echo $asentamiento->idAsentamientos != null ? $asentamiento->tipoAsentamiento : "";  ?>" placeholder="Indique el tipo de asentamiento"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=asentamiento" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix-->