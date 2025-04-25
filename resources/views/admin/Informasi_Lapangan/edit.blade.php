@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Informasi Lapangan</h2>

        <form action="{{ route('informasi-lapangans.update', $lapangan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $lapangan->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $lapangan->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Gambar (opsional):</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="{{ Storage::url($lapangan->image_path) }}" alt="{{ $lapangan->title }}" width="100" class="mt-2">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('informasi-lapangans.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
