@extends('layout')

@section('pageTitle', 'Cambio de contraseña')
@section('pageDescription', 'Reestablece tu contraseña en Buiz fácilmente.')
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
                <h2 class="text-center">Cambia tu contraseña en <strong class="appLogo">buiz</strong></h2>

                <div class="margin-top-small text-center">
                    <p>Ingresa tu dirección de correo electrónico y establece tu nueva contraseña.</p>
                </div>

                <form id="login" role="form" method="POST" action="{{ route('resetPost') }}" data-parsley-validate>

                    @include('partials.formErrors')

                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group text-right form-group-required">
                        <span class="fa fa-asterisk text-primary"></span>
                        <label class="sr-only" for="usrEmail">Correo electrónico:</label>
                        <input class="form-control form-control-required" id="usrEmail" type="email" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required minlength="8" maxlength="50" data-parsley-trigger="change">
                    </div>
                    <div class="form-group text-right form-group-required">
                        <span class="fa fa-asterisk text-primary"></span>
                        <label class="sr-only" for="usrPswd">Contraseña nueva:</label>
                        <input class="form-control" id="usrPswd" type="password" name="password" placeholder="Contraseña nueva" required minlength="8" maxlength="200" data-parsley-trigger="change">
                    </div>
                    <div class="form-group text-right form-group-required">
                        <span class="fa fa-asterisk text-primary"></span>
                        <label class="sr-only" for="usrPassword">Confirmar contraseña:</label>
                        <input class="form-control" id="password" type="password" name="password_confirmation"  placeholder="Confirmar contraseña" required data-parsley-equalto="#usrPswd" data-parsley-trigger="change">
                    </div>

                    <p class="text-right">
                        <span class="fa fa-asterisk text-primary"></span> Valores requeridos
                    </p>
                    <div class="text-center margin-top-small margin-bottom-small">
                        <a class="btn btn-default" href="{{ route('login') }}" role="button">Cancelar</a>
                        <button class="btn btn-primary" id="validForm" type="submit">Cambiar Contraseña</button>
                    </div>

                </form>
            </section>
        </div>
    </div>

    @include('partials.footerSimple')

    @include('partials.scriptsBasics')

@endsection
