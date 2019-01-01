<!DOCTYPE html>
<html lang="en">
<!-- start: HEAD -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Administration Dashboard') :: gamify v3</title>
    <!-- start: META -->
    <meta content="gamify v3: A Gamification Platform - Administration" name="description">
    <meta content="Paco Orozco" name="author">
    @yield('meta')
            <!-- end: META -->
    <!-- start: GLOBAL CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
            <!-- end: GLOBAL CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    @yield('styles')
            <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/AdminLTE/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gamify.css') }}">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('//oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    @yield('styles')
            <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>
<!-- start: BODY -->
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <strong>gamify</strong> v3
    </div>

    <!-- start: NOTIFICATIONS -->
    @include('partials.notifications')
    <!-- end: NOTIFICATIONS -->

    <div class="login-box-body">
        @yield('content')
    </div>
</div>

<!-- start: GLOBAL JAVASCRIPT -->
<script src="{{ asset('vendor/AdminLTE/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- end: GLOBAL JAVASCRIPT -->
<!-- start: JAVASCRIPT REQUIRED FOR THIS PAGE ONLY -->
@yield('scripts')
        <!-- end: JAVASCRIPT REQUIRED FOR THIS PAGE ONLY -->
<!-- start: MAIN JAVASCRIPT -->
<script src="{{ asset('vendor/AdminLTE/js/adminlte.min.js') }}"></script>
<!-- end: MAIN JAVASCRIPT -->
</body>
<!-- end: BODY -->
</html>
