 <div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Subprogramas</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=Subprograma">Subprogramas</a></li>
      <li class="active"><?php echo $subprograma->idSubprograma != null ? 'Actualizar subprograma' : 'Registrar subprograma'; ?></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $subprograma->idSubprograma != null ? '&nbsp; Actualizar subprograma' : '&nbsp; Registrar subprograma'; ?></h2> 
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
          <form action="?c=Subprograma&a=Guardar" class="form-horizontal row-border" method="POST">
            <div class="form-group">
              <div class="col-sm-6">
                <input type="hidden" name="idSubprograma" class="form-control" required value="<?php echo $subprograma->idSubprograma != null ? $subprograma->idSubprograma  : 0; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nombre de Subprograma</label>
              <div class="col-sm-6">
                <input name="subprograma" type="text" value="<?php echo $subprograma->idSubprograma != null ? $subprograma->subprograma : ''; ?>" class="form-control" autofocus required placeholder="Ingrese el nombre del programa" />
              </div>
            </div><!--/form-group--> 
            <div class="form-group">
              <label class="col-sm-3 control-label">Nombre de programa<strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <select name="idPrograma" class="form-control select2" style="width: 100%;" required>
                  <?php if($subprograma->idSubprograma==null){ ?>   
                  <option value=""> 
                    Seleccione el programa al que pertenece el subprograma
                  </option>
                  <?php } if($subprograma->idSubprograma!=null){ ?>   
                  <option value="<?php echo $subprograma->idPrograma?>"> 
                    <?php echo $subprograma->programa; ?>
                  </option>
                  <?php } foreach($this->model->ConsultaProgramas() as $r):  
                  if($r->programa!=$subprograma->programa){ ?>
                  <option value="<?php echo $r->idPrograma; ?>"> 
                    <?php echo $r->programa; ?>
                  </option>
                  <?php } endforeach; ?>
                </select>
              </div>
            </div><!--/form-group-->
              <div class="form-group">
               <label class="col-sm-3 control-label">Techo presupuestal</label>
               <div class="col-sm-6">
                 <div class="input-group"> <span class="input-group-addon">$</span>
                  <input value="<?php echo $subprograma->idSubprograma != null ? $subprograma->techoPresupuestal : ""; ?>" style="text-align:right;" onkeypress="return soloNumeros(event);" class="form-control" name="techoPresupuestal" placeholder="0" type="text" required>
                  <span class="input-group-addon "><strong>.00</strong></span>
                </div>
              </div>
            </div><!--/form-group--> 
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=Subprograma" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group--> 
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix-->













