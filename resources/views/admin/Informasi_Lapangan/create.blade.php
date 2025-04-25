@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Informasi Lapangan</h2>

        <form action="{{ route('informasi-lapangans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('informasi-lapangans.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
