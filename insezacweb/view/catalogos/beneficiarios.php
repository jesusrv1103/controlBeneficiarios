<div class="pull-left breadcrumb_admin clear_both">
	<div class="pull-left page_title theme_color">
		<h1>Catálogo</h1>
		<h2 class="">Beneficiarios</h2>
	</div>
	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="?c=inicio">Inicio</a></li>
			<li class="active">Catálogo de beneficiarios</a></li>
		</ol>
	</div>
</div>
<div class="container clear_both padding_fix">
	<div class="row col-md-12">
		<div class="block-web">
			<div class="header">
				<div class="row">					
					<div class="block-web">
						<div class="col-md-9">
							<h2 class="content-header theme_color" style="margin-top: -10px;">Identificadores para el registro de beneficiarios</h2>
						</div>							
						<div class="col-md-3">
							<div class="btn-group pull-right">
								<b>
									<?php if($_SESSION['tipoUsuario']==1){?>
									<div class="btn-group"> 
										<a class="btn btn-sm btn-warning tooltips" href="#myModal" style="margin-right: 10px;"  data-toggle="modal" data-target="#myModal" data-original-title="Importar catálogo
										para el registro de identficadores" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>

										<a class="btn btn-sm btn-primary tooltips" href="assets/files/catalogo_beneficiarios.csv" download="catalogo_beneficiarios.csv" data-original-title="Descargar catalogo_beneficiarios.csv" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""> <i class="fa  fa-download"></i>&nbsp;Descargar</a> 
									</div>
									<?php } ?>
								</b>
							</div>
						</div><!--/col-md-4--> 						
					</div><!--/block-web--> 
				</div><!--/row--> 
			</div><!--/header-->
			<?php if(isset($mensaje)){ if(!isset($error)){?>
			<br> <div class="row">
				<div class="col-md-12">
					<div class="alert alert-success fade in">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<i class="fa fa-check"></i>&nbsp;<?php echo $mensaje; ?>
					</div>
				</div>
			</div> 
			<?php } if(isset($error)){ ?>
			<br> <div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<i class="fa fa-warning"></i>&nbsp;<?php echo $mensaje; ?>
					</div>
				</div>
			</div>
			<?php } }?>
			<div class="row">
				<div class="col-md-6">
					<div class="block-web">
						<div class="header">
							<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
							<h3 class="content-header lblheader">Identificación oficial</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">
										<tbody>
											<?php foreach($this->model->Listar('identificacionoficial') as $r): ?>
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
							<h3 class="content-header lblheader">Ingreso mensual</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">


										<tbody>
											<?php foreach($this->model->Listar('ingresomensual') as $r): ?>
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
							<h3 class="content-header lblheader">Tipo de seguridad social</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">
										<tbody>
											<?php foreach($this->model->Listar('seguridadsocial') as $r): ?>
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
							<h3 class="content-header lblheader">Grupo vulnerable</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">									
										<tbody>
											<?php foreach($this->model->Listar('grupovulnerable') as $r): ?>
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
							<h3 class="content-header lblheader">Nivel de estudios</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">									
										<tbody>
											<?php foreach($this->model->Listar('nivelestudio') as $r): ?>
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
							<h3 class="content-header lblheader">Discapacidad</h3>
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
							<h3 class="content-header lblheader">Vivienda</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">
										<tbody>
											<?php foreach($this->model->Listar('vivienda') as $r): ?>
												<tr>
													<td><?php echo $r->idVivienda; ?></td>
													<td><?php echo $r->vivienda; ?></td>
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
							<h3 class="content-header lblheader">Estado civil</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">
										<tbody>
											<?php foreach($this->model->Listar('estadocivil') as $r): ?>
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
							<h3 class="content-header lblheader">Tipo Vialidad</h3>
						</div>
						<div class="porlets-content">
							<div class="panel-body">
								<div class="col-md-12">
									<table class="table table-striped">
										<tbody>
											<?php foreach($this->model->Listar('tipovialidad') as $r): ?>
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
							<h3 class="content-header lblheader">Ocupación</h3>
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
		</div><!--/block-web--> 
	</div><!--/row-col-md-12--> 
</div><!--/container clear_both padding_fix-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?c=catalogos&a=UploadBeneficiarios" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="block-web">
							<div class="header">
								<h3 class="content-header theme_color">&nbsp;Importar catálogos de beneficiarios</h3>
							</div>
							<div class="porlets-content" style="margin-bottom: -65px;">
								<p>Selecciona tu archivo excel con los catáogos de beneficiarios para registrarlos en el sistema.</p>
								<p><strong>Nota: </strong>El archivo debe conener la extención <strong class="theme_color">csv</strong> para poder ser leído correctamente.</p>
								<br>
								<div class="input-group">
									<label class="input-group-btn">
										<span class="btn btn-sm btn-success">
											<i class="glyphicon glyphicon-plus"></i>
											Seleccionar archivo<input  type="file" style="display: none;" id="inputArchivo" name="file" required>
										</span>
									</label>
									<input type="text" class="form-control" id="input-sm" readonly>
								</div>
							</div><!--/porlets-content-->
						</div><!--/block-web-->
					</div>
				</div>
				<div class="modal-footer">
					<div class="row col-md-5 col-md-offset-7">
						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btnImportar" class="btn btn-sm btn-primary">Importar datos</button>
					</div>
				</div>
			</form>
		</div><!--/modal-content--> 
	</div><!--/modal-dialog--> 
</div><!--/modal-fade--> 

<script type="text/javascript">
	getFilename = function(file){
		var fn = $(file).val();
		alert(fn);
		$("#fileImport").val(fn);
	}
	 deshabilitar = function (){
  $('#btnImportar').attr("disabled", true);
}
</script>
