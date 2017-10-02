


        
          <div class="container clear_both padding_fix">
            <!--\\\\\\\ container  start \\\\\\-->
            <div class="pull-left breadcrumb_admin clear_both">
              <div class="pull-left page_title theme_color">
                <h1>Inicio</h1>
                <h2 class="">Programas</h2>
              </div>
              <div class="pull-right">
                <ol class="breadcrumb">
                  <li><a href="?c=Inicio">Inicio</a></li>
                  <li class="active">Programas</a></li>
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
                          </span>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="btn-group pull-right">
                          <b>
                             <a class="btn btn-primary" href="?c=Programa&a=Crud">Registrar Programa</a>
                          </b>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="block-web">
                    <div class="header">
                      <div class="actions"> </div>
                      <h3 class="content-header">Programas</h3>
                    </div>
                    <div class="porlets-content">
                      <div class="adv-table editable-table ">
                        <div class="clearfix">
                        </div>
                        <div class="margin-top-10"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                          <thead>
                            <tr>
                              <th><h5>Nombre del programa</h5></th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($this->model->Listar() as $r): ?>
                            <tr >
                              <td>
                                <?php echo $r->programa; ?>
                              </td>
                              <td class="center">
                  
                                 <a href="?c=Programa&a=Crud&idPrograma=<?php echo $r->idPrograma; ?>">Editar</a>
                              </td>
                              <td class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este programa?');" href="?c=Programa&a=Eliminar&idPrograma=<?php echo $r->idPrograma; ?>" class="btn btn-danger" >Borrar<i class="fa fa-eraser"></i></a></td>
                            </tr>
                           <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div><!--/porlets-content-->
                  </div><!--/block-web-->
                </div><!--/col-md-12-->
              </div><!--/row-->
            </div>
        