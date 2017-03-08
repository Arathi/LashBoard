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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{!! url('home') !!}"><b>La</b>shboard</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">注册新用户</p>

    <form action="{!! url('register') !!}" method="post">
      {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="用户名">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="nickname" value="{{ old('nickname') }}" class="form-control" placeholder="昵称">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password"  name="password" class="form-control" placeholder="请输入密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_confirmation" class="form-control" placeholder="请确认密码">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> 我同意<a href="#">用户协议</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{!! url('login') !!}" class="text-center">已有账户？点此登陆</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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
