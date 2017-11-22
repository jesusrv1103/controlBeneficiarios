 <style type="text/css">
 .lbldetalle{
  color:#424242;
  font-weight: bold;
}
.h3subtitulo{
  color:#2196F3;
  font-weight: bold;
}
</style>

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Beneficiarios</h1>
    <h2 class="">Detalles de beneficiario</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=beneficiario">Beneficiarios</a></li>
      <li class="active">Detalles de beneficiario</li>
    </ol>
  </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row col-md-12">
    <div class="block-web">
      <div class="header">
        <div class="row">         
          <div class="block-web">
            <div class="col-md-12">
              <h2 class="content-header theme_color" style="margin-top: -10px;"><?php echo $ben->nombres." ".$ben->primerApellido." ".$ben->segundoApellido; ?></h2>
            </div>                         
          </div><!--/block-web--> 
        </div><!--/row--> 
      </div><!--/header-->
      <div class="row">
        <div class="col-md-6">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header h3subtitulo">Datos generales</h3>
            </div>
            <div class="porlets-content">
              <div class="panel-body">
                <div class="col-md-12">
                 <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>
                        <div class="col-md-12">
                         <label class="col-sm-6 lbldetalle">CURP:</label>
                         <label class="col-sm-6 control-label"><?php echo $ben->curp; ?></label>
                       </div>
                     </td>
                   </tr>
                   <tr>
                    <td>
                     <div class="col-md-12">
                       <label class="col-sm-6 lbldetalle">Primer apellido:</label>
                       <label class="col-sm-6 control-label"><?php echo $ben->primerApellido; ?></label>
                     </div>
                   </td>
                 </tr>
                 <tr>
                  <td>
                   <div class="col-md-12">
                     <label class="col-sm-6 lbldetalle">Segundo apellido:</label>
                     <label class="col-sm-6 control-label"><?php echo $ben->segundoApellido; ?></label>
                   </div>
                 </td>
               </tr>
               <tr>
                <td>
                 <div class="col-md-12">
                   <label class="col-sm-6 lbldetalle">Nombre:</label>
                   <label class="col-sm-6 control-label"><?php echo $ben->nombres; ?></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
               <div class="col-md-12">
                 <label class="col-sm-6 lbldetalle">Identificación oficial:</label>
                 <label class="col-sm-6 control-label"><?php echo $ben->nomTipoI; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Nivel de estudio:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->nivelEstudios; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Seguridad social:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->seguridadSocial; ?></label>
           </div>
         </td>
       </tr>
       <tr>
        <td>
         <div class="col-md-12">
           <label class="col-sm-6 lbldetalle">Discapacidad:</label>
           <label class="col-sm-6 control-label"><?php echo $ben->discapacidad; ?></label>
         </div>
       </td>
     </tr>
     <tr>
      <td>
        <div class="col-md-12">
         <label class="col-sm-6 lbldetalle">Beneficiario Colectivo:</label>
         <label class="col-sm-6 control-label"><?php if($ben->beneficiarioColectivo=1 ){
          echo "Si";} else {echo"No";}?></label>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-6-->
<div class="col-md-6">
  <div class="block-web">
    <div class="header">
      <h3 class="content-header h3subtitulo">Vialidad</h3>
    </div>
    <div class="porlets-content">
      <div class="panel-body">
        <div class="col-md-12">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>
                  <div class="col-md-12">
                    <label class="col-sm-6 lbldetalle">Vialidad:</label>
                    <label class="col-sm-6 control-label"><?php echo $ben->tipoVialidad; ?></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                 <div class="col-md-12">
                   <label class="col-sm-6 lbldetalle">Nombre de la vidalidad:</label>
                   <label class="col-sm-6 control-label"><?php echo $ben->nombreVialidad; ?></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
               <div class="col-md-12">
                 <label class="col-sm-6 lbldetalle">Número exterior:</label>
                 <label class="col-sm-6 control-label"><?php echo $ben->noExterior; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Numero interior:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->noInterior; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Asentamiento:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->nombreAsentamiento; ?></label>
           </div>
         </td>
       </tr>
       <tr>
        <td>
         <div class="col-md-12">
           <label class="col-sm-6 lbldetalle">Localidad:</label>
           <label class="col-sm-6 control-label"><?php echo $ben->localidad; ?></label>
         </div>
       </td>
     </tr>
     <tr>
      <td>
       <div class="col-md-12">
         <label class="col-sm-6 lbldetalle">Entre vialidades:</label>
         <label class="col-sm-6 control-label"><?php echo $ben->entreVialidades; ?></label>
       </div>
     </td>
   </tr>
   <tr>
    <td>
     <div class="col-md-12">
       <label class="col-sm-6 lbldetalle">Descripción de la ubicación:</label>
       <label class="col-sm-6 control-label"><?php echo $ben->descripcionUbicacion; ?></label>
     </div>
   </td>
 </tr>
