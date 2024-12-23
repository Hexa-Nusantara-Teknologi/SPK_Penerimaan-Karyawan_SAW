<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Rekrutmen Karyawan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('FlexStart/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('FlexStart/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('FlexStart/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FlexStart/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('FlexStart/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('FlexStart/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('FlexStart/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('FlexStart/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('FlexStart/assets/img/logo.png') }}" alt="">
                <h1 class="sitename">Rekrutmen</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#tahapan">Tahapan Pendaftaran</a></li>
                    <li><a href="#faq">FAQ</a></li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted flex-md-shrink-0" href="{{ 'login' }}">Mulai</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Bergabunglah dengan Tim Kami</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Masa depanmu dimulai di sini. Jelajahi karir yang
                            menarik peluang bersama kami!</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="#about" class="btn-get-started">Get Started <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{ asset('FlexStart/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Tentang Kami</h3>

                            <p>
                                Selamat datang di portal rekrutmen kami! Kami adalah perusahaan berpikiran maju yang
                                berdedikasi pada hal tersebut menciptakan dampak positif dalam industri kami. Dengan tim
                                profesional yang bersemangat, kami bertujuan untuk memberikan hasil yang luar biasa bagi
                                klien kami dan menumbuhkan budaya kerja yang menghargai kolaborasi, kreativitas, dan
                                pertumbuhan pribadi. Dengan bergabung bersama kami, Anda menjadi bagian dari sebuah
                                organisasi yang digerakkan oleh misi yang memprioritaskan inovasi dan keunggulan di
                                setiap tingkat.
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="{{ 'login' }}"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Daftar Rekrutmen Sekarang </span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('FlexStart/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- /About Section -->



        <!-- Stats Section -->
        <section id="tahapan" class="stats section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tahapan Pendaftaran</h2>
                <p>Perhatikan Tahapan-Tahapan Pendaftaran</p>
            </div><!-- End Section Title -->

            <div class="container my-5" data-aos="fade-up" data-aos-delay="100">
                <div class="row text-center align-items-center gy-4 ms-5">
                    <!-- Step 1 -->
                    <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                        <div class="stats-item d-flex align-items-center flex-column">
                            <div class="p-2">
                                <img src="{{ asset('img/pendaftaran-online.png') }}" alt="Pendaftaran Online"
                                    class="img-fluid mb-2" style="max-width: 80px;">
                                <h6 class="fw-bold mb-0">Pendaftaran Online</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Arrow -->
                    <div class="col-md-1 d-none d-md-block">
                        <h2 class="text-danger fw-bold">&#8594;</h2>
                    </div>
                    <!-- Step 2 -->
                    <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                        <div class="stats-item d-flex align-items-center flex-column">
                            <div class="p-2">
                                <img src="{{ asset('img/pendaftaran-online.png') }}" alt="Seleksi Administrasi"
                                    class="img-fluid mb-2" style="max-width: 80px;">
                                <h6 class="fw-bold mb-0">Seleksi Administrasi</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Arrow -->
                    <div class="col-md-1 d-none d-md-block">
                        <h2 class="text-danger fw-bold">&#8594;</h2>
                    </div>
                    <!-- Step 3 -->
                    <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                        <div class="stats-item d-flex align-items-center flex-column">
                            <div class="p-2">
                                <img src="{{ asset('img/pendaftaran-online.png') }}" alt="Tes Aptitude"
                                    class="img-fluid mb-2" style="max-width: 80px;">
                                <h6 class="fw-bold mb-0">Seleksi Akademik</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Arrow -->
                    <div class="col-md-1 d-none d-md-block">
                        <h2 class="text-danger fw-bold">&#8594;</h2>
                    </div>
                    <!-- Step 4 -->
                    <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                        <div class="stats-item d-flex align-items-center flex-column">
                            <div class="p-2">
                                <img src="{{ asset('img/pendaftaran-online.png') }}" alt="Tes Hardskill"
                                    class="img-fluid mb-2" style="max-width: 80px;">
                                <h6 class="fw-bold mb-0">Seleksi Soft Skill</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Stats Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>F.A.Q</h2>
                <p>Frequently Asked Questions</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                        <div class="faq-container">

                            <div class="faq-item faq-active">
                                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                                <div class="faq-content">
                                    <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                        laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                        rhoncus dolor purus non.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                                <div class="faq-content">
                                    <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                        Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                        suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                        convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div><!-- End Faq Column-->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">

                            <div class="faq-item">
                                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h3>
                                <div class="faq-content">
                                    <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                                        in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                        suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                                <div class="faq-content">
                                    <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed
                                        in suscipit sequi. Distinctio ipsam dolore et.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div><!-- End Faq Column-->

                </div>

            </div>

        </section><!-- /Faq Section -->
    </main>

    <footer id="footer" class="footer">



        <!-- <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">FlexStart</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div> -->

        <div class="container copyright text-center mt-4">
            <p>©2024 <span>Copyright</span> <span>All Rights
                    Reserved</span></p>

        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('FlexStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('FlexStart/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('FlexStart/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('FlexStart/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('FlexStart/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('FlexStart/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('FlexStart/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('FlexStart/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('FlexStart/assets/js/main.js') }}"></script>

</body>

</html>