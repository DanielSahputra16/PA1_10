@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="section-title ff-secondary text-start text-primary fw-normal mb-0">Gambar Galeri</h6>
                    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-3">Tambah Gambar Baru</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $galeri)
                                    <tr>
                                        <th scope="row">{{ $galeri->id }}</th>
                                        <td>{{ $galeri->title }}</td>
                                        <td>{{ $galeri->description }}</td>
                                        <td>
                                            <img src="{{ asset('images/galeri/' . $galeri->image_path) }}" alt="{{ $galeri->title }}" width="100">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
