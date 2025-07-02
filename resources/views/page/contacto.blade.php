@extends('layouts.app')
@section('title', 'Contacto')
@section('content')
<style>
  /* ===== CAROUSEL SERVICIOS ===== */
.carousel-item {
    height: 400px;
    position: relative;
}

.carousel-item-background {
    height: 100%;
    width: 100%;
    background-size: cover;
    background-position: center;
    position: absolute;
    top: 0;
    left: 0;
}

.carousel-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.41);
    z-index: 1;
}

.carousel-video-wrapper {
    position: relative;
    height: 100%;
    width: 100%;
}

.carousel-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.carousel-video-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.41);
    z-index: 1;
}

.carousel-caption-servicio {
    position: absolute;
    text-align: left;
    left: 15%;
    bottom: 20px;
    right: auto;
    width: 70%;
    z-index: 2;
}

.carousel__titulo-servicio, .carousel__descripcion-servicio {
    color: white;
    font-family: 'Raleway';
    font-weight: 400;
    font-size: 36px;
    line-height: 130%;
    letter-spacing: 0%;
}

/* Estilos específicos para los indicadores del carousel */
.carousel-indicators {
    z-index: 15;
    bottom: 0px;
}


</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" data-bs-interval="5000">
    <!-- Indicadores -->
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
        <button type="button" 
                data-bs-target="#carouselExampleIndicators" 
                data-bs-slide-to="{{ $index }}" 
                @if($index == 0) class="active" aria-current="true" @endif
                aria-label="Slide {{ $index + 1 }}">
        </button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            @if(Str::contains($slider->imagen, ['.mp4', '.mov', '.avi']))
                <!-- Elemento - Video -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="carousel-video-wrapper">
                        <video class="carousel-video" autoplay loop muted>
                            <source src="{{ asset(Storage::url($slider->imagen)) }}" type="video/mp4">
                            Tu navegador no soporta video HTML5.
                        </video>
                        <div class="carousel-caption-servicio">
                            <h5 class="carousel__titulo-servicio">{{ $slider->titulo }}</h5>
                            <p class="carousel__descripcion-servicio">{!! $slider->descripcion !!}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="carousel-item-background" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}');"></div>
                    <div class="carousel-caption-servicio">
                        <h5 class="carousel__titulo-servicio">{{ $slider->titulo }}</h5>
                        <p class="carousel__descripcion-servicio">{!! $slider->descripcion !!}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>



