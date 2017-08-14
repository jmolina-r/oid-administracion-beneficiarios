<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
Lista de Usuarios - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles_before')

@endsection

@section('styles')
<link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}' rel='apple-touch-icon-precomposed'>
<link href="{{ asset('assets/stylesheets/plugins/datatables/datatables.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

<!-- Atributos del body -->
@section('body-attr')
class='contrast-red'
@endsection

<!-- Inyeccion de scripts
No importa que vayan antes del body, en el master layout se estan insertando alfinal.
-->
@section('scripts')
<!-- / jquery [required] -->
<script src="{{ asset('/assets/javascripts/jquery/jquery.min.js') }}" type="text/javascript"></script>
<!-- / jquery mobile (for touch events) -->
<script src="{{ asset('/assets/javascripts/jquery/jquery.mobile.custom.min.js') }}" type="text/javascript"></script>
<!-- / jquery ui -->
<script src="{{ asset('/assets/javascripts/jquery/jquery-ui.min.js') }}" type="text/javascript"></script>
<!-- / jQuery UI Touch Punch -->
<script src="{{ asset('/assets/javascripts/jquery/jquery.ui.touch-punch.min.js') }}" type="text/javascript"></script>
<!-- / bootstrap [required] -->
<script src="{{ asset('/assets/javascripts/bootstrap/bootstrap.js') }}" type="text/javascript"></script>
<!-- / modernizr -->
<script src="{{ asset('/assets/javascripts/plugins/modernizr/modernizr.min.js') }}" type="text/javascript"></script>
<!-- / retina -->
<script src="{{ asset('/assets/javascripts/plugins/retina/retina.js') }}" type="text/javascript"></script>
<!-- / theme file [required] -->
<script src="{{ asset('/assets/javascripts/theme.js') }}" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->

<!-- / END - page related files and scripts [optional] -->
<!-- / START - Validaciones-->
<script src="{{ asset('assets/javascripts/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<!-- / END - validaciones-->

<script src="{{ asset('js/funcionario/BuscarFuncionario.js') }}" type="text/javascript"></script>

@endsection

<!-- Contenido del body -->
@section('content')
@include('partials.header')
<div id='wrapper'>
    <div id='main-nav-bg'></div>
    @include('partials.nav')
    <section id='content'>
        <div class='container'>
            <div class='row' id='content-wrapper'>
                <div class='col-xs-12'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='page-header'>
                                <h1 class='pull-left'>
                                    <i class='fa fa-pencil-square-o'></i>
                                    <span>Buscador de Funcionarios</span>
                                </h1>
                                <div class='pull-right'>
                                    <ul class='breadcrumb'>
                                        <li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='box'>
                                    <div class='box-content box-padding'>
                                        <div class="container">
                                            <div class='row'>
                                                <div class='col-sm-12'>
                                                    <div class='box bordered-box orange-border' style='margin-bottom:0;'>
                                                        <div class='box-content box-no-padding'>
                                                            <div class='responsive-table'>
                                                                <div class='scrollable-area'>
                                                                    <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Nombre de Funcionario
                                                                                </th>
                                                                                <th>
                                                                                    E-mail
                                                                                </th>
                                                                                <th>
                                                                                    Telefono
                                                                                </th>
                                                                                <th>
                                                                                    Acciones
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($funcionarios as $funcionario)
                                                                            <tr>
                                                                                <td class="capitalize">{{ $funcionario->nombre }} {{ $funcionario->apellido }}</td>
                                                                                <td>{{ $funcionario->email }}</td>
                                                                                <td>{{ $funcionario->telefono }}</td>
                                                                                <td>
                                                                                    <div class='text-right'>
                                                                                        <a class='btn btn-success btn-xs' href='#' onclick="getFuncionarioPorId('{{ $funcionario->id }}')">
                                                                                            <i class='fa fa-user'></i>
                                                                                        </a>
                                                                                        {{-- <a class='btn btn-danger btn-xs' href='#'>
                                                                                            <i class='fa fa-times'></i>
                                                                                        </a> --}}
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer')
        </div>
    </section>
</div>

<div class="modal-custom">
    <div class='modal fade' id='perfilFuncionarioModal' tabindex='-1'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                    <h3 class='modal-title'>Datos del Funcionario</h3>
                </div>
                <div class='modal-body'>
                    <h5>A continuación se muestran los datos del funcionario. Para modificar, presione el botón editar.</h5>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <h4>Nombre del Funcionario</h4>
                            <p class="capitalize" id="funcionarioNombre">-</p>

                            <h4>Rut</h4>
                            <p id="funcionarioRut">-</p>

                            <h4>Telefono</h4>
                            <p id="funcionarioTelefono">-</p>

                            <h4>Dirección Particular</h4>
                            <p class="capitalize" id="funcionarioDireccion">-</p>

                            <h4>Fecha Nacimiento</h4>
                            <p id="funcionarioFechaNacimiento">-</p>

                            <h4>E-mail</h4>
                            <p id="funcionarioEmail">-</p>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                    <button id="editar_btn" class='btn btn-warning' type='button'>Editar</button>
                    <input id="userId" type="hidden" value="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
