<!-- Agrega la clase fixed-top al navbar -->
<nav class="navbar navbar-expand-lg bg-black py-4 align-items-center" id="mainHeader">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset(Storage::url($logo->logo_header)) }}" style="height:auto">
        </a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center mb-0">
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('empresa') ? 'active__header' : '' }}" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav__menu__inicio dropdown-toggle {{ request()->routeIs('categorias', 'producto') ? 'active__header' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Maquinas
                    </a>
                    <ul class="dropdown-menu bg-black">
                        {{-- <li><a class="dropdown-item text-white" href="{{ route('categorias') }}">Todas las Categorías</a></li> --}}
                        <li><hr class="dropdown-divider"></li>
                        @foreach($categorias ?? [] as $categoria)
                            <li><a class="dropdown-item text-white" href="{{ route('categoria.productos', $categoria->slug) }}">{{ $categoria->nombre }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav__menu__inicio dropdown-toggle {{ request()->routeIs('servicios') ? 'active__header' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
                    </a>
                    <ul class="dropdown-menu bg-black">
                        {{-- <li><a class="dropdown-item text-white" href="{{ route('servicios') }}">Todos los Servicios</a></li> --}}
                        <li><hr class="dropdown-divider"></li>
                        @foreach($servicios ?? [] as $servicio)
                            <li><a class="dropdown-item text-white" href="{{ route('servicio', $servicio->slug) }}">{{ $servicio->nombre }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('novedades', 'novedad') ? 'active__header' : '' }}" href="{{ route('novedades') }}">Novedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('representaciones') ? 'active__header' : '' }}" href="{{ route('representaciones') }}">SANCO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('contacto') ? 'active__header' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" style="background-color: #131313;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset(Storage::url($logo->logo_header)) }}" class="">
        </a>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body justify-content-center align-items-center">
        <ul class="navbar-nav text-center">
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('empresa') ? 'active__header' : '' }}" href="{{ route('empresa') }}">Empresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('servicios') ? 'active__header' : '' }}" href="{{ route('servicios') }}">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('categorias') ? 'active__header' : '' }}" href="{{ route('categorias') }}">Maquinas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('novedades', 'novedad') ? 'active__header' : '' }}" href="{{ route('novedades') }}">Novedades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('contacto') ? 'active__header' : '' }}" href="{{ route('contacto') }}">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('representaciones') ? 'active__header' : '' }}" href="{{ route('representaciones') }}">SANCO</a>
            </li>
            {{-- <li class="nav-item mt-3">
                <a class="btn btn-light fw-bold w-100 py-2 d-flex align-items-center justify-content-center" href="{{ route('representaciones') }} style="border-radius: 0; color: #ff6600;">
                    REPRESENTACIÓN SANCO
                </a>
            </li> --}}
        </ul>
    </div>
</div>








