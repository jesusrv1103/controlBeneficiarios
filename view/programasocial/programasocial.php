<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Programa Social</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=ProgramaSocial">Programa Social</a></li>
      <li class="active"><?php echo $nombreProgramaSocial->idprogramaSocial != null ? 'Actualizar programa social' : 'Alta programa social'; ?></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $nombreProgramaSocial->idprogramaSocial != null ? '&nbsp; Actualizar programa social' : '&nbsp; Registrar programa social'; ?></h2>
            </div>
            <div class="col-md-4">
              <div class="btn-group pull-right">
                <div class="actions"> 
                </div>
              </div>
            </div>    
          </div>
        </div>
        <div class="porlets-content">
          <form action="?c=ProgramaSocial&a=Guardar<?php if(isset($nuevoRegistro)){ echo "&nuevoRegistro=true"; } ?>" method="POST" class="form-horizontal row-border"  parsley-validate novalidate>
            <div class="form-group">
              <label class="col-sm-3 control-label">Dependencia<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
               <input autofocus name="idDependencia" id="idDependencia" parsley-type="number" class="form-control" required value="<?php echo $dependencia->idDependencia != null ? $dependencia->idDependencia  : "";  ?>" placeholder="Ingrese la clave de la localidad" <?php if($dependencia->idDependencia != null){ ?>  <?php } ?>/>
             </div>
           </div><!--/form-group-->
           <div class="form-group">
            <label class="col-sm-3 control-label">Programa Social<strog class="theme_color">*</strog></label>
            <div class="col-sm-6">
              <input name="programasocial" type="text" class="form-control" required value="<?php echo $nombreProgramaSocial->idprogramaSocial != null ? $programaSocial->nombreProgramaSocial : "";  ?>" placeholder="Ingrese el nombre del Programa Social"/>
            </div>
          </div><!--/form-group-->
          <div class="form-group">
            <label class="col-sm-3 control-label">Clave de Padron<strog class="theme_color">*</strog></label>
            <div class="col-sm-6">
              <input name="cvePadron" type="text" class="form-control" required value="<?php echo $programaSocial->idprogramaSocial != null ? $programaSocial->cvePadron : "";  ?>" placeholder="Ingrese la clave del Padron"/>
            </div>
          </div><!--/form-group-->
         <!--/form-group-->
        <div class="form-group">
          <div class="col-sm-offset-7 col-sm-5">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="?c=ProgramaSocial" class="btn btn-default"> Cancelar</a>
          </div>
        </div><!--/form-group-->
      </form>
    </div><!--/porlets-content-->
  </div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--/container clear_both padding_fix-->