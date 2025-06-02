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
        @include('admin.navbar')
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Informasi Kontak</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Kontak</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- Navbar & Hero End -->

@section('content')
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
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('admin.contact.create') }}" class="btn btn-primary mb-3">Tambah Informasi Kontak Baru</a>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover align-middle">  <!-- Tambahkan class align-middle -->
                            <thead class="table-dark"> <!-- Tambahkan class table-dark -->
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Jam Operasi</th>
                                    <th scope="col">Link WhatsApp</th>
                                    <th scope="col">Username Instagram</th>
                                    <th scope="col">Embed Code</th>
                                    <th scope="col" class="text-center">Aksi</th>  <!-- Tambahkan class text-center -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)  <!-- Ubah foreach menjadi forelse -->
                                    <tr>
                                        <th scope="row">{{ $contact->id }}</th>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td>{{ $contact->operating_hours }}</td>
                                        <td>{{ $contact->whatsapp_link }}</td>
                                        <td>{{ $contact->instagram_username }}</td>
                                        <td>{{ $contact->embed_code }}</td>
                                        <td class="text-center"> <!-- Tambahkan class text-center -->
                                            <a href="{{ route('admin.contact.edit', $contact->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">  <!-- Ubah btn-primary menjadi btn-warning dan tambahkan me-1-->
                                                <i class="fas fa-edit"></i>  <!-- Tambahkan icon -->
                                            </a>
                                            <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi kontak ini?')">  <!-- Tambahkan class d-inline -->
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus"> <!-- Tambahkan title -->
                                                    <i class="fas fa-trash-alt"></i> <!-- Tambahkan icon -->
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty  <!-- Tambahkan bagian empty -->
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="fas fa-info-circle me-2"></i> Tidak ada informasi kontak ditemukan.</i>
                                        </td>
                                    </tr>
                                @endforelse  <!-- Ubah endforeach menjadi endforelse -->
                            </tbody>
                        </table>
                    </div>
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
