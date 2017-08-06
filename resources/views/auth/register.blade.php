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

@section('content')
    @include('partials.header')




    <div class='middle-container'>
      <div class='middle-row'>
        <div class='middle-wrapper'>

          <div class='login-container'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-4 col-sm-offset-4'>
                  <h1 class='text-center title'>Sistema de Administración OID</h1>

                  <form action='' class='validate-form' method="POST" action="{{ route('login') }}">

                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                          <div class="controls with-icon-over-input">
                              <input id="username" type="text" class="form-control" name="username" placeholder="username" value="{{ old('username') }}" required autofocus>

                              @if ($errors->has('username'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('username') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                          <div class="controls with-icon-over-input">
                              <input id="email" type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                          <div class="controls with-icon-over-input">
                              <input id="password" type="password" class="form-control" placeholder="password" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="controls with-icon-over-input">
                              <input id="password-confirm" type="password" class="form-control" placeholder="password Confirmation" name="password_confirmation" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class='control-label' for='inputText'>Roles</label>
                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                              <select style="width:100%;" name="roles[]" class='form-control select-tag' data-placeholder='Selecciona los beneficios asociados...' multiple='multiple'>

                                  @foreach($roles as $role)
                                      <option value="{{$role->id}}">{{$role->nombre}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                    <button class='btn btn-block'>Registrar!</button>

                  </form>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>









@endsection
