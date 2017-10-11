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
					<div class="row" style="margin-top: 15px; margin-bottom: 12px;">
						<div class="col-sm-8">
							<div class="actions"> </div>
							<h2 class="content-header theme_color" style="margin-top: -5px;">Asentamientos</b></h2>
						</div>
						<div class="col-md-4">
							<div class="btn-group pull-right">
								<b>
									<div class="btn-group" style="margin-right: 10px;"> 
										<a class="btn btn-sm btn-success tooltips" href="#myModal" style="margin-right: 10px;"  data-toggle="modal" data-target="#myModal" data-original-title="Importar catálogo" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="left" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>
										<a class="btn btn-sm btn-primary tooltips" href="?c=Catalogos&a=Descargar" data-original-title="Descargar catálogo" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""> <i class="fa  fa-download"></i>&nbsp;Descargar</a> 
									</div>
								</b>
							</div>
						</div>		
					</div>
				</div>
				<div class="porlets-content">
					<div class="table-responsive">
						<table  class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>Clave asentamiento</th>
									<th>Municipio</th>
									<th>Localidad</th>
									<th>Nombre de asentamiento</th>
									<th>Tipo de asentamiento</th>
									<th>Editar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($this->model->Listar() as $r): ?>
									<tr class="gradeA">
										<td><?php echo $r->idAsentamientos; ?></td>
										<td><?php echo $r->municipio; ?></td>
										<td><?php echo $r->localidad; ?></td>
										<td><?php echo $r->nombreAsentamiento; ?></td>
										<td><?php echo $r->tipoAsentamiento; ?></td>
										<td class="center">
											<a href="index.php?c=Usuario&a=Crud&idUsuario=<?php echo $r->idUsuario ?>" class="btn btn-primary" role="button"><i class="fa fa-edit"></i></a>
										</td>
										<td class="center">
											<a class="btn btn-danger" role="button" href="?c=Usuario&a=Borrar&idUsuario=<?php echo $r->idUsuario; ?>"><i class="fa fa-eraser"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Clave asentamiento</th>
									<th>Municipio</th>
									<th>Localidad</th>
									<th>Nombre de asentamiento</th>
									<th>Tipo de asentamiento</th>
									<th>Editar</th>
									<th>Borrar</th>
								</tr>
							</tfoot>
						</table>
					</div><!--/table-responsive-->
				</div><!--/porlets-content-->
			</div><!--/block-web-->
		</div><!--/col-md-12-->
	</div><!--/row-->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form id="fileupload" action="?c=Asentamiento&a=Upload" method="POST" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body"> 
					<div class="row">
						<div class="block-web">
							<div class="header">
								<h3 class="content-header theme_color">Importar asentamientos</h3>
							</div>
							<div class="porlets-content" style="margin-bottom: -50px;">
								<p>Importa tu archivo excel con los datos de los asentamientos en caso de que hubiese alguna actualización en los mismos, si no tienes el archivo puedes exportarlo y darle la actualización necesaria, una vez actualizado puedes volver a importarlo para actualizar los datos.</p>
								<br>
								<span class="btn btn-success fileinput-button">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Seleccionar archivo</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="fileupload" type="file" name="files[]" multiple class="asentamientos">
								</span>
								<br>
								<br>
								<!-- The global progress bar -->
								<div id="progress" class="progress">
									<div class="progress-bar progress-bar-success"></div>
								</div>
								<!-- The container for the uploaded files -->
								<div id="files" class="files"></div>
							</div><!--/porlets-content--> 
						</div><!--/block-web--> 
					</div>
				</div>
				<div class="modal-footer">
					<div class="row col-md-5 col-md-offset-7">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<a href="?c=Asentamiento&a=Importar" class="btn btn-primary">Guardar</a>
					</div>
				</div>
			</div><!--/modal-content--> 
		</div><!--/modal-dialog--> 
	</form>
</div><!--/modal-fade--> 
<script>

</script>
