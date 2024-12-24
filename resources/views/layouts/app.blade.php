<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rekrutmen Karyawan</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('AdminUser/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('AdminUser/css/sb-admin-2.min.css') }}" rel=" stylesheet">
    <style>
    .welcome-box {
        background-color: #CDF0EA;
        /* Light gray background */
        padding: 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: black;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .welcome-text h1 {
        font-size: 24px;
        font-weight: bold;
    }

    .welcome-text p {
        margin: 0;
        font-size: 16px;
    }

    .welcome-button {
        display: flex;
        align-items: center;
    }

    .welcome-button a {
        text-decoration: none;
    }

    .red-dot {
        height: 8px;
        width: 8px;
        background-color: red;
        border-radius: 50%;
        margin-left: 8px;
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.navbar')
                @yield('content')


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->


    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('AdminUser/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminUser/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('AdminUser/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('AdminUser/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('AdminUser/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('AdminUser/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('AdminUser/js/demo/chart-pie-demo.js') }}"></script>
    <script>
    document.querySelectorAll('a[href="#"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });
    </script>
</body>

</html>