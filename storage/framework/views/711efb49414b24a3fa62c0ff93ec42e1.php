<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Detail Reservasi - Admin</title>

    <link href="<?php echo e(URL::asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/yss.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main">
            <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-12">
                                <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Detail Reservasi</h6>

                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>ID
                                            Reservasi:</strong> #<?php echo e($reservasi->id); ?></p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Nama:</strong>
                                        <?php echo e($reservasi->nama); ?></p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>No. HP:</strong>
                                        <?php echo e($reservasi->no_hp); ?></p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Lapangan:</strong>
                                        <?php echo e($reservasi->lapangan->nama); ?></p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Waktu
                                            Mulai:</strong>
                                        <?php echo e(\Carbon\Carbon::parse($reservasi->waktu_mulai)->isoFormat('D MMM YYYY, HH:mm')); ?>

                                    </p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Waktu
                                            Selesai:</strong>
                                        <?php echo e(\Carbon\Carbon::parse($reservasi->waktu_selesai)->isoFormat('D MMM YYYY, HH:mm')); ?>

                                    </p>
                                    <p class="mb-2"><i class="fa fa-check text-primary me-3"></i><strong>Status:</strong>
                                        <?php echo e($reservasi->status); ?></p>

                                    <!-- Tampilkan Gambar -->
                                    <div class="mt-3">
                                        <strong>Gambar:</strong>
                                        <?php if($reservasi->gambar): ?>
                                            <img src="<?php echo e(asset('storage/gambar/' . $reservasi->gambar)); ?>" alt="Gambar Reservasi" width="150">
                                        <?php else: ?>
                                            <p>Tidak ada gambar</p>
                                        <?php endif; ?>
                                    </div>
                                    <a class="btn btn-primary py-3 px-5 mt-3"
                                        href="<?php echo e(route('admin.reservasi.index')); ?>">Kembali ke Daftar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <script src="<?php echo e(URL::asset('js/app.js')); ?>"></script>
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/reservasi/show.blade.php ENDPATH**/ ?>