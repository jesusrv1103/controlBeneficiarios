<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>INSEZAC | LOGIN</title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<style>
body{
  background-color: white; 
  background-image: url(assets/images/sezac.png); 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-webkit-filter:blur(4px);
   background-filter:blur(4px);
  }
  
}

</style>
<body class="light_theme  fixed_header left_nav_fixed" style="">
  <div class="wrapper">
    <div class="login_page">
      <div class="login_content">
        <div class="panel-heading border login_heading">INICIAR SESIÓN</div>	
        <?php
        if(isset($error))
        {
          ?>
          <div class="alert alert-danger">
            <i class="glyphicon glyphicon-warning-sign"></i><?php echo $error?>
          </div>
          <?php
        }
        ?>
        <form role="form" action="?c=Login&a=Acceder" class="form-horizontal" method="post">
          <div class="form-group">
            <div class="col-sm-10">
              <input type="text" placeholder="Usuario" name="usuario" id="inputEmail3" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <input type="password" placeholder="Password" name="password" id="inputPassword3" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class=" col-sm-10">
              <button class="btn btn-success" style="width: 100%;">Acceder</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery-2.1.0.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/common-script.js"></script>
  <script src="assets/js/jquery.slimscroll.min.js"></script>
</body>
</html>
