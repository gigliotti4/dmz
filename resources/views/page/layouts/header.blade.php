<nav class="navbar navbar-expand-lg bg-transparent fixed-top" id="mainHeader">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset(Storage::url($logo->logo_header)) }}" style="height:100px">
        </a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('empresa') ? 'active__header' : '' }}" href="{{ route('empresa') }}">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('servicios') ? 'active__header' : '' }}" href="{{ route('servicios') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('productos', 'producto') ? 'active__header' : '' }}" href="{{ route('productos') }}">Catálogo</a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('procesos') ? 'active__header' : '' }}" href="{{ route('procesos') }}">Nuestro proceso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('novedades', 'novedad') ? 'active__header' : '' }}" href="{{ route('novedades') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio {{ request()->routeIs('contacto') ? 'active__header' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav__menu__inicio " href="{{ route('contacto') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
   
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end " style="background-color: #131313;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset(Storage::url($logo->logo_header)) }}" class="">
        </a>
        <a class="nav-link nav__menu__inicio " href="{{ route('contacto') }}"><i class="fa-solid fa-cart-shopping"></i></a>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('empresa') ? 'active__header' : '' }}" href="{{ route('empresa') }}">Sobre nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('servicios') ? 'active__header' : '' }}" href="{{ route('servicios') }}">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('productos') ? 'active__header' : '' }}" href="{{ route('productos') }}">Catálogo</a>
            </li>
          
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('procesos') ? 'active__header' : '' }}" href="{{ route('procesos') }}">Nuestro proceso</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('novedades', 'novedad') ? 'active__header' : '' }}" href="{{ route('novedades') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav__menu__inicio {{ request()->routeIs('contacto') ? 'active__header' : '' }}" href="{{ route('contacto') }}">Contacto</a>
            </li>
        </ul>
        {{-- Opcional: Puedes agregar la búsqueda dentro del offcanvas si lo deseas --}}
        {{-- <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('mainHeader');
        
        // Verificar que el elemento existe antes de operar con él
        if (header) {
            // Eliminar la condición de isHomePage para aplicar en todas las páginas
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    // Al hacer scroll, añadir fondo blanco
                    header.classList.add('bg-white-scroll');
                    header.classList.add('nav__menu');
                    
                    // Cambiar color de texto para mejor visibilidad en fondo blanco
                    const menuLinks = document.querySelectorAll('.nav__menu__inicio');
                    menuLinks.forEach(link => {
                        link.style.color = '#fff';
                    });
                } else {
                    // Al volver arriba, quitar fondo blanco
                    header.classList.remove('bg-white-scroll');
                    
                    // Restaurar color de texto para transparente
                    const menuLinks = document.querySelectorAll('.nav__menu__inicio');
                    menuLinks.forEach(link => {
                        link.style.color = '';
                    });
                }
            });
            
            // Comprobar la posición inicial al cargar la página
            if (window.scrollY > 50) {
                header.classList.add('bg-white-scroll');
                header.classList.add('nav__menu');
            }
        } else {    
            console.warn('No se encontró el elemento con ID "mainHeader" en la página');
        }
    });
</script>







