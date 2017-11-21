 

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Apoyos</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=Apoyo">Apoyosn</a></li>
      <li class="active"><?php echo $apoyo->idApoyo != null ? 'Actualizar apoyo' : 'Registrar apoyo'; ?></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $apoyo->idApoyo != null ? '&nbsp; Actualizar apoyo' : '&nbsp; Registrar apoyo'; ?></h2> 
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
          <form action="?c=Apoyos&a=Guardar" method="POST" class="form-horizontal row-border" parsley-validate novalidate>
            <input type="hidden" name="idApoyo" value="<?php echo $apoyo->idApoyo != null ? $apoyo->idApoyo : 0; ?>">
            <div class="form-group">
              <label class="col-sm-3 control-label">Beneficiario<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <select name="idBeneficiario" class="form-control select2" required>
                  <?php if($apoyo->idApoyo==null){ ?>   
                  <option value=""> 
                    Seleccione la curp del beneficiario
                  </option>
                  <?php } if($apoyo->idApoyo!=null){ ?>   
                  <option value="<?php echo $apoyo->idBeneficiario?>"> 
                    <?php echo $apoyo->curp; ?>
                  </option>
                  <?php } foreach($this->model->ListarSelects('beneficiarios') as $r): 
                  if($r->curp!=$apoyo->curp){ ?>
                  ?>
                  <option value="<?php echo $r->idBeneficiario; ?>"> 
                    <?php echo $r->curp; ?>
                  </option>
                  <?php } endforeach; ?>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Origen<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <select name="idOrigen" class="form-control" required>
                  <?php if($apoyo->idApoyo==null){ ?>   
                  <option value=""> 
                    Seleccione el origen del apoyo
                  </option>
                  <?php } if($apoyo->idApoyo!=null){ ?>   
                  <option value="<?php echo $apoyo->idOrigen?>"> 
                    <?php echo $apoyo->origen; ?>
                  </option>
                  <?php } foreach($this->model->ListarSelects('origen') as $r): 
                  if($r->origen!=$apoyo->origen){ ?>
                  ?>
                  <option value="<?php echo $r->idOrigen; ?>"> 
                    <?php echo $r->origen; ?>
                  </option>
                  <?php } endforeach; ?>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Subprograma<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <select name="idSubprograma" class="form-control select2" required>
                  <?php if($apoyo->idApoyo==null){ ?>   
                  <option value=""> 
                    Seleccione la subprograma a la que pertenece el beneficiario
                  </option>
                  <?php } if($apoyo->idApoyo!=null){ ?>   
                  <option value="<?php echo $apoyo->idSubprograma?>"> 
                    <?php echo $apoyo->subprograma; ?>
                  </option>
                  <?php } foreach($this->model->ListarSelects('subprograma') as $r): 
                  if($r->subprograma!=$apoyo->subprograma){ ?>
                  ?>
                  <option value="<?php echo $r->idSubprograma; ?>"> 
                    <?php echo $r->subprograma; ?>
                  </option>
                  <?php } endforeach; ?>
                </select>
              </div>
            </div><!--/form-group-->

            <div class="form-group">
              <label class="col-sm-3 control-label">Caracteristica de apoyo<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <select name="idCaracteristica" class="form-control select2" required>
                  <?php if($apoyo->idApoyo==null){ ?>   
                  <option value=""> 
                    Seleccione caracteristica del apoyo
                  </option>
                  <?php } if($apoyo->idApoyo!=null){ ?>   
                  <option value="<?php echo $apoyo->idCaracteristicasApoyo?>"> 
                    <?php echo $apoyo->caracteristicasApoyo; ?>
                  </option>
                  <?php } foreach($this->model->ListarSelects('caracteristicasApoyo') as $r): 
                  if($r->caracteristicasApoyo!=$apoyo->caracteristicasApoyo){ ?>
                  ?>
                  <option value="<?php echo $r->idCaracteristicasApoyo; ?>"> 
                    <?php echo $r->caracteristicasApoyo; ?>
                  </option>
                  <?php } endforeach; ?>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Periodicidad<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <select name="idPeriodicidad" class="form-control" required>
                  <?php if($apoyo->idApoyo==null){ ?>   
                  <option value=""> 
                    Seleccione la periodicidad del apoyo
                  </option>
                  <?php } if($apoyo->idApoyo!=null){ ?>   
                  <option value="<?php echo $apoyo->idPeriodicidad?>"> 
                    <?php echo $apoyo->periodicidad; ?>
                  </option>
                  <?php } foreach($this->model->ListarSelects('periodicidad') as $r): 
                  if($r->periodicidad!=$apoyo->periodicidad){ ?>
                  ?>
                  <option value="<?php echo $r->idPeriodicidad; ?>"> 
                    <?php echo $r->periodicidad; ?>
                  </option>
                  <?php } endforeach; ?>
                </select>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Fecha de apoyo<strog class="theme_color">*</strog></label>
              <div class="col-sm-2">
                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input name="fechaApoyo" type="date" value="<?php echo $apoyo->idApoyo!=null ? $apoyo->fechaApoyo : "" ?>" class="form-control" required>
                </div>
              </div>
              <label class="col-sm-2 control-label">Importe de apoyo<strog class="theme_color">*</strog></label>
              <div class="col-sm-2">
                <div class="input-group"> <span class="input-group-addon">$</span>
                  <input value="<?php echo $apoyo->idApoyo != null ? $apoyo->importeApoyo : ""; ?>" style="text-align:right;" onkeypress="return soloNumeros(event);" class="form-control" name="importeApoyo" placeholder="0" type="text" required>
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div><!--form-group end--> 
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=Programa" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix-->
