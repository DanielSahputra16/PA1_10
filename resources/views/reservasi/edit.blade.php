<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Reservasi - Ramos Badminton Center</title>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Reservasi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservasi.index') }}">Reservasi</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Reservation Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1>Edit Detail Reservasi</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Field Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror" required
                                value="{{ old('nama', $reservasi->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Field No. HP -->
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP:</label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="form-control @error('no_hp') is-invalid @enderror" required
                                value="{{ old('no_hp', $reservasi->no_hp) }}">
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lapangan_id" class="form-label">Lapangan:</label>
                            <select class="form-control @error('lapangan_id') is-invalid @enderror" id="lapangan_id"
                                name="lapangan_id" required>
                                @foreach ($lapangans as $lapangan)
                                    <option value="{{ $lapangan->id }}"
                                        {{ (old('lapangan_id') == $lapangan->id) || ($reservasi->lapangan_id == $lapangan->id) ? 'selected' : '' }}>
                                        {{ $lapangan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lapangan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="tanggal_mulai">Tanggal Mulai:</label>
                            <input class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai"
                                name="tanggal_mulai" type="datetime-local"
                                value="{{ old('tanggal_mulai', \Carbon\Carbon::parse($reservasi->tanggal_mulai)->format('Y-m-d\TH:i')) }}"
                                required>
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="tanggal_selesai">Tanggal Selesai:</label>
                            <input class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai"
                                name="tanggal_selesai" type="datetime-local"
                                value="{{ old('tanggal_selesai', \Carbon\Carbon::parse($reservasi->tanggal_selesai)->format('Y-m-d\TH:i')) }}"
                                required>
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Edit Reservasi</button>
                        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation End -->

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a class="btn btn-lg btn-primary btn-lg-square back-to-top" href="#"><i class="bi bi-arrow-up"></i></a>
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
