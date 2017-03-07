<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ cdn_asset('bootstrap') }}/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ cdn_asset('font-awesome') }}/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{ cdn_asset('ionicons') }}/css/ionicons.min.css" />
  <link rel="stylesheet" href="{{ cdn_asset('admin-lte') }}/css/AdminLTE.min.css" />
  <link rel="stylesheet" href="{{ cdn_asset('iCheck') }}/skins/square/blue.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{!! url('home') !!}"><b>La</b>shboard</a>
  </div>
  
  <div class="login-box-body">
    <p class="login-box-msg">用户登录</p>

    <form action="{!! url('login') !!}" method="post">
      {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="请输入密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> 记住我
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#">忘记密码？点此重置</a><br>
    <a href="{!! url('register') !!}" class="text-center">没有账号？点此注册</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ cdn_asset('jquery') }}/jquery.min.js"></script>
<script src="{{ cdn_asset('bootstrap') }}/js/bootstrap.min.js"></script>
<script src="{{ cdn_asset('iCheck') }}/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
