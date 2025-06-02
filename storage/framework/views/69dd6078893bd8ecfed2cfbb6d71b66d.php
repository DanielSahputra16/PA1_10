<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Galeri - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(URL::asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Gallery</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- Navbar & Hero End -->

<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title ff-secondary text-center text-primary fw-normal">Daftar Galeri</h4>
                </div>
                    <a href="<?php echo e(route('admin.Galeri.create')); ?>" class="btn btn-primary mb-3">Tambah Gambar Baru</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover align-middle">  <!-- Tambahkan class align-middle -->
                            <thead class="table-dark"> <!-- Tambahkan class table-dark -->
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col" class="text-center">Aksi</th>  <!-- Tambahkan class text-center -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>  <!-- Ubah foreach menjadi forelse -->
                                    <tr>
                                        <th scope="row"><?php echo e($galeri->id); ?></th>
                                        <td><?php echo e($galeri->title); ?></td>
                                        <td><?php echo e($galeri->description); ?></td>
                                        <td>
                                            <img src="<?php echo e(Storage::url('images/Galeri/' . $galeri->image_path)); ?>" alt="<?php echo e($galeri->title); ?>" width="100">
                                        </td>
                                        <td class="text-center"> <!-- Tambahkan class text-center -->
                                            <a href="<?php echo e(route('admin.Galeri.edit', $galeri->id)); ?>" class="btn btn-sm btn-warning me-1" title="Edit">  <!-- Ubah btn-primary menjadi btn-warning dan tambahkan me-1-->
                                                <i class="fas fa-edit"></i>  <!-- Tambahkan icon -->
                                            </a>
                                            <form action="<?php echo e(route('admin.Galeri.destroy', $galeri->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">  <!-- Tambahkan class d-inline -->
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus"> <!-- Tambahkan title -->
                                                    <i class="fas fa-trash-alt"></i> <!-- Tambahkan icon -->
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <i class="fas fa-info-circle me-2"></i> Tidak ada data galeri ditemukan.</i>
                                        </td>
                                    </tr>
                                <?php endif; ?>  <!-- Ubah endforeach menjadi endforelse -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Footer Start -->
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(URL::asset('lib/wow/wow.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('lib/easing/easing.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('lib/waypoints/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('lib/counterup/counterup.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('lib/tempusdominus/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('lib/tempusdominus/js/moment-timezone.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>

<!-- Template Javascript -->
<script src="<?php echo e(URL::asset('js/main.js')); ?>"></script>
</body>

</html>

<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/Galeri/index.blade.php ENDPATH**/ ?>