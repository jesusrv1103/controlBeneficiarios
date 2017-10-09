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
              <div class="block-web full">
                <ul class="nav nav-tabs nav-justified nav_bg">
                  <li class="active"><a href="#generales" data-toggle="tab"><i class="fa fa-user"></i> Datos Generales</a></li>
                  <li class=""><a href="#vialidad" data-toggle="tab"><i class="fa fa-road"></i> Vialidad</a></li>
                  <li class=""><a href="#user-activities" data-toggle="tab"><i class="fa fa-money"></i> Estado Social</a></li>
                  <li class=""><a href="#mymessage" data-toggle="tab"><i class="fa fa-home"></i> Vivienda</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane animated fadeInRight active" id="generales">
                    <div class="user-profile-content">
                      <h5><strong>Datos Generales</strong></h5>
                      <form role="form">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">CURP</label>
                          <div class="col-sm-6">
                            <input name="curp" type="text" class="form-control" required placeholder="Ingrese su curp" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Primer Apillido</label>
                          <div class="col-sm-6">
                            <input name="primerApellido" type="text" class="form-control" required placeholder="Ingrese su Primer Apellido" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">*Segundo Apillido</label>
                          <div class="col-sm-6">
                            <input name="segundoApellido" type="text" class="form-control" required placeholder="Ingrese su Segundo Apellido" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nombres</label>
                          <div class="col-sm-6">
                            <input name="nombres" type="text" class="form-control" required placeholder="Ingrese sus Nombres" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Indentificacion</label>
                          <div class="col-sm-6">
                            <select class="form-control" >
                              <?php foreach($this->model->ListarIdentificaciones() as $r): ?>
                              <option value="r"> 
                              <?php echo $r->identificacion; ?>
                              </option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nivel de estudio</label>
                          <div class="col-sm-6">
                            <select class="form-control" >
                              <option value="CA"> Caracteristicas </option>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Tipo de seguridad social</label>
                          <div class="col-sm-6">
                            <select class="form-control" >
                              <option value="CA"> Caracteristicas </option>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Discapasidad</label>
                          <div class="col-sm-6">
                            <select class="form-control" >
                            <?php foreach($this->model->ListarDiscapacidad() as $r): ?>

                              <option value="r"> 
                              <?php echo $r->discapacidad; ?>
                              </option>
                            <?php endforeach; ?>
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
                    </div>
                  </div>
                  <div class="tab-pane animated fadeInRight" id="vialidad">
                    <div class="user-profile-content">
                        <h5><strong>Vialidad</strong></h5>
                      <form role="form">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Vialidad</label>
                          <div class="col-sm-6">
                            <select class="form-control" >
                              <option value="idTipoVialidad"> Caracteristicas </option>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nombre de la vialidad</label>
                          <div class="col-sm-6">
                            <input name="nombreVialidad" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Numero Exterior</label>
                          <div class="col-sm-6">
                            <input name="noEterior" type="text" class="form-control" required placeholder="Ingrese el numero exterior de su vivienda" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">*Numero Interior</label>
                          <div class="col-sm-6">
                            <input name="noInterior" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Asentamineto</label>
                          <div class="col-sm-6">
                            <select class="form-control" >
                              <option value="claveAsentamiento"> Caracteristicas </option>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Localidad</label>
                          <div class="col-sm-6">
                            <select class="form-control" >
                              <option value="claveLocalidad"> Caracteristicas </option>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Entre que vialidades</label>
                          <div class="col-sm-6">
                            <input name="entreVialidades" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Descripcion de la ubicacion</label>
                          <div class="col-sm-6">
                            <textarea name="descripcionUbicación" rows="8" cols="68"></textarea>
                          </div>
                        </div><!--/form-group-->

                        <div class="form-group">
                          <div class="col-sm-offset-7 col-sm-5">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="?c=Programa" class="btn btn-default"> Cancelar</a>
                          </div>
                        </div><!--/form-group-->

                      </form>
                    </div>
                  </div>
                  <div class="tab-pane" id="user-activities">
                    <ul class="media-list">
                      <li class="media"> <a href="#">
                        <p><strong>John Doe</strong> Uploaded a photo <strong>"DSC000254.jpg"</strong> <br>
                          <i>2 minutes ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Imran Tahir</strong> Created an photo album <strong>"Indonesia Tourism"</strong> <br>
                          <i>8 minutes ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Colin Munro</strong> Posted an article <strong>"London never ending Asia"</strong> <br>
                          <i>an hour ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Corey Anderson</strong> Added 3 products <br>
                          <i>3 hours ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Morne Morkel</strong> Send you a message <strong>"Lorem ipsum dolor..."</strong> <br>
                          <i>12 hours ago</i></p>
                        </a> </li>
                      <li class="media"> <a href="#">
                        <p><strong>Imran Tahir</strong> Updated his avatar <br>
                          <i>Yesterday</i></p>
                        </a> </li>
                    </ul>
                  </div>
                  <div class="tab-pane" id="mymessage">
                    <ul class="media-list">
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Tim Southee</a> <small>Yesterday at 04:00 AM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Kane Williamson</a> <small>January 17, 2014 05:35 PM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Lonwabo Tsotsobe</a> <small>January 17, 2014 05:35 PM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">Dale Steyn</a> <small>January 17, 2014 05:35 PM</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                      <li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--/tab-content-->
              </div>
              <!--/block-web-->


          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->

  </div><!--/row-->
</div><!--/container clear_both padding_fix-->
