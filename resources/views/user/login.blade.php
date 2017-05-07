
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Login - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles')
    <title>Sign in | Flatty - Flat Administration Template</title>

    <link href="/assets/stylesheets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / theme file [required] -->
    <link href="/assets/stylesheets/light-theme.css" rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="/assets/stylesheets/theme-colors.css" rel="stylesheet" type="text/css" media="all" />
@endsection

<!-- Atributos del body -->
@section('body-attr')
    class='contrast-red login contrast-background'
@endsection

<!-- Inyeccion de scripts
     No importa que vayan antes del body, en el master layout se estan insertando alfinal.
-->
@section('scripts')
    
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
                        <h1 style="color:white"> <3 OID Antofagasta </h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class='login-container'>
              <div class='container'>
                <div class='row'>
                  <div class='col-sm-4 col-sm-offset-4'>
                    <h1 class='text-center title'>Ingreso al mejor sistema de la vida</h1>
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
                      <button class='btn btn-block'>Ingresar!</button>
                    </form>
                    <div class='text-center'>
                      <hr class='hr-normal'>
                      <a href='forgot_password.html'>¿Olvidaste tu contraseña?</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
