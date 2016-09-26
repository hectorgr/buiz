@extends('layout')

@section('pageTitle', 'Inicio')
@section('pageDescription', 'Tu página de inicio en Buiz.')
@section('pageKeywords', 'resumen, inicio, panel, dashboard')

@section('content')


<div class="container body">
    <div class="main_container">

        @include('partials.menuSidebar')
        @include('partials.menuBasic')

        <!-- Main Content -->
        <div class="right_col" role="main">
            <div>
                <div class="page-title">
                    <div class="title_left">
                        <h3>Panel del Profesor</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Buscar">
                                <span class="input-group-btn">
                                  <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Opciones</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                Lista de tareas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

        @include('partials.footer')
    </div>
</div>


    @include('partials.scriptsBasics')

@endsection
