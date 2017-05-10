<!DOCTYPE html>
<!--
  Name: Flatty - Flat Administration Template
  Website: https://wrapbootstrap.com/theme/flatty-flat-administration-template-WB0P6NR1N?ref=metheus
  Version: 2.4.1
-->
<html lang='en'>
  <head>
    <title>Wizard | Flatty - Flat Administration Template</title>
    <meta content='admin template, administration template, bootstrap icons, bootstrap template, dashboard, flat design, flat template, bootstrap flat' name='keywords'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
    <meta content='BublinaStudio.com' name='author'>
    <meta content='all' name='robots'>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!--[if IE]> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <![endif]-->
    <link href={{ asset('/assets/images/meta_icons/favicon.ico') }} rel='shortcut icon' type='image/x-icon'>
    <link href={{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }} rel='apple-touch-icon-precomposed'>
    <!-- / START - page related stylesheets [optional] -->
    <link href={{ asset("/assets/stylesheets/plugins/fuelux/wizard.css") }} rel="stylesheet" type="text/css" media="all" />
    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href={{ asset('/assets/stylesheets/bootstrap/bootstrap.css') }} rel="stylesheet" type="text/css" media="all" />
    <!-- / theme file [required] -->
    <link href={{ asset("/assets/stylesheets/light-theme.css") }} rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href={{ asset("/assets/stylesheets/theme-colors.css") }} rel="stylesheet" type="text/css" media="all" />
    <!-- Estilo para los datepicker -->
    <link href={{ asset("/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css") }} rel="stylesheet" type="text/css" media="all" />
    <link href={{ asset("/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css") }} rel="stylesheet" type="text/css" media="all" />
  </head>
  <body class='contrast-red '>
    <header>
        <nav class='navbar navbar-default'>
          <a class='navbar-brand' href='/principal'>
            <3 OID
          </a>
          <a class='toggle-nav btn pull-left' href='#'>
            <i class='fa fa-bars'></i>
          </a>
        </nav>
    </header>
    <div id='wrapper'>
      <div id='main-nav-bg'></div>
      <nav id='main-nav'>
  <div class='navigation'>
    <div class='search'>
      <form action='search_results.html' method='get'>
        <div class='search-wrapper'>
          <input type="text" name="q" value="" class="search-query form-control" placeholder="Search..." autocomplete="off" />
          <button class='btn btn-link fa fa-search' name='button' type='submit'></button>
        </div>
      </form>
    </div>
    <ul class='nav nav-stacked'>
      <li class='active'>
        <a href='/principal'>
          <i class='fa fa-tachometer'></i>
          <span>Servicio Administrativo OID</span>
        </a>
      </li>
      <li class=''>
        <a class="dropdown-collapse" href="#"><i class='fa fa-pencil-square-o'></i>
        <span>Área Social</span>
        <i class='fa fa-angle-down angle-down'></i>
        </a>
        <ul class='nav nav-stacked'>
          <li class=''>
            <a href='{{ route('social.asistenteSocial') }}'>
              <div class='icon'>
                <i class='fa fa-caret-right'></i>
              </div>
              <span>Asistente Social</span>
            </a>
          </li>
        </ul>
        <ul class='nav nav-stacked'>
        </ul>
      </li>
    </ul>
  </div>
</nav>
      <section id='content'>
        <div class='container'>
          <div class='row' id='content-wrapper'>
            <div class='col-xs-12'>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='page-header'>
                    <h1 class='pull-left'>
                      <i class='fa fa-pencil-square-o'></i>
                      <span>Asistente Social</span>
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
                            <button class='pull-right btn btn-md btn-success btn-next' data-last='Finish'>
                              Continuar
                              <i class='fa fa-arrow-right'></i>
                            </button>
                            <button class='pull-right btn btn-md btn-prev'>
                              <i class='fa fa-arrow-left'></i>
                              Volver
                            </button>
                          </div>
                          <hr class='hr-normal'>
                            <div class='step-content'>
                            <!-- STEP 1 -->
                             <div class='step-pane active' data-step='1'>
                             
                                <div class='col-md-12 form-group'>
                                  <label class='control-label col-md-12' for='inputText'>Ingrese rut del beneficiario</label>
                                  <div class='controls col-md-7'>
                                    <input name='nombres' class='form-control' id='inputText' placeholder='Nombres' type='text'pattern="\d{3,8}-[\d|kK]{1}">
                                  </div>
                                  <div class='controls col-md-3'>
                                    <button class='btn' type='submit'>Buscar</button>
                                  </div>
                                </div>
                             </div>
                            <h1>{{ $beneficiario->rut }}</h1>
                            

                            
                            
                           
                         
                           
          <footer id='footer'>
            <div class='footer-wrapper'>
              <div class='row'>
                <div class='col-sm-6 text'>
                  Copyright © 2016 Your Project Name
                </div>
                <div class='col-sm-6 buttons'>
                  <a class="btn btn-link" href="http://flatty-v2-4-1.bublinastudio.com/">Preview</a>
                  <a class="btn btn-link" href="https://wrapbootstrap.com/theme/flatty-flat-administration-template-WB0P6NR1N?ref=metheus">Purchase</a>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </section>
    </div>
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
    <script src="assets/javascripts/plugins/fuelux/wizard.js" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <!-- / START - moments-->
    <script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
    <!-- / END - moments-->
    <!-- / START - datepicker-->
    <script src="assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!-- / END - datepicker-->
    <!-- / START - Validaciones-->
    <script src="assets/javascripts/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/validate/additional-methods.js" type="text/javascript"></script>
    <script>
        $.validator.addMethod("buga", (function(value) {
            return value === "buga";
        }), "Please enter \"buga\"!");

        $.validator.methods.equal = function(value, element, param) {
            return value === param;
        };
    </script>
    <!-- / END - validaciones-->
  </body>
</html>

