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

    <title>Detail Reservasi - Admin</title>

    <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">
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
                                <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Detail Reservasi</h6>

                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>ID
                                            Reservasi:</strong> #{{ $reservasi->id }}</p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Nama:</strong>
                                        {{ $reservasi->nama }}</p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>No. HP:</strong>
                                        {{ $reservasi->no_hp }}</p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Lapangan:</strong>
                                        {{ $reservasi->lapangan->nama }}</p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Tanggal
                                            Mulai:</strong>
                                        {{ \Carbon\Carbon::parse($reservasi->tanggal_mulai)->isoFormat('D MMM YYYY, HH:mm') }}
                                    </p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Tanggal
                                            Selesai:</strong>
                                        {{ \Carbon\Carbon::parse($reservasi->tanggal_selesai)->isoFormat('D MMM YYYY, HH:mm') }}
                                    </p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Status:</strong>
                                        {{ $reservasi->status }}</p>
                                    <a class="btn btn-primary py-3 px-5 mt-3"
                                        href="{{ route('admin.reservasi.index') }}">Kembali ke Daftar</a>
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
