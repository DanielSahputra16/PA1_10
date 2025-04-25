<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ketersediaan Lapangan - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords"> <!-- Sebaiknya diisi untuk SEO -->
    <meta content="" name="description"> <!-- Sebaiknya diisi untuk SEO -->

    <!-- Favicon -->
    <link href="<?php echo e(URL::asset('img/favicon.ico')); ?>" rel="icon">

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

        <!-- Navbar -->
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Navbar -->

        <!-- Hero Header Start -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Galeri</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

        <?php $__env->startSection('content'); ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h4 class="section-title ff-secondary text-center text-primary fw-normal">Edit Galeri Image</h4>
                        <form action="<?php echo e(route('admin.galeri.update', $galeri->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?> <!-- Penting untuk update -->

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title', $galeri->title)); ?>" required>
                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $galeri->description)); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <img src="<?php echo e(asset('images/galeri/' . $galeri->image_path)); ?>" alt="<?php echo e($galeri->title); ?>" class="img-thumbnail mt-2" width="200">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo e(route('admin.galeri.index')); ?>" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


       <!-- Footer -->
       <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- End Footer -->

       <!-- Back to Top -->
       <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="Kembali ke atas">
           <i class="bi bi-arrow-up"></i>
       </a>
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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/galeri/edit.blade.php ENDPATH**/ ?>