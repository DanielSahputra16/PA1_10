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

    <!-- Internal CSS untuk Pagination -->
    <style>
        .custom-pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .custom-pagination ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .custom-pagination li {
            margin: 0 5px;
        }

        .custom-pagination a,
        .custom-pagination span {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-pagination a:hover {
            background-color: #f0f0f0;
        }

        .custom-pagination .active span {
            background-color: #FEA116;
            /* Warna Biru Primer */
            color: white;
            border-color: #FEA116;
        }

        .custom-pagination .disabled span {
            color: #999;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .custom-pagination .disabled span:hover {
            background-color: transparent;
        }
    </style>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Testimonial</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Testimonial Start (Approved Testimonials) -->
        <div class="container-fluid pt-4 px-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonials</h5>
                    <h1 class="mb-5">Apa Kata Klien Kami!</h1>
                </div>
                <div class="row">
                    @if(count($testimonials) > 0)
                        @foreach($testimonials as $testimonial)
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="testimonial-item bg-transparent border rounded p-4">
                                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                    <p>{{ $testimonial->message }}</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('img/biodata.PNG') }}"
                                            style="width: 50px; height: 50px;">
                                        <div class="ps-3">
                                            <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                            <small>{{ $testimonial->subject }}</small>
                                        </div>
                                    </div>

                                    <!-- Tombol hapus hanya muncul jika user sudah login dan memiliki izin -->
                                    @auth
                                        @if (auth()->user()->id === $testimonial->user_id || auth()->user()->isAdmin())
                                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>No approved testimonials yet.</p>
                        </div>
                    @endif
                </div>

                <!-- Custom Pagination Links -->
                <div class="custom-pagination">
                    @if($testimonials instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <ul>
                            @if ($testimonials->onFirstPage())
                                <li class="disabled"><span>Previous</span></li>
                            @else
                                <li><a href="{{ $testimonials->previousPageUrl() }}" rel="prev">Previous</a></li>
                            @endif

                            @foreach ($testimonials->getUrlRange(max($testimonials->currentPage() - 2, 1), min($testimonials->currentPage() + 2, $testimonials->lastPage())) as $page => $url)
                                @if ($page == $testimonials->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            @if ($testimonials->hasMorePages())
                                <li><a href="{{ $testimonials->nextPageUrl() }}" rel="next">Next</a></li>
                            @else
                                <li class="disabled"><span>Next</span></li>
                            @endif
                        </ul>
                    @endif
                </div>

                <!-- Tautan ke formulir pembuatan -->
                <div class="text-center mt-3">
                    <a href="{{ route('testimonials.create') }}" class="btn btn-primary btn-sm">Tambahkan Testimonial</a>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- Footer Start -->
        <!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                <a class="btn btn-link" href="{{ route('About.indexPublic') }}">About</a>
                <a class="btn btn-link" href="{{ route('menu.indexPublic') }}">Fasilitas</a>
                <a class="btn btn-link" href="{{ route('reservasi.index') }}">Reservasi</a>
                <a class="btn btn-link" href="/testimonialspublic">Testimonial</a>
                <a class="btn btn-link" href="{{ route('galeri.indexPublic') }}">Galeri</a>
                <a class="btn btn-link" href="{{ route('contact.index') }}">Contact</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Sitoluama, Kec. Sigumpar, Toba, Sumatera Utara 22382</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>wa.me/6282185453381</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>simatupangaudrey99@gmailcom</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/profile.php?id=61572922522102"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/ramos_badmintoncenter/?utm_source=ig_web_button_share_sheet"><i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                <h5 class="text-light fw-normal">Every Day</h5>
                <p>08AM - 23PM</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                <p>Tetap update untuk mendapatkan update tentang jadwal dan reservasi lapangan.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Badminton Ramos Center</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">PA_10</a><br><br>
                    Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">PA1_10</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                    <a href="{{ route('welcome') }}">Home</a>
                    <a href="{{ route('About.indexPublic') }}">Tentang Kami</a>
                    <a href="{{ route('menu.indexPublic') }}">Peralatan</a>
                    <a href="{{ route('contact.index') }}">Kontak</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
