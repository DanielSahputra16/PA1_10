@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar About</h2>
        <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary mb-3">Tambah About</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Abouts as $about)
                    <tr>
                        <td>{{ $about->judul }}</td>
                        <td>{{ $about->deskripsi }}</td>
                        <td>
                            @if($about->gambar)
                                <img src="{{ asset('storage/' . $about->gambar) }}" alt="{{ $about->judul }}" width="100">
                            @else
                                Tidak Ada Gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.abouts.show', $about->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
