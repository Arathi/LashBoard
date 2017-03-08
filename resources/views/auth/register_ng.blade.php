@extends('layouts.auth_base')

@section('page-type', 'register-page')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('home') }}"><b>La</b>shboard</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">注册新用户</p>

    <form action="{{ route('register') }}" method="POST">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="用户名" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
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

      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="请确认密码" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="row">

        <div class="col-xs-8">
          <!--
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> 我同意<a href="#">用户协议</a>
            </label>
          </div>
          -->
        </div>
        <!-- /.col -->

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ route('login') }}" class="text-center">已有账户？点此登陆</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection
