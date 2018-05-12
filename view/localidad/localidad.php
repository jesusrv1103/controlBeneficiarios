 <div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Localidades</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=localidad">Localidades</a></li>
      <li class="active"><?php echo $localidad->idLocalidad != null ? 'Actualizar localidad' : 'Alta localidad'; ?></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $localidad->idLocalidad != null ? '&nbsp; Actualizar localidad' : '&nbsp; Registrar localidad'; ?></h2>
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
          <form action="?c=Localidad&a=Guardar<?php if(isset($nuevoRegistro)){ echo "&nuevoRegistro=true"; } ?>" method="POST" class="form-horizontal row-border"  parsley-validate novalidate>

            <?php if(isset($this->error)){ ?>
              <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                  <div class="alert alert-danger">
                    <i class="fa fa-warning"></i>&nbsp;<?php echo $this->mensaje; ?>
                  </div>
                </div>
              </div><!--/form-group-->
            <?php } ?>
            <div class="form-group">
              <label class="col-sm-3 control-label">Clave de localidad<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
               <input autofocus name="idLocalidad" id="idLocalidad" parsley-type="number" class="form-control" required value="<?php echo $localidad->idLocalidad != null ? $localidad->idLocalidad  : "";  ?>" placeholder="Ingrese la clave de la localidad" <?php if($localidad->idLocalidad != null && !isset($nuevoRegistro)){ ?> readonly <?php } ?>/>
             </div>
           </div><!--/form-group-->
           <div class="form-group">
           <label class="col-sm-3 control-label">Municipio<strog class="theme_color">*</strog></label>
           <div class="col-sm-6">
            <input name="municipio" type="text" class="form-control" required value="<?php echo $localidad->idLocalidad != null ? $localidad->municipio : "";  ?>" placeholder="Ingrese el nombre del municipio"/>
          </div>
        </div><!--/form-group-->
        <div class="form-group">
          <label class="col-sm-3 control-label">Localidad<strog class="theme_color">*</strog></label>
          <div class="col-sm-6">
            <input name="localidad" type="text" class="form-control" required value="<?php echo $localidad->idLocalidad != null ? $localidad->localidad : "";  ?>" placeholder="Ingrese el nombre de localidad"/>
          </div>
        </div><!--/form-group-->
        <div class="form-group">
          <label class="col-sm-3 control-label">Ámbito<strog class="theme_color">*</strog></label>
          <div class="col-sm-6">
            <select class="form-control" name="ambito" required id="ambito">
              <?php if($localidad->idLocalidad == null){ ?>
              <option value=""> 
                Selecciona el ámbito de localidad                 
              </option>
              <?php } if($localidad->idLocalidad != null){ ?>
              <option value="<?php echo $localidad->idLocalidad != null ? $localidad->ambito : "";  ?>"> 
                <?php  echo $localidad->idLocalidad != null ? $localidad->ambito : "";  ?>                
              </option>
              <?php } if($localidad->ambito!="Urbano"){?>
              <option value="Urbano"> 
                Urbano
              </option>
              <?php } if($localidad->ambito!="Rural"){?>
              <option value="Rural"> 
                Rural
              </option>
              <?php } ?>
            </select>
          </div>
        </div><!--/form-group-->
        <div class="form-group">
          <div class="col-sm-offset-7 col-sm-5">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="?c=localidad" class="btn btn-default"> Cancelar</a>
          </div>
        </div><!--/form-group-->
      </form>
    </div><!--/porlets-content-->
  </div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--/container clear_both padding_fix-->