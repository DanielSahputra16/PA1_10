@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Galeri</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description">{{ $gallery->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="{{ asset('storage/galleries/'.$gallery->image) }}" alt="{{ $gallery->title }}" width="100">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
