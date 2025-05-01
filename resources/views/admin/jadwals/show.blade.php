<!-- resources/views/jadwals/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Detail Jadwal</h1>

    <div class="mb-3">
        <strong>Tanggal:</strong>
        {{ $jadwal->tanggal }}
    </div>
    <div class="mb-3">
        <strong>Waktu Mulai:</strong>
        {{ $jadwal->waktu_mulai }}
    </div>
    <div class="mb-3">
        <strong>Waktu Selesai:</strong>
        {{ $jadwal->waktu_selesai }}
    </div>
    <div class="mb-3">
        <strong>Lapangan 1 Tersedia:</strong>
        {{ $jadwal->lapangan_1_tersedia ? 'Ya' : 'Tidak' }}
    </div>
     <div class="mb-3">
        <strong>Lapangan 2 Tersedia:</strong>
        {{ $jadwal->lapangan_2_tersedia ? 'Ya' : 'Tidak' }}
    </div>

    <a href="{{ route('admin.jadwals.index') }}" class="btn btn-primary">Kembali</a>
</div>
</body>
</html>
