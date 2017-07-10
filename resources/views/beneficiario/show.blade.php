
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Perfil de Usuario - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles')
  <link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}' rel='apple-touch-icon-precomposed'>
  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red login contrast-background'
@endsection

<!-- Inyeccion de scripts
     No importa que vayan antes del body, en el master layout se estan insertando alfinal.
-->
@section('scripts')
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

    <script src="https://use.fontawesome.com/3574066f0b.js"></script>
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
                        <i class='fa fa-user'></i>
                        <span>Perfil de Beneficiario</span>
                      </h1>
                      <div class='pull-right'>
                        <ul class='breadcrumb'>
                          <li>
                            <a href='index.html'>
                              <i class='fa fa-bar-chart-o'></i>
                            </a>
                          </li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li>Example pages</li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li class='active'>User profile</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-3 col-lg-2'>
                    <div class='box'>
                      <div class='box-content'>
                        <img class="img-responsive" src="http://placehold.it/230x230&amp;text=Photo" />
                      </div>
                      <div class='edit-btn'>
                        <div class='text-center'>
                          <div class='btn btn-warning btn-md'>
                            <i class='fa fa-floppy-o'></i>
                            Editar Información
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class='col-sm-9 col-lg-10'>
                    <div class='box'>
                      <div class='box-content box-double-padding'>
                        <fieldset>
                          <div class='col-sm-4'>
                            <div class='lead'>
                              <i class='fa fa-address-card text-contrast fontawesomesize'></i>
                              Identificación beneficiario
                            </div>
                            <small class='text-muted'>Toda la información registrada es confidencial y responsabilidad del equipo de administración de la OID.</small>
                          </div>
                          <div class='col-sm-7 col-sm-offset-1'>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Nombre
                              <h3>{{$beneficiario->nombre}} {{$beneficiario->apellido}}</h3>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Rut
                              <h3>{{$beneficiario->rut}} </h3>
                            </div>
                            <hr class='hr-normal'>
                          </div>
                        </fieldset>
                        <hr class='hr-normal'>
                        <fieldset>
                          <div class='col-sm-4'>
                            <div class='lead'>
                              <i class='fa fa-user text-contrast fontawesomesize'></i>
                              Información Personal
                            </div>
                          </div>
                          <div class='col-sm-7 col-sm-offset-1'>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Nacionalidad
                              <h5>{{$pais->nombre}}</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Sexo
                              <h5>{{$beneficiario->sexo}}</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Fecha de Nacimiento
                              <h5>20 de Junio del 1991</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Situación Civil
                              <h5>Soltero</h5>
                            </div>
                            <hr class='hr-normal'>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Domicilio
                              <h5>Avda. Andrés Sabella #160, Sector Parque Inglés</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Fonos
                              <h5>2546939 - 63424158</h5>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              E-mail
                              <h5>ahenriquez@sodired.cl</h5>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Credencial de discapacidad
                              <h5>Si - Válida hasta el 17/03/2017</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Registro social de hogares
                              <h5>Si - 80%</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Acompañante o tutor
                              <h5>María Angélica Sandivari</h5>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Contacto tutor
                              <h5>+56 9 123456789</h5>
                            </div>                     
                          </div>
                        </fieldset>
                        <hr class='hr-normal'>
                        <fieldset>
                          <div class='col-sm-4'>
                            <div class='lead'>
                              <i class='fa fa-child text-contrast fontawesomesize'></i>
                              Área Social
                            </div>
                            <small class='text-muted'></small>
                          </div>
                          <div class='col-sm-7 col-sm-offset-1'>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Sistema de Salud
                              <h5>Isapre - Colmena</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Previsión
                              <h5>No tiene</h5>
                            </div>                            
                            <hr class='hr-normal'>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Nivel Educacional
                              <h5>Universitario Incompleto</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Situación Actual
                              <h5>Estudiante</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Sistema de Protección
                              <h5>Participa actualmente en sistema de protección Lorem Ipsum.</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Participación en organizaciones sociales
                              <h5>No participa en niguna organización</h5>
                            </div>
                          </div>
                        </fieldset>
                        <hr class='hr-normal'>
                        <fieldset>
                          <div class='col-sm-4'>
                            <div class='lead'>
                              <i class='fa fa-wheelchair text-contrast fontawesomesize'></i>
                              Antecedentes de Discapacidad
                            </div>
                            <small class='text-muted'></small>
                          </div>
                          <div class='col-sm-7 col-sm-offset-1'>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Discapacidad física
                              <h5>No posee</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Discapacidad cognitiva
                              <h5>No posee</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Discapacidad psíquica
                              <h5>80%</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Discapacidad sensorial visual
                              <h5>No posee</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Discapacidad sensorial auditiva
                              <h5>No posee</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Discapacidad social y de la comunicación
                              <h5>No posee</h5>
                            </div>  
                            <hr class='hr-normal'>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Diagnóstico Médico
                              <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </h5>
                            </div>  
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Otras enfermedades o condiciones médicas
                              <h5>No posee</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Dependencia
                              <h5>No posee</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Cuidado de terceros
                              <h5>No posee</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              Plan de rehabilitación, tratamiento o control
                              <h5>No posee</h5>
                            </div>          
                          </div>
                        </fieldset>
                        <hr class='hr-normal'>
                        <fieldset>
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
