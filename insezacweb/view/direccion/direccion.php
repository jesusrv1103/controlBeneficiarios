 

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Dirección</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=direccion">Dirección</a></li>
      <li class="active"><?php echo $direccion->idDireccion != null ? 'Actualizar dirección' : 'Alta dirección'; ?></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $direccion->idDireccion != null ? '&nbsp; Actualizar dirección' : '&nbsp; Registrar dirección'; ?></h2> 
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
          <form action="?c=Direccion&a=Guardar<?php if(isset($nuevoRegistro)){ echo "&nuevoRegistro=true"; } ?>" method="post" class="form-horizontal row-border" parsley-validate novalidate>
            <input hidden name="idDireccion"  value="<?php echo $direccion->idDireccion != null ? $direccion->idDireccion : 0;  ?>"/>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nombre <strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
              <input name="direccion" type="text" onkeypress=" return soloLetras(event);" onkeyup="mayus(this);"  class="form-control" required value="<?php echo $direccion->direccion != null ? $direccion->direccion : "";  ?>" placeholder="Ingrese nombre de la dirección"/>
              </div>
            </div><!--/form-group-->

            <div class="form-group">
              <label class="col-sm-3 control-label">Descripción <strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <input name="descripcion" type="text" onkeypress=" return soloLetras(event);" onkeyup="mayus(this);" class="form-control" required value="<?php echo $direccion->descripcion != null ? $direccion->descripcion : "";  ?>" placeholder="Ingrese descripción de la dirección"/>
              </div>
            </div><!--/form-group-->

            <div class="form-group">
              <label class="col-sm-3 control-label">Titular <strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <input name="titular" type="text" onkeypress=" return soloLetras(event);" onchange="mayus(this);" class="form-control" required value="<?php echo $direccion->titular != null ? $direccion->titular : "";  ?>" placeholder="Ingrese nombre de el titular"/>
              </div>
            </div><!--/form-group-->

            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=direccion" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix-->


<script>
  function mayus(e) {
    e.value = e.value.toUpperCase();
  }
</script>


<script>
  function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
        tecla_especial = true;
        break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return false;
    }
  }
</script>