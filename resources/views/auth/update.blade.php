<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Actualizar Usuario - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles_before')
<link href="{{ asset('/assets/stylesheets/plugins/fuelux/wizard.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('styles')
<link href="{{ asset('/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}' rel='apple-touch-icon-precomposed'>
<link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" media="all" />
{{-- <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" /> --}}
@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red'
@endsection

@section('scripts')
    <!-- / jquery [required] -->
    {{-- <script src="{{ asset('/assets/javascripts/jquery/jquery.min.js') }}" type="text/javascript"></script>
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
    <script src="{{ asset('/assets/javascripts/theme.js') }}" type="text/javascript"></script> --}}
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset('/assets/javascripts/plugins/fuelux/wizard.js') }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <!-- / Beneficiario select tag -->
    <script src="{{ asset('assets/javascripts/plugins/select2/select2.js') }}" type="text/javascript"></script>
    <!-- / START - moments-->
    <script src="{{ asset('/assets/javascripts/plugins/common/moment.min.js') }}" type="text/javascript"></script>
    <!-- / END - moments-->
    <!-- / START - datepicker-->
    <script src="{{ asset('/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!-- / END - datepicker-->
    <!-- / START - Validaciones-->
    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/auth/RegistrarUser.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/charCount/charCount.js') }}" type="text/javascript"></script>
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
                                    <span>Guardado de Usuario</span>
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
                                    <form id='userSaveForm' class='validate-form' method="POST" action="{{ route('update', $user->id) }}">

                                        {{ csrf_field() }}

                                        @include('partials.auth.save')
                                    </form>
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
@include('partials.auth.confirmation-modal')

@if(isset($user) && $user->funcionario != null)
    <div class="modal-custom">
        <div class='modal fade' id='perfilFuncionarioModalOnUser' tabindex='-1'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                        <h3 class='modal-title'>Datos del Funcionario</h3>
                    </div>
                    <div class='modal-body'>
                        <h5>A continuación se muestran los datos del funcionario. Para modificar, presione el botón editar.</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Nombre del Funcionario</h4>
                                <p class="capitalize" id="funcionarioNombre">{{ $user->funcionario->nombre }} {{ $user->funcionario->apellido }}</p>

                                <h4>Rut</h4>
                                <p id="funcionarioRut">{{ $user->funcionario->rut }}</p>

                                <h4>Telefono</h4>
                                <p id="funcionarioTelefono">{{ $user->funcionario->telefono }}</p>

                                <h4>Dirección Particular</h4>
                                <p class="capitalize" id="funcionarioDireccion">{{ $user->funcionario->direccion }}</p>

                            </div>

                            <div class="col-lg-6">

                                <h4>Fecha Nacimiento</h4>
                                <p id="funcionarioFechaNacimiento">{{ $user->funcionario->fecha_nacimiento }}</p>

                                <h4>E-mail</h4>
                                <p id="funcionarioEmail">{{ $user->funcionario->email }}</p>

                                <h4>Labor en OID</h4>
                                <p class="capitalize" id="funcionarioTipo">{{ $user->funcionario->tipo_funcionario->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button class='btn btn-default' data-dismiss='modal' type='button'>Volver</button>
                        <a href="{{ route('funcionario.edit', $user->funcionario) }}" id="editarFuncionarioBtn" class='btn btn-warning'>Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
