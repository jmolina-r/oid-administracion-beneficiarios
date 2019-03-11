<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Registrar Usuario - OID
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
                                    <span>Registro de Usuario</span>
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
                        <div class='col-sm-6'>
                            <div class='box'>
                                <div class='box-content box-padding'>
                                    <form id='userSaveForm' class='validate-form' method="POST" action="{{ route('register') }}">

                                        {{ csrf_field() }}

                                        @include('partials.auth.save')
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 box">




                            <h4 class="text-center">¿Qué Permite cada Rol?</h4>





                            <div class='accordion accordion-blue panel-group' id='accordion1' style='margin-bottom:0;'>

                                <!--<div class='panel panel-default'>
                                  <div class='panel-heading'>
                                    <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseSix-accordion1'>
                                      Coordinador oficina
                                    </a>
                                  </div>
                                  <div class='panel-collapse collapse in' id='collapseSix-accordion1'>
                                    <div class='panel-body'>
                                        <ul>
                                            <li>Administrar usuarios y funcionarios</li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>-->

                                {{-- <div class='panel panel-default'>
                                  <div class='panel-heading'>
                                    <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseNine-accordion1'>
                                      Admin
                                    </a>
                                  </div>
                                  <div class='panel-collapse collapse' id='collapseNine-accordion1'>
                                    <div class='panel-body'>
                                        <ul>
                                            <li>Todo menos ingresar prestaciones y fichas iniciales</li>
                                        </ul>
                                    </div>
                                  </div>
                                </div> --}}

                              <div class='panel panel-default'>
                                <div class='panel-heading'>
                                  <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseOne-accordion1'>
                                    Kinesiología
                                  </a>
                                </div>
                                <div class='panel-collapse collapse' id='collapseOne-accordion1'>
                                  <div class='panel-body'>
                                      <ul>
                                          <li>Administrar malla de Kinesiología</li>
                                          <li>Ver datos de beneficiarios</li>
                                          <li>Ver fichas de beneficiarios</li>
                                          <li>Ingresar y ver fichas inicial y de alta de Kinesiología</li>
                                          <li>Estadísticas de Kinesiología</li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                              <div class='panel panel-default'>
                                <div class='panel-heading'>
                                  <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseTwo-accordion1'>
                                    Psicología
                                  </a>
                                </div>
                                <div class='panel-collapse collapse' id='collapseTwo-accordion1'>
                                  <div class='panel-body'>
                                      <ul>
                                          <li>Administrar malla de Psicología</li>
                                          <li>Ver datos de beneficiarios</li>
                                          <li>Ver fichas de beneficiarios</li>
                                          <li>Ingresar y ver fichas inicial y de alta de Psicología</li>
                                          <li>Estadísticas de Psicología</li>
                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class='panel panel-default'>
                                <div class='panel-heading'>
                                  <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseThree-accordion1'>
                                    Fonoaudiología
                                  </a>
                                </div>
                                <div class='panel-collapse collapse' id='collapseThree-accordion1'>
                                  <div class='panel-body'>
                                      <ul>
                                          <li>Administrar malla de Fonoaudiología</li>
                                          <li>Ver datos de beneficiarios</li>
                                          <li>Ver fichas de beneficiarios</li>
                                          <li>Ingresar y ver fichas inicial y de alta de Fonoaudiología</li>
                                          <li>Estadísticas de Fonoaudiología</li>
                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class='panel panel-default'>
                                <div class='panel-heading'>
                                  <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseFour-accordion1'>
                                    Terapia Ocupacional
                                  </a>
                                </div>
                                <div class='panel-collapse collapse' id='collapseFour-accordion1'>
                                  <div class='panel-body'>
                                      <ul>
                                          <li>Administrar malla de Teraia Ocupacional</li>
                                          <li>Ver datos de beneficiarios</li>
                                          <li>Ver fichas de beneficiarios</li>
                                          <li>Ingresar y ver fichas inicial y de alta de Teraia Ocupacional</li>
                                          <li>Estadísticas de Teraia Ocupacional</li>
                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class='panel panel-default'>
                                <div class='panel-heading'>
                                  <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseFive-accordion1'>
                                    Secretaria
                                  </a>
                                </div>
                                <div class='panel-collapse collapse' id='collapseFive-accordion1'>
                                  <div class='panel-body'>
                                      <ul>
                                          <li>Ver mallas</li>
                                          <li>Agendar y eliminar horas</li>
                                          <li>Todas las estadisticas</li>
                                          <li>Administrar beneficiarios</li>
                                      </ul>
                                  </div>
                                </div>
                              </div>

                              <div class='panel panel-default'>
                                <div class='panel-heading'>
                                  <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseSeven-accordion1'>
                                    Asistente Social
                                  </a>
                                </div>
                                <div class='panel-collapse collapse' id='collapseSeven-accordion1'>
                                  <div class='panel-body'>
                                      <ul>
                                          <li>Ver malla</li>
                                          <li>Ver datos de beneficiarios</li>
                                          <li>Ver fichas de beneficiarios</li>
                                          <li>Ingresar, ver e imprimir fichas inicial y de alta de su area</li>
                                      </ul>
                                  </div>
                                </div>
                              </div>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseFour-accordion1'>
                                            Tallerista
                                        </a>
                                    </div>
                                    <div class='panel-collapse collapse' id='collapseFour-accordion1'>
                                        <div class='panel-body'>
                                            <ul>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseFour-accordion1'>
                                            Educador
                                        </a>
                                    </div>
                                    <div class='panel-collapse collapse' id='collapseFour-accordion1'>
                                        <div class='panel-body'>
                                            <ul>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                              <!--<div class='panel panel-default'>
                                <div class='panel-heading'>
                                  <a class='accordion-toggle' data-parent='#accordion1' data-toggle='collapse' href='#collapseEight-accordion1'>
                                    Jefatura
                                  </a>
                                </div>
                                <div class='panel-collapse collapse' id='collapseEight-accordion1'>
                                  <div class='panel-body'>
                                      <ul>
                                          <li>Reportabilidad</li>
                                          <li>Crear y eliminar tipos de prestaciones</li>
                                      </ul>
                                  </div>
                                </div>
                              </div>-->
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
@endsection
