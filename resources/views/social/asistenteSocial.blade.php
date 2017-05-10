
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Área Social - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles')

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
                        <span>Wizard</span>
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
                          <li>
                            Forms
                          </li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li class='active'>Wizard</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <div class='box'>
                      <div class='box-content box-padding'>
                        <div class='fuelux'><div class='wizard' data-initialize='wizard' id='myWizard'>
                            <div class='steps-container'>
                              <ul class='steps'>
                                <li class='active' data-step='1'>
                                  <span class='step'>1</span>
                                </li>
                                <li data-step='2'>
                                  <span class='step'>2</span>
                                </li>
                                <li data-step='3'>
                                  <span class='step'>3</span>
                                </li>
                                <li data-step='4'>
                                  <span class='step'>4</span>
                                </li>
                              </ul>
                            </div>
                            <div class='actions'>
                              <button class='btn btn-xs btn-prev'>
                                <i class='fa fa-arrow-left'></i>
                                Prev
                              </button>
                              <button class='btn btn-xs btn-success btn-next' data-last='Finish'>
                                Next
                                <i class='fa fa-arrow-right'></i>
                              </button>
                            </div>
                            <hr class='hr-normal'>
                            <form action="#" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="post"><div class='step-content'>
                              <div class='step-pane active' data-step='1'>
                                <div class='form-group'>
                                  <label class='control-label' for='inputText'>Text field</label>
                                  <div class='controls'>
                                    <input class='form-control' id='inputText' placeholder='Text field' type='text'>
                                  </div>
                                </div>
                              </div>
                              <div class='step-pane' data-step='2'>
                                <div class='form-group'>
                                  <label class='control-label' for='inputPassword'>Password field</label>
                                  <div class='controls'>
                                    <input class='form-control' id='inputPassword' placeholder='Password field' type='password'>
                                  </div>
                                </div>
                              </div>
                              <div class='step-pane' data-step='3'>
                                <div class='form-group'>
                                  <label class='control-label' for='inputTextArea'>Textarea</label>
                                  <div class='controls'>
                                    <textarea class='form-control' id='inputTextArea' placeholder='Textarea' rows='3'></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class='step-pane' data-step='4'>
                                <div class='form-group'>
                                  <div class='controls'>
                                    <label class='checkbox-inline'>
                                      <input id='inlineCheckbox1' type='checkbox' value='option1'>
                                      Inline 1
                                    </label>
                                    <label class='checkbox-inline'>
                                      <input id='inlineCheckbox2' type='checkbox' value='option2'>
                                      Inline 2
                                    </label>
                                    <label class='checkbox-inline'>
                                      <input id='inlineCheckbox3' type='checkbox' value='option3'>
                                      Inline 3
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </form>
                          </div></div>
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
