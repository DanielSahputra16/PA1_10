@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit About</h2>
        <form action="{{ route('admin.About.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $about->judul }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $about->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                @if($about->gambar)
                    <img src="{{ asset('storage/' . $about->gambar) }}" alt="{{ $about->judul }}" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
