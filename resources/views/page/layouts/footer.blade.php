<style>
    footer {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        padding: 80px 0 40px;
        position: relative;
        overflow: hidden;
    }

    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #ff6600, transparent);
    }

    .footer__secciones {
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        font-size: 18px;
        line-height: 1.2;
        color: #FFF !important;
        margin-bottom: 20px;
        display: block;
        position: relative;
        padding-bottom: 10px;
    }

    .footer__secciones::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 2px;
        background: #ff6600;
    }

    .nav__footer {
        color: #cccccc !important;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        font-size: 15px;
        text-decoration: none;
        padding: 8px 0;
        display: block;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav__footer:hover {
        color: #ff6600 !important;
        padding-left: 10px;
        transform: translateX(5px);
    }

    .footer-logo {
        max-width: 180px;
        height: auto;
        margin-bottom: 25px;
        transition: transform 0.3s ease;
    }

    .footer-logo:hover {
        transform: scale(1.05);
    }

    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .social-links a:hover {
        background: #ff6600;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255, 102, 0, 0.3);
    }

    .contact-info {
        margin-top: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        background: rgba(255, 102, 0, 0.05);
        padding-left: 10px;
        border-left: 2px solid #ff6600;
    }

    .contact-item i {
        flex-shrink: 0;
        opacity: 0.8;
        transition: opacity 0.3s ease;
        color: #FFF !important;
    }

    .contact-item:hover i {
        opacity: 1;
    }

    .footer-bottom {
        background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 20px 0;
      
    }

    .by-texto, .by-lazo {
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .by-lazo:hover {
        color: #ff6600 !important;
    }

    @media (max-width: 768px) {
        footer {
            padding: 60px 20px 30px;
        }
        
        .footer__secciones {
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .social-links {
            justify-content: center;
        }
        
        .contact-item {
            justify-content: center;
            text-align: center;
        }
    }
</style>

<footer>
    <div class="container">
        <div class="row">
            <!-- Logo y redes sociales -->
            <div class="col-12 col-md-3 mb-4">
                <img src="{{ asset(Storage::url($logo->logo_footer)) }}" class="footer-logo">
                <div class="social-links">
                    <a href="{{ $redes->instagram }}" target="_blank" aria-label="Instagram">
                     {{-- icono instagram fontawesome--}}
                        <i class="fab fa-instagram text-white" ></i>
                     </svg>
                    </a>
                    <a href="{{ $redes->facebook }}" target="_blank" aria-label="facebook">
                        {{-- icono facebook --}}
                       <i class="fab fa-facebook-f text-white" ></i>
                    </a>
                    <a href="{{ $redes->youtube }}" target="_blank" aria-label="youtube">
                        {{-- icono youtube --}}
                        <i class="fab fa-youtube text-white" ></i>
                    </a>
                </div>
            </div>

            <!-- Secciones -->
            <div class="col-6 col-md-3 mb-4">
                <h5 class="footer__secciones">Secciones</h5>
                <div class="d-flex flex-column">
                    <a href="{{route('servicios')}}" class="nav__footer">Servicios</a>
                    <a href="{{route('categorias')}}" class="nav__footer">Máquinas</a>
                    <a href="{{route('empresa')}}" class="nav__footer">Empresa</a>
                </div>
            </div>

            <!-- Enlaces adicionales -->
            <div class="col-6 col-md-2 mb-4">
                <h5 class="footer__secciones">Enlaces</h5>
                <div class="d-flex flex-column">
                    <a href="{{route('representaciones')}}" class="nav__footer">Representación SANCO</a>
                    <a href="{{route('novedades')}}" class="nav__footer">Novedades</a>
                    <a href="{{route('contacto')}}" class="nav__footer">Contacto</a>
                </div>
            </div>

            <!-- Información de contacto -->
            <div class="col-12 col-md-4 mb-4">
                <h5 class="footer__secciones">Información de Contacto</h5>
                <div class="contact-info">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                            <path d="M16.6673 8.33335C16.6673 13.3334 10.0007 18.3334 10.0007 18.3334C10.0007 18.3334 3.33398 13.3334 3.33398 8.33335C3.33398 6.56524 4.03636 4.86955 5.28661 3.61931C6.53685 2.36907 8.23254 1.66669 10.0007 1.66669C11.7688 1.66669 13.4645 2.36907 14.7147 3.61931C15.9649 4.86955 16.6673 6.56524 16.6673 8.33335Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 10.8333C11.3807 10.8333 12.5 9.71402 12.5 8.33331C12.5 6.9526 11.3807 5.83331 10 5.83331C8.61929 5.83331 7.5 6.9526 7.5 8.33331C7.5 9.71402 8.61929 10.8333 10 10.8333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="{{$contacto->enlace}}" target="_blank" class="nav__footer">{{$contacto->direccion}}</a>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                            <path d="M18.3332 14.1V16.6C18.3341 16.8321 18.2866 17.0618 18.1936 17.2744C18.1006 17.4871 17.9643 17.678 17.7933 17.8349C17.6222 17.9918 17.4203 18.1112 17.2005 18.1856C16.9806 18.2599 16.7477 18.2875 16.5165 18.2666C13.9522 17.988 11.489 17.1118 9.32486 15.7083C7.31139 14.4289 5.60431 12.7218 4.32486 10.7083C2.91651 8.53432 2.04007 6.05914 1.76653 3.48331C1.7457 3.25287 1.77309 3.02061 1.84695 2.80133C1.9208 2.58205 2.03951 2.38055 2.1955 2.20966C2.3515 2.03877 2.54137 1.90224 2.75302 1.80875C2.96468 1.71526 3.19348 1.66686 3.42486 1.66665H5.92486C6.32928 1.66267 6.72136 1.80588 7.028 2.06959C7.33464 2.3333 7.53493 2.69952 7.59153 3.09998C7.69705 3.90003 7.89274 4.68558 8.17486 5.44165C8.28698 5.73992 8.31125 6.06407 8.24478 6.37571C8.17832 6.68735 8.02392 6.9734 7.79986 7.19998L6.74153 8.25831C7.92783 10.3446 9.65524 12.072 11.7415 13.2583L12.7999 12.2C13.0264 11.9759 13.3125 11.8215 13.6241 11.7551C13.9358 11.6886 14.2599 11.7129 14.5582 11.825C15.3143 12.1071 16.0998 12.3028 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6913 18.3332 14.1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="tel:{!!$contacto->telefono!!}" class="nav__footer">{{$contacto->telefono}}</a>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                            <path d="M16.666 3.33331H3.33268C2.41221 3.33331 1.66602 4.07951 1.66602 4.99998V15C1.66602 15.9205 2.41221 16.6666 3.33268 16.6666H16.666C17.5865 16.6666 18.3327 15.9205 18.3327 15V4.99998C18.3327 4.07951 17.5865 3.33331 16.666 3.33331Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.3327 5.83331L10.8577 10.5833C10.6004 10.7445 10.3029 10.83 9.99935 10.83C9.69575 10.83 9.39829 10.7445 9.14102 10.5833L1.66602 5.83331" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="mailto:{!!$contacto->correo!!}" class="nav__footer">{{$contacto->correo}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="footer-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center mb-2 mb-md-0">
                <span class="text-white by-texto">
                    © Copyright 2025 Dmz - Todos los derechos reservados
                </span>
            </div>
            <div class="col-md-6 text-md-end text-center">
                <a href="https://www.newtec.cloud/" target="_blank" class="text-white by-lazo text-decoration-none">
                    Desarrollado por Newtec
                </a>
            </div>
        </div>
    </div>
</div>







