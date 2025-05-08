@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Jadwal Lapangan</h1>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $jadwalLapangan->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Waktu Mulai:</strong>
                {{ $jadwalLapangan->waktu }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Waktu Selesai:</strong>
                {{ $jadwalLapangan->waktu_selesai }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lapangan 1:</strong>
                {{ $jadwalLapangan->lapangan_1 ? 'Dipakai' : 'Kosong' }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lapangan 2:</strong>
                {{ $jadwalLapangan->lapangan_2 ? 'Dipakai' : 'Kosong' }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
             <a class="btn btn-secondary" href="{{ route('admin.jadwal_lapangan.index') }}">Kembali</a>
         </div>
    </div>
</div>
@endsection
