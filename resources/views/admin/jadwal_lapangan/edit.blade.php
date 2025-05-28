@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Jadwal Lapangan</h1>
        <form action="{{ route('admin.jadwal_lapangan.update', $jadwalLapangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Field Nama -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" name="nama" value="{{ old('nama', $jadwalLapangan->nama) }}"
                               class="form-control" placeholder="Nama">
                    </div>
                </div>

                <!-- Field Tanggal -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal:</strong>
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                               value="{{ old('tanggal', \Carbon\Carbon::parse($jadwalLapangan->waktu_mulai)->format('Y-m-d')) }}" required>
                    </div>
                </div>

                <!-- Field Jam Mulai -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jam Mulai:</strong>
                        <select name="jam_mulai" id="jam_mulai" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Jam Mulai --</option>
                            @for ($i = 8; $i <= 22; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00"
                                    {{ old('jam_mulai', \Carbon\Carbon::parse($jadwalLapangan->waktu_mulai)->format('H:i')) == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Field Jam Selesai -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jam Selesai:</strong>
                        <select name="jam_selesai" id="jam_selesai" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Jam Selesai --</option>
                            @for ($i = 8; $i <= 22; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00"
                                    {{ old('jam_selesai', \Carbon\Carbon::parse($jadwalLapangan->waktu_selesai)->format('H:i')) == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Field Lapangan 1 -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lapangan 1:</strong>
                        <select class="form-control" name="lapangan_1">
                            <option value="0" {{ old('lapangan_1', $jadwalLapangan->lapangan_1) == 0 ? 'selected' : '' }}>Kosong</option>
                            <option value="1" {{ old('lapangan_1', $jadwalLapangan->lapangan_1) == 1 ? 'selected' : '' }}>Dipakai</option>
                        </select>
                    </div>
                </div>

                <!-- Field Lapangan 2 -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lapangan 2:</strong>
                        <select class="form-control" name="lapangan_2">
                            <option value="0" {{ old('lapangan_2', $jadwalLapangan->lapangan_2) == 0 ? 'selected' : '' }}>Kosong</option>
                            <option value="1" {{ old('lapangan_2', $jadwalLapangan->lapangan_2) == 1 ? 'selected' : '' }}>Dipakai</option>
                        </select>
                    </div>
                </div>

                <!-- Tombol Submit dan Batal -->
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="{{ route('admin.jadwal_lapangan.index') }}">Batal</a>
                </div>
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('tanggal');

            // Set tanggal minimum (hari ini)
            const today = new Date();
            const todayFormatted = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD
            tanggalInput.min = todayFormatted;

            // Set tanggal maksimum (2 bulan ke depan)
            const maxDate = new Date();
            maxDate.setMonth(maxDate.getMonth() + 2); // Tambah 2 bulan
            const maxDateFormatted = maxDate.toISOString().split('T')[0];
            tanggalInput.max = maxDateFormatted;
        });
    </script>
@endsection
