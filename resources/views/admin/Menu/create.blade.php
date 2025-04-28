@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Menu Baru</h2>

        <form action="{{ route('admin.Menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                @error('gambar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.Menu.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
