<!-- resources/views/jadwals/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Daftar Jadwal</h1>
    <a href="{{ route('admin.jadwals.create') }}" class="btn btn-success mb-2">Tambah Jadwal</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Lapangan 1 Tersedia</th>
            <th>Lapangan 2 Tersedia</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($jadwals as $jadwal)
        <tr>
            <td>{{ $jadwal->tanggal }}</td>
            <td>{{ $jadwal->waktu_mulai }}</td>
            <td>{{ $jadwal->waktu_selesai }}</td>
            <td>{{ $jadwal->lapangan_1_tersedia ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $jadwal->lapangan_2_tersedia ? 'Ya' : 'Tidak' }}</td>
            <td>
                <form action="{{ route('admin.jadwals.destroy',$jadwal->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin.jadwals.show',$jadwal->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin.jadwals.edit',$jadwal->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
