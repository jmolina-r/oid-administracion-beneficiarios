<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
Registro de Beneficiario - OID
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
<!-- / START - Validaciones-->
<script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
<script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/beneficiario/RegistroBeneficiario.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/javascripts/plugins/charCount/charCount.js') }}" type="text/javascript"></script>
<!-- / END - validaciones-->
<!-- / START Vista para llenado de select dinamicos -->
@include('partials.dropdown')
<!-- / END  -->
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
                                    <span>Registro de Usuario</span>
                                </h1>
                                <div class='pull-right'>
                                    <ul class='breadcrumb'>
                                      <li>
                                    </ul>
                                </div>
                                <!-- Boton video de ayuda -->
                                <!-- <h1 class="pull-right ayuda_btn">
                                    <a style="text-decoration:none;" href="#" title="" onclick="$('#video').modal('show');">Ayuda <i class='fa fa-life-ring'></i></a>
                                </h1> -->
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='box'>
                                <div class='box-content box-padding'>
                                    <div class='fuelux'>
                                        <div class='wizard' data-initialize='wizard' id='myWizard'>
                                            <div class='steps-container'>
                                                <ul class='steps'>
                                                    <li class='active' data-step='1'>
                                                        <span class='step'>1</span>
                                                    </li>
                                                    <li data-step='2'>
                                                        <span class='step'>2</span>
                                                    </li>
                                                    <li data-step='3'>
                                                        <span class='step'>3</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class='actions'>
                                                <button id="continuar_btn" type='submit' class='pull-right btn btn-md btn-success btn-next' data-last='Finalizar'>
                                                    Continuar
                                                    <i class='fa fa-arrow-right'></i>
                                                </button>
                                                <button class='pull-right btn btn-md btn-prev'>
                                                    <i class='fa fa-arrow-left'></i>
                                                    Volver
                                                </button>
                                            </div>
                                            @if(count($errors) > 0)
                                                <hr class='hr-normal'>
                                                <div class="alert alert-danger">
                                                    @foreach($errors->all() as $error)
                                                        <p>{{ $error }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <hr class='hr-normal'>
                                            <form role="form" id="formulario-registro" action="{{route('beneficiario.store')}}" accept-charset="UTF-8" style="margin-bottom: 0;" method="post">
                                                <div class='step-content'>
                                                    <!-- STEP 1 -->
                                                    @include('partials.save.general')
                                                    <!-- STEP 2 -->
                                                    @include('partials.save.social')
                                                    <!-- STEP 3 -->
                                                    @include('partials.save.discapacidad')
                                                </div>
                                                {{ csrf_field() }}
                                            </form>
                                            <div class="actions_bottom">
                                                <button id="continuar_btn_bottom" type='submit' class='pull-right btn btn-md btn-success' data-last='Finalizar'>
                                                    Continuar
                                                    <i class='fa fa-arrow-right'></i>
                                                </button>
                                                <button class='pull-right btn btn-md btn-prev'>
                                                    <i class='fa fa-arrow-left'></i>
                                                    Volver
                                                </button>
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
            @include('partials.confirmation')
        </div>
    </section>
</div>
@endsection
