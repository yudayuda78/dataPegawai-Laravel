<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <!-- Date Range Picker JS -->
    <script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



    <!-- FileinputJS -->
    <!-- bootstrap 5.x or 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        crossorigin="anonymous">

    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">

    <!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
    <!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->

    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
    <!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->



    <!-- buffer.min.js and filetype.min.js are necessary in the order listed for advanced mime type parsing and more correct
     preview. This is a feature available since v5.5.0 and is needed if you want to ensure file mime type is parsed
     correctly even if the local file's extension is named incorrectly. This will ensure more correct preview of the
     selected file (note: this will involve a small processing overhead in scanning of file contents locally). If you
     do not load these scripts then the mime type parsing will largely be derived using the extension in the filename
     and some basic file content parsing signatures. -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js"
        type="text/javascript"></script>

    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js"
        type="text/javascript"></script>

    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js"
        type="text/javascript"></script>

    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>

    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>

    <style>
        /* Custom styling untuk Select2 agar sesuai dengan Tailwind */
        .select2-container .select2-selection--single {
            height: 2.5rem !important;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            width: 100%;
        }

        /* Mengatur tampilan FileinputJS agar lebih sesuai dengan Tailwind */
        .file-input-container .file-preview {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Tambah Data Pegawai</h2>

        <form action="/tambahdata" method="POST" enctype="multipart/form-data" class="space-y-4 " >
            @csrf

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-gray-700 font-medium mb-1">Nama</label>
                <input type="text" name="nama" placeholder="Nama"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <!-- Position -->
            <div>
                <label for="position" class="block text-gray-700 font-medium mb-1">Position</label>
                <select class="js-example-basic-single w-full" name="position">
                    @foreach ($pegawai as $item)
                        <option value="{{ $item->position }}">{{ $item->position }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Umur -->
            <div>
                <label for="umur" class="block text-gray-700 font-medium mb-1">Umur</label>
                <input type="number" name="umur" placeholder="Umur"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <!-- Kantor -->
            <div>
                <label for="kantor" class="block text-gray-700 font-medium mb-1">Kantor</label>
                <select class="kantor-select w-full" name="kantor">
                    @foreach ($kantor as $item)
                        <option value="{{ $item->kantor }}">{{ $item->kantor }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Upload Foto -->
            <div class="file-input-container">
                <label for="photo" class="block text-gray-700 font-medium mb-1">Upload Foto Pegawai</label>
                <input id="photo" name="photo" type="file" class="file">
            </div>

            {{-- <div>
                <label for="dokumen">Dokumen</label>
                
                <input type="file" class="dropzone" id="my-awesome-dropzone" name="dokumen">
            </div> --}}

            <div id="my-awesome-dropzone" class="dropzone">
                <div class="dz-message">
                    <p>Upload dokumen di sini</p>
                </div>
            </div>

            

            <Div>
                <label for="date_start" class="block text-gray-700 font-medium mb-1">Mulai Bekerja</label>
                <input type="text" name="date_start" name="date_start" value="" />
            </Div>





            <!-- Button Submit -->
            <div class="text-center">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                    Upload
                </button>
            </div>
        </form>

        {{-- <form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone"></form> --}}
    </div>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.kantor-select').select2();
            // Inisialisasi FileinputJS dengan konfigurasi lebih ringan
            $("#photo").fileinput({
                allowedFileExtensions: ["jpg", "png", "gif"],
                maxFileSize: 2048,
                showUpload: false,
                previewFileType: "image",
                language: "id"
            });
        });

        Dropzone.autoDiscover = false;

    let myDropzone = new Dropzone("#my-awesome-dropzone", {
        url: "/tambahdata", // Endpoint Laravel untuk upload
        paramName: "dokumen",
        maxFilesize: 5, // Maksimal 5MB
        acceptedFiles: ".pdf,.doc,.docx,.xls,.xlsx,.txt",
        dictDefaultMessage: "Seret dan lepaskan dokumen di sini atau klik untuk memilih",
        addRemoveLinks: true,
        success: function(file, response) {
            console.log("Upload sukses:", response);
        },
        error: function(file, errorMessage) {
            console.log("Terjadi kesalahan:", errorMessage);
        }
    });

        

        $(function() {
            $('input[name="date_start"]').daterangepicker({
                singleDatePicker: true,
                opens: 'left'
            }, function(start, end, label) {
                $('#date_start').val(start.format(
                    'YYYY-MM-DD')); // Mengatur value input sesuai tanggal yang dipilih
            });
        });
    </script>
</body>

</html>
