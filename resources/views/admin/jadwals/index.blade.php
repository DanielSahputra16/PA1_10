<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Daftar Jadwal</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('admin.jadwals.create') }}" class="btn btn-success">Tambah Jadwal</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Lapangan 1 Tersedia</th>
                        <th>Lapangan 2 Tersedia</th>
                        <th width="280px">Aksi</th>
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
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-info" href="{{ route('admin.jadwals.show',$jadwal->id) }}">Lihat</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.jadwals.edit',$jadwal->id) }}">Edit</a>

                                    <form action="{{ route('admin.jadwals.destroy',$jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
