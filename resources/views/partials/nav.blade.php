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
                <a href='/home'>
                    <i class='fa fa-tachometer'></i>
                    <span>Servicio Administrativo OID</span>
                </a>
            </li>

            @if(Auth::user()->hasAnyRole(['admin', 'secretaria']))
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-users'></i>
                        <span>Beneficiarios</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='{{route('beneficiario.find')}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Administrar Beneficiarios</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='{{route('beneficiario.create')}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Registro Beneficiario</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'kinesiologia']))
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-wheelchair'></i>
                    <span>Kinesiología</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.create',1)}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Formulario ingreso kine</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='{{route('area-medica.ficha-evaluacion-inicial.kinesiologia.show',1)}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Ver formulario ingreso kine</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'fonoaudiologia']))
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-deaf'></i>
                    <span>Fonoaudiología</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('area-medica.ficha-evaluacion-inicial.fonoaudiologia.create',1)}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Formulario ingreso fono</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'psicologia']))
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-smile-o'></i>
                    <span>Psicología</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('area-medica.ficha-evaluacion-inicial.psicologia.create',1)}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Formulario ingreso psicología</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='{{route('area-medica.ficha-evaluacion-inicial.psicologia.show',1)}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Ver formulario ingreso psicologia</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'terapia_ocupacional']))
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-hand-rock-o'></i>
                    <span>Terapia Ocupacional</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.ingresar',1)}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Formulario Ingreso Terapia Ocupacional</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='{{route('area-medica.ficha-evaluacion-inicial.terapia-ocupacional.show',1)}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Ver formulario ingreso terapia ocupacional</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'trabajo_social']))
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-child'></i>
                    <span>Area Social</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('social.asistenteSocialGet')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Asistente Social</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'jefatura']))
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-bar-chart'></i>
                    <span>Reportabilidad</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>

                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('reportabilidad.menuReportabilidad')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Visualizar estadísticas por area</span>
                        </a>
                    </li>
                </ul>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('reportabilidad.reportabilidadPorProfesional')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Visualizar estadísticas por profesional</span>
                        </a>
                    </li>
                </ul>
            {{--<ul class='nav nav-stacked'>
                <li class=''>
                    <a href='{{route('reportabilidad.menu')}}'>
                        <div class='icon'>
                            <i class='fa fa-caret-right'></i>
                        </div>
                        <span>Menu reportabilidad</span>
                    </a>
                </li>
            </ul>--}}
            </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'secretaria', 'kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia-ocupacional']))
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-calendar'></i>
                    <span>Malla</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>

                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('malla.show')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Mostrar malla</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='{{route('malla.listaPrestaciones')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Prestaciones</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-pencil-square-o'></i>
                    <span>Dar de alta</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>

                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('area-medica.informe-cierre.buscarUser')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Informe de cierre</span>
                        </a>
                    </li>

                </ul>
            </li>

            @if(Auth::user()->hasAnyRole(['admin', 'coordinador_oficina']))
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-users'></i>
                        <span>Usuarios</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='{{route('find')}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Administrar Usuarios</span>
                            </a>
                        </li>

                        <li class=''>
                            <a href='{{route('register')}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Creación Usuario</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif
            
            @if(Auth::user()->hasAnyRole(['admin', 'kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia-ocupacional']))
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-users'></i>
                        <span>Fichas de Evaluación inicial</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='{{route('area-medica.ficha-evaluacion-inicial.fichas.listaFichas',1)}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Lista de Fichas</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

        </ul>
    </div>
</nav>
