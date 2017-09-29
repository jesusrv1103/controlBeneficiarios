  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Inicio</h1>
      <h2 class="">Programas</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="?c=Inicio">Inicio</a></li>
        <li><a href="?c=Programa">Programas</a></li>
        <li class="active">Registrar programa</li>
      </ol>
    </div>
  </div>
  <div class="container clear_both padding_fix">
    <div class="row">
      <div class="col-md-12">
        <div class="block-web">
          <div class="header">
            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
            <h3 class="content-header">Registrar programa</h3>
          </div>
          <div class="porlets-content">
            <form action="" class="form-horizontal row-border">
              <div class="form-group">
                <label class="col-sm-3 control-label">Nombre</label>
                <div class="col-sm-6">
                  <input name="nombre" type="text" class="form-control" required placeholder="Ingrese el nombre del programa" />
                </div>
              </div><!--/form-group--> 
              <div class="form-group">
                <label class="col-sm-3 control-label">Descripción</label>
                <div class="col-sm-6">
                  <input name="descripcion" type="text" class="form-control" required placeholder="Ingrese la descripción del programa" />
                </div>
              </div><!--/form-group--> 
              <div class="form-group">
                <label class="col-sm-3 control-label">Fecha inicial</label>
                <div class="col-sm-6">
                  <div class="input-group"> <span class="input-group-addon "><i class="fa fa-calendar"></i></span>
                    <input name="fechaInicial" type="date" class="form-control" required placeholder="Seleccione a fecha inicial del programa" />
                  </div>
                </div>
              </div><!--/form-group--> 
              <div class="form-group">
                <label class="col-sm-3 control-label">Fecha final</label>
                <div class="col-sm-6">
                  <div class="input-group"> <span class="input-group-addon "><i class="fa fa-calendar"></i></span>
                    <input name="fechaFinal" type="date" class="form-control" required placeholder="Seleccione a fecha final del programa" />
                  </div>
                </div>
              </div><!--/form-group--> 
              <div class="form-group">
               <label class="col-sm-3 control-label">Techo presupuestal</label>
               <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-addon "><strong>$</strong></span>
                  <input name="techoPresupuestal" type="number" class="form-control" placeholder="Ingrese el techo presupuestal del programa" pattern="[0-9]" required>
                  <span class="input-group-addon "><strong>.00</strong></span>
                </div>
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













