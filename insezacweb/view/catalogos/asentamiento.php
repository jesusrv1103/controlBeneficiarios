<div class="pull-left breadcrumb_admin clear_both">
	<div class="pull-left page_title theme_color">
		<h1>Catálogo</h1>
		<h2 class="">Asentamientos</h2>
	</div>
	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="?c=Inicio">Inicio</a></li>
			<li class="active">Asentamientos</a></li>
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
					<?php if(isset($mensaje)){ if($mensaje=="success"){ ?>
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
							<i class="fa fa-times"></i>&nbsp;<?php echo $mensaje; ?>
						</div>
					</div>
					<?php } } ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="block-web">
							<div class="header">
								<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
								<h3 class="content-header">Asentamientos</h3>
							</div>
							<div class="porlets-content">
								<div class="panel-body">
									<div class="col-md-12">
										<table class="table table-striped">
											<tbody>
												<?php foreach($this->model->Listar() as $r): ?>
													<tr>
														<td><?php echo $r->idAsentamientos; ?></td>
														<td><?php echo $r->municipio; ?></td>
														<td><?php echo $r->localidad; ?></td>
														<td><?php echo $r->nombreAsentamiento; ?></td>
														<td><?php echo $r->tipoAsentamiento; ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div><!--/porlets-content-->
						</div><!--/block-web-->
					</div><!--/col-md-12-->
				</div><!--/row-->
			</div><!--/blockweb-->
		</div><!--/col-md-12-->
	</div><!--/row-->
</div><!--/container-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form id="fileupload" action="?c=Asentamiento&a=Upload" method="POST" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body"> 
					<div class="row">
						<div class="block-web">
							<div class="header">
								<h3 class="content-header">Importar asentamientos</h3>
							</div>
							<div class="porlets-content" style="margin-bottom: -50px;">
								<p>Importa tu archivo excel con los datos de los asentamientos en caso de que hubiese alguna actualización en los mismos, si no tienes el archivo puedes exportarlo y darle la actualización necesaria, una vez actualizado puedes volver a importarlo para actualizar los datos.</p>
								<br>
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
			</div><!--/modal-content--> 
		</div><!--/modal-dialog--> 
	</form>
</div><!--/modal-fade--> 
