<div class="col-md-10" id="view-programa">
  <div class="block-web">
    <div class="header">
      <h3 class="content-header">Registrar programa</h3>
    </div>
    <div class="porlets-content">
      <form action="" class="form-horizontal row-border">
        <div class="form-group">
          <div class="col-sm-12">
            <div class="input-group"> <span class="input-group-addon "><i class="fa fa-archive"></i></span>
              <input type="text" class="form-control" placeholder="Nombre del programa" required>
            </div>
            <br>
            <div class="input-group"> <span class="input-group-addon "><i class="fa fa-align-left"></i></span>
              <textarea type="textarea" class="form-control" placeholder="Descripción del programa" required></textarea>
            </div>
            <br>
            <div class="input-group"> <span class="input-group-addon "><i class="fa fa-calendar"></i></span>
              <input type="text" value="" size="16" class="form-control form-control-inline input-medium default-date-picker" placeholder="Fecha inicial" required>
            </div><br>
            <div class="input-group"> <span class="input-group-addon "><i class="fa fa-calendar"></i></span>
              <input type="text" value="" size="16" class="form-control form-control-inline input-medium default-date-picker" placeholder="Fecha final" required>
            </div><br>
            <div class="input-group"> <span class="input-group-addon "><strong>$</strong></span>
              <input type="number" class="form-control" placeholder="Techo presupetual" pattern="[0-9]"required>
              <span class="input-group-addon "><strong>.00</strong></span>
            </div>
            <br>
            <div class="bottom col-md-4 col-md-offset-8">
              <button type="submit" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-danger" >Cancel</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
