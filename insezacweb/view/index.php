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
</head>
<style type="text/css">
  .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
<body class="light_theme  fixed_header left_nav_fixed">
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
            <span class="user_adminname">Hola <?php echo $_SESSION['user_session']; ?></span> 
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
           <?php if (isset($inicio)){  ?>
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
                      <a href="?c=Programa&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                        <?php if (isset($programas)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Programas</b> 
                      </a> 
                    </li>
                    <li> 
                      <a href="?c=Subprograma&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                       <?php if (isset($subprogramas)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Subprogramas</b>
                     </a> 
                   </li>
                   <li> 
                    <a href="?c=Apoyos&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                     <?php if (isset($apoyos)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Apoyos</b>
                   </a> 
                 </li>
                 <li> 
                  <a href="?c=Beneficiario&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                   <?php if (isset($beneficiarios)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Beneficiarios</b>
                 </a> 
               </li>
               <li> 
                <a href="?c=Usuario&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                 <?php if (isset($usuarios)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Usuarios</b>
               </a> 
             </li>
           </ul>
         </li>
         <?php if(isset($catalogos)){ ?>
         <li class="left_nav_active theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Catalogos <span class="plus"><i class="fa fa-plus"></i></span></a>
          <ul class="opened" style="display:block">
            <?php  }else{ ?>
            <li class="theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Catalogos <span class="plus"><i class="fa fa-plus"></i></span></a>
              <ul>
                <?php }  ?>
                <li> 
                  <a href="?c=Catalogos&a=Beneficiarios"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                   <?php if (isset($beneficiarios2)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Beneficiarios</b>
                 </a> 
               </li>
               <li> 
                <a href="?c=Localidad&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
                 <?php if (isset($localidades)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Localidades</b>
               </a> 
             </li>
             <li> 
              <a href="?c=Asentamiento&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
               <?php if (isset($asentamientos)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Acentamientos</b>
             </a> 
           </li>
           <li> 
            <a href="?c=Apoyos&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> 
             <?php if (isset($apoyos)){ ?><b class="theme_color"><?php } else { ?> <b> <?php } ?>Apoyos</b>
           </a> 
         </li>
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
<script src="assets/plugins/validation/parsley.min.js"></script>
<script src="assets/plugins/data-tables/jquery.dataTables.js"></script>
<script src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<script src="assets/plugins/data-tables/dynamic_table_init.js"></script>
<script src="assets/plugins/edit-table/edit-table.js"></script>
<script type="text/javascript"  src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script> 
<script src="assets/plugins/file-uploader/js/vendor/jquery.ui.widget.js"></script> 
<script src="assets/plugins/file-uploader/js/tmpl.min.js"></script> 
<script src="assets/plugins/file-uploader/js/load-image.min.js"></script> 
<script src="assets/plugins/file-uploader/js/canvas-to-blob.min.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.blueimp-gallery.min.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.iframe-transport.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.fileupload.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.fileupload-process.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.fileupload-image.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.fileupload-audio.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.fileupload-video.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.fileupload-validate.js"></script> 
<script src="assets/plugins/file-uploader/js/jquery.fileupload-ui.js"></script> 
<script src="assets/plugins/file-uploader/js/main.js"></script>
<script>

  /*==Porlets Actions==*/
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
<!-- The template to display files available for upload -->
<script src="assets/js/jPushMenu.js"></script> 
</body>
</html>
