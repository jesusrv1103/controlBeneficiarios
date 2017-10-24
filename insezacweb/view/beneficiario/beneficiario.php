<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Beneficiarios</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=Beneficiario">Beneficiarios</a></li>
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
          <div  class="form-horizontal row-border" >
              <div class="block-web full">
                <ul class="nav nav-tabs nav-justified nav_bg">
                  <li class="active"><a href="#generales" data-toggle="tab"><i class="fa fa-user"></i> Datos Generales</a></li>
                  <li class=""><a href="#vialidad" data-toggle="tab"><i class="fa fa-road"></i> Vialidad</a></li>
                  <li class=""><a href="#estadoSocial" data-toggle="tab"><i class="fa fa-money"></i> Estado Social</a></li>
                  <li class=""><a href="#vivienda" data-toggle="tab"><i class="fa fa-home"></i> Vivienda</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane animated fadeInRight active" id="generales">
                    <div class="user-profile-content">
                      <h5><strong>Datos Generales</strong></h5>
                      <form id="frm-beneficiario" action="?c=Beneficiario&a=Guardar" method="post" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="idBeneficiario"  value="<?php echo $beneficiario->idBeneficiario != null ? $beneficiario->idBeneficiario : 0;  ?>"/>
                           
                       
                        <div class="form-group">
                          <label class="col-sm-3 control-label">CURP</label>
                          <div class="col-sm-6">
                        
                            <input name="curp" type="text" class="form-control" value="<?php echo $beneficiario->curp;?>" required placeholder="Ingrese su curp" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Primer Apellido</label>
                          <div class="col-sm-6">
                            <input name="primerApellido" value="<?php echo $beneficiario->primerApellido;?>" type="text" class="form-control" required placeholder="Ingrese su Primer Apellido" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">*Segundo Apillido</label>
                          <div class="col-sm-6">
                            <input name="segundoApellido" value="<?php echo $beneficiario->segundoApellido;?>" type="text" class="form-control" required placeholder="Ingrese su Segundo Apellido" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nombres</label>
                          <div class="col-sm-6">
                            <input name="nombres" value="<?php echo $beneficiario->nombres;?>" type="text" class="form-control" required placeholder="Ingrese sus Nombres" />
                          </div>
                        </div><!--/form-group-->
                        
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Identificacion</label>
                          <div class="col-sm-6">
                            <select name="idIdentificacion" class="form-control" >
                              <?php foreach($this->model2->Listar('identificacionOficial') as $r): ?>
                              <option value="<?php echo $r->idIdentificacion; ?>"> 
                              <?php echo $r->identificacion; ?>
                              </option>
                            <?php endforeach; ?>

                            </select>
                          </div>
                        </div><!--/form-group-->
                        
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nivel de estudio</label>
                          <div class="col-sm-6">
                            <select name="idNivelEstudios" class="form-control" >
                              <?php foreach($this->model2->Listar('nivelEstudio') as $r): ?>
                                <option value="<?php echo $r->idNivelEstudios; ?>"> 
                                <?php echo $r->nivelEstudios; ?>
                              </option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Tipo de seguridad social</label>
                          <div class="col-sm-6">
                            <select name="idSeguridadSocial" class="form-control" >
                              <?php foreach($this->model2->Listar('seguridadSocial') as $r): ?>
                              <option value="<?php echo $r->idSeguridadSocial; ?>"> 
                              <?php echo $r->seguridadSocial; ?>
                              </option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Discapasidad</label>
                          <div class="col-sm-6">
                            <select name="idDiscapacidad" class="form-control" >
                            <?php foreach($this->model2->Listar('discapacidad') as $r): ?>
                              <option value=" <?php echo $r->idDiscapacidad; ?>"> 
                              <?php echo $r->discapacidad; ?>
                              </option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                         <label class="col-sm-3 control-label">Beneficiario Colectivo</label>
                          <div class="col-sm-9">
                            <div class="radio">
                             <label>
                              <input type="radio" name="beneficiarioColectivo"  value="Si"  <?php if($beneficiario->beneficiarioColectivo=="Si"){ ?> checked <?php } ?>>
                               Si
                             </label>
                            </div>
                            <div class="radio">
                                <label>
                                  <input type="radio" name="beneficiarioColectivo"  <?php if($beneficiario->beneficiarioColectivo=="Si"){ ?> checked <?php } ?>  value="No">
                                   No 
                                </label>
                            </div>
                          </div>
                        </div><!--/form-group--> 
                       

                     


                      <!--+++++++++++++++++++++++++++++++++++++++++Vialid***************************-->
                    </div>
                  </div>
                  <div class="tab-pane animated fadeInRight" id="vialidad">
                    <div class="user-profile-content">
                        <h5><strong>Vialidad</strong></h5>
                    
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Vialidad</label>
                          <div class="col-sm-6">
                            <select name="idTipoVialidad" class="form-control" >
                              <?php foreach($this->model2->Listar('tipoVialidad') as $r): ?>
                              <option value="<?php echo $r->idTipoVialidad; ?>"> 
                                <?php echo $r->tipoVialidad; ?>
                              </option>
                              <?php endforeach; ?>
                            </select>
                          
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nombre de la vialidad</label>
                          <div class="col-sm-6">
                            <input name="nombreVialidad" value="<?php echo $beneficiario->nombreVialidad;?>" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Numero Exterior</label>
                          <div class="col-sm-6">
                            <input name="noExterior" value="<?php echo $beneficiario->noExterior;?>"  class="form-control" required placeholder="Ingrese el numero exterior de su vivienda" type="text" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">*Numero Interior</label>
                          <div class="col-sm-6">
                            <input name="noInterior" value="<?php echo $beneficiario->noInterior;?>" class="form-control" required placeholder="Ingrese el nombre de su vialidad" type="text" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Asentamineto</label>
                          <div class="col-sm-6">
                            <select name="idAsentamientos" class="form-control" >
                              <?php foreach($this->model2->Listar('asentamientos') as $r): ?>
                              <option value="<?php echo $r->idAsentamientos; ?>"> 
                                <?php echo $r->nombreAsentamiento; ?>
                              </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Localidad</label>
                          <div class="col-sm-6">
                            <select name="idLocalidad" class="form-control" >
                            <?php foreach($this->model2->Listar('localidades') as $r): ?>
                              <option value="<?php echo $r->idLocalidad; ?>"> 
                                 <?php echo $r->localidad; ?>
                              </option>
                            <?php endforeach; ?>
                            </select>
                         
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Entre que vialidades</label>
                          <div class="col-sm-6">
                            <input name="entreVialidades" value="<?php echo $beneficiario->entreVialidades;?>" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Descripcion de la ubicacion</label>
                          <div class="col-sm-6">  
                            <textarea name="descripcionUbicacion"  rows="8" cols="68"><?php echo $beneficiario->descripcionUbicacion;?></textarea>
                          </div>
                        </div><!--/form-group-->

                       
                    </div>
                  </div>


                    <div class="tab-pane animated fadeInRight" id="estadoSocial">
                    <div class="user-profile-content">
                        <h5><strong>Estado Social</strong></h5>
                     
                         <div class="form-group">
                         <label class="col-sm-3 control-label">Estudio Socioeconomico</label>
                          <div class="col-sm-9">
                            <div class="radio">
                             <label>
                              <input type="radio" name="estudioSocioeconomico"  value="Si"  <?php if($beneficiario->estudioSocioeconomico=="Si"){ ?> checked <?php } ?> >
                               Si
                             </label>
                            </div>
                            <div class="radio">
                                <label>
                                  <input type="radio" name="estudioSocioeconomico"  value="No"  <?php if($beneficiario->estudioSocioeconomico=="Si"){ ?> checked <?php } ?>>
                                   No 
                                </label>
                            </div>
                          </div>
                        </div><!--/form-group--> 
                        <div class="form-group">
                         <label class="col-sm-3 control-label">Jefe de Familia</label>
                          <div class="col-sm-9">
                            <div class="radio">
                             <label>
                              <input type="radio" name="jefeFamilia"  value="Si" <?php if($beneficiario->jefeFamilia=="Si"){ ?> checked <?php } ?>>
                               Si
                             </label>
                            </div>
                            <div class="radio">
                                <label>
                                  <input type="radio" name="jefeFamilia"  value="No"  <?php if($beneficiario->jefeFamilia=="No"){ ?> checked <?php } ?>>
                                   No 
                                </label>
                            </div>
                          </div>
                        </div><!--/form-group--> 
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Estado Civil</label>
                          <div class="col-sm-6">
                            <select name="idEstadoCivil" class="form-control" >
                             <?php foreach($this->model2->Listar('estadoCivil') as $r): ?>
                              <option value="<?php echo $r->idEstadoCivil; ?>"> 
                                <?php echo $r->estadoCivil; ?>
                              </option>
                            <?php endforeach; ?>
                            </select>  
                          </div>
                        </div><!--/form-group-->
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Ocupacion</label>
                          <div class="col-sm-6">
                            <select name="idOcupacion" class="form-control" >
                              <?php foreach($this->model2->Listar('ocupacion') as $r): ?>
                              <option value="<?php echo $r->idOcupacion; ?>"> 
                                <?php echo $r->ocupacion; ?>
                              </option>
                             <?php endforeach; ?>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Ingreso Mensual</label>
                          <div class="col-sm-6">
                            <select name="idIngresoMensual" class="form-control" >
                             <?php foreach($this->model2->Listar('ingresoMensual') as $r): ?>
                              <option value="<?php echo $r->idIngresoMensual; ?>"> 
                                <?php echo $r->ingresoMensual; ?>
                              </option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Integrantes Familia</label>
                          <div class="col-sm-6">
                            <input name="integrantesFamilia" value="<?php echo $beneficiario->integrantesFamilia;?>" type="text" class="form-control" required placeholder="Ingrese el numero de integrantes de su familia" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Dependientes Economicos</label>
                          <div class="col-sm-6">
                            <input name="dependientesEconomicos" value="<?php echo $beneficiario->dependientesEconomicos;?>" type="text" class="form-control" required placeholder="Ingrese el numero de personas que dependen  de usted" />
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Grupo Vulnerable</label>
                          <div class="col-sm-6">
                            <select name="idGrupoVulnerable" class="form-control" >

                              <?php foreach($this->model2->Listar('grupoVulnerable') as $r): ?>
                              <option value="<?php echo $r->idGrupoVulnerable; ?>"> 
                                <?php echo $r->grupoVulnerable; ?>
                              </option>
                             <?php endforeach; ?>
                            </select>
                         
                          </div>
                        </div><!--/form-group-->
                
                        
                      

                    </div>
                  </div>
                   <div class="tab-pane animated fadeInRight" id="vivienda">
                    <div class="user-profile-content">
                        <h5><strong>Vivienda</strong></h5>
                     
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Tipo Vivienda</label>
                          <div class="col-sm-6">
                            <select name="idVivienda" class="form-control" >
                              <?php foreach($this->model2->Listar('vivienda') as $r): ?>
                              <option value="<?php echo $r->idVivienda; ?>"> 
                                <?php echo $r->vivienda; ?>
                              </option>
                              <?php endforeach; ?>
                            </select>
                    
                          </div>
                        </div><!--/form-group-->
                        <div class="form-group">
                          <label class="col-sm-3 control-label">No Habitantes </label>
                          <div class="col-sm-6">
                            <input name="noHabitantes"   type="text" class="form-control" required placeholder="Ingrese el N° de Habitantes que residen en la vivienda" value="<?php echo $beneficiario->noHabitantes;?>" />
                          </div>
                        </div><!--/form-group-->

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Servicios vivienda</label>
                          <div class="col-sm-9">

                            <div class="checkbox">
                              <label>
                                <input type="checkbox"   name="viviendaElectricidad" <?php if($beneficiario->viviendaElectricidad=="Si"){ ?> checked <?php } ?>  >
                                <span class="custom-checkbox"></span> Vivienda Electricidad</label>
                            </div>
                            
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="viviendaAgua" <?php if($beneficiario->viviendaAgua=="Si"){ ?> checked <?php } ?>  >
                                <span class="custom-checkbox"></span> Vivienda Agua </label>
                            </div>
                             <div class="checkbox">
                              <label>
                                <input type="checkbox" name="viviendaDrenaje" <?php if($beneficiario->viviendaDrenaje=="Si"){ ?> checked <?php } ?>   >
                                <span class="custom-checkbox"></span> Vivienda Drenaje</label>
                            </div>
                             <div class="checkbox">
                              <label>

                                <input type="checkbox" name="viviendaGas" <?php if($beneficiario->viviendaGas=="Si"){ ?> checked <?php } ?>  value="<?php echo $beneficiario->viviendaGas;?>">
                                <span class="custom-checkbox"></span> Vivienda Gas</label>
                            </div>
                             <div class="checkbox">
                              <label>
                                <input type="checkbox" name="viviendaTelefono" <?php if($beneficiario->viviendaTelefono=="Si"){ ?> checked <?php } ?> >
                                <span class="custom-checkbox"></span> Vivienda Telefono</label>
                            </div>
                             <div class="checkbox">
                              <label>
                                <input type="checkbox"    name="viviendaInternet" <?php if($beneficiario->viviendaInternet=="Si"){ ?> checked <?php } ?> >
                                <span class="custom-checkbox"></span> Vivienda Internet</label>
                            </div>
                          </div>
                        </div><!--/form-group-->
                        
                        <div class="form-group">
                          <div class="col-sm-offset-7 col-sm-5">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="?c=Beneficiario" class="btn btn-default"> Cancelar</a>
                          </div>
                        </div><!--/form-group-->

                      </form>
                    </div>
                  </div>
                </div>
                <!--/tab-content-->
              </div>
              <!--/block-web-->


          </div>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->

  </div><!--/row-->
</div><!--/container clear_both padding_fix-->