<div class="container my-5">
  <div class="row">
    <div class="col-md-4">
      <div class="info-contact">
        <h3 class="titulo__secciones text-left">Contacto</h3>
        <p class="subtitulo__secciones">¿Buscas un presupuesto o quieres ponerte en con nosotros? Completa el siguiente formulario y nos comunicaremos lo antes posible</p>
        <div class="item-contact mt-3">
            <i class="fa-solid fa-location-dot"></i>
            <a href="{{$contacto->enlace}}" target="_blank" class="datos__contacto">{{$contacto->direccion}}</a>
        </div>
    
        <div class="item-contact my-3">
            <i class="fa-solid fa-phone"></i>
            <a href="tel:{!!$contacto->telefono!!}" class="datos__contacto">{{$contacto->telefono}}</a>
        </div>
    
        {{-- <div class="item-contact mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5823 11.985C14.3328 11.8608 13.1095 11.2625 12.8817 11.1792C12.6539 11.0967 12.4881 11.0558 12.3215 11.3042C12.1557 11.5508 11.6793 12.1092 11.5344 12.2742C11.3887 12.44 11.2438 12.46 10.9952 12.3367C10.7465 12.2117 9.94429 11.9508 8.99391 11.1075C8.25453 10.4509 7.75464 9.64002 7.60978 9.39169C7.46492 9.14419 7.59387 9.01002 7.71863 8.88669C7.83084 8.77585 7.96732 8.59752 8.09209 8.45335C8.21685 8.30835 8.25788 8.20502 8.34078 8.03919C8.42451 7.87419 8.38265 7.73002 8.31985 7.60585C8.25788 7.48169 7.7605 6.26252 7.55284 5.76669C7.35104 5.28419 7.14589 5.35003 6.99349 5.34169C6.8478 5.33503 6.682 5.33336 6.51621 5.33336C6.35041 5.33336 6.08079 5.39503 5.85303 5.64336C5.62444 5.89086 4.98219 6.49002 4.98219 7.70919C4.98219 8.92752 5.87313 10.105 5.99789 10.2709C6.12266 10.4359 7.75213 12.9375 10.2482 14.01C10.8428 14.265 11.3058 14.4175 11.6667 14.5308C12.2629 14.72 12.8055 14.6933 13.2342 14.6292C13.7115 14.5583 14.7063 14.03 14.9139 13.4517C15.1208 12.8733 15.1207 12.3775 15.0588 12.2742C14.9968 12.1708 14.831 12.1092 14.5815 11.985H14.5823ZM10.0423 18.1542H10.0389C8.55634 18.1544 7.10099 17.7578 5.8254 17.0058L5.52396 16.8275L2.39062 17.6458L3.22712 14.6058L3.03035 14.2942C2.20149 12.9811 1.76286 11.4615 1.76512 9.91085C1.76679 5.36919 5.47958 1.6742 10.0456 1.6742C12.2562 1.6742 14.3345 2.53253 15.897 4.08919C16.6676 4.85301 17.2785 5.76133 17.6941 6.7616C18.1098 7.76188 18.322 8.83425 18.3186 9.91668C18.3169 14.4583 14.6041 18.1542 10.0423 18.1542ZM17.086 2.9067C16.1634 1.98247 15.0657 1.24965 13.8564 0.7507C12.6472 0.251754 11.3505 -0.00339687 10.0414 3.41479e-05C4.55347 3.41479e-05 0.085409 4.44586 0.0837344 9.91002C0.0811914 11.649 0.539563 13.3578 1.4126 14.8642L0 20L5.27861 18.6217C6.73884 19.4134 8.37519 19.8283 10.0381 19.8283H10.0423C15.5302 19.8283 19.9983 15.3825 20 9.91752C20.004 8.61525 19.7485 7.32511 19.2484 6.12172C18.7482 4.91833 18.0132 3.82559 17.086 2.9067Z" fill="#7CB420"/>
              </svg>
            <a href="https://api.whatsapp.com/send?phone={{$contacto->whatsapp}}" target="_blank" class="datos__contacto">{{$contacto->whatsapp}}</a>
        </div> --}}

        <div class="item-contact">
            <i class="fa-solid fa-envelope"></i>
            <a href="mailto:{{$contacto->correo}}" target="_blank" class="datos__contacto">{{$contacto->correo}}</a>
        </div>
    </div>
    </div>   
    <div class="col-md-8 mt-5">
        <form id="contact-form" method="POST">
    @csrf
    <input type='hidden' name='g-recaptcha-response' id='g-recaptcha-response'>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="name" class="form-label">Nombre <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Ingrese su nombre">
            <div class="invalid-feedback" id="name-error"></div>
        </div>
        <div class="col-md-6 mb-4">
            <label for="surname" class="form-label">Apellido <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="surname" name="surname" required placeholder="Ingrese su apellido">
            <div class="invalid-feedback" id="surname-error"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese su email">
            <div class="invalid-feedback" id="email-error"></div>
        </div>
        <div class="col-md-6 mb-4">
            <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Ingrese su teléfono">
            <div class="invalid-feedback" id="phone-error"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Escriba su mensaje aquí..."></textarea>
            <div class="invalid-feedback" id="message-error"></div>
        </div>
        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn__rojo mt-4">Enviar consulta</button>
        </div>
    </div>
    <div class="form-text mt-3">Los campos marcados con <span class="text-danger">*</span> son obligatorios.</div>
  </form>
</div>
  </div>
</div>

<div class="container my-5">
    <div class="row">

        {!!$contacto->mapa!!}
    </div>
</div>
@endsection

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env("RECAPTCHA_SITE_KEY") }}"></script>
<script>

document.addEventListener('DOMContentLoaded', function () {
    grecaptcha.ready(function () {
        grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', { action: 'submit' }).then(function (token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });

    // Función para resetear los errores del formulario
    function resetFormErrors() {
        document.querySelectorAll('.invalid-feedback').forEach(elem => {
            elem.textContent = '';
        });
        document.querySelectorAll('.form-control').forEach(elem => {
            elem.classList.remove('is-invalid');
        });
    }

    // Función para mostrar errores en los campos específicos
    function showFieldErrors(errors) {
        if (!errors) return;
        
        Object.keys(errors).forEach(field => {
            const errorElement = document.getElementById(`${field}-error`);
            const inputElement = document.getElementById(field);
            
            if (errorElement && inputElement) {
                errorElement.textContent = errors[field][0];
                inputElement.classList.add('is-invalid');
            }
        });
    }

    document.getElementById('contact-form').addEventListener('submit', function (event) {
        event.preventDefault();
        resetFormErrors();

        grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', { action: 'submit' }).then(function (token) {
            document.getElementById('g-recaptcha-response').value = token;

            let form = event.target;
            let formData = new FormData(form);

            $.ajax({
                url: '{{ route("contacto.send") }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.message) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Consulta enviada!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        form.reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.error || 'Error desconocido.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                    
                    if (error.responseJSON?.errors) {
                        showFieldErrors(error.responseJSON.errors);
                        
                        // Mensaje general de error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en el formulario',
                            text: 'Por favor corrija los errores en el formulario.',
                            showConfirmButton: true
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al enviar el mensaje. Inténtelo nuevamente.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }
            });
        });
    });
});
</script>
@endpush
