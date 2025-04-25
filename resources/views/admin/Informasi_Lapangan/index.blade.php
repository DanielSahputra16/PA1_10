@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Informasi Lapangan</h2>
    <a href="{{ route('informasi-lapangans.create') }}" class="btn btn-primary mb-3">Tambah Lapangan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lapangans as $lapangan)
            <tr>
                <td>{{ $lapangan->id }}</td>
                <td><img src="{{ asset('storage/' . $lapangan->image_path) }}" alt="{{ $lapangan->title }}" width="100"></td>
                <td>{{ $lapangan->title }}</td>
                <td>{{ $lapangan->description }}</td>
                <td>
                    <a href="{{ route('informasi-lapangans.show', $lapangan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('informasi-lapangans.edit', $lapangan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('informasi-lapangans.destroy', $lapangan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
