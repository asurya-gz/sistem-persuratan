<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website Desa Situterate</title>

    <!-- Font dan Icon -->
    <link href="{{ asset('Folder/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    
    <!-- CSS utama -->
    <link href="{{ asset('Folder/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Animate.css untuk animasi elegan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- Custom CSS tambahan -->
<style>
    /* ===== Typography dan Dasar ===== */
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f8f9fc;
    }

    /* ===== Scroll to Top Button Styling ===== */
    .scroll-to-top {
        background: linear-gradient(135deg, #4e73df, #224abe);
        border: none;
        padding: 8px;
        transition: background 0.3s ease;
    }

    .scroll-to-top:hover {
        background: #2e59d9;
    }

    /* ===== Modal Enhancements ===== */
    .modal-content {
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.425);
        animation: fadeInDown 0.4s ease both;
    }

    .modal-header {
        border-bottom: none;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .modal-footer {
        border-top: none;
        padding-top: 0;
    }

    /* ===== Tombol Utama dan Sekunder ===== */
    .btn-primary {
        background: linear-gradient(135deg, #4e73df, #224abe);
        border: none;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: #1a45c2;
    }

    .btn-outline-secondary:hover {
        background-color: #f1f1f1;
        color: #333;
    }

    /* ===== SweetAlert2 Styling Fix (Optional) ===== */
    .swal2-popup {
        font-family: 'Nunito', sans-serif;
        border-radius: 12px !important;
    }

    /* ===== Keyframe Animations (fallback kalau animate.css tak aktif) ===== */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translate3d(0, -20%, 0);
        }
        to {
            opacity: 1;
            transform: none;
        }
    }
</style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.navbar')
            
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <!-- Tombol Scroll ke Atas -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/logout" method="POST">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Yakin ingin keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Klik "Logout" jika kamu yakin ingin keluar dari sesi saat ini.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script JS -->
    <script src="{{ asset('Folder/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Folder/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Folder/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('Folder/js/sb-admin-2.min.js') }}"></script>

    <!-- Plugin Chart (opsional) -->
    <script src="{{ asset('Folder/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('Folder/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('Folder/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap 5 (tambahan CDN, jika dibutuhkan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" 
        crossorigin="anonymous"></script>

    @stack('scripts')

</body>

</html>
