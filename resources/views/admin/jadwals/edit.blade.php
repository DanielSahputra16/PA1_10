<!-- resources/views/jadwals/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Edit Jadwal</h1>

    <form action="{{ route('admin.jadwals.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}">
        </div>
        <div class="mb-3">
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{ $jadwal->waktu_mulai }}">
        </div>
        <div class="mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="{{ $jadwal->waktu_selesai }}">
        </div>
        <div class="mb-3">
            <label for="lapangan_1_tersedia" class="form-check-label">Lapangan 1 Tersedia</label>
            <input type="checkbox" class="form-check-input" id="lapangan_1_tersedia" name="lapangan_1_tersedia" value="1" {{ $jadwal->lapangan_1_tersedia ? 'checked' : '' }}>
        </div>
        <div class="mb-3">
            <label for="lapangan_2_tersedia" class="form-check-label">Lapangan 2 Tersedia</label>
            <input type="checkbox" class="form-check-input" id="lapangan_2_tersedia" name="lapangan_2_tersedia" value="1" {{ $jadwal->lapangan_2_tersedia ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.jadwals.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
