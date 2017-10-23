 <style type="text/css">
 .lbldetalle{
  color:blue;
}
</style>

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Beneficiarios</h2>
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
              <h2 class="content-header" style="margin-top: -10px;"><label class="theme_color">Beneficiario:</label> <?php echo $ben->nombres." ".$ben->primerApellido." ".$ben->segundoApellido; ?></h2>
            </div>                         
          </div><!--/block-web--> 
        </div><!--/row--> 
      </div><!--/header-->
      <div class="row">
        <div class="col-md-6">
          <div class="block-web">
            <div class="header">
              <h3 class="content-header">Datos generales</h3>
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
                   <label class="col-sm-6 control-label"><?php echo $ben->identificacion; ?></label>
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
               <label class="col-sm-6 lbldetalle">Tipo de seguridad:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->curp; ?></label>
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
           <label class="col-sm-6 control-label"><?php echo $ben->beneficiarioColectivo; ?></label>
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
      <h3 class="content-header">Vialidad</h3>
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
                    <label class="col-sm-6 control-label"><?php echo $ben->vialidad; ?></label>
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
                 <label class="col-sm-6 control-label"><?php echo $ben->numeroExterior; ?></label>
               </div>
             </td>
           </tr>
           <tr>
            <td>
             <div class="col-md-12">
               <label class="col-sm-6 lbldetalle">Numero interior:</label>
               <label class="col-sm-6 control-label"><?php echo $ben->numeroInterior; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Asentamiento:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->asentamiento; ?></label>
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
        <h3 class="content-header">Estado social</h3>
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
                     <label class="col-sm-6 control-label"><?php echo $ben->estudioSocioeconomico; ?></label>
                   </div>
                 </td>
               </tr>
               <tr>
                <td>
                 <div class="col-md-12">
                   <label class="col-sm-6 lbldetalle">Jefe de familia:</label>
                   <label class="col-sm-6 control-label"><?php echo $ben->jefeFamilia; ?></label>
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
      <h3 class="content-header">Vivienda</h3>
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
                   <label class="col-sm-6 control-label"><?php echo $ben->tipoVivienda; ?></label>
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
               <label class="col-sm-6 control-label"><?php echo $ben->viviendaElectricidad; ?></label>
             </div>
           </td>
         </tr>
         <tr>
          <td>
           <div class="col-md-12">
             <label class="col-sm-6 lbldetalle">Agua:</label>
             <label class="col-sm-6 control-label"><?php echo $ben->viviendaAgua; ?></label>
           </div>
         </td>
       </tr>
       <tr>
        <td>
         <div class="col-md-12">
           <label class="col-sm-6 lbldetalle">Drenaje:</label>
           <label class="col-sm-6 control-label"><?php echo $ben->viviendaDrenaje; ?></label>
         </div>
       </td>
     </tr>
     <tr>
      <td>
       <div class="col-md-12">
         <label class="col-sm-6 lbldetalle">Gas:</label>
         <label class="col-sm-6 control-label"><?php echo $ben->viviendaGas; ?></label>
       </div>
     </td>
   </tr>
   <tr>
    <td>
     <div class="col-md-12">
       <label class="col-sm-6 lbldetalle">Teléfono:</label>
       <label class="col-sm-6 control-label"><?php echo $ben->viviendaTelefono; ?></label>
     </div>
   </td>
 </tr>
 <tr>
  <td>
   <div class="col-md-12">
     <label class="col-sm-6 lbldetalle">Internet:</label>
     <label class="col-sm-6 control-label"><?php echo $ben->viviendaInternet; ?></label>
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
</div><!--/block-web--> 
</div><!--/row-col-md-12--> 
</div><!--/container clear_both padding_fix-->


