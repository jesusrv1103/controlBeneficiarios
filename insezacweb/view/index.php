<?php
include_once './model/database.php';
if (!isset($_SESSION['seguridad'])){
  header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>INSEZAC</title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/admin.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
  <link href="assets/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
  <link href="assets/plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/select2.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
  <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
  <link href="assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
  <link href="assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
  <link href="assets/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
  <link href="assets/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/plugins/file-uploader/css/blueimp-gallery.min.css">
  <link rel="stylesheet" href="assets/plugins/file-uploader/css/jquery.fileupload.css">
  <link rel="stylesheet" href="assets/plugins/file-uploader/css/jquery.fileupload-ui.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" href="assets/plugins/select2/dist/css/select2.min.css">

<!--Estilos Para radio buton y switch -->
  <link href="assets/plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/checkbox/icheck.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/checkbox/minimal/blue.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/checkbox/minimal/green.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/checkbox/minimal/grey.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/checkbox/minimal/orange.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/checkbox/minimal/pink.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/checkbox/minimal/purple.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">

</head>
<style type="text/css">
.disabled {
  pointer-events:none; /*This makes it not clickable*/
  opacity:0.6;         /*This grays it out to look disabled*/
}
 .lblheader{
  color:#2196F3;
}
</style>
<body class="light_theme  fixed_header left_nav_fixed" style="background-color: #EEEEEE">
  <div class="wrapper">
    <!--\\\\\\\ wrapper Start \\\\\\-->
    <div class="header_bar">
      <!--\\\\\\\ header Start \\\\\\-->
      <div class="brand">
        <!--\\\\\\\ brand Start \\\\\\-->
        <!--div class="logo" style="display:block"><h2 style="margin-top: -5px;"><span class="theme_color">INSEZAC</span></h2></div-->
        <div class="logo" style="display:block"><img width="100%" style="margin-top: -25px;" src="assets/images/sezac.png"></div>

        <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
      </div>
      <!--\\\\\\\ brand end \\\\\\-->
      <div class="header_top_bar">
        <!--\\\\\\\ header top bar start \\\\\\-->
        <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
        <div class="top_left_bar">
          <h1>INSEZAC</h1>
        </div>
        <div class="top_right_bar">
          <div style="margin-top: -33%;">
            <span class="user_adminname">Hola <?php echo $_SESSION['usuario']; ?></span> 
            <span class="user_adminname"><a href="?c=Login&a=logout"><i class="fa fa-power-off"></i> Salir</span></a>
          </div>
        </div>
      </div>
      <!--\\\\\\\ header top bar end \\\\\\-->
    </div>
    <!--\\\\\\\ header end \\\\\\-->
    <div class="inner">
      <!--\\\\\\\ inner start \\\\\\-->
      <div class="left_nav">
        <!--\\\\\\\left_nav start \\\\\\-->
        <br>
        <div class="left_nav_slidebar">
          <ul>
           <?php if (isset($inicio)){ ?>
           <li class="left_nav_active theme_border"> 
            <?php } else { ?>
            <li class="theme_border">
              <?php } ?>
              <a href="?c=Inicio"> <i class="fa fa-home"></i> Inicio </a>
            </li>
            <?php if(isset($administracion)){ ?>
            <li class="left_nav_active theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Administración <span class="plus"><i class="fa fa-plus"></i></span></a>
              <ul class="opened" style="display:block">
                <?php  }else{ ?>
                <li class="theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Administración <span class="plus"><i class="fa fa-plus"></i></span></a>
                  <ul>
                    <?php }  ?>
                    <li> 
                      <a href="?c=Beneficiario"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                       <?php if (isset($beneficiarios)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Beneficiarios</b>
                     </a> 
                   </li>
                   <br><br>
                   <li> 
                    <a href="?c=Apoyos"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                     <?php if (isset($apoyos)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Apoyos</b>
                   </a> 
                 </li><br><br>
                 <?php if($_SESSION['tipoUsuario']==1){?> 
                 <li> 
                  <a href="?c=Usuario"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                   <?php if (isset($usuarios)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Usuarios</b>
                 </a> 
               </li><br><br>
               <li> 
                <a href="?c=Direccion"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                 <?php if (isset($direccion)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Direcciones</b>
               </a> 
             </li><br><br>
               <?php } ?>
             </ul>
           </li>
           <?php if(isset($catalogos)){ ?>
           <li class="left_nav_active theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Catálogos <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul class="opened" style="display:block">
              <?php  }else{ ?>
              <li class="theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Catálogos <span class="plus"><i class="fa fa-plus"></i></span></a>
                <ul>
                  <?php }  ?>
                  <li> 
                    <a href="?c=Catalogos&a=Beneficiarios"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                      <?php if (isset($beneficiarios2)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Beneficiarios</b>                 </a> 
                    </li><br><br>
                    <li> 
                      <a href="?c=Localidad"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                       <?php if (isset($localidades)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Localidades</b>
                     </a> 
                   </li><br><br>
                   <li> 
                    <a href="?c=Asentamiento"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                     <?php if (isset($asentamientos)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Asentamientos</b>
                   </a> 
                 </li><br><br>
                 <li> 
                    <a href="?c=Municipio"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                     <?php if (isset($municipios)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Municipios</b>
                   </a> 
                 </li><br><br>
                 <li> 
                  <a href="?c=Catalogos&a=Apoyos"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                   <?php if (isset($apoyos2)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Apoyos</b>
                 </a> 
               </li><br><br>
               <li> 
                <a href="?c=Programa"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                  <?php if (isset($programas)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Programas</b> 
                </a> 
              </li><br><br>
              <li> 
                <a href="?c=Subprograma"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                 <?php if (isset($subprogramas)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Subprogramas</b>
               </a> 
             </li><br><br>
           </ul>
         </li>
       </ul>
     </div>
   </div>
   <!--\\\\\\\left_nav end \\\\\\-->
   <div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->

    <?php include($page); ?>      

  </div>
  <!--\\\\\\\ content panel end \\\\\\-->
</div>
<!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<script src="assets/js/jquery-2.1.0.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/common-script.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript"  src="assets/plugins/toggle-switch/toggles.min.js"></script> 
<script src="assets/plugins/checkbox/zepto.js"></script>
<script src="assets/plugins/checkbox/icheck.js"></script>
<script src="assets/js/icheck-init.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
<script type="text/javascript" src="assets/js/form-components.js"></script> 
<script type="text/javascript"  src="assets/plugins/input-mask/jquery.inputmask.min.js"></script> 
<script type="text/javascript"  src="assets/plugins/input-mask/demo-mask.js"></script> 
<script type="text/javascript"  src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script> 
<script type="text/javascript"  src="assets/plugins/dropzone/dropzone.min.js"></script> 
<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
<script src="assets/js/jPushMenu.js"></script> 
<script src="assets/plugins/validation/parsley.min.js"></script>
<script src="assets/plugins/data-tables/jquery.dataTables.js"></script>
<script src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<script src="assets/plugins/data-tables/dynamic_table_init.js"></script>
<script src="assets/plugins/edit-table/edit-table.js"></script>
<script src="assets/plugins/file-uploader/js/vendor/jquery.ui.widget.js"></script>
<script src="assets/plugins/file-uploader/js/jquery.iframe-transport.js"></script>
<script src="assets/plugins/file-uploader/js/jquery.fileupload.js"></script>
<script src="assets/plugins/validation/parsley.min.js"></script>
<script src="assets/plugins/select2/dist/js/select2.full.min.js"></script>
<script>

  //****Subir archivos automaicos*****

  $(document).on('ready', function() {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'assets/';
    $('#fileupload').fileupload({
      url: url,
      dataType: 'json',
      done: function (e, data) {
        $.each(data.result.files, function (index, file) {
          $('<p/>').text(file.name).appendTo('#files');
        }); 
      },
      progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
          'width',
          progress + '%'
          );
      }
    }).prop('disabled', !$.support.fileInput)
    .parent().addClass($.support.fileInput ? undefined : 'disabled');
  });

  //***Elimina archivos existentes para importar otros archivos*******

  $('.catalogos').change(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'assets/process.php?file=catalogo_beneficiarios.xlsx',
      type: 'post',
      dataType: 'json'
    })

  });

  $('.asentamientos').change(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'assets/process.php?file=asentamientos.xlsx',
      type: 'post',
      dataType: 'json'
    })
  });

  $('.localidades').change(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'assets/process.php?file=localidades.xlsx',
      type: 'post',
      dataType: 'json'
    })
  });

  $('.beneficiarios').change(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'assets/process.php?file=beneficiarios.xlsx',
      type: 'post',
      dataType: 'json'
    })
  });

  $('.minimize').click(function(e){
    var h = $(this).parents(".header");
    var c = h.next('.porlets-content');
    var p = h.parent();

    c.slideToggle();

    p.toggleClass('closed');

    e.preventDefault();
  });

  $('.refresh').click(function(e){
    var h = $(this).parents(".header");
    var p = h.parent();
    var loading = $('&lt;div class="loading"&gt;&lt;i class="fa fa-refresh fa-spin"&gt;&lt;/i&gt;&lt;/div&gt;');

    loading.appendTo(p);
    loading.fadeIn();
    setTimeout(function() {
      loading.fadeOut();
    }, 1000);

    e.preventDefault();
  });

  $('.close-down').click(function(e){
    var h = $(this).parents(".header");
    var p = h.parent();

    p.fadeOut(function(){
      $(this).remove();
    });
    e.preventDefault();
  });

  
</script>
<script>
  //*******SELEC2********
  $(document).on('ready', function()  {

    //Initialize Select2 Elements
    $('.select2').select2()

    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

</body>
</html>
