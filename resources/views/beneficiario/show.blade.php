
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
                        <span>Información de <span class="capitalize">{{$persona->nombre}} {{$persona->apellido}} <span></span>
                      </h1>
                    </div>
                  </div>
                </div>                
                <div class="col-lg-12">
                  <div class="col-lg-3">
                    @include('partials.profile.photo')
                  </div>
                  <div class="col-md-3">
                      <h4>Datos Personales</h4>
                      @include('partials.profile.personal')
                  </div>
                  @isset($persona->domicilio)
                  <div class="col-md-3">
                      <h4>Ubicación</h4>
                      @include('partials.profile.location')
                  </div>
                  @endisset
                  @if((isset($persona->telefonos) && count($persona->telefonos) > 0) || isset($persona->email))
                  <div class="col-md-3">
                      <h4>Datos de Contacto</h4>
                      @include('partials.profile.contact')
                  </div>
                  @endif                 
                </div>
                <div class="col-lg-12">                  
                  <div class="col-md-12">
                    <h4>Datos sociales</h4>
                    @include('partials.profile.social')
                  </div>
                  <div class="col-md-12">
                      <h4>Datos de Discapacidad</h4>
                      @include('partials.profile.discapacidad')
                  </div>
                </div>
                @isset($persona->tutor)
                <div class="col-lg-12">
                  <div class="col-md-4">
                    <h4>Datos Tutor</h4>
                    @include('partials.profile.personal', ['persona' => $persona->tutor])
                    @include('partials.profile.contact', ['persona' => $persona->tutor])
                  </div>
                </div>
                @endisset
              </div>
            </div>
            @include('partials.footer')
          </div>
        </section>
      </div>
@endsection
