@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Jadwal Lapangan</h1>
        <form action="{{ route('admin.jadwal_lapangan.update', $jadwalLapangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" name="nama" value="{{ $jadwalLapangan->nama }}" class="form-control"
                            placeholder="Nama">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Waktu Mulai:</strong>
                        <input type="time" name="waktu_mulai" value="{{ $jadwalLapangan->waktu_mulai }}" class="form-control"
                            placeholder="Waktu Mulai" required>
                    </div>
                </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Waktu Selesai:</strong>
                            <input type="time" name="waktu_selesai" value="{{ $jadwalLapangan->waktu_selesai }}" class="form-control"
                                placeholder="Waktu Selesai">
                        </div>
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lapangan 1:</strong>
                        <select class="form-control" name="lapangan_1">
                            <option value="0" {{ $jadwalLapangan->lapangan_1 == 0 ? 'selected' : '' }}>Kosong</option>
                            <option value="1" {{ $jadwalLapangan->lapangan_1 == 1 ? 'selected' : '' }}>Dipakai</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lapangan 2:</strong>
                        <select class="form-control" name="lapangan_2">
                            <option value="0" {{ $jadwalLapangan->lapangan_2 == 0 ? 'selected' : '' }}>Kosong</option>
                            <option value="1" {{ $jadwalLapangan->lapangan_2 == 1 ? 'selected' : '' }}>Dipakai</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="{{ route('admin.jadwal_lapangan.index') }}">Batal</a>
                </div>
            </div>

        </form>
    </div>
@endsection
