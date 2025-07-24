<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administrador</title>

    <!-- CSS de terceros -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/setting.css') }}" rel="stylesheet">

    <!-- CKEditor 5 CSS personalizado -->
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        .ck.ck-editor {
            max-width: 100%;
        }
        .ck-content {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Personalización del toolbar */
        .ck.ck-toolbar {
            border-radius: 4px 4px 0 0;
            border: 1px solid #c4c4c4;
        }
        .ck.ck-editor__main > .ck-editor__editable {
            border-radius: 0 0 4px 4px;
            border: 1px solid #c4c4c4;
            border-top: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Content -->
        @include('admin.layouts.sidebar')

        <div class="main">
            <!-- Navbar Content -->
            @include('admin.layouts.navbar')

            <!-- Main Content -->
            <div class="container-fluid">
                <main class="main-content">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- JS de terceros -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CKEditor 5 Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <!-- JS personalizado -->
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <!-- Configuración de Toastr -->
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        @if (Session::has('message'))
            toastr.success("{{ Session::get('message') }}");
        @endif
    </script>

    <!-- Inicialización de CKEditor 5 -->
    <script>
        $(document).ready(function() {
            // Inicializar Select2
            $('.select2').select2();

  ClassicEditor
    .create(document.querySelector('.ckeditor'), {
        language: 'es',
        toolbar: {
            items: [
                'heading',
                '|',
                'bold', 'italic', 'underline',
                '|',
                'bulletedList', 'numberedList',
                '|',
                'link', 'imageUpload', 'blockQuote',
                '|',
                'undo', 'redo'
            ]
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: false,
                    styles: false
                }
            ]
        },
        clipboard: {
            preventDefaultPasteData: false
        }
    })
            .then(editor => {
                console.log('CKEditor listo');
            })
            .catch(error => {
                console.error(error);
            });

            // Inicializar dropdowns de Bootstrap
            $('.dropdown-toggle').dropdown();
        });

   
    </script>

    @stack('scripts')
</body>
</html>