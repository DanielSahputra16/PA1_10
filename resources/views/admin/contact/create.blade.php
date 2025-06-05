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

    <title>Tambah Informasi Kontak - Admin</title>

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
                                        <h6 class="mb-4">Tambah Informasi Kontak Baru</h6>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="{{ route('admin.contact.store') }}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor Telepon">
                                            </div>
                                            <div class="mb-3">
                                                <label for="operating_hours" class="form-label">Jam Operasi</label>
                                                <input type="text" class="form-control" id="operating_hours" name="operating_hours" placeholder="Jam Operasi">
                                            </div>
                                            <div class="mb-3">
                                                <label for="whatsapp_link" class="form-label">Link WhatsApp</label>
                                                <input type="text" class="form-control" id="whatsapp_link" name="whatsapp_link" placeholder="Link WhatsApp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="instagram_username" class="form-label">Username Instagram</label>
                                                <input type="text" class="form-control" id="instagram_username" name="instagram_username" placeholder="Username Instagram">
                                            </div>
                                            <div class="mb-3">
                                                <label for="embed_code" class="form-label">Embed Code</label>
                                                <textarea class="form-control" id="embed_code" name="embed_code" rows="3" placeholder="Embed Code"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Batal</a>
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
