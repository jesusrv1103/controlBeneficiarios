 <div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Localidades</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=localidad">Localidades</a></li>
      <li class="active"><?php echo $localidad->idLocalidad != null ? 'Actualizar localidad' : 'Alta localidad'; ?></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $localidad->idLocalidad != null ? 'Actualizar localidad' : 'Registrar localidad'; ?></h2>
            </div>
            <div class="col-md-4">
              <div class="btn-group pull-right">
                <div class="actions"> 
                  <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a>
                </div>
              </div>
            </div>    
          </div>
        </div>
        <div class="porlets-content">
          <form action="?c=Localidad&a=Guardar" method="post" class="form-horizontal row-border">
            <div class="form-group">
              <label class="col-sm-3 control-label">Clave de localidad</label>
              <div class="col-sm-6">
               <input name="idLocalidad" type="text" class="form-control" <?php if ($localidad->idLocalidad!= null){ ?> disable <?php } ?>  required value="<?php echo $localidad->idLocalidad != null ? $localidad->idLocalidad  : "";  ?>" placeholder="Ingrese la clave de la localidad"/>
              </div>
            </div><!--/form-group-->
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Municipio</label>
              <div class="col-sm-6">
                <input name="localidad" type="text" class="form-control" required value="<?php echo $localidad->idLocalidad != null ? $localidad->municipio : "";  ?>" placeholder="Ingrese el nombre del municipio"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Localidad</label>
              <div class="col-sm-6">
                <input name="localidad" type="text" class="form-control" required value="<?php echo $localidad->idLocalidad != null ? $localidad->localidad : "";  ?>" placeholder="Ingrese el nombre de localidad"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Ámbito</label>
              <div class="col-sm-6">
                <input name="localidad" type="text" class="form-control" required value="<?php echo $localidad->idLocalidad != null ? $localidad->ambito : "";  ?>" placeholder="Ingrese ámbito de localidad"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=localidad" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix-->