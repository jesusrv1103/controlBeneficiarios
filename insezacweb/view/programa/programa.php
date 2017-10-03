
                          
                            <ol class="breadcrumb">
                              <li><a href="?c=Programa">Programas</a></li>
                              <li class="active"><?php echo $programa->idPrograma != null ? $programa->programa : 'Nuevo Registro'; ?></li>
                            </ol>

                            <form id="frm-programa" action="?c=Programa&a=Guardar" method="post" enctype="multipart/form-data">
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
                                                     <input type="hidden" name="idPrograma" value="<?php echo $programa->idPrograma; ?>" />
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label"><h4>Nombre</h4></label>
                                                      <div class="col-sm-8">
                                                        <input name="programa" type="text" class="form-control" required placeholder="Ingrese el nombre del programa" value="<?php echo $programa->programa; ?>" />
                                                       
                                                      </div>
                                                    </div><!--/form-group-->

                                           
                                                      <a href="?c=Programa" class="btn btn-info" role="button">Editar </a>
                                                      <button type="submit" class="btn btn-success">Guardar</button>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </form>
                                          </div><!--/porlets-content-->
                                        </div><!--/block-web-->
                                      </div>
                            </form>