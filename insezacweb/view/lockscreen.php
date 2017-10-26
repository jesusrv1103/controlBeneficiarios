<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>LockScreen</title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<style>
#logosezac{
  max-width: 25%; 
  margin-left: 20px; 
}
#titulo{
  margin-bottom: -100px;
  margin-top: -70px;
}
</style>
<body class="light_theme  fixed_header left_nav_fixed">
 <img src="assets/images/sezac.png" style="" id="logosezac">
 <div id="titulo">
  <center><h1 style="color:white"><b>INSEZAC</b></h1></center>
</div>
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="lock_page">
    <div class="lock_content">
      <div class="lock_image"><img style="max-width: 100%;" src="assets/images/lock.png" alt="lock" /><h5 style="margin-top: 5px;">Acceso de administrador</h5></div>	<br><br>
      <?php if(isset($error)){ ?>
      <div class="alert alert-danger">
        <i class="fa fa-warning"></i><?php echo $error?>
      </div>
      <?php } ?>
      <form role="form" class="form-horizontal" method="post" action="?c=Lockscreen&a=Acceso&ct=<?php echo $c;?>&at=<?php echo $a;?><?php if(isset($_REQUEST['idUsuario'])){?>&idUsuario=<?php echo $idUsuario; }?>">
        <div class="form-group">
          <div class="col-sm-10">
            <input autofocus type="password" placeholder="Contraseña" id="inputPassword3" class="form-control" name="password" autocomplete="false">
          </div>
        </div>
        <div class="form-group">
          <div class=" col-sm-10">
            <div class="checkbox checkbox_margin">
              <button class="btn btn-default pull-right" type="submit">
                <i class="fa fa-unlock-alt"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-10" style="margin-top: -25px">
            <a href="?c=usuario">Volver</a>
         </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<script src="assets/js/jquery-2.1.0.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/common-script.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
</body>
</html>
