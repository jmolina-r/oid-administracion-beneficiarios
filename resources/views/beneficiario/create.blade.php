<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
Registro de Beneficiario - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles_before')
<link href="{{ asset('/assets/stylesheets/plugins/fuelux/wizard.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('styles')
<link href="{{ asset('/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href='{{ asset('/assets/images/meta_icons/apple-touch-icon-precomposed.png') }}' rel='apple-touch-icon-precomposed'>
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/assets/stylesheets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

<!-- Atributos del body -->
@section('body-attr')
class='contrast-red'
@endsection

<!-- Inyeccion de scripts
     No importa que vayan antes del body, en el master layout se estan insertando alfinal.
   -->
   @section('scripts')
   <!-- / jquery [required] -->
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
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{ asset('/assets/javascripts/plugins/fuelux/wizard.js') }}" type="text/javascript"></script>
    <!-- / END - page related files and scripts [optional] -->
    <!-- / Beneficiario select tag -->
   <script src="{{ asset('assets/javascripts/plugins/select2/select2.js') }}" type="text/javascript"></script>
   <!-- / START - moments-->
   <script src="{{ asset('/assets/javascripts/plugins/common/moment.min.js') }}" type="text/javascript"></script>
   <!-- / END - moments-->
   <!-- / START - datepicker-->
   <script src="{{ asset('/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
   <!-- / END - datepicker-->
   <!-- / START - Validaciones-->
   <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
   <script src="{{ asset('/assets/javascripts/plugins/1000hz-bootstrap-validator/validator.min.js') }}"></script>
   <script src="{{ asset('/js/InputValidation.js') }}" type="text/javascript"></script>
   <script src="{{ asset('/js/beneficiario/RegistroBeneficiario.js') }}" type="text/javascript"></script>
  <!-- / END - validaciones-->
   <!-- / START Vista para llenado de select dinamicos -->
   @include('partials.dropdown')
   <!-- / END  -->
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
                    <span>Registro de Usuario</span>
                  </h1>
                  <div class='pull-right'>
                    <ul class='breadcrumb'>
                      <li>
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
                        </ul>
                      </div>
                      <div class='actions'>
                        <button id="continuar_btn" type='submit' class='pull-right btn btn-md btn-success btn-next' data-last='Finalizar'>
                          Continuar
                          <i class='fa fa-arrow-right'></i>
                        </button>
                        <button class='pull-right btn btn-md btn-prev'>
                          <i class='fa fa-arrow-left'></i>
                          Volver
                        </button>
                      </div>
                      @if(count($errors) > 0)
                          <hr class='hr-normal'>

                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                      <hr class='hr-normal'>
                      <form role="form" id="formulario-registro" action="{{route('beneficiario.store')}}" accept-charset="UTF-8" style="margin-bottom: 0;" method="post"><div class='step-content'>
                        <!-- STEP 1 -->
                        <div class='step-pane active' data-step='1'>

                          <div class='col-md-12 form-group'>
                            <label class='control-label' for='inputText'>Nombres</label>
                            <div class='controls'>
                              <input name='nombres' class='form-control onlyletters' value="{{ old('nombres') }}" placeholder='Nombres' type='text' maxlength="200" required>
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>

                          <div class='col-md-12 form-group'>
                            <label class='control-label' for='inputText'>Apellidos</label>
                            <div class='controls'>
                              <input name='apellidos' value="{{ old('apellidos') }}" class='form-control onlyletters' id='inputText' placeholder='Apellidos' type='text' required>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>

                          <div class='col-md-12 form-group'>
                           <label class='control-label' for='inputText'>Cédula de identidad (Sin puntos con guión)</label>
                           <div class='controls'>
                            <input name="rut" value="{{ old('rut') }}" class='onlyrut form-control' id='inputText' placeholder='Ej. 12345678-8' type='text' required pattern="\d{3,8}-[\d|kK]{1}" maxlength="200">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 form-group">
                          <label class='control-label' for='inputSelect'>Nacionalidad</label>
                          <select name='id_pais' class='form-control' id='inputSelect'>
                            @foreach($paises as $pais)
                              <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 form-group">
                          <label class='control-label' for='inputSelect'>Fecha de Nacimiento</label>
                          <div class='datepicker-input input-group' id='datepicker'>
                            <input value="{{ old('fecha_nacimiento') }}" name='fecha_nacimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Fecha de Nacimiento' type='text' required  pattern="^(?:(?:0?[1-9]|1\d|2[0-8])(\/|-)(?:0?[1-9]|1[0-2]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:31(\/|-)(?:0?[13578]|1[02]))|(?:(?:29|30)(\/|-)(?:0?[1,3-9]|1[0-2])))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(29(\/|-)0?2)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$">
                            <span class='input-group-addon'>
                              <span class='fa fa-calendar'></span>
                            </span>
                          </div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 form-group">
                          <label class='control-label'>Sexo</label>
                          <div class='col-md-12'>
                            <label style="margin-top: 0px;" class='radio radio-inline'>
                              <input name='sexo' @if(old('sexo') != 'femenino') checked @endif type='radio' value='masculino' required>
                              Masculino
                            </label>
                            <label class='radio radio-inline'>
                              <input name='sexo' @if(old('sexo') === 'femenino') checked @endif type='radio' value='femenino' required>
                              Femenino
                            </label>
                          </div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 form-group">
                           <label class='control-label' for='inputSelect'>Situación Civil</label>
                           <select name='estado_civil' class='form-control capitalize' id='inputSelect'>
                              @foreach($estados_civiles as $estado_civil)
                                <option value="{{$estado_civil->id}}">{{$estado_civil->nombre}}</option>
                              @endforeach
                           </select>
                        </div>


                       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                        <label class='control-label' for='inputText'>Domicilio</label>
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <div class='col-xs-12 col-sm-12 col-md-3 form-group'>
                             <div class='controls'>
                               <input value="{{ old('domicilio_calle') }}" name='domicilio_calle' class='form-control' id='domicilio_calle' placeholder='Calle' type='text' maxlength="200">
                             </div>
                           </div>

                           <div class='col-xs-12 col-sm-12 col-md-3 form-group'>
                              <input name='domicilio_numero' value="{{ old('domicilio_numero') }}" class='form-control onlynumbers' id='domicilio_numero' placeholder='Número' type='text'>
                             <div class="help-block with-errors"></div>
                           </div>

                           <div class='col-xs-12 col-sm-12 col-md-3 form-group'>
                             <div class='controls'>
                               <input name='domicilio_numero_dpto' value="{{ old('domicilio_dpto') }}" class='form-control' id='inputText' placeholder='Número Departamento' type='text'>
                             </div>
                           </div>

                           <div class='col-xs-12 col-sm-12 col-md-3 form-group'>
                             <div class='controls'>
                               <input name='domicilio_poblacion' value="{{ old('domicilio_poblacion') }}" class='form-control' id='inputText' placeholder='Poblacion / Villa' type='text'>
                             </div>
                           </div>
                         </div>
                       </div>

                       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                         <label class='control-label' for='inputText'>Contacto</label>
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <div class='col-md-4 controls form-group'>
                              <div class='input-group'>
                                <span class='capitalize input-group-addon'>+56</span>
                                <input name='tel_fijo' value="{{ old('tel_fijo') }}" class='form-control onlynumbers' id='inputText' placeholder='Telefono Fijo' type='text' maxlength="9">
                              </div>
                           </div>

                           <div class='col-md-4 controls form-group'>
                              <div class='input-group'>
                                <span class='capitalize input-group-addon'>+56</span>
                                <input name='tel_movil' value="{{ old('tel_movil') }}" class='form-control onlynumbers' id='inputText' placeholder='Celular' type='text' maxlength="9">
                             </div>
                           </div>

                           <div class='col-sm-4 controls form-group'>
                             <input name='email'  value="{{ old('email') }}" class='form-control' placeholder='E-mail' type='email'>
                             <div class="help-block with-errors"></div>
                           </div>
                         </div>
                       </div>

                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <label class='control-label' for='inputSelect'>Credencial de discapacidad</label>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                             <select name='credencial_discapacidad' value="{{ old('credencial_discapacidad') }}" class='form-control' id='credencial_discapacidad' required>
                               <option value='0'>No</option>
                               <option value='2'>En trámite</option>
                               <option value='1'>Si</option>
                             </select>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <div class='datepicker-input input-group' id='datepicker'>
                              <input name='credencial_vencimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Vencimiento' type='text' pattern="^(?:(?:0?[1-9]|1\d|2[0-8])(\/|-)(?:0?[1-9]|1[0-2]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:31(\/|-)(?:0?[13578]|1[02]))|(?:(?:29|30)(\/|-)(?:0?[1,3-9]|1[0-2])))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(29(\/|-)0?2)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$" id="credencial_vencimiento" disabled>
                              <span class='input-group-addon'>
                                <span class='fa fa-calendar'></span>
                              </span>
                            </div>
                              <div class="help-block with-errors"></div>
                          </div>
                         </div>
                      </div>

                      <!-- Falta aqui manejar la subida de archivo para agregar la credencial -->

                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <label class='control-label' for='inputSelect'>Registro social de hogares</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                           <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                             <select name='registro_social_hogares' class='form-control' required id="registro_social_hogares">
                               <option value='0'>No</option>
                               <option value='2'>En trámite</option>
                               <option value='1'>Si</option>
                             </select>
                           </div>

                           <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                              <div class="input-group">
                                <input name='registro_social_porcentaje' class='form-control' placeholder='Porcentaje' type='number' min="0" max="100" id="registro_social_porcentaje" disabled>
                                <span class='input-group-addon'>%</span>
                             </div>
                             <div class="help-block with-errors"></div>
                           </div>
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <label class='control-label' for='inputSelect'>Acompañante o tutor</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group'>
                            <input name='nombre_tutor' value="{{ old('nombre_tutor') }}" class='form-control onlyletters' id='inputText' placeholder='Nombre' type='text' required maxlength="200">
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group'>
                            <input name='apellido_tutor' value="{{ old('apellido_tutor') }}" class='form-control onlyletters' id='inputText' placeholder='Apellidos' type='text' required maxlength="200">
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                            <input name='telefono_tutor' value="{{ old('telefono_tutor') }}" class='form-control onlynumbers' id='inputText' placeholder='Teléfono de contacto' type='text'>
                          </div>
                        </div>
                      </div>

                     </div>

                     <!-- STEP 2 -->
                     <div class='step-pane' data-step='2'>

                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                        <label class='control-label' for='inputText'>Sistema de Salud</label>

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                              <label style="margin-top: 0px;" class='radio radio-inline'>
                                <input name='sistema_salud' type='radio' value='fonasa' checked>
                                Fonasa
                              </label>
                              <label class='radio radio-inline'>
                                <input name='sistema_salud' type='radio' value='isapre'>
                                Isapre
                              </label>
                            <div class="help-block with-errors"></div>
                          </div>

                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                             <select id="sistemaSaludSelec" name='fonasa' class='form-control capitalize' required>
                                 @foreach($fonasa as $fona)
                                 <option value="{{$fona->id}}">{{$fona->tramo}}</option>
                                 @endforeach
                             </select>
                          </div>
                     </div>

                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label class='control-label' for='inputText'>Previsión</label>

                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group'>
                           <select name='prevision' class='form-control capitalize' id='inputSelect'>
                              <option value=''>No tiene</option>
                              @foreach($previsiones as $prevision)
                                  <option value="{{$prevision->id}}">{{$prevision->nombre}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>

                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
                    <label class='control-label' for='inputText'>Nivel Educacional</label>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                       <select name='educacion' class='form-control capitalize' id='inputSelect'>
                         @foreach($niveles_educacion as $nivel_educacion)
                            <option value="{{$nivel_educacion->id}}">{{$nivel_educacion->nombre}}</option>
                         @endforeach
                       </select>
                    </div>
                 </div>

                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
                    <label class='control-label' for='inputText'>Ocupación Actual</label>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
                       <select name='ocupacion' class='form-control capitalize' id='inputSelect'>
                          @foreach($situaciones as $situacion)
                              <option value="{{$situacion->id}}">{{$situacion->nombre}}</option>
                          @endforeach
                       </select>
                    </div>
                 </div>

                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class='control-label' for='inputText'>Beneficios</label>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                      <select style="width: 100%;" class='form-control' data-placeholder='Selecciona los beneficios asociados...' id='select2-tags' multiple='multiple'>
                        @foreach($beneficios as $beneficio)
                          <option value="{{$beneficio->id}}">{{$beneficio->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                 </div>

                 <div class='col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group'>
                   <label class='control-label' for='inputText'>Sistema de protección</label>
                   <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
                      <select name='sistema_proteccion' class='form-control capitalize' id='inputSelect'>
                          @foreach($datos_sociales as $dato_social)
                              <option value="{{$dato_social->id}}">{{$dato_social->nombre}}</option>
                          @endforeach
                      </select>
                   </div>
                 </div>

               <div class='col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group'>
                 <label class='control-label' for='inputText'>Participación en Organizaciones Sociales</label>
                 <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 controls'>
                    <select name='organizaciones_sociales' class='form-control capitalize' id='inputSelect'>
                      @foreach($organizaciones_sociales as $organizacion_social)
                        <option value="{{$organizacion_social->id}}">{{$organizacion_social->nombre}}</option>
                      @endforeach
                    </select>
                 </div>
               </div>

             </div>



             <!-- STEP 3 -->
             <div class='step-pane' data-step='3'>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class='col-md-12 control-label' for='inputText'>Tipo de Discapacidad</label>

                @foreach ($tipo_discapacidades as $tipo_discapacidad)
                    <div class='form-group col-md-6'>
                      <div class='input-group'>
                        <span class='capitalize input-group-addon'>
                          {{$tipo_discapacidad->nombre}}
                        </span>
                        <input name="tipo_discapacidad[{{$tipo_discapacidad->nombre}}]" type="number" class="form-control bfh-number input-lg text-right" min="0" max="100" data-wrap="true" value="0">
                        <span class="input-group-addon">%</span>
                      </div>
                    </div>
                @endforeach

              </div>

              <div class='col-md-12 form-group'>
               <label class='control-label' for='inputText'>Diagnóstico Médico</label>
               <div class='col-md-12 controls'>
                 <input name="diagnostico" class='form-control' id='inputText' placeholder='Si no aplica, dejar en blanco.' type='text'>
               </div>
             </div>

             <div class='col-md-12 form-group'>
               <label class='control-label' for='inputText'>Otras enfermedades o condiciones médicas</label>
               <div class='col-md-12 controls'>
                 <input class='form-control' id='inputText' placeholder='Si no aplica, dejar en blanco.' type='text'>
               </div>
             </div>

             <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <label class='control-label' for='inputText'>Dependencia</label>
              <div class='col-md-12 form-group'>
                <div class='col-md-12'>
                 <select name="tipo_dependencia_id" class='form-control permanente capitalize' id='inputSelect'>
                   @foreach($dependencias as $dependencia)
                      <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                   @endforeach
                 </select>
               </div>
             </div>
           </div>


           <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label class='control-label' for='inputText'>Cuidado de Terceros</label>
            <div class='col-md-12 form-group'>
              <div class='col-md-12'>
               <label style="margin-top: 0px;" class='radio radio-inline'>
                 <input name='cuidados' type='radio' value='1' required>
                 Si
               </label>
               <label class='radio radio-inline'>
                 <input name='cuidados' type='radio' value='0' required>
                 No
               </label>
             </div>
           </div>
         </div>

         <div class='col-xs-5 col-sm-5 col-md-5 col-lg-5 form-group'>
           <label class='control-label' for='inputText'>Plan de rehabilitación, tratamiento o control</label>
           <div class='col-md-12 controls'>
             <input name='p_reha_trat_ctrl' class='form-control' id='inputText' placeholder='¿Donde? Si no aplica, dejar en blanco.' type='text'>
           </div>
         </div>
       </div>
     </div>
     {{ csrf_field() }}
   </form>
 </div>
</div>
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
