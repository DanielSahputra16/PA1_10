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

    <title>Tambah Galeri Baru - Admin</title>

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
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="container-fluid pt-4 px-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-xl-12">
                                    <div class="bg-light rounded h-100 p-4">
                                        <h6 class="mb-4">Tambah Gambar Galeri Baru</h6>
                                        <form action="{{ route('admin.Galeri.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="title" class="form-label">Judul</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Deskripsi</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Gambar</label>
                                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required>
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('admin.Galeri.index') }}" class="btn btn-secondary">Batal</a>
                                        </form>
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
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace()
    </script>
</body>

</html>
