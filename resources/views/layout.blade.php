<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" type="image/jpg" href="images/buiz-icon2.jpg">
    <link rel="apple-touch-icon" href="images/buiz-icon2.png">
    <title>@yield('pageTitle','Exámenes Online') @yield('pageName','| buiz.me')</title>
    <meta name="description" content="@yield('pageDescription','Buiz revoluciona los antiguos exámenes en papel. ¡Los exámenes nunca volverán a ser complicados de elaborar y contestar!')">
    <meta name="keywords" content="@yield('pageKeywords', 'school, education, teacher, student, quiz, test, exam, tool')">
    <!-- Vendors -->
    <link href="{{ asset('/components/normalize-css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('/components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/components/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('/components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/components/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- App -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <!-- External -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
    <!--[if lte IE 9]>
    <p class="browserupgrade">Tu navegador está <b>desactualizado</b>. Debes <a href="http://browsehappy.com/">actualizarlo</a> para mejorar la experiencia y seguridad.</p>
    <![endif]-->

    @yield('content')

</body>
</html>
