
<!-- Extiende el master layout -->
@extends('layouts.master')

<!-- meta atributo title -->
@section('title')
    Área Social - OID
@endsection

<!-- inyeccion de estilos -->
@section('styles')
  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
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
    <script src="{{ asset('/assets/javascripts/plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/javascripts/plugins/validate/additional-methods.js') }}" type="text/javascript"></script>
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
                            Reportabilidad
                          </li>
                          <li class='separator'>
                            <i class='fa fa-angle-right'></i>
                          </li>
                          <li class='active'>Estadísticas</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>OID</div>
                      <div class='actions'>
                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                        </a>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-no-padding'>
                      <div class='responsive-table'>
                        <div class='scrollable-area'>
                          <table class='table' style='margin-bottom:0;'>
                            <thead>
                              <tr>
                                <th>
                                  Name
                                </th>
                                <th>
                                  E-mail
                                </th>
                                <th>
                                  Status
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Atenciones Mensuales</td>
                                <td>[Cargar atenciones mensuales]</td>
                                <td>
                                  <span class='label label-warning'>Warning</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Atenciones Anuales</td>
                                <td>[Cargar atenciones anuales]</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                      <div class='title'>Usuarios</div>
                      <div class='actions'>
                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                        </a>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-no-padding'>
                      <div class='responsive-table'>
                        <div class='scrollable-area'>
                          <table class='table' style='margin-bottom:0;'>
                            <thead>
                              <tr>
                                <th>
                                  Name
                                </th>
                                <th>
                                  E-mail
                                </th>
                                <th>
                                  Status
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Cantidad total de usuarios</td>
                                <td>[Cargar total usuarios]</td>
                                <td>
                                  <span class='label label-warning'>Warning</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Cantidad de nuevos ingresos mensuales</td>
                                <td>[Cargar cantidad ingresos mensuales]</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Cantidad de nuevos ingresos anuales</td>
                                <td>[Cargar cantidad ingresos anuales]</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header green-background'>
                      <div class='title'>Perfiles de usuario</div>
                      <div class='actions'>
                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                        </a>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-no-padding'>
                      <div class='responsive-table'>
                        <div class='scrollable-area'>
                          <table class='table' style='margin-bottom:0;'>
                            <thead>
                              <tr>
                                <th>
                                  Name
                                </th>
                                <th>
                                  E-mail
                                </th>
                                <th>
                                  Status
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Masculinos</td>
                                <td>elouise@yahoo.com</td>
                                <td>
                                  <span class='label label-warning'>Warning</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Femeninos</td>
                                <td>margie@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Cantidad de solicitud de credencial de discapacidad</td>
                                <td>percy@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Cantidad del registro social de hogares</td>
                                <td>marge@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Cantidad de prestaciones sociales</td>
                                <td>cody@gmail.com</td>
                                <td>
                                  <span class='label label-success'>Success</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header green-background'>
                      <div class='title'>Profesionales</div>
                      <div class='actions'>
                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                        </a>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-no-padding'>
                      <div class='responsive-table'>
                        <div class='scrollable-area'>
                          <table class='table' style='margin-bottom:0;'>
                            <thead>
                              <tr>
                                <th>
                                  Name
                                </th>
                                <th>
                                  E-mail
                                </th>
                                <th>
                                  Status
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Cantidad de atenciones mensuales</td>
                                <td>elouise@yahoo.com</td>
                                <td>
                                  <span class='label label-warning'>Warning</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Cantidad de atenciones anuales</td>
                                <td>margie@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Ernestina Torp</td>
                                <td>percy@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Katheryn Strosin</td>
                                <td>marge@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Allison Parker</td>
                                <td>cody@gmail.com</td>
                                <td>
                                  <span class='label label-success'>Success</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header green-background'>
                      <div class='title'>Agrupaciones</div>
                      <div class='actions'>
                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                        </a>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-no-padding'>
                      <div class='responsive-table'>
                        <div class='scrollable-area'>
                          <table class='table' style='margin-bottom:0;'>
                            <thead>
                              <tr>
                                <th>
                                  Name
                                </th>
                                <th>
                                  E-mail
                                </th>
                                <th>
                                  Status
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Cantidad de talleres recibidos</td>
                                <td>elouise@yahoo.com</td>
                                <td>
                                  <span class='label label-warning'>Warning</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='box bordered-box blue-border' style='margin-bottom:0;'>
                    <div class='box-header green-background'>
                      <div class='title'>Otros</div>
                      <div class='actions'>
                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                        </a>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                      </div>
                    </div>
                    <div class='box-content box-no-padding'>
                      <div class='responsive-table'>
                        <div class='scrollable-area'>
                          <table class='table' style='margin-bottom:0;'>
                            <thead>
                              <tr>
                                <th>
                                  Name
                                </th>
                                <th>
                                  E-mail
                                </th>
                                <th>
                                  Status
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Ejecución de talleres</td>
                                <td>elouise@yahoo.com</td>
                                <td>
                                  <span class='label label-warning'>Warning</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Asistencia</td>
                                <td>margie@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Promedio</td>
                                <td>percy@hotmail.com</td>
                                <td>
                                  <span class='label label-important'>Important</span>
                                </td>
                                <td>
                                  <div class='text-right'>
                                    <a class='btn btn-success btn-xs' href='#'>
                                      <i class='fa fa-check'></i>
                                    </a>
                                    <a class='btn btn-danger btn-xs' href='#'>
                                      <i class='fa fa-times'></i>
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <button> Salir </button>
                  </div>
                </div>
              </div>
            </div>
            @include('partials.footer')
          </div>
        </section>

      </div>

@endsection
