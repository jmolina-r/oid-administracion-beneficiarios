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
                <a href='·'>
                    <i class='fa fa-tachometer'></i>
                    <span>Servicio Administrativo OID</span>
                </a>
            </li>
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-pencil-square-o'></i>
                    <span>Beneficiarios</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
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
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-pencil-square-o'></i>
                    <span>Kinesiología</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('medica.ficha-evaluacion-inicial.kinesiologia.ingresar')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Formulario ingreso kine</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class=''>
                <a class="dropdown-collapse" href="#"><i class='fa fa-pencil-square-o'></i>
                    <span>Area Social</span>
                    <i class='fa fa-angle-down angle-down'></i>
                </a>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='{{route('social.asistenteSocial')}}'>
                            <div class='icon'>
                                <i class='fa fa-caret-right'></i>
                            </div>
                            <span>Asistente Social</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</nav>
