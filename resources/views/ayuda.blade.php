<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
Ayuda en Línea - OID
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
<link href="assets/stylesheets/jquery/jquery_ui.css" rel="stylesheet" type="text/css" media="all" />
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
<script src="{{ asset('/assets/javascripts/plugins/charCount/charCount.js') }}" type="text/javascript"></script>
<!-- / END - validaciones-->

<!-- / END  -->
@endsection

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
                                    <i class='fa fa-life-ring'></i>
                                    <span>Ayuda en línea</span>
                                </h1>
                                <div class='pull-right'>
                                    <ul class='breadcrumb'>
                                        <li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <span>Para comenzar, puedes ver los videos de ayuda para cada una de las secciones.</span>   
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class='col-lg-12 box'>
                                    <div class='box-header'>
                                        <div class='title'>Administración</div>
                                    </div>
                                    <div class='box-content'>
                                        <div class='accordion accordion-blue panel-group' id='accordion1' style='margin-bottom:0;'>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseOne-accordion1'>
                                                        ¿Cómo administrar funcionarios?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse in' id='collapseOne-accordion1'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/MP9juk6c4rI">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseTwo-accordion1'>
                                                        ¿Cómo administrar usuarios?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseTwo-accordion1'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/o8rwnkio8Bc">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-12 box'>
                                    <div class='box-header'>
                                        <div class='title'>Ingreso de Registros</div>
                                    </div>
                                    <div class='box-content'>
                                        <div class='accordion accordion-blue panel-group' id='accordion3' style='margin-bottom:0;'>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion3' data-toggle='collapse' href='#collapseUno-accordion3'>
                                                        ¿Cómo registrar beneficiarios?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse in' id='collapseUno-accordion3'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/D4TuCQu5JTg">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion3' data-toggle='collapse' href='#collapseDos-accordion3'>
                                                        ¿Cómo registrar visitas?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseDos-accordion3'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/5F_hBqaZMGc">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion3' data-toggle='collapse' href='#collapseTres-accordion3'>
                                                        ¿Cómo registrar orientaciones?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseTres-accordion3'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/KyawAKWAISM">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion3' data-toggle='collapse' href='#collapseCuatro-accordion3'>
                                                        ¿Cómo registrar becas?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseCuatro-accordion3'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/Pv4FPbiG5EQ">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion3' data-toggle='collapse' href='#collapseCinco-accordion3'>
                                                        ¿Cómo registrar ayudas?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseCinco-accordion3'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/ss-nr8byk2w">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class='col-lg-12 box'>
                                    <div class='box-header'>
                                        <div class='title'>Reportabilidad</div>
                                    </div>
                                    <div class='box-content'>
                                        <div class='accordion accordion-green panel-group' id='accordion2' style='margin-bottom:0;'>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion2' data-toggle='collapse' href='#collapseOne-accordion2'>
                                                        Ver reportabilidad general
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse in' id='collapseOne-accordion2'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/rr6jTjO80PM">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion2' data-toggle='collapse' href='#collapseTwo-accordion2'>
                                                        Ver reportabilidad grupal
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseTwo-accordion2'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/2B0srWCW6x4">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion2' data-toggle='collapse' href='#collapseThree-accordion2'>
                                                        Ver reportabilidad por profesional
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseThree-accordion2'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/Jgw-bzUvefY">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion2' data-toggle='collapse' href='#collapseFour-accordion2'>
                                                        Ver reportes históricos
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseFour-accordion2'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/Jq_3TGO7IoE">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-12 box'>
                                    <div class='box-header'>
                                        <div class='title'>Atención de beneficiarios</div>
                                    </div>
                                    <div class='box-content'>
                                        <div class='accordion accordion-green panel-group' id='accordion4' style='margin-bottom:0;'>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion4' data-toggle='collapse' href='#collapseUno-accordion4'>
                                                        ¿Cómo ingresar una hora?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse in' id='collapseUno-accordion4'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/GjPfwFuO950">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion4' data-toggle='collapse' href='#collapseDos-accordion4'>
                                                        ¿Cómo atender una hora?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseDos-accordion4'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/yLJcLmvsaxU">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion4' data-toggle='collapse' href='#collapseTres-accordion4'>
                                                        ¿Cómo ingresar prestaciones?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseTres-accordion4'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/8ZzB2fSoUHw">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel panel-default'>
                                                <div class='panel-heading'>
                                                    <a class='accordion-toggle' data-parent='#accordion4' data-toggle='collapse' href='#collapseCuatro-accordion4'>
                                                        ¿Cómo buscar fichas sociales?
                                                    </a>
                                                </div>
                                                <div class='panel-collapse collapse' id='collapseCuatro-accordion4'>
                                                    <div class='panel-body'>
                                                        <iframe width="420" height="315"
                                                        src="https://www.youtube.com/embed/RRkauVtRBQE">
                                                        </iframe>
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
    <section>
</div>
