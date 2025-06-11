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

    <title>Ketersediaan Peralatan - Admin</title>

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
                                <div class="bg-white rounded-3 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="mb-0 fw-bold text-primary">Ketersediaan Peralatan</h4>
                                        <a href="<?php echo e(route('admin.Menu.create')); ?>" class="btn btn-primary rounded-pill">
                                            <i class="fas fa-plus me-2"></i>Tambah Peralatan
                                        </a>
                                    </div>

                                    <?php if($message = Session::get('success')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <?php echo e($message); ?>

                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($message = Session::get('error')): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <?php echo e($message); ?>

                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="py-3 px-4 text-center">No</th>
                                                    <th scope="col" class="py-3 px-4">Judul</th>
                                                    <th scope="col" class="py-3 px-4">Deskripsi</th>
                                                    <th scope="col" class="py-3 px-4">Stok</th>
                                                    <th scope="col" class="py-3 px-4">Detail</th>
                                                    <th scope="col" class="py-3 px-4 text-center">Gambar</th>
                                                    <th scope="col" class="py-3 px-4 text-end">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr class="border-bottom">
                                                        <td class="px-4 py-3 text-center fw-semibold"><?php echo e($loop->iteration); ?></td>
                                                        <td class="px-4 py-3 fw-semibold"><?php echo e($item->judul); ?></td>
                                                        <td class="px-4 py-3"><?php echo e($item->deskripsi); ?></td>
                                                        <td class="px-4 py-3"><?php echo e($item->stok); ?></td>
                                                        <td class="px-4 py-3"><?php echo e($item->detail); ?></td>
                                                        <td class="px-4 py-3 text-center">
                                                            <?php if($item->gambar): ?>
                                                                <img src="<?php echo e(asset('storage/menus/' . $item->gambar)); ?>" alt="<?php echo e($item->judul); ?>" width="100" class="rounded">
                                                            <?php else: ?>
                                                                <span class="text-muted">Tidak ada gambar</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="px-4 py-3 text-end">
                                                            <div class="d-flex justify-content-end gap-2">
                                                                <a href="<?php echo e(route('admin.Menu.edit', $item->id)); ?>"
                                                                   class="btn btn-sm btn-outline-primary rounded-circle p-2"
                                                                   title="Edit" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                                                </a>
                                                                <form action="<?php echo e(route('admin.Menu.destroy', $item->id)); ?>" method="POST"
                                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus peralatan ini?')">
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
                                                            <i class="fas fa-box-open me-2"></i>Tidak ada data peralatan tersedia
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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/Menu/index.blade.php ENDPATH**/ ?>