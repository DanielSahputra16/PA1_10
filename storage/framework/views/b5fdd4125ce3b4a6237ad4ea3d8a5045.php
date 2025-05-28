<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Galeri - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo e(URL::asset('img/favicon.ico')); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

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

    <style>
        .custom-pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .custom-pagination ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .custom-pagination li {
            margin: 0 5px;
        }

        .custom-pagination a,
        .custom-pagination span {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-pagination a:hover {
            background-color: #f0f0f0;
        }

        .custom-pagination .active span {
            background-color: #FEA116;
            /* Warna Biru Primer */
            color: white;
            border-color: #FEA116;
        }

        .custom-pagination .disabled span {
            color: #999;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .custom-pagination .disabled span:hover {
            background-color: transparent;
        }

        .galeri-item {
            margin-bottom: 30px;
        }

        .galeri-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer; /* Menambahkan cursor pointer saat dihover */
        }

        .galeri-item .description {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Galeri</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Galeri Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Galeri</h5>
                    <h1 class="mb-5">Foto Foto Kegiatan Kami!</h1>
                </div>
                <div class="row">
                    <?php if(count($galleries) > 0): ?>
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="galeri-item bg-transparent border rounded p-4">
                                    <img src="<?php echo e(Storage::url('images/galeri/' . $galeri->image_path)); ?>" alt="<?php echo e($galeri->title); ?>" data-bs-toggle="modal" data-bs-target="#galeriModal<?php echo e($galeri->id); ?>">
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="galeriModal<?php echo e($galeri->id); ?>" tabindex="-1" aria-labelledby="galeriModalLabel<?php echo e($galeri->id); ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="galeriModalLabel<?php echo e($galeri->id); ?>"><?php echo e($galeri->title); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo e(Storage::url('images/galeri/' . $galeri->image_path)); ?>" class="img-fluid mb-3" alt="<?php echo e($galeri->title); ?>">
                                            <p><?php echo e($galeri->description); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-12 text-center">
                            <p>Belum ada gambar di galeri.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Custom Pagination Links (Jika diperlukan) -->
                
            </div>
        </div>
        <!-- Galeri End -->

        <!-- Footer Start -->
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('lib/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/counterup/counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/tempusdominus/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/tempusdominus/js/moment-timezone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>

    <!-- Template Javascript -->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/galeri/index.blade.php ENDPATH**/ ?>