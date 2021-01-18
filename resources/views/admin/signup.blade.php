<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>{{$context['title']}}</title>

  <!-- Bootstrap CSS -->
  <link href="{{asset('admincss/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('admincss/css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('admincss/css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('admincss/css/font-awesome.css')}}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{asset('admincss/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/css/style-responsive.css')}}" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="POST" >
        @csrf
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="nama" name="name" id="name" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_email"></i></span>
          <input type="text" class="form-control" placeholder="email" name="email" id="email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="password" name="password" id="password">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="confirm password" name="password2" id="password2">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
        <label>
          <span class="pull-right"> Sudah punya akun ? </span>
        </label>
        <a href="{{Route('login')}}" class="btn btn-info btn-lg btn-block">LOGIN</a>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
    </div>
  </div>


</body>

</html>
