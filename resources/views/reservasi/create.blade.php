<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Buat Reservasi - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <!-- Sebaiknya diisi untuk SEO -->
    <meta content="" name="description">
    <!-- Sebaiknya diisi untuk SEO -->

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

        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- End Navbar -->

        <!-- Hero Header Start -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Buat Reservasi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservasi.index') }}">Reservasi</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Buat</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

        <!-- Create Reservation Content Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <!-- Menggunakan gaya heading dari halaman tabel -->
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Reservation</h5>
                    <h1 class="mb-5">Formulir Reservasi Lapangan</h1>
                </div>

                <!-- Menggunakan layout row/col dari halaman tabel (tapi mungkin kolom lebih sempit) -->
                <div class="row g-4 justify-content-center">
                    <!-- Kolom dibuat lebih sempit (lg-8) agar form tidak terlalu lebar -->
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">

                        <!-- Menampilkan Error Validasi (dengan styling alert dari halaman tabel) -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                <h4 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Oops! Ada
                                    Kesalahan:</h4>
                                <ul class="list-unstyled mb-0">
                                    <!-- list-unstyled & mb-0 untuk kerapian -->
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Card untuk membungkus form agar terlihat lebih rapi (opsional) -->
                        <div class="card shadow-sm">
                            <div class="card-body p-4 p-md-5">
                                <form action="{{ route('reservasi.store') }}" method="POST">
                                    @csrf

                                     <!-- Field Nama -->
                                    <div class="mb-3">
                                        <label for="nama" class="form-label fw-bold">Nama:</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror" required
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Field No. HP -->
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label fw-bold">Nomor HP:</label>
                                        <input type="text" name="no_hp" id="no_hp"
                                            class="form-control @error('no_hp') is-invalid @enderror" required
                                            value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Field Lapangan -->
                                    <div class="mb-3">
                                        <label for="lapangan_id" class="form-label fw-bold">Pilih Lapangan:</label>
                                        <select name="lapangan_id" id="lapangan_id"
                                            class="form-select @error('lapangan_id') is-invalid @enderror" required>
                                            {{-- Opsi placeholder --}}
                                            <option value="" selected disabled>-- Silakan Pilih Lapangan --</option>

                                            {{-- Loop data lapangan dari database --}}
                                            @foreach ($lapangans as $lapangan)
                                                <option value="{{ $lapangan->id }}"
                                                    {{ old('lapangan_id') == $lapangan->id ? 'selected' : '' }}>
                                                    {{-- Tampilkan hanya nama lapangan sebagai teks opsi --}}
                                                    {{ $lapangan->nama }}
                                                </option>
                                            @endforeach
                                        </select>

                                        {{-- Tampilkan pesan error validasi jika ada --}}
                                        @error('lapangan_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Field Tanggal Mulai -->
                                    <div class="mb-3">
                                        <label for="tanggal_mulai" class="form-label fw-bold">Tanggal & Waktu
                                            Mulai:</label>
                                        <input type="datetime-local" name="tanggal_mulai" id="tanggal_mulai"
                                            class="form-control @error('tanggal_mulai') is-invalid @enderror" required
                                            value="{{ old('tanggal_mulai') }}">
                                        @error('tanggal_mulai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Field Tanggal Selesai -->
                                    <div class="mb-3">
                                        <label for="tanggal_selesai" class="form-label fw-bold">Tanggal & Waktu
                                            Selesai:</label>
                                        <input type="datetime-local" name="tanggal_selesai" id="tanggal_selesai"
                                            class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                            required value="{{ old('tanggal_selesai') }}">
                                        @error('tanggal_selesai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tombol Submit (dengan styling dari halaman tabel) -->
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary py-2 px-4">
                                            <i class="fas fa-calendar-check me-2"></i>Buat Reservasi
                                        </button>
                                        <a href="{{ route('reservasi.index') }}"
                                            class="btn btn-secondary py-2 px-4 ms-2">
                                            <i class="fas fa-times me-2"></i>Batal
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Reservation Content End -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- End Footer -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="Kembali ke atas"><i
                class="bi bi-arrow-up"></i></a>
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

<!-- Script validasi tanggal sisi klien) -->
<script>
    // Set tanggal minimum untuk datetime-local
    document.addEventListener('DOMContentLoaded', (event) => {
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        const yyyy = now.getFullYear();
        const mm = String(now.getMonth() + 1).padStart(2, '0');
        const dd = String(now.getDate()).padStart(2, '0');
        const hh = String(now.getHours()).padStart(2, '0');
        const mi = String(now.getMinutes()).padStart(2, '0');
        const minDateTime = `${yyyy}-${mm}-${dd}T${hh}:${mi}`;

        const startDateInput = document.getElementById('tanggal_mulai');
        const endDateInput = document.getElementById('tanggal_selesai');

        if (startDateInput) startDateInput.min = minDateTime;
        if (endDateInput) endDateInput.min = minDateTime;

        // Optional: Validasi Tanggal Selesai >= Tanggal Mulai
        if (startDateInput && endDateInput) {
            startDateInput.addEventListener('change', function() {
                if (this.value) {
                    endDateInput.min = this.value;
                    if (endDateInput.value && endDateInput.value < this.value) {
                        endDateInput.value = ''; // Reset jika tidak valid
                    }
                } else {
                    endDateInput.min = minDateTime;
                }
            });
        }
    });
</script>
