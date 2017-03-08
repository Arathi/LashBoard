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
<body class="hold-transition @yield('page-type')">

@yield('content')

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
