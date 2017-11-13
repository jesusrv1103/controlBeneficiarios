  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Inicio</h1>
      <h2 class="">Municipios</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="?c=Inicio">Inicio</a></li>
        <li><a href="?c=municipio">Municipios</a></li>
        <li class="active"><?php echo $municipio->idMunicipio != null ? 'Actualizar municipio' : 'Registrar municipio'; ?></li>
      </ol>
    </div>
  </div>
  <div class="container clear_both padding_fix">
    <div class="row">
      <div class="col-md-12">
        <div class="block-web">
          <div class="header">
            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
            <h3 class=""><?php echo $municipio->idMunicipio != null ? 'Actualizar municipio' : 'Registrar municipio'; ?></h3>
          </div>
          <div class="porlets-content">
            <form action="?c=municipio&a=Guardar" method="post" class="form-horizontal row-border">

              <input hidden name="idMunicipio"  value="<?php echo $municipio->idMunicipio != null ? $municipio->idMunicipio : 0;  ?>"/>

              <input DISABLED name="idMunicipio"  value="<?php echo $municipio->idMunicipio != null ? $municipio->idMunicipio : 0;  ?>"  style="visibility:hidden"/>

              <div class="form-group">
                <label class="col-sm-3 control-label">Nombre</label>
                <div class="col-sm-6">
                  <input name="municipio" type="text" class="form-control" required value="<?php echo $municipio->idMunicipio != null ? $municipio->municipio :"";  ?>"  />
                </div>
              </div><!--/form-group-->
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=municipio" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix-->
