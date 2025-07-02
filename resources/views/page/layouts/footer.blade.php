<footer>
    <div class="container">
        <div class="row">
            <!-- iconos -->
            <div class="col-12 col-md-3">
                <img src="{{ asset(Storage::url($logo->logo_footer)) }}" class="footer-logo mb-4"><br>
                <a href="{{ $redes->instagram }}" target="_blank" class="me-2">
                    {{-- Icono de Instagram --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <a href="{{ $redes->linkedin }}" target="_blank" class="me-2">
                    {{-- Icono de LinkedIn --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                        <rect x="2" y="9" width="4" height="12"></rect>
                        <circle cx="4" cy="4" r="2"></circle>
                    </svg>
                </a>
            </div>

            <!-- Secciones -->
            <div class="col-6 col-md-3">
                <span class="footer__secciones mb-3">Secciones</span>
                <div class="d-flex flex-column">
                    <a href="{{route('servicios')}}" class="nav__footer">Servicios</a>
                    <a href="{{route('productos')}}" class="nav__footer">Catálogos </a>
                    <a href="{{route('empresa')}}" class="nav__footer">Sobre Nosotros</a>
            
                </div>
            </div>

            <!-- Como comprar -->
            <div class="col-6 col-md-2 mt-4">
                <div class="d-flex flex-column">
                  
                    <a href="{{route('procesos')}}" class="nav__footer">Nuestro Proceso</a>
                    <a href="{{route('novedades')}}" class="nav__footer">Blog</a>
                    <a href="{{route('contacto')}}" class="nav__footer">Contacto</a>
                </div>
            </div>

            <!-- Contacto -->
            <div class="col-12 col-md-4">
                <span class="footer__secciones">Información de Contacto</span>
                <div class="contact-info">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path d="M16.6673 8.33335C16.6673 13.3334 10.0007 18.3334 10.0007 18.3334C10.0007 18.3334 3.33398 13.3334 3.33398 8.33335C3.33398 6.56524 4.03636 4.86955 5.28661 3.61931C6.53685 2.36907 8.23254 1.66669 10.0007 1.66669C11.7688 1.66669 13.4645 2.36907 14.7147 3.61931C15.9649 4.86955 16.6673 6.56524 16.6673 8.33335Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 10.8333C11.3807 10.8333 12.5 9.71402 12.5 8.33331C12.5 6.9526 11.3807 5.83331 10 5.83331C8.61929 5.83331 7.5 6.9526 7.5 8.33331C7.5 9.71402 8.61929 10.8333 10 10.8333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <a href="{{$contacto->enlace}}" target="_blank" class="nav__footer">{{$contacto->direccion}}</a>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path d="M18.3332 14.1V16.6C18.3341 16.8321 18.2866 17.0618 18.1936 17.2744C18.1006 17.4871 17.9643 17.678 17.7933 17.8349C17.6222 17.9918 17.4203 18.1112 17.2005 18.1856C16.9806 18.2599 16.7477 18.2875 16.5165 18.2666C13.9522 17.988 11.489 17.1118 9.32486 15.7083C7.31139 14.4289 5.60431 12.7218 4.32486 10.7083C2.91651 8.53432 2.04007 6.05914 1.76653 3.48331C1.7457 3.25287 1.77309 3.02061 1.84695 2.80133C1.9208 2.58205 2.03951 2.38055 2.1955 2.20966C2.3515 2.03877 2.54137 1.90224 2.75302 1.80875C2.96468 1.71526 3.19348 1.66686 3.42486 1.66665H5.92486C6.32928 1.66267 6.72136 1.80588 7.028 2.06959C7.33464 2.3333 7.53493 2.69952 7.59153 3.09998C7.69705 3.90003 7.89274 4.68558 8.17486 5.44165C8.28698 5.73992 8.31125 6.06407 8.24478 6.37571C8.17832 6.68735 8.02392 6.9734 7.79986 7.19998L6.74153 8.25831C7.92783 10.3446 9.65524 12.072 11.7415 13.2583L12.7999 12.2C13.0264 11.9759 13.3125 11.8215 13.6241 11.7551C13.9358 11.6886 14.2599 11.7129 14.5582 11.825C15.3143 12.1071 16.0998 12.3028 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6913 18.3332 14.1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <a href="tel:{!!$contacto->telefono!!}" class="nav__footer">{{$contacto->telefono}}</a>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path d="M16.666 3.33331H3.33268C2.41221 3.33331 1.66602 4.07951 1.66602 4.99998V15C1.66602 15.9205 2.41221 16.6666 3.33268 16.6666H16.666C17.5865 16.6666 18.3327 15.9205 18.3327 15V4.99998C18.3327 4.07951 17.5865 3.33331 16.666 3.33331Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.3327 5.83331L10.8577 10.5833C10.6004 10.7445 10.3029 10.83 9.99935 10.83C9.69575 10.83 9.39829 10.7445 9.14102 10.5833L1.66602 5.83331" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <a href="mailto:{!!$contacto->correo!!}" class="nav__footer">{{$contacto->correo}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div style="background-color: #252627; line-height: 50px;">
    <div class="container h-100">
 
        <div class="row h-100 align-items-center">
     
            <div class="col-md-6 text-md-start text-center">
                <span class="text-white by-texto">
                    © Copyright 2025 Urban Projects Barcelona
                    Todos los derechos reservados
                </span>
            </div>
         
            <div class="col-md-6 text-md-end text-center">
                <a href="https://www.estudiolazo.com/" target="_bank" class="text-white by-lazo">
                    By Estudio Lazo
                </a>
            </div>
        </div>
    </div>
</div>







