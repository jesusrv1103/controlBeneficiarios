<style type="text/css">
	.lbldetalle{
		color:#2196F3;
	}
	.h3titulo{
		margin-left: 30px;
		color:#2196F3;
	}
</style>
<div class="pull-left breadcrumb_admin clear_both">
	<div class="pull-left page_title theme_color">
		<h1>Beneficiario con RFC</h1>
		<h2 class="active"><?php echo $beneficiario->idBeneficiarioRFC != null ? "Actualizar beneficiario" : "Registrar beneficiario con RFC";  ?></h2>
	</div>
	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="?c=Inicio">Inicio</a></li>
			<li><a href="?c=Beneficiario">Beneficiario con RFC</a></li>
			<li class="active"><?php echo $beneficiario->idBeneficiarioRFC != null ? "Actualizar beneficiario" : "Registrar beneficiario con RFC"; ?></li>
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
							<h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $beneficiario->idBeneficiarioRFC != null ? '&nbsp;'.$beneficiario->nombres." ".$beneficiario->primerApellido." ".$beneficiario->segundoApellido : '&nbsp; Registrar beneficiario con RFC'; ?></h2>
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
						<form class="" id="frm-beneficiarioRFC" action="?c=Beneficiariorfc&a=Guardar" method="post" role="form" enctype="multipart/form-data" parsley-validate novalidate>
							<div id="smartwizard">
								<ul>
									<li><a href="#step-1">Datos  Fiscales</a></li>
									<li><a href="#step-2">Datos de Representante Legal</a></li>
									<li><a href="#step-3">Domicilio Fiscal</a></li>
								</ul>
								<div>
									<div id="step-1" class="">
										<div class="user-profile-content">
											<h3 class="h3titulo">Datos Fiscales</h3>
											<input type="hidden"  name="idBeneficiarioRFC"  value="<?php echo $beneficiario->idBeneficiarioRFC != null ? $beneficiario->idBeneficiarioRFC : 0;  ?>"/>

											<div class="form-group">
												<label class="col-sm-3 control-label">RFC<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="RFC" value="<?php echo $beneficiario->RFC;?>"  maxlength="13" id="RFC" type="text" required parsley-regexp="([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})"   required parsley-rangelength="[12,13]"  onkeyup="mayus(this);"  class="form-control" required placeholder="Ingrese el RFC del beneficiario">
												</div>
											</div><!--/form-group-->




											<div class="form-group">
												<label class="control-label col-md-3">Fecha  Alta en SAT</label>
												<div class="col-md-6 col-xs-11">
													<div class="input-append date dpYears" data-date="2015-05-15" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
														<input name="fechaAltaSat" type="text" class="form-control" size="30" value="2015-05-15" readonly="">
														<span class="input-group-btn add-on">
															<button type="button" class="btn btn-danger"><i class="fa fa-calendar"></i></button>
														</span> 
													</div>
													<span class="help-block">Selecionar Fecha</span> 
												</div>
											</div><!--/form-group--> 


											<div class="form-group">
												<label class="col-sm-3 control-label">Actividad<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="actividad" maxlength="20" parsley-rangelength="[1,20]" onkeypress=" return soloLetras(event);" onchange="mayus(this);"  value="<?php echo $beneficiario->actividad;?>" type="text" class="form-control" required placeholder="Ingrese la actividad de sus empresa" />
												</div>
											</div><!--/form-group-->


											<div class="form-group">
												<label class="col-sm-3 control-label">Cobertura<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="cobertura" maxlength="20" parsley-rangelength="[1,20]" onkeypress=" return soloLetras(event);" onchange="mayus(this);"  value="<?php echo $beneficiario->cobertura;?>" type="text" class="form-control" required placeholder="Ingrese la cobertura de su empresa" />
												</div>
											</div><!--/form-group-->


										</div>
									</div>
									<div id="step-2" class="">
										<div class="user-profile-content">
											<h3 class="h3titulo">Datos  de Representante Legal</h3>
											<div class="form-group">
												<label class="col-sm-3 control-label">CURP<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="curp"  maxlength="18" id="curp" type="text" required parsley-regexp="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required parsley-rangelength="[18,18]"  onkeypress="mayus(this);"  autofocus class="form-control" value="<?php echo $beneficiario->curp;?>"  placeholder="Ingrese la curp de el representate de la empresa"/>
												</div>
											</div><!--/form-group-->


											<div class="form-group">
												<label class="col-sm-3 control-label">Primer Apellido<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="primerApellido" maxlength="20" parsley-rangelength="[1,20]" onkeypress=" return soloLetras(event);" onchange="mayus(this);"  value="<?php echo $beneficiario->primerApellido;?>" type="text" class="form-control" required placeholder="Ingrese el primer apellido del beneficiario" />
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<label class="col-sm-3 control-label">Segundo Apellido</label>
												<div class="col-sm-6">
													<input name="segundoApellido" maxlength="20" onchange="mayus(this);"  onkeypress=" return soloLetras(event);" parsley-rangelength="[1,20]" value="<?php echo $beneficiario->segundoApellido;?>" type="text" class="form-control" placeholder="Ingrese el segundo apellido del beneficiario" />
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<label class="col-sm-3 control-label">Nombre(s)<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="nombres" maxlength="30" onkeypress=" return soloLetras(event);" onchange="mayus(this);" value="<?php echo $beneficiario->nombres;?>" type="text" class="form-control" required placeholder="Ingrese el/los nombre(s) del beneficiario"/>
												</div>
											</div><!--/form-group-->
										</div>
									</div>
									<div id="step-3" class="">

										<!-- <div class="tab-pane animated fadeInRight" id="vialidad">-->
										<div class="user-profile-content">
											<h3 class="h3titulo">Domicilio Fiscal</h3>
											<div class="form-group">
												<label class="col-sm-3 control-label">Tipo de vialidad<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<select name="idTipoVialidad" class="form-control" required>

														<?php if($beneficiario->idBeneficiarioRFC==null){ ?>   
														<option value=""> 
															Seleccione el tipo de vialidad del beneficiario
														</option>
														<?php } if($beneficiario->idBeneficiarioRFC!=null){ ?>   
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
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<label class="col-sm-3 control-label">Nombre de la vialidad<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="nombreVialidad" maxlength="60" onchange="mayus(this);" value="<?php echo $beneficiario->nombreVialidad;?>" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" required/>
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<label class="col-sm-3 control-label">Número exterior<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="noExterior" maxlength="8" onkeypress=" return soloNumeros(event);" value="<?php echo $beneficiario->numeroExterior;?>"  class="form-control" required placeholder="Ingrese el numero exterior de su vivienda" type="text"/>
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<label class="col-sm-3 control-label">Número interior</label>
												<div class="col-sm-6">
													<input name="noInterior" maxlength="8"  value="<?php echo $beneficiario->numeroInterior;?>" class="form-control"  placeholder="Ingrese el nombre de su vialidad" type="text" />
												</div>
											</div><!--/form-group-->


											<div class="form-group">
												<label class="col-sm-3 control-label">Asentamiento<strog class="theme_color"></strog></label>
												<div class="col-sm-6">
													<select name="idAsentamientos" class="form-control select2" >
														<?php if($beneficiario->idBeneficiarioRFC==null){ ?>   
														<option value=""> 
															Seleccione en caso de que el beneficiario pertenezca a un asentamiento
														</option>
														<?php } if($beneficiario->idBeneficiarioRFC!=null){ ?>   
														<option value="<?php echo $beneficiario->idAsentamientos?>"> 
															<?php echo $beneficiario->nombreAsentamiento; ?>
														</option>
														<?php } foreach($this->model2->Listar('asentamientos') as $r): 
														if($r->nombreAsentamiento!=$beneficiario->nombreAsentamiento){ ?>
														?>
														<option value="<?php echo $r->idAsentamientos; ?>"> 
															<?php echo $r->nombreAsentamiento; ?>
														</option>
														<?php } endforeach; ?>
													</select>
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<label class="col-sm-3 control-label">Localidad<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<select name="idLocalidad" class="form-control select2" required>
														<?php if($beneficiario->idBeneficiarioRFC==null){ ?>   
														<option value=""> 
															Seleccione la localidad a la que pertenece el beneficiario
														</option>
														<?php } if($beneficiario->idBeneficiarioRFC!=null){ ?>   
														<option value="<?php echo $beneficiario->idLocalidad?>"> 
															<?php echo $beneficiario->localidad; ?>
														</option>
														<?php } foreach($this->model2->Listar('localidades') as $r): 
														if($r->localidad!=$beneficiario->localidad){ ?>
														?>
														<option value="<?php echo $r->idLocalidad; ?>"> 
															<?php echo $r->localidad; ?>
														</option>
														<?php } endforeach; ?>
													</select>
												</div>
											</div><!--/form-group-->


											<div class="form-group">
												<label class="col-sm-3 control-label">Entre que vialidades<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">
													<input name="entreVialidades" onchange="mayus(this);" value="<?php echo $beneficiario->entreVialidades;?>" type="text" class="form-control" required placeholder="Ingrese el nombre de su vialidad" />
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<label class="col-sm-3 control-label">Descripción de la ubicación<strog class="theme_color">*</strog></label>
												<div class="col-sm-6">  
													<textarea style="height: 60px;" onchange="mayus(this);" name="descripcionUbicacion" placeholder="Ejemplo: Entre las calles perpendiculares Zaragoza y Abasolo" rows="8" cols="68" required><?php echo $beneficiario->descripcionUbicacion;?></textarea>
												</div>
											</div><!--/form-group-->

											<div class="form-group">
												<div class="col-sm-offset-7 col-sm-5">
													<button type="submit" class="btn btn-primary">Guardar</button>
													<a href="?c=Beneficiario" class="btn btn-default"> Cancelar</a>
												</div>
											</div><!--/form-group-->

										</div>
									</div>


								</div>
							</div>               
						</form>
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

	//miFecha = new Date(año,mes,dia) 
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


</script>  
<script type="text/javascript">

	function curp2date() {
		var miCurp =document.getElementById('curp').value;
		var m = miCurp.match( /^\w{4}(\w{2})(\w{2})(\w{2})/ 
			);

	//miFecha = new Date(año,mes,dia) 
	var anyo = parseInt(m[1],10)+1900;
	if( anyo < 1950 ) anyo += 100;
	var mes = parseInt(m[2], 10)-1;
	var dia = parseInt(m[3], 10);

	var fech = new Date( anyo, mes, dia );
	document.getElementById("fechaNacimiento").value = fech;
}
</script>