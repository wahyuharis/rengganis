
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=APP_NAME?> Login </title>
  <link rel="icon" href="<?=base_url('assets/'.FAV_ICON)?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('lte/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('lte/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/node_modules/toastr/build/toastr.min.css">
  <link rel="stylesheet" href="<?=base_url('lte/')?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><?=APP_NAME?></b></a>
    <br>
    <img width="50" height="50" src="<?=base_url('assets/'.APP_ICON)?>" >
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="login_form" action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="username"  placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('lte/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('lte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/node_modules/js-loading-overlay/dist/js-loading-overlay.min.js"></script>
<script src="<?=base_url()?>/node_modules/toastr/build/toastr.min.js"></script>

<script src="<?=base_url('lte/')?>dist/js/adminlte.min.js"></script>
<?php require_once 'login_script.php';  ?>
</body>
</html>
