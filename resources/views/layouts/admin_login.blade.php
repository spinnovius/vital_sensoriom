<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Sensoriom | Login</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->        
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/otherrole/assets/images/favicon.png') }}">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('public/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('public/plugins/iCheck/square/blue.css') }}">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
</head>
<body class="hold-transition login-page">
    <!--<div class="login-box">-->
        <!-- content -->
        @yield('content')
    <!--</div>-->
    <!-- footer -->
    <footer>
        <!-- jQuery 3 -->
        <script src="{{ asset('public/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{ asset('public/plugins/iCheck/icheck.min.js')}}"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </footer>
</body>
</html>