<nav class="header-nav">

    <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

    <div class="header-nav__content">
        <h3>Menu</h3>

        <ul class="header-nav__list">
            <li><a href="{{ route('welcome') }}">Inicio</a></li>
            <li><a href="{{ route('articles.show.vue') }}">Articulos</a></li>
            @if(Auth::guest())
                <li><a href="{{ route('register.create') }}" >Registrarse</a></li>
                <li><a href="{{ route('form.login') }}" >Entrar</a></li>
            @endif
            @if(Auth::check())
                <li><a href="{{ route('company') }}">Empresa</a></li>
                <li><a href="{{ route('logout') }}" >Salir</a></li>
            @endif
        </ul>

    </div> <!-- end header-nav__content -->

</nav>  <!-- end header-nav -->

<a class="header-menu-toggle" href="#0">
    <span class="header-menu-text">Menu</span>
    <span class="header-menu-icon"></span>
</a>
