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
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" media="all" />
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
<script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
<script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
<!-- / END - validaciones-->
<!-- / START AJAX para busqueda -->
<script src="{{ asset('/js/social/buscador.js') }}" type="text/javascript"></script>
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
                                    <span>Fichas Sociales del Beneficiario</span>
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
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    
                    <div class='box-content box-no-padding'>
                      <div class='responsive-table'>
                        <div class='scrollable-area'>
                          <table class='table' style='margin-bottom:0;'>
                            <thead>
                              <tr>
                                <th>
                                  #
                                </th>
                                <th>
                                  Fecha
                                </th>
                                <th>
                                  Descripción
                                </th>
                                <th>
                                  Tipo
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>

                            @if ($ficha != null)

                             @for ($i = 0; $i < count($ficha); $i++)
                              <tr>
                                <td>{{$ficha[$i]->id}}</td>
                                <td>{{$ficha[$i]->created_at}}</td>
                                <td>{{$ficha[$i]->descripcion}}</td>
                                <td>{{$fichaTipo[$i]}}</td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='/areasocial/asistentesocial/show{{$fichaTipo[$i]}}/{{$ficha[$i]->id}}'>
                                      <i class='fa fa-eye'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              @endfor
                            @else
                                <tr>
                                    <th>No hay datos para mostrar.</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            @endif
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
            @include('partials.footer')
        </div>
    </section>
</div>
@endsection
