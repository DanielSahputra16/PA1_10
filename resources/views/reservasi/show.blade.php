<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reservasi - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ URL::asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>

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

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Detail Reservasi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservasi.index') }}">Reservasi</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Detail Reservasi Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Detail Reservasi</h5>
                        <h1 class="mb-4">Informasi Lengkap</h1>
                        <p class="mb-4">Berikut adalah detail lengkap dari reservasi Anda.</p>
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>ID Reservasi:</strong> #{{ $reservasi->id }}</p>
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Nama:</strong> {{ $reservasi->nama }}</p>
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>No. HP:</strong> {{ $reservasi->no_hp }}</p>
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Lapangan:</strong> {{ $reservasi->lapangan->nama }}</p>
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Waktu Mulai:</strong> {{ \Carbon\Carbon::parse($reservasi->waktu_mulai)->isoFormat('D MMM YYYY, HH:mm') }}</p>
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Waktu Selesai:</strong> {{ \Carbon\Carbon::parse($reservasi->waktu_selesai)->isoFormat('D MMM YYYY, HH:mm') }}</p>
                        <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Status:</strong> {{ $reservasi->status }}</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('reservasi.index') }}">Kembali ke Daftar</a>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row img-twice position-relative h-100">
                            <div class="col-6 pe-0">
                                @if($reservasi->gambar)
                                <img class="img-fluid rounded shadow-sm w-100 h-100"
                                    src="{{ asset('storage/gambar/' . $reservasi->gambar) }}" style="object-fit: cover;"
                                    alt="Gambar Reservasi">
                                @else
                                <p>Tidak ada gambar</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail Reservasi End -->

        <!-- Footer Start -->
        @include('layouts.footer')
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ URL::asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ URL::asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>

</html>
