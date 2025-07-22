@extends('layouts.app')
@section('title', 'Contacto')
@section('content')

<style>
    .info-contact{
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 10px;
    padding: 20px;
}

.item-contact a{
    font-family: 'Roboto';
    font-weight: 300;
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0%;
    color: #000 ;

    }
.item-contact i{
    color: #FE6D00;
    margin-right: 10px;
}
.form-control{
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 10px;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
}
/* placeholder */
.form-control::placeholder {
    color: #999;
    opacity: 1; /* Firefox */
    font-family: 'Roboto';
    font-weight: 300;
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0%;
    
}

    .titulo__secciones{
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 24px;
    line-height: 100%;
    letter-spacing: 0%;
    color: #000 ;
}
    .subtitulo__secciones{
    font-family: 'Roboto';
    font-weight: 300;
    font-size: 16px;
    line-height: 100%;
    letter-spacing: 0%;
    color: #000 ;
}
.datos__contacto{
    font-family: 'Roboto';
    font-weight: 400;
    font-size: 16px;  
    line-height: normal;
    color: #000 ;
    text-decoration: none;
    }
.datos__contacto:hover{
    font-family: 'Roboto';
    font-weight: 300;
    font-size: 16px;  
    line-height: normal;
    color: #FE6D00;

    text-decoration: none;
    }
</style>
<div class="bg__breadcrumb">

  <div class="container">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="breadcrumb-item">Inicio</a></li>
            <li class="breadcrumb-item active" >Contacto</li>
          </ol>
          {{-- <span class="breadcrumb-titulo">Novedades</span> --}}
        </nav>
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
    
     <div class="item-contact mb-3">
         {{-- icono whatsapp --}}
            <i class="fa-brands fa-whatsapp "></i>
            <a href="https://api.whatsapp.com/send?phone={{$contacto->whatsapp}}" target="_blank" class="datos__contacto">{{$contacto->whatsapp}}</a>
        </div>

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
            <input type="text" class="form-control" id="name" name="name" required >
            <div class="invalid-feedback" id="name-error"></div>
        </div>
        <div class="col-md-6 mb-4">
            <label for="surname" class="form-label">Apellido <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="surname" name="surname" required >
            <div class="invalid-feedback" id="surname-error"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required >
            <div class="invalid-feedback" id="email-error"></div>
        </div>
        <div class="col-md-6 mb-4">
            <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" required >
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
            <button type="submit" class="carousel-btn mt-4">Enviar consulta</button>
        </div>
    </div>
    <div class="form-text mt-3">Los campos marcados con <span class="text-danger">*</span> son obligatorios.</div>
  </form>
</div>
  </div>
</div>

<div class="container my-5">
    <div class="row">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.1974371951!2d-58.59388822304555!3d-34.57387047296489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb9999f19b717%3A0xda1c0044e76af7cc!2sDobladora%20de%20Ca%C3%B1os%20Dmz!5e0!3m2!1ses-419!2sar!4v1752788509348!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
