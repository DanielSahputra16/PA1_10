@extends('layouts.app') <!-- Jika Anda menggunakan layout -->

@section('content')
    <div class="container">
        <h2>Daftar Galeri</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('galleries.create') }}" class="btn btn-primary">Tambah Galeri</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{ $gallery->id }}</td>
                        <td>{{ $gallery->title }}</td>
                        <td><img src="{{ asset('storage/galleries/'.$gallery->image) }}" alt="{{ $gallery->title }}" width="100"></td>
                        <td>
                            <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
