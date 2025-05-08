@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jadwal Lapangan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwal_lapangan.store') }}" method="POST">
        @csrf

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Waktu Mulai:</strong>
                    <input type="time" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Waktu Selesai:</strong>
                    <input type="time" name="waktu_selesai" class="form-control" placeholder="Waktu Selesai">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lapangan 1:</strong>
                     <select class="form-control" name="lapangan_1">
                         <option value="0" {{ old('lapangan_1') == 0 ? 'selected' : '' }}>Kosong</option>
                         <option value="1" {{ old('lapangan_1') == 1 ? 'selected' : '' }}>Dipakai</option>
                     </select>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lapangan 2:</strong>
                     <select class="form-control" name="lapangan_2">
                         <option value="0" {{ old('lapangan_2') == 0 ? 'selected' : '' }}>Kosong</option>
                         <option value="1" {{ old('lapangan_2') == 1 ? 'selected' : '' }}>Dipakai</option>
                     </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-secondary" href="{{ route('admin.jadwal_lapangan.index') }}">Batal</a>
            </div>
        </div>

    </form>
</div>
@endsection
