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
    <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='assets/images/meta_icons/apple-touch-icon-precomposed.png' rel='apple-touch-icon-precomposed'>
    <!-- / START - page related stylesheets [optional] -->
    <link href="assets/stylesheets/plugins/fuelux/wizard.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href="assets/stylesheets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / theme file [required] -->
    <link href="assets/stylesheets/light-theme.css" rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="assets/stylesheets/theme-colors.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Estilo para los datepicker -->
    <link href="assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="all" />
  </head>
  <body class='contrast-red '>
    @include('partials.header')
    <div id='wrapper'>
      <div id='main-nav-bg'></div>
      @include('partials.nav')
      <!-- AQUI VA EL NAVBAR  -->
      <section id='content'>
        <div class='container'>
          <div class='row' id='content-wrapper'>
            <div class='col-xs-12'>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='page-header'>
                    <h1 class='pull-left'>
                      <i class='fa fa-pencil-square-o'></i>
                      <span>Visita Domiciliaria</span>
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
                          <form action="#" accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="post"><div class='step-content'>
                              <!-- STEP 1 -->
                           <div class='step-pane active' data-step='1'>

                              <div class='col-md-12 form-group'>
                                <label class='control-label' for='inputSelect'>Escriba el nombre o rut del beneficiario</label>
                                <div class='controls'>
                                  <input class='form-control' id='inputText' placeholder='Bryan Miranda'>
                                </div>
                              </div>

                             <div class='col-md-12 form-group'>
                               <label class='control-label' for='inputText'>Cédula de identidad</label>
                               <div class='controls'>
                                 <input class='form-control' id='inputText' placeholder='18.501.813-k' type='text' readonly="readonly">
                               </div>
                             </div>

                             <div class='col-md-12 form-group'>
                               <label class='col-md-2 control-label' for='inputSelect'>Nacionalidad</label>
                               <div class='col-md-4'>
                                 <select class='form-control' id='inputSelect'readonly="readonly">
                                   <option>Argentina</option>
                                   <option>Chile</option>
                                   <option>Perú</option>
                                 </select>
                               </div>

                               <label class='col-md-2 control-label' for='inputSelect'>Fecha de Nacimiento</label>
                               <div class='datepicker-input input-group' id='datepicker'>
                                 <input class='form-control' data-format='DD-MM-YYYY' placeholder='24-08-1993' type='text' readonly="readonly">
                                 <span class='input-group-addon'>
                                   <span class='fa fa-calendar'></span>
                                 </span>
                               </div>
                             </div>

                             <div class='col-md-12 form-group'>
                               <label class='col-md-2 control-label'>Sexo</label>
                               <div class='col-md-4'>
                                 <label style="margin-top: 0px;" class='radio radio-inline'>
                                   <input name='sexo' type='radio' value='m'>
                                   Masculino
                                 </label>
                                 <label class='radio radio-inline'>
                                   <input name='sexo' type='radio' value='f'>
                                   Femenino
                                 </label>
                               </div>

                               <label class='col-md-2 control-label' for='inputSelect'>Situación Civil</label>
                               <div class='col-md-4'>
                                 <select class='form-control' id='inputSelect' readonly="readonly">
                                   <option>Soltero</option>
                                   <option>Casado</option>
                                   <option>Viudo</option>
                                   <option>Separado</option>
                                   <option>Conviviente</option>
                                 </select>
                               </div>
                             </div>

                             <div class='col-md-12 form-group'>
                               <label class='col-md-12 control-label' for='inputText'>Domicilio</label>
                               <div class='col-md-3'>
                                 <div class='controls'>
                                   <input class='form-control' id='inputText' placeholder='Héroes de la concepción' type='text' readonly="readonly">
                                 </div>
                               </div>

                               <div class='col-md-3'>
                                 <div class='controls'>
                                   <input class='form-control' id='inputText' placeholder='9571' type='text' readonly="readonly">
                                 </div>
                               </div>

                               <div class='col-md-3'>
                                 <div class='controls'>
                                   <input class='form-control' id='inputText' placeholder='-' type='text' readonly="readonly">
                                 </div>
                               </div>

                               <div class='col-md-3'>
                                 <div class='controls'>
                                   <input class='form-control' id='inputText' placeholder='Altos del Club Hípico' type='text'readonly="readonly">
                                 </div>
                               </div>
                             </div>

                             <div class='col-md-12 form-group'>
                               <label class='col-md-12 control-label' for='inputText'>Contacto</label>
                               <div class='col-md-4 controls'>
                                 <input class='form-control' id='inputText' placeholder='-' type='text' readonly="readonly">
                               </div>

                               <div class='col-md-4 controls'>
                                 <input class='form-control' id='inputText' placeholder='98687586' type='text' readonly="readonly">
                               </div>

                               <div class='col-sm-4 controls'>
                                 <input class='form-control' data-rule-email='true' data-rule-required='true' id='validation_email' name='validation_email' placeholder='bmg05@hotmail.cl' type='text' readonly="readonly">
                               </div>
                             </div>

                             <div class='col-md-12 form-group'>
                               <label class='col-md-2 control-label' for='inputSelect'>Credencial de discapacidad</label>
                               <div class='col-md-2'>
                                 <select class='form-control' id='inputSelect' readonly="readonly">
                                   <option>Si</option>
                                   <option>No</option>
                                   <option>En trámite</option>
                                 </select>
                               </div>

                               <div class='col-md-2 controls'>
                                 <input class='form-control' id='inputText' placeholder='Mayo' type='text' required readonly="readonly">
                               </div>

                               <label class='col-md-2 control-label' for='inputSelect'>Registro social de hogares</label>
                               <div class='col-md-2'>
                                 <select class='form-control' id='inputSelect' readonly="readonly">
                                   <option>Si</option>
                                   <option>No</option>
                                   <option>En trámite</option>
                                 </select>
                               </div>

                               <div class='col-md-2 controls'>
                                 <input class='form-control' id='inputText' placeholder='-' type='text' readonly="readonly">
                               </div>
                             </div>


                             <div class='col-md-12 form-group'>
                               <label class='col-md-2 control-label' for='inputText'>Acompañante o tutor</label>
                               <div class='col-md-4 controls'>
                                 <input class='form-control' id='inputText' placeholder='Ernes Tita' type='text' readonly="readonly">
                               </div>

                               <label class='col-md-2 control-label' for='inputText'>Teléfono</label>
                               <div class='col-md-4 controls'>
                                 <input class='form-control' id='inputText' placeholder='987654321' type='text' readonly="readonly">
                               </div>
                             </div>

                      <div class='col-md-12 form-group'>
                             <label class='control-label' for='inputText'>Motivo de la visita domiciliaria</label>
                               <div class='controls'>
                                  <select class='form-control' id='inputSelect'>
                                   <option>Verificación de Domicilio</option>
                                   <option>Elaboración de informe social</option>
                                   <option>Entrega de ayuda técnica</option>
                                   <option>Entrega de ayuda social</option>
                                   </select>
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
