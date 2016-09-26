@extends('layout')

@section('pageTitle', 'Crea una cuenta')
@section('pageDescription', 'Crea tu cuennta gratis en Buiz y comienza a elaborar y contestar exámenes rápidamente.')
@section('pageKeywords', 'cuenta, examen, online, nuevo, registro')

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
                <h2 class="text-center">Crea tu cuenta en <strong class="appLogo">buiz</strong></h2>

                <form id="login" role="form" method="POST" action="{{ route('signupPost') }}" data-parsley-validate>

                    @include('partials.formErrors')

                    {{ csrf_field() }}

                    <div class="form-group text-center margin-top-small">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-success" id="uT2">
                                <input type="radio" name="userType" value="1" checked> Soy Alumno
                            </label>
                            <label class="btn btn-default" id="uT1">
                                <input type="radio" name="userType" value="0"> Soy Profesor
                            </label>
                        </div>
                    </div>
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
                    <div class="form-group text-right form-group-required">
                        <span class="fa fa-asterisk text-primary"></span>
                        <label class="sr-only" for="usrName">Nombre:</label>
                        <input class="form-control" id="usrName" type="text" name="names" value="{{ old('names') }}" placeholder="Nombre" required minlength="3" maxlength="100" data-parsley-trigger="change">
                    </div>
                    <div class="form-group text-right form-group-required">
                        <span class="fa fa-asterisk text-primary"></span>
                        <label class="sr-only" for="usrLastN"> Primer apellido:</label>
                        <input class="form-control" id="usrLastN" type="text" name="lastName" value="{{ old('lastName') }}" placeholder="Primer apellido" required minlength="3" maxlength="100" data-parsley-trigger="change">
                    </div>
                    <div class="form-group text-right form-group-required">
                        <label class="sr-only" for="usrLastN2">Segundo apellido:</label>
                        <input class="form-control" id="usrLastN2" type="text" name="lastName2" value="{{ old('lastName2') }}" placeholder="Segundo apellido" minlength="3" maxlength="100" data-parsley-trigger="change">
                    </div>
                    <div class="form-group text-center form-group-required">
                        <label for="seM">
                            <input class="flat" id="seM" type="radio" name="sex" value="Male" checked>
                            Hombre
                        </label>
                        <label class="margin-left-small" for="seF">
                            <input class="flat" id="seF" type="radio" name="sex" value="Female">
                            Mujer
                        </label>
                    </div>

                    <p class="text-right">
                        <span class="fa fa-asterisk text-primary"></span> Valores requeridos
                    </p>
                    <div class="text-center margin-top-small margin-bottom-small">
                        <a class="btn btn-default" href="{{ route('login') }}" role="button"><span class="fa fa-chevron-left"></span> Regresar</a>
                        <button class="btn btn-primary" id="validForm" type="submit"><span class="fa fa-user"></span> Registrarme</button>
                    </div>

                    <p class="text-center">
                        <small>Al hacer clic en "Registrarme", aceptas las <a href="{{ url('/') }}" target="_blank" rel="nofollow">Condiciones</a> y confirmas que leíste nuestra
                            <a href="{{ url('/') }}" target="_blank" rel="nofollow">Política de datos</a>.</small>
                    </p>
                </form>
            </section>
        </div>
    </div>

    @include('partials.footerSimple')

    @include('partials.scriptsBasics')

    <script>
        $(document).ready(function () {
            $('#uT1').on('click', function () {
                $(this).removeClass('btn-default').addClass('btn-success');
                $('#uT2').removeClass('btn-success').addClass('btn-default');
            });
            $('#uT2').on('click', function () {
                $(this).removeClass('btn-default').addClass('btn-success');
                $('#uT1').removeClass('btn-success').addClass('btn-default');
            });
        });
    </script>

@endsection
