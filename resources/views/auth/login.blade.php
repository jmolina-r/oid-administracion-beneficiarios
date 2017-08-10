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

                    <form action='' class='validate-form' method="POST" action="{{ route('login') }}">

                        {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class='controls with-icon-over-input'>
                            <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" data-rule-required="true" autofocus>

                          <i class='fa fa-user text-muted'></i>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class='controls with-icon-over-input'>
                          <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" data-rule-required="true">

                          <i class='fa fa-lock text-muted'></i>
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                  </label>
                              </div>
                          </div>
                      </div>

                      <button class='btn btn-block'>Ingresar!</button>

                    </form>

                    <div class='text-center'>
                      <hr class='hr-normal'>

                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          Forgot Your Password?
                      </a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
