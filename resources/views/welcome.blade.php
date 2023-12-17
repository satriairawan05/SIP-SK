<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>{{ env('APP_NAME') }}</title>
    <!--

TemplateMo 548 Training Studio

https://templatemo.com/tm-548-training-studio

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">Kemahasiswaan</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#features">About</a></li>
                            <li class="main-button"><a href="{{ route('mahasiswa.login') }}">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        {{-- <video autoplay muted loop id="bg-video">
            <source src="assets/images/gym-video.mp4" type="video/mp4" />
        </video> --}}

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>work harder, get stronger</h6>
                <h2>easy with our <em>gym</em></h2>
                <div class="main-button scroll-to-section">
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Program <em>Kampus</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>Kedua jenis SK ini penting dalam menjaga keteraturan, keselamatan, dan pengelolaan kegiatan di lingkungan kampus.
                            Mereka juga membantu dalam memastikan bahwa kegiatan dan organisasi mahasiswa beroperasi sesuai dengan aturan dan regulasi yang berlaku di kampus tersebut</p>
                    </div>
                </div>
                <div class="col-12">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>SK ORGANISASI</h4>
                                <p class="text-justify">SK organisasi kampus dikeluarkan untuk mendirikan atau mengesahkan suatu organisasi mahasiswa di lingkungan kampus. Ini termasuk organisasi seperti himpunan mahasiswa, klub, atau asosiasi lain yang memiliki kegiatan dan tujuan tertentu.
                                    SK organisasi ini biasanya mencakup struktur organisasi, susunan kepengurusan, tujuan, aturan, dan tanggung jawab organisasi tersebut.
                                    SK ini juga bisa mengatur prosedur pemilihan atau penggantian pengurus organisasi.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>SK KEGIATAN</h4>
                                <p class="text-justify">SK kegiatan kampus biasanya dikeluarkan untuk memberikan izin atau persetujuan terhadap suatu kegiatan atau acara yang akan dilakukan di lingkungan kampus.
                                    SK ini dapat mencakup berbagai jenis kegiatan, seperti seminar, workshop, festival, kompetisi, dan acara lainnya yang diadakan oleh mahasiswa, organisasi mahasiswa,
                                    atau pihak lain yang terkait dengan aktivitas kampus.SK kegiatan ini dapat mengatur aspek seperti tanggal, tempat, anggaran, aturan, dan persyaratan lain yang harus dipatuhi oleh penyelenggara acara.</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <marquee>Copyright &copy; 2023 - {{ date('Y') }} || Aplikasi Surat Keputusan
                        Distributed by <a href="https://politanisamarinda.ac.id/" class="tm-text-link" target="_blank">Politeknik Pertanian Negeri
                            Samarinda</a>
                    </marquee>

                    <!-- You shall support us a little via PayPal to info@templatemo.com -->

                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
