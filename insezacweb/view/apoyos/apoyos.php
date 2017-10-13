<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Apoyos</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=Programa">Apoyos</a></li>
      <li>Nota: Usa la etique de abajo</li>
      <!--li class="active"><?php echo $apoyo->idApoyo != null ? 'Actualizar apoyo' : 'Registrar apoyo'; ?></li-->
    </ol>
  </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
          <h3>Nota: Usa la etiqueda de abajo</h3>
          <!--h3 class=""><?php echo $apoyo->idApoyo != null ? 'Actualizar apoyo' : 'Registrar apoyo'; ?></h3-->
        </div>
        <div class="porlets-content">
          <form action="" class="form-horizontal row-border">
            <div class="form-group">
              <label class="col-sm-3 control-label">Origen</label>
              <div class="col-sm-6">
                <select class="form-control" >
                  <option value="CA"> Origen </option>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Programa</label>
              <div class="col-sm-6">
                <select class="form-control" >
                  <option value="CA"> Programa </option>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Subprograma</label>
              <div class="col-sm-6">
                <select class="form-control" >
                  <option value="CA"> Subprogrma </option>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Tipo de apoyo</label>
              <div class="col-sm-6">
                <select class="form-control" >
                  <option value="CA"> Tipo apoyo </option>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Caracteristicas</label>
              <div class="col-sm-6">
                <select class="form-control" >
                  <option value="CA"> Caracteristicas </option>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Importe de apoyo</label>
              <div class="col-sm-6">
                <input type="text" name="" value="" class="form-control">
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Numeros de apoyo</label>
              <div class="col-sm-6">
                <input type="number" name="" value="" class="form-control">
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Fecha del utimo apoyo</label>
              <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-addon "><i class="fa fa-calendar"></i></span>
                  <input name="fechaFinal" type="date" class="form-control" required placeholder="Seleccione a fecha final del programa" />
                </div>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Periocidad</label>
              <div class="col-sm-6">
                <select class="form-control" >
                  <option value="CA"> Caracteristicas </option>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=Programa" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix-->
