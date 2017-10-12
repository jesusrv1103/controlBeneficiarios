 <div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Localidadese</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=localidad">Localidadese</a></li>
      <li class="active"><?php echo $localidad->idLocalidad != null ? 'Actualizar localidad' : 'Alta localidad'; ?></li>
    </ol>
  </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header" style="margin-top: 15px; margin-bottom: 12px;">
          <div class="col-sm-8">
            <div class="actions"> </div>
            <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $localidad->idLocalidad != null ? 'Actualizar localidad' : 'Alta localidad'; ?></b></h2>
          </div>
          <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a></div>

        </div>
        <div class="porlets-content">
          <form action="?c=localidad&a=Guardar" method="post" class="form-horizontal row-border">

            <input hidden name="idLocalidad"  value="<?php echo $localidad->idLocalidad != null ? $localidad->idLocalidad : 0;  ?>"/>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nombre</label>
              <div class="col-sm-6">
                <input name="localidad" type="text" class="form-control" required value="<?php echo $localidad->idLocalidad != null ? $localidad->localidad : "";  ?>" placeholder="Ingrese el nombre de localidad"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Contraseña</label>
              <div class="col-sm-6">
                <input name="localidad" type="password" class="form-control" required placeholder="Ingrese la contraseña del localidad"/>
                <!--value="<?php //echo $localidad->idLocalidad != null ? $localidad->password : "";  ?>"-->
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Confirmar Contraseña</label>
              <div class="col-sm-6">
                <input name="localidad" type="password" class="form-control" required placeholder="Confirme la contraseña del localidad"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Tipo localidad</label>
              <div class="col-sm-6">
                <select class="form-control" >
                  <option value="1"> 
                    Administrador
                  </option>
                  <option value="2"> 
                    Secretario
                  </option>
                  <option value="3"> 
                    Regular
                  </option>
                </select>
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
