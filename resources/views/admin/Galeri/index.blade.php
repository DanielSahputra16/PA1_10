<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Daftar Galeri - Admin</title>

    <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/yss.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="main">
         @include('admin.layouts.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-12">
                                <div class="bg-white rounded-3 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="mb-0 fw-bold text-primary">Daftar Galeri</h4>
                                        <a href="{{ route('admin.Galeri.create') }}" class="btn btn-primary rounded-pill">
                                            <i class="fas fa-plus me-2"></i>Tambah Gambar
                                        </a>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="py-3 px-4">#</th>
                                                    <th scope="col" class="py-3 px-4">Judul</th>
                                                    <th scope="col" class="py-3 px-4">Deskripsi</th>
                                                    <th scope="col" class="py-3 px-4 text-center">Gambar</th>
                                                    <th scope="col" class="py-3 px-4 text-end">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($galleries as $galeri)
                                                    <tr class="border-bottom">
                                                        <td class="px-4 py-3 fw-semibold">{{ $galeri->id }}</td>
                                                        <td class="px-4 py-3 fw-semibold">{{ $galeri->title }}</td>
                                                        <td class="px-4 py-3 text-muted" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            {{ $galeri->description }}
                                                        </td>
                                                        <td class="px-4 py-3 text-center">
                                                            <img src="{{ Storage::url('images/Galeri/' . $galeri->image_path) }}"
                                                                 alt="{{ $galeri->title }}"
                                                                 class="rounded-2 shadow-sm"
                                                                 style="width: 100px; height: 70px; object-fit: cover;">
                                                        </td>
                                                        <td class="px-4 py-3 text-end">
                                                            <div class="d-flex justify-content-end gap-2">
                                                                <a href="{{ route('admin.Galeri.edit', $galeri->id) }}"
                                                                   class="btn btn-sm btn-outline-primary rounded-circle p-2"
                                                                   title="Edit" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                                                </a>
                                                                <form action="{{ route('admin.Galeri.destroy', $galeri->id) }}" method="POST"
                                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                            class="btn btn-sm btn-outline-danger rounded-circle p-2"
                                                                            title="Hapus" data-bs-toggle="tooltip">
                                                                        <i class="fas fa-trash-alt fa-sm"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center py-4 text-muted">
                                                            <i class="fas fa-image me-2"></i>Tidak ada data galeri ditemukan
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include('admin.layouts.footer')
        </div>
    </div>

    <script src="{{URL::asset('js/app.js')}}"></script>
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>
