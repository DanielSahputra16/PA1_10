@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Menu</h2>
        <a href="{{ route('admin.Menu.create') }}" class="btn btn-primary">Tambah Menu</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menu as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->judul }}</td>
                        <td>{{ $menu->deskripsi }}</td>
                        <td>
                            @if($menu->gambar)
                                <img src="{{ asset('storage/menus/' . $menu->gambar) }}" alt="{{ $menu->judul }}" width="100">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.Menu.show', $menu->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('admin.Menu.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.Menu.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
