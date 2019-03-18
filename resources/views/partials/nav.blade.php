<nav id='main-nav'>
    <div class='navigation'>
        <div class='search'>
            <form action='search_results.html' method='get'>
                <div class='search-wrapper'>
                    <input type="text" name="q" value="" class="search-query form-control" placeholder="Search..."
                           autocomplete="off"/>
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

            @if(Auth::user()->hasAnyRole(['admin', 'secretaria', 'kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia_ocupacional', 'tallerista', 'educador']))
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-male'></i>
                        <span>Beneficiarios</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        @if(Auth::user()->hasAnyRole(['admin', 'secretaria', 'kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia_ocupacional','tallerista', 'educador']))
                            <li class=''>
                                <a href='{{route('beneficiario.find')}}'>
                                    <div class='icon'>
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span>Administrar Beneficiarios</span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->hasAnyRole(['admin', 'secretaria','kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia_ocupacional','tallerista', 'educador']))
                            <li class=''>
                                <a href='{{route('beneficiario.create')}}'>
                                    <div class='icon'>
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span>Registro Beneficiario</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'secretaria', 'kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia_ocupacional', 'tallerista','educador']))
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-list-ol'></i>
                        <span>Lista de Espera</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>

                    <ul class='nav nav-stacked'>
                     @if(Auth::user()->hasAnyRole(['admin']))
                        <li class=''>
                            <a href='{{route('beneficiario.demandas')}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Gestión Lista Espera</span>
                            </a>
                        </li>

                        @endif
                    @php($demandas= \App\Demanda::get())

                    @foreach($demandas as $demanda)

                                <li class=''>
                                    <a href='{{route('beneficiario.listaEspera',$demanda->id)}}'>
                                        <div class='icon'>
                                            <i class='fa fa-caret-right'></i>
                                        </div>
                                        <span>{{ucwords(strtolower($demanda->nombre))}}</span>
                                    </a>
                                </li>

                        @endforeach

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

            @if(Auth::user()->hasAnyRole(['admin', 'jefatura', 'secretaria', 'kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia_ocupacional', 'trabajo_social','tallerista','educador']))
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
                                <span>Menu reportabilidad</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasAnyRole(['admin', 'secretaria', 'kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia_ocupacional', 'jefatura','tallerista','educador']))
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-calendar'></i>
                        <span>Malla</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>

                    <ul class='nav nav-stacked'>
                        @if(Auth::user()->hasAnyRole(['admin', 'secretaria']))
                            <li class=''>
                                <a href='{{route('malla.show2')}}'>
                                    <div class='icon'>
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span>Seleccionar malla</span>
                                </a>
                            </li>
                        @endif

                        @if(Auth::user()->hasAnyRole(['kinesiologia', 'psicologia', 'fonoaudiologia', 'terapia_ocupacional','tallerista','educador']))
                            <li class=''>
                                <a href='{{route('malla.showMalla',Auth::user()->id)}}'>
                                    <div class='icon'>
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span>Mostar malla</span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->hasAnyRole(['admin', 'jefatura']))
                            <li class=''>
                                <a href='{{route('malla.listaPrestaciones')}}'>
                                    <div class='icon'>
                                        <i class='fa fa-caret-right'></i>
                                    </div>
                                    <span>Prestaciones</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

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

            @if(Auth::user()->hasAnyRole(['admin', 'coordinador_oficina']))
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-building'></i>
                        <span>Funcionarios</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='{{route('funcionario.find')}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Administrar Funcionarios</span>
                            </a>
                        </li>

                        <li class=''>
                            <a href='{{route('funcionario.create')}}'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Creación Funcionarios</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class=''>
                <a href='/ayuda'>
                    <i class='fa fa-life-ring'></i>
                    <span>Ayuda en línea</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
