<!-- resources/views/admin/jadwals/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jadwal - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">  <!-- Sebaiknya diisi untuk SEO -->
    <meta content="" name="description">  <!-- Sebaiknya diisi untuk SEO -->

    <!-- Favicon (Optional - Sesuaikan Path) -->
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
        <!-- Spinner Start (Optional) -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar (Optional - Jika ingin menggunakan Navbar yang sama) -->
        @include('layouts.navbar')

        <!-- Hero Header Start (Optional - Jika ingin menggunakan Header yang sama) -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Jadwal</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Jadwal</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

        <!-- Jadwal List Start -->
        <div class="container-xxl py-7 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title ff-secondary text-center text-primary fw-normal">Admin</h4>
                    <h1 class="mb-5">Daftar Jadwal Lapangan</h1>
                </div>

                <div class="container-fluid px-0">
                    <div class="row g-4 justify-content-center">
                        <div class="col-12 px-0">

                            <!-- Pesan Sukses -->
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show wow fadeInUp" data-wow-delay="0.2s" role="alert">
                                    <i class="fas fa-check-circle me-2"></i> {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Tombol Tambah Jadwal -->
                            <div class="text-end mb-4 wow fadeInUp" data-wow-delay="0.3s">
                                <a href="{{ route('admin.jadwals.create') }}" class="btn btn-primary py-2 px-4">
                                    <i class="fas fa-plus me-2"></i>Tambah Jadwal
                                </a>
                            </div>

                            <!-- Tabel Jadwal -->
                            <div class="table-responsive wow fadeInUp" data-wow-delay="0.4s">
                                <table class="table table-striped table-bordered table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Waktu Mulai</th>
                                            <th scope="col">Waktu Selesai</th>
                                            <th scope="col">Lapangan 1 Tersedia</th>
                                            <th scope="col">Lapangan 2 Tersedia</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwals as $jadwal)
                                            <tr>
                                                <td>{{ $jadwal->tanggal }}</td>
                                                <td>{{ $jadwal->waktu_mulai }}</td>
                                                <td>{{ $jadwal->waktu_selesai }}</td>
                                                <td>{{ $jadwal->lapangan_1_tersedia ? 'Ya' : 'Tidak' }}</td>
                                                <td>{{ $jadwal->lapangan_2_tersedia ? 'Ya' : 'Tidak' }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-info me-1" href="{{ route('admin.jadwals.show',$jadwal->id) }}" title="Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-warning me-1" href="{{ route('admin.jadwals.edit',$jadwal->id) }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.jadwals.destroy',$jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jadwal List End -->

        <!-- Footer (Optional - Jika ingin menggunakan Footer yang sama) -->
        @include('layouts.footer')

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
