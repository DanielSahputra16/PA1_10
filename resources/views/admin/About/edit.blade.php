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

    <title>Edit About - Admin</title>

    <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/yss.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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
                                <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Edit About</h6>
                                    <form action="{{ route('admin.About.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul:</label>
                                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $about->judul }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $about->deskripsi }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar" class="form-label">Gambar:</label>
                                            <input type="file" class="form-control" id="gambar" name="gambar">
                                            @if($about->gambar)
                                                <img src="{{ asset('storage/' . $about->gambar) }}" alt="{{ $about->judul }}" width="100">
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('admin.About.index') }}" class="btn btn-secondary">Batal</a>
                                    </form>
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
