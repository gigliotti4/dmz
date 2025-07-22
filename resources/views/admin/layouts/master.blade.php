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

            // Inicializar CKEditor 5
            $('.ckeditor').each(function() {
                const element = this;
                
                ClassicEditor
                    .create(element, {
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'underline',
                                'strikethrough',
                                '|',
                                'fontSize',
                                'fontFamily',
                                'fontColor',
                                'fontBackgroundColor',
                                '|',
                                'alignment',
                                '|',
                                'numberedList',
                                'bulletedList',
                                '|',
                                'outdent',
                                'indent',
                                '|',
                                'link',
                                'imageUpload',
                                'blockQuote',
                                'insertTable',
                                'mediaEmbed',
                                '|',
                                'undo',
                                'redo',
                                '|',
                                'sourceEditing'
                            ]
                        },
                        language: 'es',
                        image: {
                            toolbar: [
                                'imageTextAlternative',
                                'imageStyle:inline',
                                'imageStyle:block',
                                'imageStyle:side'
                            ]
                        },
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells',
                                'tableCellProperties',
                                'tableProperties'
                            ]
                        },
                        heading: {
                            options: [
                                { model: 'paragraph', title: 'Párrafo', class: 'ck-heading_paragraph' },
                                { model: 'heading1', view: 'h1', title: 'Título 1', class: 'ck-heading_heading1' },
                                { model: 'heading2', view: 'h2', title: 'Título 2', class: 'ck-heading_heading2' },
                                { model: 'heading3', view: 'h3', title: 'Título 3', class: 'ck-heading_heading3' },
                                { model: 'heading4', view: 'h4', title: 'Título 4', class: 'ck-heading_heading4' }
                            ]
                        },
                        fontSize: {
                            options: [
                                9,
                                11,
                                13,
                                'default',
                                17,
                                19,
                                21
                            ]
                        },
                        fontFamily: {
                            options: [
                                'default',
                                'Arial, Helvetica, sans-serif',
                                'Courier New, Courier, monospace',
                                'Georgia, serif',
                                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                'Tahoma, Geneva, sans-serif',
                                'Times New Roman, Times, serif',
                                'Trebuchet MS, Helvetica, sans-serif',
                                'Verdana, Geneva, sans-serif'
                            ]
                        },
                        // Configuración para pegar con limpieza de estilos
                        clipboard: {
                            // Permitir pegar pero limpiar ciertos atributos
                            preventDefaultPasteData: false
                        },
                       
                        // Configuración adicional
                        removePlugins: ['Title'],
                        placeholder: 'Escribe aquí tu contenido...',
                        htmlSupport: {
                            allow: [
                                {
                                    name: /^(p|h[1-6]|div|span|strong|em|b|i|u|br|ul|ol|li|a|img|table|thead|tbody|tr|td|th)$/,
                                    attributes: ['href', 'src', 'alt', 'title'],
                                    classes: false,
                                    styles: false // Esto previene todos los estilos inline incluyendo font-size
                                }
                            ],
                            disallow: [
                                {
                                    attributes: ['style']
                                }
                            ]
                        }
                    })
                    .then(editor => {
                        // Sin intervención del ClipboardPipeline para permitir pegado normal
                        // El problema del fontSize se controla con htmlSupport.styles: false
                        
                        // Guardar referencia del editor
                        $(element).data('ckeditor', editor);
                        
                        console.log('CKEditor 5 inicializado correctamente');
                    })
                    .catch(error => {
                        console.error('Error al inicializar CKEditor 5:', error);
                    });
            });

            // Inicializar dropdowns de Bootstrap
            $('.dropdown-toggle').dropdown();
        });

        // Función para obtener contenido de CKEditor
        function getCKEditorContent(selector) {
            const element = $(selector);
            if (element.length && element.data('ckeditor')) {
                return element.data('ckeditor').getData();
            }
            return '';
        }

        // Función para establecer contenido en CKEditor
        function setCKEditorContent(selector, content) {
            const element = $(selector);
            if (element.length && element.data('ckeditor')) {
                element.data('ckeditor').setData(content);
            }
        }

        // Función para limpiar CKEditor
        function clearCKEditor(selector) {
            setCKEditorContent(selector, '');
        }
    </script>

    @stack('scripts')
</body>
</html>