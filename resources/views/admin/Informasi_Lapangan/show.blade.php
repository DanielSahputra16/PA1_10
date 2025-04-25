@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Informasi Lapangan</h2>

        <img src="{{ Storage::url($lapangan->image_path) }}" alt="{{ $lapangan->title }}" class="img-fluid mb-3">
        <h3>{{ $lapangan->title }}</h3>
        <p>{{ $lapangan->description }}</p>

        <a href="{{ route('informasi-lapangans.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection

