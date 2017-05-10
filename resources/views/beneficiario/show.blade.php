
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
                        <span>User profile</span>
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
                    </div>
                  </div>
                  <div class='col-sm-9 col-lg-10'>
                    <div class='box'>
                      <div class='box-content box-double-padding'>
                        <form class='form' style='margin-bottom: 0;'>
                          <fieldset>
                            <div class='col-sm-4'>
                              <div class='lead'>
                                <i class='fa fa-github text-contrast'></i>
                                Lorem ipsum
                              </div>
                              <small class='text-muted'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisl est, vulputate at porttitor non, interdum a mauris. Phasellus imperdiet gravida pulvinar.</small>
                            </div>
                            <div class='col-sm-7 col-sm-offset-1'>
                              <div class='form-group'>
                                <label>Username</label>
                                <input class='form-control' id='username' placeholder='Username' type='text'>
                              </div>
                              <div class='form-group'>
                                <label>E-mail</label>
                                <input class='form-control' id='email' placeholder='E-mail' type='text'>
                              </div>
                              <hr class='hr-normal'>
                              <div class='form-group'>
                                <div class='controls'>
                                  <div class='checkbox'>
                                    <label>
                                      <input data-target='#change-password' data-toggle='collapse' id='changepasswordcheck' type='checkbox' value='option1'>
                                      Change password?
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class='collapse' id='change-password'>
                                <div class='form-group'>
                                  <label>Password</label>
                                  <input class='form-control' id='password' placeholder='Password' type='password'>
                                </div>
                                <div class='form-group'>
                                  <label>Password confirmation</label>
                                  <input class='form-control' id='password-confirmation' placeholder='Password confirmation' type='password'>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                          <hr class='hr-normal'>
                          <fieldset>
                            <div class='col-sm-4'>
                              <div class='lead'>
                                <i class='fa fa-user text-contrast'></i>
                                Personal info
                              </div>
                              <small class='text-muted'>Proin eu nibh ut urna tristique rhoncus. Sed euismod, quam sed dignissim imperdiet, nulla leo vehicula mi, a sagittis lacus augue nec sapien.</small>
                            </div>
                            <div class='col-sm-7 col-sm-offset-1'>
                              <div class='form-group'>
                                <label>First name</label>
                                <input class='form-control' id='firstname' placeholder='First name' type='text'>
                              </div>
                              <div class='form-group'>
                                <label>Last name</label>
                                <input class='form-control' id='lastname' placeholder='Last name' type='text'>
                              </div>
                              <hr class='hr-normal'>
                              <div class='form-group'>
                                <label>Bio</label>
                                <textarea class='autosize form-control' id='bio' placeholder='Bio'></textarea>
                              </div>
                            </div>
                          </fieldset>
                          <div class='form-actions form-actions-padding' style='margin-bottom: 0;'>
                            <div class='text-right'>
                              <div class='btn btn-primary btn-lg'>
                                <i class='fa fa-floppy-o'></i>
                                Save
                              </div>
                            </div>
                          </div>
                        </form>
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
