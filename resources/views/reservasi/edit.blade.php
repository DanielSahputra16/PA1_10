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

                    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Field Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ $reservasi->nama }}" required>
                        </div>

                        <!-- Field No. HP -->
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP:</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                value="{{ $reservasi->no_hp }}" required>
                        </div>

                        <!-- Field Lapangan -->
                        <div class="mb-3">
                            <label for="lapangan_id" class="form-label">Lapangan:</label>
                            <select name="lapangan_id" id="lapangan_id" class="form-select" required>
                                <option value="" selected disabled>-- Pilih Lapangan --</option>
                                @foreach ($lapangans as $lapangan)
                                <option value="{{ $lapangan->id }}" @if($lapangan->id==$reservasi->lapangan_id)
                                    selected @endif>
                                    {{ $lapangan->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Field Tanggal (tidak perlu tanggal_selesai) -->
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal:</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ old('tanggal') }}" required>
                        </div>

                        <!-- Field Jam Mulai -->
                        <div class="mb-3">
                            <label for="jam_mulai" class="form-label">Jam Mulai:</label>
                            <select name="jam_mulai" id="jam_mulai" class="form-select" required>
                                <option value="" selected disabled>-- Pilih Jam Mulai --</option>
                                @for ($i = 8; $i <= 23; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00"
                                    {{ old('jam_mulai') == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                                </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Field Jam Selesai -->
                        <div class="mb-3">
                            <label for="jam_selesai" class="form-label">Jam Selesai:</label>
                            <select name="jam_selesai" id="jam_selesai" class="form-select" required>
                                <option value="" selected disabled>-- Pilih Jam Selesai --</option>
                                @for ($i = 8; $i <= 23; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00"
                                    {{ old('jam_selesai') == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                                </option>
                                @endfor
                            </select>
                        </div>

                         <!-- Field Upload Gambar -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar (Opsional):</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                            <!-- Tampilkan gambar yang sudah ada -->
                            @if ($reservasi->gambar)
                                <img src="{{ asset('storage/gambar/' . $reservasi->gambar) }}" alt="Gambar Reservasi" width="100">
                            @endif
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

    <!-- Script validasi tanggal sisi klien -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('tanggal');
            const jamMulai = document.getElementById('jam_mulai');
            const jamSelesai = document.getElementById('jam_selesai');

            // Set tanggal minimum dan maksimum
            const today = new Date();
            const todayFormatted = today.toISOString().split('T')[0];
            tanggalInput.min = todayFormatted;

            const maxDate = new Date();
            maxDate.setMonth(maxDate.getMonth() + 2);
            const maxFormatted = maxDate.toISOString().split('T')[0];
            tanggalInput.max = maxFormatted;

            function validateJam() {
                const mulai = jamMulai.value;
                const selesai = jamSelesai.value;

                if (mulai && selesai) {
                    const mulaiDate = new Date(`1970-01-01T${mulai}`);
                    const selesaiDate = new Date(`1970-01-01T${selesai}`);

                    if (selesaiDate <= mulaiDate) {
                        alert("Jam selesai harus setelah jam mulai.");
                        jamSelesai.value = "";
                    }
                }
            }

            jamMulai.addEventListener('change', validateJam);
            jamSelesai.addEventListener('change', validateJam);
        });
    </script>

</body>

</html>
