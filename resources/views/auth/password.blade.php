@extends('layout')

@section('pageTitle', 'Recuperar contraseña')
@section('pageDescription', '¿Olvidaste tu contraseña? Recuperala a través de estos simples pasos.')
@section('pageKeywords', 'password, contraseña, cuenta, correo, email, restaurar')

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
                <h2 class="text-center">Reestablece tu contraseña en <strong class="appLogo">buiz</strong></h2>

                <div class="margin-top-small text-center">
                    <p>Ingresa tu dirección de correo electrónico para poder enviar tu enlace de reestablecimiento de contraseña.</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" id="successMsg">
                        <button type="button" class="close" aria-label="Cerrar" onclick="$('#successMsg').slideUp()"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif

                <form id="login" role="form" method="POST" action="{{ route('recoverPost') }}" data-parsley-validate>

                    @include('partials.formErrors')

                    {{ csrf_field() }}

                    <div class="form-group has-feedback">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        <label class="sr-only" for="email">Correo electrónico:</label>
                        <input class="form-control has-feedback-left" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required data-parsley-trigger="change">
                    </div>

                    <div class="text-center margin-top-small margin-bottom-small">
                        <a class="btn btn-default" href="{{ route('login') }}" role="button"><span class="fa fa-chevron-left"></span> Regresar</a>
                        <button class="btn btn-primary" id="validForm" type="submit"><span class="fa fa-mail-forward"></span> Enviar mensaje</button>
                    </div>

                </form>
            </section>
        </div>
    </div>

    @include('partials.footerSimple')

    @include('partials.scriptsBasics')

@endsection
