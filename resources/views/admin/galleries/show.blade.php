@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Galeri</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $gallery->title }}</h5>
                <img src="{{ asset('storage/galleries/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid">
                <p class="card-text">{{ $gallery->description }}</p>
                <a href="{{ route('galleries.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
