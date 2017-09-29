<?php
include_once './model/database.php';
//session_start();

//$usuario = $_SESSION['login'];
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

  <link href="assets/plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/select2.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
  <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
</head>
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
            <?php if($inicio==true){ ?>
            <li class="left_nav_active theme_border"><a href="?c=Inicio"> <i class="fa fa-home"></i> Inicio </a></li>
            <?php  }else{ ?>
            <li class="theme_border"><a href="?c=Inicio"> <i class="fa fa-home"></i> Inicio </a></li>
            <?php } ?>

            <?php if($administracion==true){ ?>
            <li class="left_nav_active theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Administración <span class="plus"><i class="fa fa-plus"></i></span></a>
              <ul class="opened" style="display:block">
                <?php  }else{ ?>
                <li class="theme_border"> <a href="javascript:void(0);"> <i class="fa fa-briefcase"></i> Administración <span class="plus"><i class="fa fa-plus"></i></span></a>
                  <ul>
                    <?php } ?>
                    <li> <a href="?c=Programa&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Programas</b> </a> </li>
                    <li> <a href="?c=Subprograma&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Subprogramas</b> </a> </li>
                    <li> <a href="?c=Beneficiario&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Beneficiarios</b> </a> </li>
                    <li> <a href="?c=Usuario&a=Index"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Usuarios</b> </a> </li>
                  </ul>
                </li>
                <?php if($beneficiarios==true){ ?>
                <li class="left_nav_active theme_border"> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i> Beneficiarios <span class="plus"><i class="fa fa-plus"></i></span></a>
                  <ul class="opened" style="display:block">
                   <?php  }else{ ?>
                   <li class="theme_border"> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i> Beneficiarios <span class="plus"><i class="fa fa-plus"></i></span></a>
                    <ul>
                     <?php } ?>

                     <li> <a href="#"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Consultar datos</b> </a> </li>
                     <li> <a href="#"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Registrar beneficiario</b> </a> </li>
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
      <script type="text/javascript"  src="assets/plugins/dropzone/dropzone.min.js"></script> 
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

      <script src="assets/js/jPushMenu.js"></script> 
      <script src="assets/js/side-chats.js"></script>

    </body>
    </html>
