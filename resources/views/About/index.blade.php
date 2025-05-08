<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Informasi Kontak - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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

        <!-- Navbar & Hero Start -->
        @include('layouts.navbar')
        <!-- Navbar & Hero End -->

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Contact Info Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                @forelse ($contacts as $contact)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light text-center p-5">
                            <i class="fa fa-phone-alt fa-2x text-primary mb-3"></i>
                            <h5 class="fw-bold mb-3">Phone</h5>
                            <p class="mb-0">{{ $contact->phone_number }}</p>
                        </div>
                    </div>
                     <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light text-center p-5">
                            <i class="fa fa-clock fa-2x text-primary mb-3"></i>
                            <h5 class="fw-bold mb-3">Open Hours</h5>
                            <p class="mb-0">{{ $contact->operating_hours }}</p>
                        </div>
                    </div>
                      <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light text-center p-5">
                           <a href="{{ $contact->whatsapp_link }}" target="_blank"> <i class="fab fa-whatsapp fa-2x text-primary mb-3"></i>
                            <h5 class="fw-bold mb-3">WhatsApp</h5>
                            <p class="mb-0">Chat Us</p>
                        </div>
                    </div>
                     <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light text-center p-5">
                            <i class="fab fa-instagram fa-2x text-primary mb-3"></i>
                            <h5 class="fw-bold mb-3">Intagram</h5>
                            <p class="mb-0">{{ $contact->instagram_username }}</p>
                        </div>
                    </div>
                      <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light text-center p-5">
                            <h5 class="fw-bold mb-3">Maps</h5>
                            <p class="mb-0">
                             {!! $contact->embed_code !!}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No contact information found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Contact Info End -->

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

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
