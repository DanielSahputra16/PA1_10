<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jadwal - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="{{ URL::asset('img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        @include('layouts.navbar')

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Jadwal Lapangan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Jadwal</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-xxl py-7 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title ff-secondary text-center text-primary fw-normal">
                        Jadwal Ketersediaan Lapangan
                    </h4>
                </div>
                <div>
                    <a href="{{ route('admin.jadwal_lapangan.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Lapangan 1</th>
                                <th>Lapangan 2</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalLapangans as $jadwalLapangan)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $jadwalLapangan->nama }}</td>
                                    <td>{{ $jadwalLapangan->waktu_mulai }}</td> <!-- Perbaikan di sini -->
                                    <td>{{ $jadwalLapangan->waktu_selesai }}</td>
                                    <td class="text-center">
                                        {{ $jadwalLapangan->lapangan_1 ? 'Dipakai' : 'Kosong' }}</td>
                                    <td class="text-center">
                                        {{ $jadwalLapangan->lapangan_2 ? 'Dipakai' : 'Kosong' }}</td>
                                    <td class="text-center">
                                        <form
                                            action="{{ route('admin.jadwal_lapangan.destroy', $jadwalLapangan->id) }}"
                                            method="POST" style="display: inline-block;">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.jadwal_lapangan.edit', $jadwalLapangan->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($jadwalLapangans->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data jadwal tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('layouts.footer')

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="Kembali ke atas"><i
                class="bi bi-arrow-up"></i></a>
    </div>

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
    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>

</html>
