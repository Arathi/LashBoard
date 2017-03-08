@extends('layouts.auth_base')

@section('page-type', 'login-page')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('home') }}"><b>La</b>shboard</a>
  </div>
  
  <div class="login-box-body">
    <p class="login-box-msg">用户登录</p>

    <form action="{{ route('login') }}" method="post">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input id="password" type="password" class="form-control" name="password" placeholder="请输入密码" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
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

    <a href="{{ route('password.request') }}">忘记密码？点此重置</a><br>
    <a href="{{ route('register') }}">没有账号？点此注册</a>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
