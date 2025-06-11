<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Tambah Jadwal Lapangan - Admin</title>

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/yss.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="main">
            @include('admin.layouts.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="container">
                        <h1>Tambah Jadwal Lapangan</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Ada kesalahan input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.jadwal_lapangan.store') }}" method="POST">
                            @csrf

                            <!-- Field Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <!-- Field Lapangan -->
                            <div class="mb-3">
                                <label for="lapangan_id" class="form-label">Lapangan:</label>
                                <select name="lapangan_id" id="lapangan_id" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Lapangan --</option>
                                    @foreach ($lapangans as $lapangan)
                                        <option value="{{ $lapangan->id }}"
                                            {{ old('lapangan_id') == $lapangan->id ? 'selected' : '' }}>
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

                            <!-- Tombol Submit dan Batal -->
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-secondary"
                                    href="{{ route('admin.jadwal_lapangan.index') }}">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            <!-- Footer Start -->
            @include('admin.layouts.footer')
            <!-- Footer End -->
        </div>
    </div>

    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('tanggal');

            // Set tanggal minimum (hari ini)
            const today = new Date();
            const todayFormatted = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD
            tanggalInput.min = todayFormatted;

            // Set tanggal maksimum (2 bulan ke depan)
            const maxDate = new Date();
            maxDate.setMonth(maxDate.getMonth() + 2); // Tambah 2 bulan
            const maxDateFormatted = maxDate.toISOString().split('T')[0];
            tanggalInput.max = maxDateFormatted;
        });
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>
