
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Login - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles')
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
    <!-- / jquery [required] -->
    <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="assets/javascripts/jquery/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
    <!-- / retina -->
    <script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="assets/javascripts/theme.js" type="text/javascript"></script>

    <!-- / START - page related files and scripts [optional] -->
    <script src="assets/javascripts/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/validate/additional-methods.js" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
@endsection

<!-- Contenido del body -->
@section('content')
      <div class='middle-container'>
        <div class='middle-row'>
          <div class='middle-wrapper'>
            <div class='login-container-header'>
              <div class='container'>
                <div class='row'>
                  <div class='col-sm-12'>
                    <div class='text-center'>
                        <img class="logo-img-login" src="{{ asset('/images/logo.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class='login-container'>
              <div class='container'>
                <div class='row'>
                  <div class='col-sm-4 col-sm-offset-4'>
                    <h1 class='text-center title'>Sistema de Administración OID</h1>
                    <form action='' class='validate-form' method='get'>
                      <div class='form-group'>
                        <div class='controls with-icon-over-input'>
                          <input type="email" value="" placeholder="E-mail" class="form-control" data-rule-required="true" />
                          <i class='fa fa-user text-muted'></i>
                        </div>
                      </div>
                      <div class='form-group'>
                        <div class='controls with-icon-over-input'>
                          <input type="password" value="" placeholder="Contraseña" class="form-control" data-rule-required="true" />
                          <i class='fa fa-lock text-muted'></i>
                        </div>
                      </div>
                      <!--<button class='btn btn-block'>Ingresar!</button>-->
                        <a href="/beneficiario/registrar" class='btn btn-block'>Ingresar</a><!--Provisional-->
                    </form>
                    <div class='text-center'>
                      <hr class='hr-normal'>
                      {{-- <a href='forgot_password.html'>¿Olvidaste tu contraseña?</a> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
