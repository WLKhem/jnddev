<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/sweetalert2/dist/sweetalert2.min.css">

    @yield('style')
</head>

<body class="{{ request()->route()->getName() == ''? 'index-page': 'blog-page' }}" data-bs-spy="scroll"
    data-bs-target="#navmenu">

    <!-- ======= Header ======= -->
    <header id="header"
        class=" {{ request()->route()->getName() == ''? 'header fixed-top d-flex align-items-center': 'header sticky-top d-flex align-items-center' }}">
        <div class="container-fluid d-flex align-items-center justify-content-start">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>JNDWeb</h1>
                <span>.</span>
            </a>
        </div>

        <div class="container-fluid d-flex align-items-center justify-content-end normal-nav">
            @if (auth()->check())
                <nav id="navmenu" class="navmenu mr-4" style=" margin-top: -10px !important; ">
                    <ul style=" width: 150px !important; ">
                        <li class="dropdown has-dropdown">
                            <a href="#"><span>{{ auth()->user()->name }}</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul class="dd-box-shadow" style="padding: 5px 5px !important;right: 0px !important;width: 150px !important;">
                                <li><a href="logout">Sign out</a></li>
                                <li><a href="shorthistory">Short history</a></li>
                                <li><a href="/">Crate short url</a></li>
                                @role('admin')
                                    <li><a href="admin">Dashboards</a></li>
                                @endrole
                            </ul>
                        </li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            @else
                <!-- Nav Menu -->
                <nav id="navmenu" class="navmenu mr-4">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#modal-sing-in">Log in</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav><!-- End Nav Menu -->
                <a class="btn-getstarted" href="#" data-toggle="modal" data-target="#modal-regis">Get Started</a>
            @endif
        </div>
    </header><!-- End Header -->

    <main id="main">
        @yield('content')
    </main>

    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- All Jquery -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    @yield('script')

</body>

</html>
