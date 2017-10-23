 <div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Usuarios</h1>
    <h2 class=""><?php echo $usuario->idUsuario != null ? 'Actualizar usuario' : 'Alta usuario'; ?></h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=Usuario">Usuarios</a></li>
      <li class="active"><?php echo $usuario->idUsuario != null ? 'Actualizar usuario' : 'Alta usuario'; ?></li>
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
            <h2 class="content-header theme_color" style="margin-top: -5px;"><?php echo $usuario->idUsuario != null ? '&nbsp; Actualizar usuario' : '&nbsp; Alta usuario'; ?></h2>
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
        <form action="?c=Usuario&a=Guardar" method="post" class="form-horizontal row-border" parsley-validate novalidate>
         <?php if(isset($mensaje) && !isset($error)){?>
         <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success fade in">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <i class="fa fa-check"></i>&nbsp;<?php echo $mensaje; ?>
            </div>
          </div>
        </div> 
        <?php } if(isset($mensaje) && isset($error)){ ?>
        <div class="row">
          <div class="col-md-12">
            <div class="fa fa-warning">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <i class="fa fa-times"></i>&nbsp;<?php echo $mensaje; ?>
            </div>
          </div>
        </div>
        <?php } ?>
        <input hidden name="idUsuario"  value="<?php echo $usuario->idUsuario != null ? $usuario->idUsuario : 0;  ?>"/>

        <div class="form-group">
          <label class="col-sm-3 control-label">Usuario<strog class="theme_color">*</strog></label>
          <div class="col-sm-6">
            <input name="usuario" type="text" class="form-control" required value="<?php echo $usuario->idUsuario != null ? $usuario->usuario : "";  ?>" placeholder="Ingrese el nombre de usuario" <?php if($usuario->idUsuario != null){ ?>  <?php } ?> autofocus/>
          </div>
        </div><!--/form-group-->
        <div class="form-group">
          <label class="col-sm-3 control-label">Dirección<strog class="theme_color">*</strog></label>
          <div class="col-sm-6">
            <input name="direccion" type="text" class="form-control" required value="<?php echo $usuario->idUsuario != null ? $usuario->direccion : "";  ?>" placeholder="Ingrese la direccion que pertenece el usuario"/>
          </div>
        </div><!--/form-group-->
        <div class="form-group">
          <label class="col-sm-3 control-label">Contraseña<strog class="theme_color">*</strog></label>
          <div class="col-sm-3">
            <input type="password" type="pass-security" name="password" id="password" class="form-control" required placeholder="Password" />
          </div>
          <div class="col-sm-3">
            <input type="password" class="form-control" required parsley-equalto="#password" placeholder="Confirme la contraseña" />
          </div>
        </div><!--/form-group--> 
        <div class="form-group">
          <label class="col-sm-3 control-label">Tipo usuario<strog class="theme_color">*</strog></label>
          <div class="col-sm-6">
            <select class="form-control" name="tipoUsuario" id="tipoUsuario" required>
             <?php if($usuario->idUsuario == null){ ?>
             <option value=""> 
              Seleccione el tipo de usuario               
            </option>
            <?php } if($usuario->idUsuario != null){ ?>
            <option value="<?php echo $usuario->tipoUsuario; ?>"> 
              <?php 
              switch ($usuario->tipoUsuario) {
                case 1:
                echo "Administrador";
                break;
                case 2:
                echo "Secretario";
                break;
                case 3:
                echo "Regular";
                break;
              } ?>
            </option>
            <?php } if($usuario->tipoUsuario!=1){?>
            <option value="1"> 
              Administrador
            </option>
            <?php } if($usuario->tipoUsuario!=2){?>
            <option value="2"> 
              Secretario
            </option>
            <?php } if($usuario->tipoUsuario!=3){?>
            <option value="3"> 
              Regular
            </option>
            <?php } ?>
          </select>
        </div>
      </div><!--/form-group-->
      <div class="form-group">
        <div class="col-sm-offset-7 col-sm-5">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="?c=Usuario" class="btn btn-default"> Cancelar</a>
        </div>
      </div><!--/form-group-->
    </form>
  </div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--/container clear_both padding_fix-->
