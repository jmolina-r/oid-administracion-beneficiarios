<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Prestaciones - OID
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
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red'
@endsection

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
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
    <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/user/reguser.js') }}" type="text/javascript"></script>
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
                                        <span>Agregar Prestación</span>
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
                                        <form class='validate-form' method="POST" action="{{ route('malla.guardarPrestacion') }}">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class='control-label' for='inputText'>Nombre de la Prestación</label>
                                                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre de la Prestación" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class='control-label' for='inputText'>Área de la Prestación</label>
                                                    <select style="width:100%;" name='area' class='form-control capitalize select-tag' id='area'>
                                                        <option value="Kinesiología">Kinesiología</option>
                                                        <option value="Fonoaudiología">Fonoaudiología</option>
                                                        <option value="Psicología">Psicología</option>
                                                        <option value="Terapia Ocupacional">Terapia Ocupacional</option>
                                                        <option value="Area Social">Área Social</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <a class="btn btn-primary btn-block" href="{{route('malla.listaPrestaciones')}}">Volver</a>
                                            </div>
                                            <div class="col-md-6">
                                                <button class='btn btn-block btn-success' type="submit">Guardar</button>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>
                                        <hr>
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
@endsection