<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Buat Galeri - Ramos Badminton Center</title>
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
    <link href="{{URL::asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
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
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Gallery</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- Navbar & Hero End -->

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="section-title ff-secondary text-center text-primary fw-normal">Tambah Gambar Galeri Baru</h3>
                <form action="{{ route('admin.Galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label> <!-- Label Indonesia -->
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required> <!-- Tambahkan class is-invalid -->
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Ubah text-danger menjadi invalid-feedback -->
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label> <!-- Label Indonesia -->
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea> <!-- Tambahkan class is-invalid -->
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Ubah text-danger menjadi invalid-feedback -->
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label> <!-- Label Indonesia -->
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required> <!-- Tambahkan class is-invalid -->
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Ubah text-danger menjadi invalid-feedback -->
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button> <!-- Button Indonesia -->
                    <a href="{{ route('admin.Galeri.index') }}" class="btn btn-secondary">Batal</a> <!-- Button Indonesia -->
                </form>
            </div>
        </div>
    </div>
</div>

 <!-- Footer Start -->
 @include('layouts.footer')
 <!-- Footer End -->


 <!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

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