</tbody>
</table>
</div>
</div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-6-->
</div><!--/row-->
<div class="row">
  <div class="col-md-6">
    <div class="block-web">
      <div class="header">
        <h3 class="content-header h3subtitulo">Estado social</h3>
      </div>
      <div class="porlets-content">
        <div class="panel-body">
          <div class="col-md-12">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td>
                    <div class="col-md-12">
                     <label class="col-sm-6 lbldetalle">Estudio socioeconomico:</label>
                     <label class="col-sm-6 control-label"><?php if($ben->estudioSocioeconomico==1 ){
                      echo "Si";} else {echo"No";}?></label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                   <div class="col-md-12">
                     <label class="col-sm-6 lbldetalle">Jefe de familia:</label>
                     <label class="col-sm-6 control-label"><?php if($ben->jefeFamilia==1 ){
                      echo "Si";} else {echo"No";}?></label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                   <div class="col-md-12">
                     <label class="col-sm-6 lbldetalle">Estado civil:</label>
                     <label class="col-sm-6 control-label"><?php echo $ben->estadoCivil; ?></label>
                   </div>
                 </td>
               </tr>
               <tr>
                <td>
                 <div class="col-md-12">
                   <label class="col-sm-6 lbldetalle">Ocupación:</label>
                   <label class="col-sm-6 control-label"><?php echo $ben->ocupacion; ?></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
               <div class="col-md-12">
                 <label class="col-sm-6 lbldetalle">Ingreso mensual:</label>
                 <label class="col-sm-6 control-label"><?php echo $ben->ingresoMensual; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Nivel de estudio:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->nivelEstudios; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Integrantes familia:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->integrantesFamilia; ?></label>
           </div>
         </td>
       </tr>
       <tr>
        <td>
         <div class="col-md-12">
           <label class="col-sm-6 lbldetalle">Dependientes economicos:</label>
           <label class="col-sm-6 control-label"><?php echo $ben->dependientesEconomicos; ?></label>
         </div>
       </td>
     </tr>
     <tr>
      <td>
        <div class="col-md-12">
         <label class="col-sm-6 lbldetalle">Grupo vulnerable:</label>
         <label class="col-sm-6 control-label"><?php echo $ben->grupoVulnerable; ?></label>
       </div>
     </td>
   </tr>
 </tbody>
</table>
</div>
</div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-6-->

<div class="col-md-6">
  <div class="block-web">
    <div class="header">
      <h3 class="content-header h3subtitulo">Vivienda</h3>
    </div>
    <div class="porlets-content">
      <div class="panel-body">
        <div class="col-md-12">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>
                  <div class="col-md-12">
                   <label class="col-sm-6 lbldetalle">Tipo de vivienda:</label>
                   <label class="col-sm-6 control-label"><?php echo $ben->vivienda; ?></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
               <div class="col-md-12">
                 <label class="col-sm-6 lbldetalle">Número de habitantes:</label>
                 <label class="col-sm-6 control-label"><?php echo $ben->noHabitantes; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Electricidad:</label>
               <label class="col-sm-6 control-label"><?php if($ben->viviendaElectricidad==1 ){
                echo "Si";} else {echo"No";}?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Agua:</label>
               <label class="col-sm-6 control-label"><?php if($ben->viviendaAgua==1 ){
                echo "Si";} else {echo"No";}?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Drenaje:</label>
               <label class="col-sm-6 control-label"><?php if($ben->viviendaDrenaje==1 ){
                echo "Si";} else {echo"No";}?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Gas:</label>
               <label class="col-sm-6 control-label"><?php if($ben->viviendaGas==1 ){
                echo "Si";} else {echo"No";}?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Teléfono:</label>
               <label class="col-sm-6 control-label"><?php if($ben->viviendaTelefono==1 ){
                echo "Si";} else {echo"No";}?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Internet:</label>
               <label class="col-sm-6 control-label"><?php if($ben->viviendaDrenaje==1 ){
                echo "Si";} else {echo"No";}?></label>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-6-->
</div><!--/row-->
<div class="row">
  <div class="col-md-12">
    <div class="block-web">
      <div class="header">
        <h3 class="content-header h3subtitulo">Apoyos generados</h3>
      </div>
      <div class="porlets-content">
        <div class="panel-body">
          <?php $i=1; foreach ($infoApoyo as $infoApoyo): ?>
          <div class="col-md-6">
           <table class="table table-striped">
            <tbody>
              <tr>
                <td>
                  <div class="col-md-12">   
                   <label class="col-sm-5 lblinfo" style="margin-top: 5px; color:#607D8B;"><b>Información del <?php echo $i ?>° apoyo</b></label>
                 </div>
               </td>
             </tr>
             <tr>
              <td>
                <div class="col-md-12">
                 <label class="col-sm-4 lbl-detalle"><b>Dirección que lo apoya:</b></label>
                 <label class="col-sm-7 control-label"><?php echo $infoApoyo->direccion ?></label>
               </div>
               <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Tipo de apoyo:</b></label>
                <label class="col-sm-7 control-label"><?php echo $infoApoyo->tipoApoyo; ?></label>
              </div>
              <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Origen:</b></label>
                <label class="col-sm-7 control-label"><?php echo $infoApoyo->origen; ?></label>
              </div>
              <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Programa:</b></label>
                <label class="col-sm-7 control-label"><?php echo $infoApoyo->programa; ?></label>
              </div>
              <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Subprograma:</b></label>
                <label class="col-sm-7 control-label"><?php echo $infoApoyo->subprograma; ?></label>
              </div>
              <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Periodicidad:</b></label>
                <label class="col-sm-7 control-label"><?php echo $infoApoyo->periodicidad; ?></label>
              </div>
              <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Programa social:</b></label>
                <label class="col-sm-7 control-label" style="color:red"><strong>P E N D I E N T E</strong></label>
              </div>
              <div class="col-md-12">
                <label class="col-sm-4 lbl-detalle"><b>Importe:</b></label>
                <label class="col-sm-7 control-label">$ <?php echo $infoApoyo->importeApoyo; ?></label>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php  
    if ($i%2==0){
      echo "<hr>";
    }$i++;
  endforeach; 
  ?>
</div>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--/block-web--> 
</div><!--/row-col-md-12--> 
</div><!--/container clear_both padding_fix-->


