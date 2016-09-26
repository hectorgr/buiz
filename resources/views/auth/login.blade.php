@extends('layout')

@section('pageName', ' ')
@section('pageTitle', 'Buiz | La mejor herramienta de exámenes online')
@section('pageDescription', 'Buiz revoluciona los antiguos exámenes en papel. ¡Los exámenes nunca volverán a ser complicados de elaborar y contestar!.')
@section('pageKeywords', 'escuela, educación, maestro, profesor, alumno, estudiante, examen, cuestionario, test, herramienta, online')

@section('content')

    <div class="cover-background">
        <img src="{{ url('images/background-main') }}<?php echo rand(1, 4); ?>.jpg" alt="buiz background">
    </div>

    <div class="login_wrapper">
        <div class="animate form login-form">
            <section class="login-content">
                <div class="login-logo">
                    <img class="img-responsive box-center" src="{{ url('images/buiz-logo-horizontal.png') }}" alt="Buiz logo">
                </div>

                <h1 class="sr-only">Buiz</h1>
                <p class="login-slogan text-center">¡ Crea y responde exámenes fácilmente !</p>
                <h2 class="text-center">Bienvenido a <strong class="appLogo">buiz</strong></h2>

                <form id="login" role="form" method="POST" action="{{ route('loginPost') }}" data-parsley-validate>

                    @if(Session::has('messageActivation'))
                        <div class="alert alert-success" id="successMsg">
                            <button type="button" class="close" aria-label="Cerrar" onclick="$('#successMsg').slideUp()"><span aria-hidden="true">&times;</span></button>
                            @if(Session::has('email'))
                                <h3 style="font-size: 1.5em">Tu cuenta ha sido creada</h3>
                            @else
                                <h3 style="font-size: 1.5em">Cuenta Confirma</h3>
                            @endif

                            <strong>{{ Session::get('messageActivation') }}</strong>

                            @if(Session::has('email'))
                                <span style="color:#263238">{{Session::get('email')}}</span>
                            @endif
                        </div>
                    @endif

                    @if(Session::has('errorActivation'))
                        <div class="alert alert-danger" id="activationError">
                            <button type="button" class="close" aria-label="Cerrar" onclick="$('#activationError').slideUp()"><span aria-hidden="true">&times;</span></button>
                            <p>{{ Session::get('errorActivation') }}</p>
                        </div>
                    @endif

                    @include('partials.formErrors')

                    {{ csrf_field() }}

                    <div class="form-group has-feedback">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        <label class="sr-only" for="email">Correo electrónico:</label>
                        <input class="form-control has-feedback-left" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required data-parsley-trigger="change">
                    </div>
                    <div class="form-group has-feedback">
                        <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                        <label class="sr-only" for="password">Contraseña:</label>
                        <input class="form-control has-feedback-left" id="password" type="password" name="password" placeholder="Contraseña" required data-parsley-trigger="change">
                    </div>
                    <div class="form-group text-right">
                        <label for="remember">
                            <input class="flat" id="remember" type="checkbox" name="remember" checked>
                            Recordarme
                        </label>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" id="validForm" type="submit"><span class="fa fa-sign-in"></span> Iniciar Sesión</button>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-link" href="{{ route('recover') }}" title="Recuperar contraseña" role="button">Olvidé mi contraseña</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator text-center">
                        <p>¿Eres nuevo aquí? <a class="btn btn-link" href="{{ route('signup') }}" title="Crear una nueva cuenta" role="button">Crea una cuenta</a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>

    @include('partials.footerSimple')

    @include('partials.scriptsBasics')

@endsection
