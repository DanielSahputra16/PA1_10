<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reservasi - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">  <!-- Sebaiknya diisi untuk SEO -->
    <meta content="" name="description">  <!-- Sebaiknya diisi untuk SEO -->

    <!-- Favicon -->
    <link href="{{ URL::asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

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
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- End Navbar -->

        <!-- Hero Header Start -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Reservasi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Reservasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Gallery</h5>
            <h1 class="mb-5">Explore Our Gallery</h1>
        </div>
        <div class="row g-4">
            @forelse($galleries as $galeri)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 wow fadeInUp gallery-item" data-wow-delay="{{ ($loop->index % 4) * 0.2 + 0.1 }}s">
                <div class="service-item rounded">
                    <img class="img-fluid" src="{{ Storage::url('images/Galeri/' . $galeri->image_path) }}" alt="{{ $galeri->title }}" onclick="openModal('{{ Storage::url('images/Galeri/' . $galeri->image_path) }}', '{{ $galeri->title }}', '{{ $galeri->description }}')">
                    <div class="overlay">
                        <h5>{{ $galeri->title }}</h5>
                        <p>{{ Str::limit($galeri->description, 50, '...') }}</p> <!-- Batasi deskripsi -->
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Tidak ada gambar di galeri saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">×</span>
    <div class="modal-content">
        <img id="modalImage" src="" alt="">
        <div id="modalCaption">
            <h5 id="modalTitle"></h5>
            <p id="modalDescription"></p>
        </div>
    </div>
</div>

 <!-- Footer -->
 @include('layouts.footer')
 <!-- End Footer -->

 <!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="Kembali ke atas"><i class="bi bi-arrow-up"></i></a>
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
