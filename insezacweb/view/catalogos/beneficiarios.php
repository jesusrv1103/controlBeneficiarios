<div class="pull-left breadcrumb_admin clear_both">
	<div class="pull-left page_title theme_color">
		<h1>Catálogo</h1>
		<h2 class="">Beneficiarios</h2>
	</div>
	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="?c=Inicio">Inicio</a></li>
			<li class="active">Catálogo de beneficiarios</a></li>
		</ol>
	</div>
</div>
<div class="container clear_both padding_fix">
	<div class="row">
		<div class="col-md-12">
			<div class="block-web">
				<div class="header">
					<div class="row">					
						<div class="block-web">
							<div class="col-md-8">
								<h2 class="content-header theme_color" style="margin-top: -10px;">Identificadores para el registro de beneficiarios</b></h2>
							</div>							
							<div class="col-md-4">
								<div class="btn-group pull-right">
									<b>
										<div class="btn-group"> 
											<a class="btn btn-sm btn-success tooltips" href="#myModal" style="margin-right: 10px;"  data-toggle="modal" data-target="#myModal" data-original-title="Importar catálogo" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="left" title="">  <i class="fa  fa-upload"></i></a>
											<a class="btn btn-sm btn-primary tooltips" href="?c=Catalogos&a=Descargar" data-original-title="Descargar catálogo" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""> <i class="fa  fa-download"></i></a> 
										</div>
									</b>
								</div>
							</div>							
						</div>
					</div>
				</div><br>
				<div class="row">
					<?php if(isset($mensaje)){ 
						if($mensaje=="success"){
							?>
							<div class="col-md-12">
								<div class="alert alert-success fade in">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<i class="fa fa-check"></i>&nbsp;Se han importado los catálogos correctamente
								</div>
							</div> 
							<?php }else{ ?>
							<div class="col-md-12">
								<div class="alert alert-danger">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<i class="fa fa-check"></i>&nbsp;Ha ocurrido un error al importar los catálogos
								</div>
							</div>
							<?php } } ?>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Identificación oficial</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-10 col-md-offset-1">
												<table class="table table-striped">
													<tbody>
														<?php foreach($this->model->Listar('identificacionOficial') as $r): ?>
															<tr>
																<td><?php echo $r->idIdentificacion; ?></td>
																<td><?php echo $r->identificacion; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Ingreso mensual</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">


													<tbody>
														<?php foreach($this->model->Listar('ingresoMensual') as $r): ?>
															<tr>
																<td><?php echo $r->idIngresoMensual; ?></td>
																<td><?php echo $r->ingresoMensual; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
													
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Tipo de seguridad social</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">
													<tbody>
														<?php foreach($this->model->Listar('seguridadSocial') as $r): ?>
															<tr>
																<td><?php echo $r->idSeguridadSocial; ?></td>
																<td><?php echo $r->seguridadSocial; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Grupo vulnerable</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">									
													<tbody>
														<?php foreach($this->model->Listar('grupoVulnerable') as $r): ?>
															<tr>
																<td><?php echo $r->idGrupoVulnerable; ?></td>
																<td><?php echo $r->grupoVulnerable; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>													
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Nivel de estudios</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">									
													<tbody>
														<?php foreach($this->model->Listar('nivelEstudio') as $r): ?>
															<tr>
																<td><?php echo $r->idNivelEstudios; ?></td>
																<td><?php echo $r->nivelEstudios; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>													
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Discapacidad</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">
													<tbody>
														<?php foreach($this->model->Listar('discapacidad') as $r): ?>
															<tr>
																<td><?php echo $r->idDiscapacidad; ?></td>
																<td><?php echo $r->discapacidad; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
													
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Vivienda</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">
													<tbody>
														<tbody>
															<?php foreach($this->model->Listar('vivienda') as $r): ?>
																<tr>
																	<td><?php echo $r->idVivienda; ?></td>
																	<td><?php echo $r->vivienda; ?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</tbody>
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Estado civil</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">
													<tbody>
														<?php foreach($this->model->Listar('estadoCivil') as $r): ?>
															<tr>
																<td><?php echo $r->idEstadoCivil; ?></td>
																<td><?php echo $r->estadoCivil; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Tipo Vialidad</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-10 col-md-offset-1">
												<table class="table table-striped">
													<tbody>
														<?php foreach($this->model->Listar('tipoVialidad') as $r): ?>
															<tr>
																<td><?php echo $r->idTipoVialidad; ?></td>
																<td><?php echo $r->tipoVialidad; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
							<div class="col-md-6">
								<div class="block-web">
									<div class="header">
										<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
										<h3 class="content-header">Ocupación</h3>
									</div>
									<div class="porlets-content">
										<div class="panel-body">
											<div class="col-md-12">
												<table class="table table-striped">
													<tbody>
														<?php foreach($this->model->Listar('ocupacion') as $r): ?>
															<tr>
																<td><?php echo $r->idOcupacion; ?></td>
																<td><?php echo $r->ocupacion; ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div><!--/porlets-content-->
								</div><!--/block-web-->
							</div><!--/col-md-6-->
						</div><!--/row-->
					</div><!--/container clear_both padding_fix-->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body"> 
									<div class="row">
										<div class="block-web">
											<div class="header">
												<h3 class="content-header">Importar catálogo</h3>
											</div>
											<div class="porlets-content" style="margin-bottom: -50px;">
												<p>Importa tu archivo excel con los datos de los catalogos en caso de que hubiese alguna actualización en los mismos, si no tienes el archivo puedes exportarlo y darle la actualización necesaria, una vez actualizado puedes volver a importarlo para actualizar los datos.</p>
												<br>
												<form id="fileupload" action="?c=Catalogos&a=Upload" method="POST" enctype="multipart/form-data">
										
													<input type="file" name="file">
												

											</div><!--/porlets-content--> 
										</div><!--/block-web--> 
									</div>
								</div>
								<div class="modal-footer">
									<div class="row col-md-5 col-md-offset-7">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary">Guardar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).on('change', ':file', function() {
						var input = $(this),
						numFiles = input.get(0).files ? input.get(0).files.length : 1,
						label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
						input.trigger('fileselect', [numFiles, label]);
					});
					$(document).ready( function() {
						$(':file').on('fileselect', function(event, numFiles, label) {
							console.log(numFiles);
							console.log(label);
						});
					});
				</script>
					<!--script id="template-upload" type="text/x-tmpl">
						{% for (var i=0, file; file=o.files[i]; i++) { %}
						<tr class="template-upload fade">
							<td width="">
								<span class="preview"></span>
							</td>
							<td width="40%">
								<p class="name">{%=file.name%}</p>
								<strong class="error text-danger"></strong>
							</td>
							<td width="25%">
								<p class="size">Processing...</p>
								<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
							</td>
							<td width="10%">
								
							</td>
							<td>
								{% if (!i && !o.options.autoUpload) { %}
								<button class="btn btn-primary start" disabled>
									<i class="glyphicon glyphicon-upload"></i>
									<span></span>
								</button>
								{% } %}
								{% if (!i) { %}
								<button type="button" class="btn btn-danger cancel"> 
									<i class="glyphicon glyphicon-trash"></i> 
									<span></span> 
								</button>
								{% } %}
							</td>
						</tr>
						{% } %}
					</script> 
					< The template to display files available for download --> 
					<!--script id="template-download" type="text/x-tmpl">
						{% for (var i=0, file; file=o.files[i]; i++) { %}
						<tr class="template-download fade">
							<td>
								<span class="preview">
									{% if (file.thumbnailUrl) { %}
									<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
									{% } %}
								</span>
							</td>
							<td>
								<p class="name">
									{% if (file.url) { %}
									<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
									{% } else { %}
									<span>{%=file.name%}</span>
									{% } %}
								</p>
								{% if (file.error) { %}
								<div><span class="label label-danger">Error</span> {%=file.error%}</div>
								{% } %}
							</td>
							<td>
								<span class="size">{%=o.formatFileSize(file.size)%}</span>
							</td>
							<td>
								{% if (file.deleteUrl) { %}
								<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
									<i class="glyphicon glyphicon-trash"></i>
									<span>Delete</span>
								</button>
								<input type="checkbox" name="delete" value="1" class="toggle">
								{% } else { %}
								<button class="btn btn-warning cancel">
									<i class="glyphicon glyphicon-ban-circle"></i>
									<span>Cancel</span>
								</button>
								{% } %}
							</td>
						</tr>
						{% } %}
					</script>