<style type="text/css">
.lbldetalle{
	color:#2196F3;
}
.h3titulo{
	margin-left: 30px;
	color:#2196F3;
}
.user-profile-content{
	margin-top: 25px;
}
</style>



<div class="pull-left breadcrumb_admin clear_both">
	<div class="pull-left page_title theme_color">
		<h1>Beneficiarios</h1>
		<h2 class="active"><?php echo $beneficiario->idBeneficiario != null ? "Actualizar beneficiario" : "Registrar beneficiario";  ?></h2>
	</div>
	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="?c=Inicio">Inicio</a></li>
			<li><a href="?c=Beneficiario">Beneficiarios</a></li>
			<li class="active"><?php echo $beneficiario->idBeneficiario != null ? "Actualizar beneficiario" : "Registrar beneficiario"; ?></li>
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
							<h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $beneficiario->idBeneficiario != null ? '&nbsp;'.$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido : '&nbsp; Registrar beneficiario'; ?></h2>
						</div>
						<div class="col-md-4">
							<div class="btn-group pull-right">
								<div class="actions">
								</div>
							</div>
						</div>
					</div>
				</div><!--hola-->
				<!-- SmartWizard html -->
				<div class="porlets-content">
					<div  class="form-horizontal row-border" > <!--acomodo-->
						<form class="" id="myForm" action="?c=Beneficiario&a=Guardar" method="post" role="form" enctype="multipart/form-data" parsley-validate novalidate data-toggle="validator">
							<div id="smartwizard">
								<ul>
									<li><a href="#general">General</a></li>
									<li><a href="#vialidad">Vialidad</a></li>
									<li><a href="#social">Estado social</a></li>
									<li><a href="#vivienda">Vivienda</a></li>
								</ul>
								<div>
									<div id="general" class="">
										<div class="user-profile-content">
											<div id="form-step-0" role="form" data-toggle="validator">
												<h3 class="h3titulo">Datos generales</h3>
												<input type="hidden" name="idBeneficiario"  value="<?php echo $beneficiario->idBeneficiario != null ? $beneficiario->idBeneficiario : 0;  ?>"/>

												<input type="hidden" name="fechaNacimiento" id="fechaNacimiento"  value="<?php echo $beneficiario->fechaNacimiento != null ? $beneficiario->fechaNacimiento : 0;  ?>"/>

												<div class="form-group">
													<label class="col-sm-3 control-label">CURP<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input name="curp"  maxlength="18" id="curp" type="text" required parsley-regexp="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required parsley-rangelength="[18,18]"  onkeypress="mayus(this);" onblur="curp2date();" autofocus class="form-control" value="<?php echo $beneficiario->curp;?>" readonly placeholder="Ingrese la curp del beneficiario"/>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Primer Apellido<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input name="primerApellido" maxlength="20" parsley-rangelength="[1,20]" onkeypress=" return soloLetras(event);" onkeyup="mayus(this);" onchange="mayus(this);"  value="<?php echo $beneficiario->primerApellido;?>" type="text" class="form-control" required placeholder="Ingrese el primer apellido del beneficiario" />
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Segundo Apellido</label>
													<div class="col-sm-6">
														<input name="segundoApellido" maxlength="20" onkeyup="mayus(this);"  onchange="mayus(this);"  onkeypress=" return soloLetras(event);" parsley-rangelength="[1,20]" value="<?php echo $beneficiario->segundoApellido;?>" type="text" class="form-control" placeholder="Ingrese el segundo apellido del beneficiario" />
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Nombre(s)<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input name="nombres" maxlength="30" onkeypress=" return soloLetras(event);" onkeyup="mayus(this);"  onchange="mayus(this);" value="<?php echo $beneficiario->nombres;?>" type="text" class="form-control" required placeholder="Ingrese el/los nombre(s) del beneficiario"/>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Telefono</label>
													<div class="col-sm-6">
														<input type="text" placeholder="Ingrese el número de teléfono del beneficiario" name="telefono" value="<?php echo $beneficiario->telefono;?>" class="form-control mask" data-inputmask="'mask':'(999) 999-9999'">
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Correo<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input type="email" name="email" value="<?php echo $beneficiario->email;?>" required parsley-type="email" class="form-control mask" placeholder="Ingrese el correo electronico del beneficiario">
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Identificación<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idIdentificacion" class="form-control" required>
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione la identificación oficial del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idIdentificacion?>">
																<?php echo $beneficiario->nomTipoI; ?>
															</option>
															<?php } foreach($this->model2->Listar('identificacionOficial') as $r):
															if($r->identificacion!=$beneficiario->nomTipoI){ ?>
															<option value="<?php echo $r->idIdentificacion; ?>">
																<?php echo $r->identificacion; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Nivel de estudio<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idNivelEstudios" class="form-control" required>
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione el nivel de estudio del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idNivelEstudios?>">
																<?php echo $beneficiario->nivelEstudios; ?>
															</option>
															<?php } foreach($this->model2->Listar('nivelEstudio') as $r):
															if($r->nivelEstudios!=$beneficiario->nivelEstudios){ ?>
															<option value="<?php echo $r->idNivelEstudios; ?>">
																<?php echo $r->nivelEstudios; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Tipo de seguridad social<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idSeguridadSocial" class="form-control" required>
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione el tipo de seguridad social del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idSeguridadSocial?>">
																<?php echo $beneficiario->seguridadSocial; ?>
															</option>
															<?php } foreach($this->model2->Listar('seguridadSocial') as $r):
															if($r->seguridadSocial!=$beneficiario->seguridadSocial){ ?>
															?>
															<option value="<?php echo $r->idSeguridadSocial; ?>">
																<?php echo $r->seguridadSocial; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Discapacidad<strog class="theme_color"></strog></label>
													<div class="col-sm-6">
														<select name="idDiscapacidad" class="form-control">
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="1">
																Seleccione en caso de que el beneficiario padesca de una discapacidad
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idDiscapacidad?>">
																<?php echo $beneficiario->discapacidad; ?>
															</option>
															<?php } foreach($this->model2->Listar('discapacidad') as $r):
															if($r->discapacidad!=$beneficiario->discapacidad){ ?>
															?>
															<option value="<?php echo $r->idDiscapacidad; ?>">
																<?php echo $r->discapacidad; ?>
															</option>
															<?php } endforeach; ?>
														</select>
													</div>
												</div><!--/form-group-->
											</div>
										</div>
									</div>
									<div id="vialidad" class="">
										<div class="user-profile-content">
											<div id="form-step-1" role="form" data-toggle="validator">
												<h3 class="h3titulo">Vialidad</h3>
												<div class="form-group">
													<label class="col-sm-3 control-label">Tipo de vialidad<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idTipoVialidad" class="form-control" required>
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione el tipo de vialidad del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idTipoVialidad?>">
																<?php echo $beneficiario->tipoVialidad; ?>
															</option>
															<?php } foreach($this->model2->Listar('tipoVialidad') as $r):
															if($r->tipoVialidad!=$beneficiario->tipoVialidad){ ?>
															?>
															<option value="<?php echo $r->idTipoVialidad; ?>">
																<?php echo $r->tipoVialidad; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Nombre de la vialidad<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input name="nombreVialidad" maxlength="60" onkeyup="mayus(this);"  onchange="mayus(this);" value="<?php echo $beneficiario->nombreVialidad;?>" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" required/>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Número exterior<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input name="noExterior" maxlength="8" onkeypress=" return soloNumeros(event);" value="<?php echo $beneficiario->noExterior;?>"  class="form-control" required placeholder="Ingrese el numero exterior de su vivienda" type="text"/>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Número interior</label>
													<div class="col-sm-6">
														<input name="noInterior" maxlength="8"  value="<?php echo $beneficiario->noInterior;?>" class="form-control"  placeholder="Ingrese el nombre de su vialidad" type="text" />
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Municipio<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idMunicipio" class="form-control select2" required style="width: 100%;" id="selectMunicipios" onchange="listarLocalidades()">
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione el municipio al que pertenece el beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idMunicipio?>">
																<?php echo $beneficiario->nombreMunicipio; ?>
															</option>
															<?php } foreach($this->model2->Listar('municipio') as $r):
															if($r->nombreMunicipio!=$beneficiario->nombreMunicipio){ ?>
															?>
															<option value="<?php echo $r->idMunicipio; ?>">
																<?php echo $r->nombreMunicipio; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Localidad<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idLocalidad" class="form-control select2" required id="selectLocalidades" onchange="listarAsentamientos()" style="width: 100%">		<?php if($beneficiario->idBeneficiario==null){  ?>
															<option value="">
																Seleccione la localidad a la que pertenece el beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idLocalidad ?>">
																<?php echo  $beneficiario->localidad ?>
															</option>
															<?php } ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group" id="idAsentamientos">
													<label class="col-sm-3 control-label">Asentamiento</label>
													<div class="col-sm-6">
														<select name="idAsentamientos" class="form-control select2" id="selectAsentamientos" style="width: 100%">
															<?php if($beneficiario->idBeneficiario==null){  ?>
															<option value="">
																Seleccione el asentamiento a la que pertenece el beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idAsentamientos ?>">
																<?php echo  $beneficiario->nombreAsentamiento ?>
															</option>
															<?php } ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-3 control-label">Entre que vialidades<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input name="entreVialidades" onkeyup="mayus(this);"  onchange="mayus(this);" value="<?php echo $beneficiario->entreVialidades;?>" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" />
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Descripción de la ubicación<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<textarea class="form-control"  onkeyup="mayus(this);"  onchange="mayus(this);" name="descripcionUbicacion" placeholder="Ejemplo: Frente a la plaza del centro, a un costado de la farmacia guadalajara" required value="<?php echo $beneficiario->descripcionUbicacion;?>"></textarea>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

											</div><!--form-step-1-->
										</div><!--user-profile-content-->
									</div><!--vialidad-->

									<div id="social" class="">
										<div class="user-profile-content">
											<div id="form-step-2" role="form" data-toggle="validator">
												<h3 class="h3titulo">Estado Social</h3>
												<div class="form-group">
													<label class="col-sm-3 control-label">Estudio socioeconomico<strog class="theme_color"></strog></label>
													<div class="col-sm-1">
														<div class="radio">
															<input type="radio" name="estudioSocioeconomico"  value="1" <?php if($beneficiario->estudioSocioeconomico=="1"){ ?> checked <?php } ?>>Si
														</div>
														<div class="radio">
															<label>
																<input type="radio" name="estudioSocioeconomico" value="0" <?php if($beneficiario->estudioSocioeconomico=="0" || $beneficiario->idBeneficiario==null ){ ?> checked <?php } ?>>No
															</label>
														</div>
													</div>

													<label class="col-sm-1 control-label">Jefe de familia<strog class="theme_color"></strog></label>
													<div class="col-sm-1">
														<div class="radio">
															<input type="radio" name="jefeFamilia"   value="1" <?php if($beneficiario->jefeFamilia=="1"){ ?> checked <?php } ?>>Si
														</div>
														<div class="radio">
															<label>
																<input type="radio" name="jefeFamilia" value="0" <?php if($beneficiario->jefeFamilia=="0" || $beneficiario->idBeneficiario==null ){ ?> checked <?php } ?>>No
															</label>
														</div>
													</div>

													<label class="col-sm-1 control-label">Beneficiario Colectivo<strog class="theme_color"></strog></label>
													<div class="col-sm-1">
														<div class="radio">
															<input type="radio" name="beneficiarioColectivo"  value="1" <?php if($beneficiario->beneficiarioColectivo=="1"){ ?> checked <?php } ?>>Si
														</div>
														<div class="radio">
															<label>
																<input type="radio" name="beneficiarioColectivo" value="0" <?php if($beneficiario->beneficiarioColectivo=="0" || $beneficiario->beneficiarioColectivo==null ){ ?> checked <?php } ?>>No
															</label>
														</div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Estado civil<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idEstadoCivil" class="form-control" required>

															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione el estado civil del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idEstadoCivil?>">
																<?php echo $beneficiario->estadoCivil; ?>
															</option>
															<?php } foreach($this->model2->Listar('estadoCivil') as $r):
															if($r->estadoCivil!=$beneficiario->estadoCivil){ ?>
															?>
															<option value="<?php echo $r->idEstadoCivil; ?>">
																<?php echo $r->estadoCivil; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Ocupación<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idOcupacion" class="form-control" required>
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione la ocupación del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idOcupacion?>">
																<?php echo $beneficiario->ocupacion; ?>
															</option>
															<?php } foreach($this->model2->Listar('ocupacion') as $r):
															if($r->ocupacion!=$beneficiario->ocupacion){ ?>
															?>
															<option value="<?php echo $r->idOcupacion; ?>">
																<?php echo $r->ocupacion; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Ingreso mensual<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idIngresoMensual" class="form-control" required>
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione el ingreso mensual del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idIngresoMensual?>">
																<?php echo $beneficiario->ingresoMensual; ?>
															</option>
															<?php } foreach($this->model2->Listar('ingresoMensual') as $r):
															if($r->ingresoMensual!=$beneficiario->ingresoMensual){ ?>
															?>
															<option value="<?php echo $r->idIngresoMensual; ?>">
																<?php echo $r->ingresoMensual; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Integrantes familia<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input parsley-type="number"  maxlength="2" type="text" name="integrantesFamilia" onkeypress=" return soloNumeros(event);" value="<?php echo $beneficiario->integrantesFamilia;?>" parsley-range="[1, 20]" type="text" class="form-control" required placeholder="Ingrese el numero de integrantes de su familia" />
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Dependientes economicos<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input name="dependientesEconomicos"  maxlength="2" value="<?php echo $beneficiario->dependientesEconomicos;?>" onkeypress=" return soloNumeros(event);"  parsley-type="number" type="text"  class="form-control" required placeholder="Ingrese el numero de personas que dependen  de usted" parsley-range="[0, 20]" />
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Grupo vulnerable<strog class="theme_color"></strog></label>
													<div class="col-sm-6">
														<select name="idGrupoVulnerable" class="form-control" >
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="1">
																Seleccione en caso de que el beneficiario pertenezca a un grupo vulnerable
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idGrupoVulnerable?>">
																<?php echo $beneficiario->grupoVulnerable; ?>
															</option>
															<?php } foreach($this->model2->Listar('grupoVulnerable') as $r):
															if($r->grupoVulnerable!=$beneficiario->grupoVulnerable){ ?>
															?>
															<option value="<?php echo $r->idGrupoVulnerable; ?>">
																<?php echo $r->grupoVulnerable; ?>
															</option>
															<?php } endforeach; ?>
														</select>
													</div>
												</div><!--/form-group-->

											</div><!--form-step-2-->
										</div><!--user-profile-content-->
									</div><!--estadoSocial-->

									<div id="vivienda" class="">
										<div class="user-profile-content">
											<div id="form-step-2" role="form" data-toggle="validator">

												<h3 class="h3titulo">Vivienda</h3>

												<div class="form-group">
													<label class="col-sm-3 control-label">Tipo de vivienda<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<select name="idVivienda" class="form-control" required>
															<?php if($beneficiario->idBeneficiario==null){ ?>
															<option value="">
																Seleccione el tipo de vivienda del beneficiario
															</option>
															<?php } if($beneficiario->idBeneficiario!=null){ ?>
															<option value="<?php echo $beneficiario->idVivienda?>">
																<?php echo $beneficiario->vivienda; ?>
															</option>
															<?php } foreach($this->model2->Listar('vivienda') as $r):
															if($r->vivienda!=$beneficiario->vivienda){ ?>
															?>
															<option value="<?php echo $r->idVivienda; ?>">
																<?php echo $r->vivienda; ?>
															</option>
															<?php } endforeach; ?>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Número de habitantes<strog class="theme_color">*</strog></label>
													<div class="col-sm-6">
														<input type="text" name="noHabitantes" maxlength="2" parsley-type="number" parsley-range="[1, 30]" class="form-control" placeholder="Ingrese el N° de Habitantes que residen en la vivienda" value="<?php echo $beneficiario->noHabitantes;?>" onkeypress=" return soloNumeros(event);"  required/>
														<div class="help-block with-errors"></div>
													</div>
												</div><!--/form-group-->

												<div class="form-group">
													<label class="col-sm-3 control-label">Servicios de vivienda</label>
													<div class="col-sm-9">
														<div class="checkbox">
															<label>
																<input type="checkbox"   name="viviendaElectricidad" <?php if($beneficiario->viviendaElectricidad=="1"){ ?> checked <?php } ?>  >
																<span class="custom-checkbox"></span>Electricidad</label>
															</div>

															<div class="checkbox">
																<label>
																	<input type="checkbox" name="viviendaAgua" <?php if($beneficiario->viviendaAgua=="1"){ ?> checked <?php } ?>  >
																	<span class="custom-checkbox"></span>Agua</label>
																</div>
																<div class="checkbox">
																	<label>
																		<input type="checkbox" name="viviendaDrenaje" <?php if($beneficiario->viviendaDrenaje=="1"){ ?> checked <?php } ?>   >
																		<span class="custom-checkbox"></span>Drenaje</label>
																	</div>
																	<div class="checkbox">
																		<label>

																			<input type="checkbox" name="viviendaGas" <?php if($beneficiario->viviendaGas=="1"){ ?> checked <?php } ?>  value="<?php echo $beneficiario->viviendaGas;?>">
																			<span class="custom-checkbox"></span>Gas</label>
																		</div>
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" name="viviendaTelefono" <?php if($beneficiario->viviendaTelefono=="1"){ ?> checked <?php } ?> >
																				<span class="custom-checkbox"></span>Teléfono</label>
																			</div>
																			<div class="checkbox">
																				<label>
																					<input type="checkbox"    name="viviendaInternet" <?php if($beneficiario->viviendaInternet=="1"){ ?> checked <?php } ?> >
																					<span class="custom-checkbox"></span>Internet</label>
																				</div>
																			</div>
																		</div><!--/form-group-->

																		<div class="form-group">
																			<div class="col-sm-offset-7 col-sm-5">
																				<button onclick="nobackbutton()" type="submit" class="btn btn-primary">Guardar</button>
																				<a href="?c=Beneficiario" class="btn btn-default"> Cancelar</a>
																			</div>
																		</div><!--/form-group-->

																	</div><!--form-step-3-->
																</div><!--user-profile-content-->
															</div><!--vivienda-->

														</form>
													</div>
												</div><!--/block-web-->
											</div>
										</div><!--/porlets-content-->
									</div><!--/block-web-->
								</div><!--/col-md-12-->
							</div><!--/row-->
						</div><!--/container clear_both padding_fix-->

						<script type="text/javascript">

							function curp2date() {
								var miCurp =document.getElementById('curp').value;
								var m = miCurp.match( /^\w{4}(\w{2})(\w{2})(\w{2})/
									);


								var anyo = parseInt(m[1],10)+1900;
								if( anyo < 1950 ) anyo += 100;
								var mes = parseInt(m[2], 10)-1;
								var dia = parseInt(m[3], 10);

								var fech = new Date( anyo, mes, dia );
								document.getElementById("fechaNacimiento").value = fech;
							}
						</script>

						<!-- Include jQuery -->
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


						<script type="text/javascript">

							function curp2date() {
								var miCurp =document.getElementById('curp').value;
								var m = miCurp.match( /^\w{4}(\w{2})(\w{2})(\w{2})/
									);


								var anyo = parseInt(m[1],10)+1900;
								if( anyo < 1950 ) anyo += 100;
								var mes = parseInt(m[2], 10)-1;
								var dia = parseInt(m[3], 10);

								var fech = new Date( anyo, mes, dia );
								document.getElementById("fechaNacimiento").value = fech;
							}
						</script>
						<script type="text/javascript">
							window.onload=function(){
							}
							listarLocalidades = function (){
								var idMunicipio = $('#selectMunicipios').val();
								datos = {"idMunicipio":idMunicipio};
								$.ajax({
									url: "index.php?c=Beneficiario&a=ListarLocalidades",
									type: "POST",
									data: datos
								}).done(function(respuesta){
									if (respuesta[0].estado === "ok") {

										var selector = document.getElementById("selectLocalidades");
										selector.options[0] = new Option("Seleccione la localidad a la que pertenece el beneficiario","");
										var selector2 = document.getElementById("selectAsentamientos");
										selector2.options[0] = new Option("Seleccione el asentamiento al que petenece el beneficiario","");
										for (var i in respuesta) {
											var j=parseInt(i)+1;
											selector.options[j] = new Option(respuesta[i].localidad,respuesta[i].idLocalidad);
										}

									}
								});
							}
							listarAsentamientos = function (){
								var idLocalidad = $('#selectLocalidades').val();
								datos = {"idLocalidad":idLocalidad};
								$.ajax({
									url: "index.php?c=Beneficiario&a=ListarAsentamientos",
									type: "POST",
									data: datos
								}).done(function(respuesta){
									if (respuesta[0].estado === "ok") {
										console.log(JSON.stringify(respuesta));
										var selector = document.getElementById("selectAsentamientos");
										selector.options[0] = new Option("Seleccione el asentamiento al que petenece el beneficiario","");
										for (var i in respuesta) {
											var j=parseInt(i)+1;
											selector.options[j] = new Option(respuesta[i].nombreAsentamiento,respuesta[i].idAsentamientos);
										}

									}
								});
							}
						</script>
