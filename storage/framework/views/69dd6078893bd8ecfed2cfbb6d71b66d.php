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

    <link href="<?php echo e(URL::asset('css/app.css')); ?>" rel="stylesheet">
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
                                <div class="bg-white rounded-3 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="mb-0 fw-bold text-primary">Daftar Galeri</h4>
                                        <a href="<?php echo e(route('admin.Galeri.create')); ?>" class="btn btn-primary rounded-pill">
                                            <i class="fas fa-plus me-2"></i>Tambah Gambar
                                        </a>
                                    </div>

                                    <?php if(session('success')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <?php echo e(session('success')); ?>

                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(session('error')): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <?php echo e(session('error')); ?>

                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="py-3 px-4">No</th>
                                                    <th scope="col" class="py-3 px-4">Judul</th>
                                                    <th scope="col" class="py-3 px-4">Deskripsi</th>
                                                    <th scope="col" class="py-3 px-4 text-center">Gambar</th>
                                                    <th scope="col" class="py-3 px-4 text-end">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr class="border-bottom">
                                                        <td class="px-4 py-3 fw-semibold"><?php echo e($galeri->id); ?></td>
                                                        <td class="px-4 py-3 fw-semibold"><?php echo e($galeri->title); ?></td>
                                                        <td class="px-4 py-3 text-muted" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($galeri->description); ?>

                                                        </td>
                                                        <td class="px-4 py-3 text-center">
                                                            <img src="<?php echo e(Storage::url('images/Galeri/' . $galeri->image_path)); ?>"
                                                                 alt="<?php echo e($galeri->title); ?>"
                                                                 class="rounded-2 shadow-sm"
                                                                 style="width: 100px; height: 70px; object-fit: cover;">
                                                        </td>
                                                        <td class="px-4 py-3 text-end">
                                                            <div class="d-flex justify-content-end gap-2">
                                                                <a href="<?php echo e(route('admin.Galeri.edit', $galeri->id)); ?>"
                                                                   class="btn btn-sm btn-outline-primary rounded-circle p-2"
                                                                   title="Edit" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                                                </a>
                                                                <form action="<?php echo e(route('admin.Galeri.destroy', $galeri->id)); ?>" method="POST"
                                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button type="submit"
                                                                            class="btn btn-sm btn-outline-danger rounded-circle p-2"
                                                                            title="Hapus" data-bs-toggle="tooltip">
                                                                        <i class="fas fa-trash-alt fa-sm"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center py-4 text-muted">
                                                            <i class="fas fa-image me-2"></i>Tidak ada data galeri ditemukan
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/Galeri/index.blade.php ENDPATH**/ ?>