<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Funcionario - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles_before')
<link href="{{ asset('/assets/stylesheets/plugins/fuelux/wizard.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('styles')
{{-- <link href="{{ asset('/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}' rel='apple-touch-icon-precomposed'>
<link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" media="all" /> --}}
@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red'
@endsection

@section('scripts')
    {{-- <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset('/assets/javascripts/plugins/fuelux/wizard.js') }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <!-- / Beneficiario select tag -->
    <script src="{{ asset('assets/javascripts/plugins/select2/select2.js') }}" type="text/javascript"></script>
    <!-- / START - moments-->
    <script src="{{ asset('/assets/javascripts/plugins/common/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/common/locale/es.js') }}" type="text/javascript"></script>
    <!-- / END - moments-->
    <!-- / START - datepicker-->
    <script src="{{ asset('/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!-- / END - datepicker-->
    <script src="{{ asset('/assets/javascripts/plugins/charCount/charCount.js') }}" type="text/javascript"></script> --}}
    <!-- / START - Validaciones-->
    <script src="{{ asset('js/app/funcionario/save.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('/js/funcionario/RegistrarFuncionario.js') }}" type="text/javascript"></script> --}}
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
                                    <span>Guardado de Funcionario</span>
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
                                    <form id="saveFuncionarioForm" class='validate-form' method="POST" action="{{ route('funcionario.store') }}">

                                        {{ csrf_field() }}

                                        @include('partials.funcionario.save')
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

@include('partials.funcionario.confirmation-modal')
@endsection
