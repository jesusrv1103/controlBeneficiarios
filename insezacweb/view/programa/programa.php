



                            <!--form id="frm-programa" action="?c=Programa&a=Guardar" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="block-web">
                                          <div class="header">
                                            <h3 class="content-header">Registrar Programa</h3>
                                          </div>
                                          <div class="porlets-content" style="margin-bottom: -50px;">
                                            <form  >
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="block-web">
                                                     <input type="hidden" name="idPrograma" value="so $programa->idPrograma; ?>" />
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label"><h4>Nombre</h4></label>
                                                      <div class="col-sm-8">
                                                        <input name="programa" type="text" class="form-control" required placeholder="Ingrese el nombre del programa" value="<?php echo $programa->programa; ?>" />

                                                      </div>
                                                    </div><!-/form-group-->


                                                      <!--a href="?c=Programa" class="btn btn-warning" role="button">Cancelar</a>
                                                      <button type="submit" class="btn btn-success">Guardar</button>

                                                  </div>
                                                </div>
                                              </div>
                                            </form>
                                          </div><!-/porlets-content-->
                                        <!--/div><!-/block-web-->
                                      <!--/div>
                            </form-->
<!--ol class="breadcrumb">
                              <li><a href="?c=Programa">Programas</a></li>
                              <li class="active"><?php echo $programa->idPrograma != null ? $programa->programa : 'Nuevo Registro'; ?></li>
                            </ol-->

  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Inicio</h1>
      <h2 class="">Programas</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="?c=Inicio">Inicio</a></li>
        <li><a href="?c=Programa">Programas</a></li>
        <li class="active"><?php echo $programa->idPrograma != null ? 'Actualizar programa' : 'Registrar programa'; ?></li>
      </ol>
    </div>
  </div>
  <div class="container clear_both padding_fix">
    <div class="row">
      <div class="col-md-12">
        <div class="block-web">
          <div class="header">
            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
            <h3 class=""><?php echo $programa->idPrograma != null ? 'Actualizar programa' : 'Registrar programa'; ?></h3>
          </div>
          <div class="porlets-content">
            <form action="?c=Programa&a=Guardar" method="post" class="form-horizontal row-border">

              <input hidden name="idPrograma"  value="<?php echo $programa->idPrograma != null ? $programa->idPrograma : 0;  ?>"/>

              <input DISABLED name="idPrograma"  value="<?php echo $programa->idPrograma != null ? $programa->idPrograma : 0;  ?>"  style="visibility:hidden"/>

              <div class="form-group">
                <label class="col-sm-3 control-label">Nombre</label>
                <div class="col-sm-6">
                  <input name="programa" type="text" class="form-control" required value="<?php echo $programa->idPrograma != null ? $programa->programa :"";  ?>"  />
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
