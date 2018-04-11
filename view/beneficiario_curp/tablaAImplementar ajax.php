public function Consultas(){
    $periodo=$_REQUEST['periodo'];
    echo '<div class="table-responsive">
    <table class="display table table-bordered table-striped" id="dynamic-table">
    <thead>
    <tr>
    <td><center><b>Info</b></center></td>
    <th>CURP</th>
    <th>Nombre de beneficiario</th>
    <th>Municipio</th>
    <td><center><b>Ver</b></center></td>';
    if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){
      echo '
      <td><center><b>Editar</b></center></td>
      <td><center><b>Borrar</b></center></td>';
    }
    echo '</tr>
    </thead>
    <tbody>';
    foreach ($this->model->Listar1($periodo) as $r):
      echo '
      <tr class="grade">
      <td align="center"> <a class="btn btn-default btn-sm tooltips" data-target="#modalInfo" href="#modalInfo" role="button" data-toggle="modal" onclick="infoRegistro('; echo $r->idBeneficiario; echo ')" data-toggle="tooltip" data-placement="rigth" data-original-title="Ver información de registro"><i class="fa fa-info-circle"></i></a> </td>
      <td>'. $r->curp .'</td>
      <td>'. $r->nombres." ".$r->primerApellido." ".$r->segundoApellido .'</td>
      <td>'. $r->nombreMunicipio .'</td>
      <td class="center">
      <a class="btn btn-info btn-sm tooltips" role="button" href="?c=beneficiario&a=Detalles&idBeneficiario='. $r->idBeneficiario .'" data-toggle="tooltip" data-placement="left" data-original-title="Ver detalles de beneficiario"><i class="fa fa-eye"></i></a>
      </td>';
      if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){
        echo 
        '<td class="center">
        <a class="btn btn-primary btn-sm" role="button" href="?c=beneficiario&a=Crud&idBeneficiario='. $r->idBeneficiario .'"><i class="fa fa-edit"></i></a>
        </td>
        <td class="center">
        <a class="btn btn-danger btn-sm" onclick="eliminarBeneficiario('; echo $r->idRegistro; echo ')" href="#modalEliminar"  data-toggle="modal" data-target="#modalEliminar" role="button"><i class="fa fa-eraser"></i></a>
        </td>';
      } 
      echo '</tr>';
    endforeach; 
    echo '</tbody>
    <tfoot>
    <tr>
    <td><center><b>Info</b></center></td>
    <th>CURP</th>
    <th>Nombre de beneficiario</th>
    <th>Municipio</th>
    <td><center><b>Ver</b></center></td>';
    if($_SESSION['tipoUsuario']==1 || $_SESSION['tipoUsuario']==3){
      echo '
      <td><center><b>Editar</b></center></td>
      <td><center><b>Borrar</b></center></td>';
    } 
    echo '
    </tr>
    </tfoot>
    </table>
        </div><!--/table-responsive-->';
}