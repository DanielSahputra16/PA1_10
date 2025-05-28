<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About - Badminton Ramos Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="{{URL::asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
</head>

<style>

        /* Card Tim yang Disesuaikan */
        .team-item {
            background: #f8f9fa;
            /* Latar belakang abu-abu muda */
            border-radius: 15px;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            /* Tambahkan margin bawah untuk jarak */
        }

        .team-item .rounded-circle {
            width: 180px;
            /* Sesuaikan ukuran sesuai kebutuhan */
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            /* Pastikan tetap lingkaran */
            margin: 15px auto;
            /* Margin atas dan bawah untuk ruang */
            display: block;
        }

        .team-item h5 {
            color: #343a40;
            /* Warna teks untuk nama */
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .team-item small {
            color: #6c757d;
            /* Warna teks untuk peran */
            font-size: 0.9rem;
        }

        /* Mengatur gambar agar responsive */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
         .team-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

</style>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        @include('layouts.navbar')
        <!-- Navbar & Hero End -->

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="row g-4">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-90 wow zoomIn" data-wow-delay="0.1s"
                                    src="{{ URL::asset('img/IMG-20250512-WA0010.jpg') }}" alt="">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-7 wow zoomIn" data-wow-delay="0.3s"
                                    src="{{ URL::asset('img/IMG-20250512-WA0008.jpg') }}" style="margin-top: 25%;"
                                    alt="">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                                    src="{{ URL::asset('img/IMG-20250512-WA0021.jpg') }}" alt="">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-90 wow zoomIn" data-wow-delay="0.7s"
                                    src="{{ URL::asset('img/IMG-20250512-WA0020.jpg') }}" alt="">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-90 wow zoomIn" data-wow-delay="0.7s"
                                    src="{{ URL::asset('img/IMG-20250512-WA0006.jpg') }}" alt="">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                                    src="{{ URL::asset('img/IMG-20250512-WA0023.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                    <h1 class="mb-4">Welcome to Badminton Ramos Center</h1>
                    <p>
                        <strong>Badminton Ramos Center</strong> resmi berdiri pada <strong>26 Januari 2025</strong> dengan
                        tujuan utama:
                    </p>
                    <ul>
                        <li>Mengembangkan bakat dan keterampilan dalam olahraga badminton.</li>
                        <li>Membangun komunitas yang aktif dan solid.</li>
                        <li>Menyediakan sarana rekreasi dan hiburan bagi masyarakat.</li>
                    </ul>

                    <h2 class="mt-4">Visi & Misi</h2>
                    <h3>Visi:</h3>
                    <p>
                        Menjadi pusat kegiatan olahraga badminton terkemuka dan berkontribusi dalam meningkatkan kualitas
                        olahraga di masyarakat.
                    </p>

                    <h3>Misi:</h3>
                    <ul>
                        <li>Meningkatkan kualitas dan kesadaran masyarakat terhadap olahraga.</li>
                        <li>Menjadi pusat kegiatan olahraga yang unggul di daerah ini.</li>
                        <li>Menyediakan fasilitas lapangan bagi individu yang ingin mengembangkan bakatnya dalam badminton.
                        </li>
                    </ul>

                    <h2 class="mt-4">Fasilitas</h2>
                    <ul>
                        <li>Jumlah lapangan: <strong>2</strong> (outdoor, lantai semen).</li>
                        <li>Kantin mini yang menjual makanan ringan, minuman, baju olahraga, shuttlecock, dan kaos kaki.
                        </li>
                        <li>Penyewaan raket tersedia.</li>
                        <li>Area parkir luas.</li>
                        <li>Kamar ganti tersedia di toilet.</li>
                        <li>Ventilasi dan penerangan yang baik.</li>
                    </ul>

                    <h2 class="mt-4">Layanan</h2>
                    <ul>
                        <li>Sewa lapangan bisa dilakukan oleh individu maupun tim.</li>
                        <li>Saat ini belum tersedia pelatihan dan kursus badminton.</li>
                        <li>Turnamen atau kompetisi belum tersedia.</li>
                    </ul>

                    <h2 class="mt-4">Kenapa Memilih Kami?</h2>
                    <ul>
                        <li>📍 <strong>Lokasi Strategis</strong> – Mudah dijangkau dan dikelilingi lingkungan asri.</li>
                        <li>🅿️ <strong>Parkir Luas</strong> – Nyaman dan cukup untuk banyak pengunjung.</li>
                        <li>💰 <strong>Harga Terjangkau</strong> – Cocok untuk remaja dan dewasa.</li>
                        <li>🧹 <strong>Tempat Bersih</strong> – Kebersihan dan kenyamanan terjaga.</li>
                        <li>📹 <strong>Keamanan Terjamin</strong> – Dilengkapi dengan CCTV untuk keamanan pelanggan.</li>
                        <li>☕ <strong>Kantin Mini</strong> – Menyediakan makanan ringan, minuman, dan perlengkapan
                            olahraga.</li>
                    </ul>

                    <h2 class="mt-4">Member & Pelanggan</h2>
                    <ul>
                        <li>Jumlah member: <strong>7</strong> orang.</li>
                        <li>Jumlah pelanggan: <strong>348</strong> orang.</li>
                        <li>Masih dalam tahap awal, belum memiliki prestasi.</li>
                    </ul>

                    <p class="mt-4">
                        <strong>Ramos Badminton Center</strong> siap menjadi tempat terbaik bagi Anda, baik untuk latihan
                        santai, bermain bersama teman, atau persiapan kompetisi!
                    </p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Month of Experience</p>
                                    <h6 class="text-uppercase mb-0">Experience</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                <div class="ps-4">
                                    <p class="mb-0">REGISTERED</p>
                                    <h6 class="text-uppercase mb-0">Players</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol -->
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">SEE MORE</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Manajemen dan Pengelola Lapangan
                </h5>
                <h1 class="mb-5">Tim Pengelola Lapangan</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Anggota 1 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid rounded-circle" src="{{ URL::asset('/img/audrey.jpg') }}" alt=""
                            style="object-fit: cover;">
                        <h5 class="mb-0">Deborah Audrey Simatupang</h5>
                        <small>Owner</small>
                    </div>
                </div>
                <!-- Anggota 2 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid rounded-circle" src="{{ URL::asset('/img/penjaga.jpg') }}" alt=""
                            style="object-fit: cover;">
                        <h5 class="mb-0">Josua</h5>
                        <small>Pengelola lapangan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{URL::asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{URL::asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{URL::asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{URL::asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{URL::asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{URL::asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{URL::asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{URL::asset('js/main.js')}}"></script>
</body>

</html>
