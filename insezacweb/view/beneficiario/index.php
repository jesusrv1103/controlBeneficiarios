 <div class="pull-left breadcrumb_admin clear_both">
 	<div class="pull-left page_title theme_color">
 		<h1>Inicio</h1>
 		<h2 class="">Beneficiarios</h2>
 	</div>
 	<div class="pull-right">
 		<ol class="breadcrumb">
 			<li><a href="?c=Inicio">Inicio</a></li>
 			<li class="active">Beneficiarios</a></li>
 		</ol>
 	</div>
 </div>
 <div class="container clear_both padding_fix">
 	<div class="row">
 		<div class="col-md-12">
 			<div class="invoice_header">
 				<div class="row">
 					<div class="col-sm-4">
 						<div class="input-group">
 							<input type="text" class="form-control">
 							<span class="input-group-btn">
 								<button type="button" class="btn btn-default"><i class="fa fa-search"></i> Buscar </button>
 							</span> </div>
 						</div>
 						<div class="col-sm-8">
 							<div class="btn-group pull-right"> 
 								<div class="btn-group"> <a class="btn btn-sm btn-success" href="?c=Programa&a=Alta"> <i class="fa fa-plus"></i> Registrar beneficiario </a> </div>&nbsp;
 								<b>
 									<button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#myModal"><i class="fa fa-cloud-upload"></i></button>
 								</b> 
 								<b>
 									<button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
 								</b> 
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 		<div class="modal-dialog">
 			<div class="modal-content">
 				<div class="modal-body"> 
 					<div class="row">
 						<div class="block-web">
 							<div class="header">
 								<h3 class="content-header">Importar beneficiario</h3>
 							</div>
 							<div class="porlets-content" style="margin-bottom: -50px;">
 								<p>Importa tu archivo excel con los datos del beneficiario para agregarlo a la base de datos</p>
 								<br>
 								<form class="dropzone dz-clickable" action="http://riaxe.com/file/post">

 								</form>
 							</div><!--/porlets-content--> 
 						</div><!--/block-web--> 
 					</div>
 				</div>
 				<div class="modal-footer">
 					<div class="row col-md-5 col-md-offset-7">
 						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
 						<button type="button" class="btn btn-primary">Guardar</button>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
