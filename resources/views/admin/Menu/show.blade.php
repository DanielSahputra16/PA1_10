@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Menu</h2>

        <p><strong>Judul:</strong> {{ $menu->judul }}</p>
        <p><strong>Deskripsi:</strong> {{ $menu->deskripsi }}</p>
        <p>
            <strong>Gambar:</strong>
            @if($menu->gambar)
                <img src="{{ asset('storage/menus/' . $menu->gambar) }}" alt="{{ $menu->judul }}" width="200">
            @else
                Tidak ada gambar
            @endif
        </p>

        <a href="{{ route('admin.Menu.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
