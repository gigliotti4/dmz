<nav id="sidebar" class="sidebar bg-body-light shadow-right">
  {{-- <a class="sidebar-brand" href="{{route('admin.dashboard')}}">
    <img src="{{asset(Storage::url($logo->logo_header))}}" class="w-75">
  </a> --}}
  <ul class="sidebar-nav nav accordion">
    <a href="{{route('admin.dashboard')}}" class="sidebar-header text-uppercase">
      Administrador
  </a>
    <hr class="mx-3">
    <li class="sidebar-item">
      <a href="" class="nav-link  collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="colappseCategories">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
          </svg>
        </div>
        <span>Home</span>
        <div class="sidenav-collapse-arrow">
          <i class="fa-solid fa-angle-down"></i>
        </div>
      </a>
      <div id="collapseCategories" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.slider.index', ['seccion' => 'inicio']) }}" class="nav-link  ">Slider</a>
        </nav>
      </div>
      <div id="collapseCategories" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.inicio.edit', ['id' => 1]) }}" class="nav-link  ">Contenido</a>
        </nav>
      </div>
    </li>

    <li class="sidebar-item">
      <a href="" class="nav-link  collapsed" data-bs-toggle="collapse" data-bs-target="#collapsEmpresa" aria-expanded="false" aria-controls="colappsEmpresa">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
            <path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Z"/>
          </svg>
        </div>
        <span>Sobre nosotros </span>
        <div class="sidenav-collapse-arrow">
          <i class="fa-solid fa-angle-down"></i>
        </div>
      </a>
   
      <div id="collapsEmpresa" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.slider.index', ['seccion' => 'empresa']) }}" class="nav-link  ">Slider</a>
        </nav>
      </div>
      <div id="collapsEmpresa" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.empresa.edit', ['id' => 1]) }}" class="nav-link  ">Contenido</a>
        </nav>
      </div>
    </li>

    <li class="sidebar-item">
      <a href="" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseServicio" aria-expanded="false" aria-controls="colappseProducto">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
            <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
          </svg>
        </div>
        <span>Servicios</span>
        <div class="sidenav-collapse-arrow">
          <i class="fa-solid fa-angle-down"></i>
        </div>
      </a>
   
      <div id="collapseServicio" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.slider.index', ['seccion' => 'servicios']) }}" class="nav-link  ">Slider</a>
        </nav>
      </div>   
   
      <div id="collapseServicio" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.servicios.index') }}" class="nav-link ">Servicios</a>
        </nav>
      </div>   
    </li>

    <li class="sidebar-item">
      <a href="" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProceso" aria-expanded="false" aria-controls="colappseProceso">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
          </svg>
        </div>
        <span>Procesos</span>
        <div class="sidenav-collapse-arrow">
          <i class="fa-solid fa-angle-down"></i>
        </div>
      </a>
   
      <div id="collapseProceso" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.slider.index', ['seccion' => 'procesos']) }}" class="nav-link  ">Slider</a>
        </nav>
      </div>   
      <div id="collapseProceso" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.procesos.index') }}" class="nav-link ">procesos</a>
        </nav>
      </div>   
    </li>

    <li class="sidebar-item">
      <a href="" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProducto" aria-expanded="false" aria-controls="colappseProducto">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
            <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
          </svg>
        </div>
        <span>Catalogos</span>
        <div class="sidenav-collapse-arrow">
          <i class="fa-solid fa-angle-down"></i>
        </div>
      </a>
   
      <div id="collapseProducto" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.slider.index', ['seccion' => 'productos']) }}" class="nav-link  ">Slider</a>
        </nav>
      </div>   
      <div id="collapseProducto" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.productos.index') }}" class="nav-link ">Productos</a>
        </nav>
      </div>   
    </li>

    <li class="sidebar-item">
      <a href="" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseNovedades" aria-expanded="false" aria-controls="colappseNovedades">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
          </svg>
        </div>
        <span>Blog</span>
        <div class="sidenav-collapse-arrow">
          <i class="fa-solid fa-angle-down"></i>
        </div>
      </a>

      <div id="collapseNovedades" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.slider.index', ['seccion' => 'novedades']) }}" class="nav-link  ">Slider</a>
        </nav>
      </div>
      <div id="collapseNovedades" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.novedades.index') }}" class="nav-link ">Novedades</a>
        </nav>
      </div>
    </li> 
    {{-- <li class="sidebar-item">
      <a href="{{route('admin.procesos.index')}}" class="nav-link ">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
          </svg>
        </div>
        <span>Nuestro proceso</span>
      </a>
    </li> --}}

    <hr class="mx-3">
    <li class="sidebar-item">
      <a href="" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseConfiguracion" aria-expanded="false" aria-controls="collapseConfiguracion">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
          </svg>
        </div>
        <span>Configuración</span>
        <div class="sidenav-collapse-arrow">
          <i class="fa-solid fa-angle-down"></i>
        </div>
      </a>
       <div id="collapseConfiguracion" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.slider.index', ['seccion' => 'contacto']) }}" class="nav-link  ">Slider</a>
        </nav>
      </div>
       <div id="collapseConfiguracion" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.contacto.edit', ['id' => 1]) }}" class="nav-link ">Datos de Contacto</a>
        </nav>
      </div>
      <div id="collapseConfiguracion" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.logos.edit', ['id' => 1]) }}" class="nav-link ">Logos</a>
        </nav>
      </div>
      <div id="collapseConfiguracion" class="collapse">
        <nav class="sidenav-menu-nested nav accordion">
          <a href="{{ route('admin.redes.edit', ['id' => 1]) }}" class="nav-link ">Redes Sociales</a>
        </nav>
      </div> 

    </li>
    @if(Auth::user()->role == 'Administrador')
    <li class="sidebar-item">
        <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseManageUser" aria-expanded="false" aria-controls="collapseManageUser">
            <div class="nav-link-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
            </div>
            <span>Usuarios</span>
            <div class="sidenav-collapse-arrow">
                <i class="fa-solid fa-angle-down"></i>
            </div>
        </a>
        <div id="collapseManageUser" class="collapse">
            <nav class="sidenav-menu-nested nav accordion">
                <a href="{{ route('admin.users.index') }}" class="nav-link ">Lista de usuarios</a>
                {{-- <a href="{{ route('admin.users.create') }}" class="nav-link ">Crear usuario</a> --}}
            </nav>
        </div>
    </li>
  @endif

  <li class="sidebar-item">
    <a href="{{ route('admin.contactomensaje.index') }}" class="nav-link ">
      <div class="nav-link-icon">
        <i class="fa-solid fa-envelope"></i>
      </div>
      <span>Mensaje</span>
    </a>
  </li> 
 
    <li class="sidebar-item">
      <a href="{{ route('admin.metadatos.index') }}" class="nav-link ">
        <div class="nav-link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
            <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
            <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
          </svg>
        </div>
        <span>Metadatos</span>
      </a>
    </li> 
  </ul>
</nav>