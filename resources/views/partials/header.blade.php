<header>
    <nav class='navbar navbar-default'>
        <a class='navbar-brand' href='/'>
            <img class="logo-img" src="{{ asset('/images/logo.png') }}" alt="">
        </a>
        <a class='toggle-nav btn pull-left' href='#'>
            <i class='fa fa-bars'></i>
        </a>

        <ul id="userOptions" class='nav'>
          <li class='dropdown dark user-menu'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <i class="fa fa-user"></i>
              <span class='user-name'>{{ Auth::user()->username }}</span>
              <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <a href='#' onclick="getUsuarioPorId('{{ Auth::user()->id }}')">
                  <i class='fa fa-user'></i>
                  Mi perfil
                </a>
              </li>
              {{-- <!--
              <li>
                <a href='user_profile.html'>
                  <i class='fa fa-cog'></i>
                  Settings
                </a>
              </li>
              --> --}}
              <li class='divider'></li>
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Salir
                  </a>
              </li>
            </ul>
          </li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </nav>
    @include('partials.auth.profile')
</header>
