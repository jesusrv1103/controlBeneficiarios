 <div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Usuarios</h2>
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
          <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
          <h3 class=""><?php echo $usuario->idUsuario != null ? 'Actualizar usuario' : 'Alta usuario'; ?></h3>
        </div>
        <div class="porlets-content">
          <form action="?c=Usuario&a=Guardar" method="post" class="form-horizontal row-border">

            <input hidden name="idUsuario"  value="<?php echo $usuario->idUsuario != null ? $usuario->idUsuario : 0;  ?>"/>

            <input DISABLED name="idUsuario"  value="<?php echo $usuario->idUsuario != null ? $usuario->idUsuario : 0;  ?>"  style="visibility:hidden"/>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nombre</label>
              <div class="col-sm-6">
                <input name="usuario" type="text" class="form-control" required value="<?php echo $usuario->idUsuario != null ? $usuario->usuario : "";  ?>" placeholder="Ingrese el nombre de usuario"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Contraseña</label>
              <div class="col-sm-6">
                <input name="usuario" type="password" class="form-control" required placeholder="Ingrese la contraseña del usuario"/>
                <!--value="<?php //echo $usuario->idUsuario != null ? $usuario->password : "";  ?>"-->
              </div>
            </div><!--/form-group-->
             <div class="form-group">
              <label class="col-sm-3 control-label">Confirmar Contraseña</label>
              <div class="col-sm-6">
                <input name="usuario" type="password" class="form-control" required placeholder="Confirme la contraseña del usuario"/>
              </div>
            </div><!--/form-group-->
            <div class="form-group">
              <label class="col-sm-3 control-label">Tipo usuario</label>
              <div class="col-sm-6">
                <select class="form-control" >
                    <option value="1"> 
                      Administrador
                    </option>
                    <option value="2"> 
                      Secretario
                    </option>
                    <option value="3"> 
                      Estandar
                    </option>
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
