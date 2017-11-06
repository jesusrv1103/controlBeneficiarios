<div class="container clear_both padding_fix">
 <div class="row">
   <div class="col-md-12">
    <div class="invoice_header">
      <div class="block-web">
       <div class="header" style="margin-bottom: -49px;">
        <div class="row" style="margin-top: 10px; margin-bottom: 20px;">
          <div class="col-sm-3">
            <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Subprogramas</h2>
          </div>
          <div class="col-sm-5">
            <div class="input-group">
             <input type="text" class="form-control">
             <span class="input-group-btn">
               <button type="button" class="btn btn-default"><i class="fa fa-search"></i> Buscar </button>
             </span>
           </div>
         </div>
         <div class="col-md-4" style=" margin-top: 3px;">
          <div class="btn-group pull-right">
            <b>
              <?php if($_SESSION['tipoUsuario']==1){?>
              <div class="btn-group" style="margin-right: 10px;"> 
                <a href="?c=Subprograma&a=Crud" class="btn btn-sm btn-success tooltips" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Registrar nuevo subprograma"> <i class="fa fa-plus"></i> Registrar </a>
                <a class="btn btn-sm  tooltips btn-warning"  href="#modalImportar" style="margin-right: 10px;"  data-toggle="modal" data-target="#modalImportar" data-original-title="Importar subprogramas" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-upload"></i>&nbsp;Importar</a>
                <a href="assets/files/subprogramas.xlsx" download="subprogramas.xlsx" class="btn btn-sm btn-primary tooltips" data-original-title="Descargar archivo subprogramas.xlsx" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="bottom" title=""> <i class="fa  fa-download"></i>&nbsp;Descargar</a> 
              </div>
              <?php } ?>
            </b>
          </div>
        </div>    
      </div>
      <?php if(isset($mensaje)){ if(!isset($error)){?>
      <div class="row" style="margin-bottom: -5px; margin-top: 10px">
        <div class="col-md-12">
          <div class="alert alert-success fade in">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-check"></i>&nbsp;<?php echo $mensaje; ?>
          </div>
        </div>
      </div> 
      <?php } if(isset($error)){ ?>
      <div class="row" style="margin-bottom: -5px; margin-top: 10px">
        <div class="col-md-12">
          <div class="alert alert-danger">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="fa fa-warning"></i>&nbsp;<?php echo $mensaje; ?>
          </div>
        </div>
      </div>
      <?php } }?>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="container clear_both padding_fix">
 <div class="row">
   <div class="col-md-12">
     <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header lblheader">Programa 1</h3>
            </div>
       <div class="porlets-content">
        <div class="row">
         <div class="col-md-6">
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa1.jpg" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">

             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 1</div>
             <span>Descripción de subprograma 1</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
         </div>
         <div class="col-md-6">
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa2.jpg" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">

             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 2</div>
             <span>Descripción de subprograma 2</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
         </div>
         <div class="col-md-6">
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa3.jpg" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">

             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 3</div>
             <span>Descripción de subprograma 3</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
         </div>
         <div class="col-md-6">
           <!--div class="ticket_open"-->
           <a href="#" class="open_ticket_comment">
             <div class="open_ticket_thumnail">
               <img src="assets/images/programa4.png" alt="" style="max-width: 80px; max-height: 80px; margin-top: 5px; margin-left: 10px; margin-right: 20px;">

             </div>
             <div class="ticket_problem" style="margin-top: 10px;">Subprograma 4</div>
             <span>Descripción de subprograma 4</span>
             <p><b>Periodo:</b> 29/09/2017 - 20/09/2018</p>
             <div class="ticket_action" style="margin-top: -45px;">
               <div class="ticket_action_view">i</div>
             </div>
           </a>
           <!--/div-->
         </div>
       </div>
     </div><!--/porlets-content-->
   </div><!--/block-web-->
 </div><!--/col-md-12-->
</div><!--/row-->
</div><!--/container clear_both padding_fix-->

