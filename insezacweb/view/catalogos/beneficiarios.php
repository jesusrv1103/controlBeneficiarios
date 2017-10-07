<div class="pull-left breadcrumb_admin clear_both">
	<div class="pull-left page_title theme_color">
		<h1>Catálogos</h1>
		<h2 class="">Beneficiarios</h2>
	</div>
	<div class="pull-right">
		<ol class="breadcrumb">
			<li><a href="?c=Inicio">Inicio</a></li>
			<li class="active">Catálogos de beneficiarios</a></li>
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
							<?php if(isset($success)){ ?>
							<div class="col-md-8">
								<div class="alert alert-success fade in">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<i class="fa fa-check"></i>&nbsp;Se han importado los catálogos correctamente
								</div>
							</div> 
							<?php 	} 
							if(isset($error)){ ?>
							<div class="col-md-8">
								<div class="alert alert-danger">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<i class="fa fa-check"></i>&nbsp;Ha ocurrido un error al importar los catálogos
								</div>
							</div>
							<?php }
							if(!isset($error) && !isset($success)){ ?>
							<div class="col-md-8">
								<h2 class="content-header theme_color" style="margin-top: -10px;">Identificadores para el registro de beneficiarios</b></h2>
							</div>
							<?php } ?>
							<div class="col-md-4">
								<div class="btn-group pull-right">
									<b>
										<div class="btn-group"> 
											<a class="btn btn-sm btn-success" href="#myModal" style="margin-right: 10px;"  data-toggle="modal" data-target="#myModal">  <i class="fa  fa-cloud-upload"></i> Importar catálogos </a>
											<a class="btn btn-sm btn-primary" href="?c=Subprograma&a=Alta"> <i class="fa  fa-cloud-download"></i> Exportar catálogos </a> 
										</div>
									</b>
								</div>
							</div>
						</div>
					</div>
				</div><br>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>7</td>
													<td>Larry</td>									
												</tr>

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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>7</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>7</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>7</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>8</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>7</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>8</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>9</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>10</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>11</td>
													<td>Larry</td>									
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div><!--/porlets-content-->
						</div><!--/block-web-->
					</div><!--/col-md-6-->

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
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>7</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>8</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>9</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>10</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>11</td>
													<td>Larry</td>									
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div><!--/porlets-content-->
						</div><!--/block-web-->
					</div><!--/col-md-12-->

					<div class="col-md-12">
						<div class="block-web">
							<div class="header">
								<div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
								<h3 class="content-header">Localidades</h3>
							</div>
							<div class="porlets-content">
								<div class="panel-body">
									<div class="col-md-12">
										<table class="table table-striped">

											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>4</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>5</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>6</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>7</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>8</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>9</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>10</td>
													<td>Larry</td>									
												</tr>
												<tr>
													<td>11</td>
													<td>Larry</td>									
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div><!--/porlets-content-->
						</div><!--/block-web-->
					</div><!--/col-md-12-->
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
										<form name="importar" action="?c=Catalogos&a=Upload" method="post" enctype="multipart/form-data">
											<!--div class="fallback"-->
											<input name="file" type="file"/>
											<!--/div-->

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