@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail About</h2>
        <p><strong>Judul:</strong> {{ $about->judul }}</p>
        <p><strong>Deskripsi:</strong> {{ $about->deskripsi }}</p>
        <p>
            <strong>Gambar:</strong>
            @if($about->gambar)
                <img src="{{ asset('storage/' . $about->gambar) }}" alt="{{ $about->judul }}" width="200">
            @else
                Tidak Ada Gambar
            @endif
        </p>
        <a href="{{ route('admin.About.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
