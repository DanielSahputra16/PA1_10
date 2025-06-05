<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reservasi - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Ramos Badminton Center, testimonial, reviews, badminton court" name="keywords">
    <meta content="Read what our clients say about Ramos Badminton Center" name="description">

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

    <!-- Internal CSS untuk Pagination dan Testimonial Cards -->
    <style>
        /* Enhanced Testimonial Cards */
        .testimonial-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            background: white;
            height: 100%;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .testimonial-card::before {
            content: """;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            top: 20px;
            left: 25px;
            font-size: 70px;
            color: rgba(254, 161, 22, 0.08);
            z-index: 0;
            line-height: 1;
        }

        .testimonial-content {
            position: relative;
            z-index: 1;
            padding: 30px;
        }

        .testimonial-text {
            font-size: 16px;
            line-height: 1.7;
            color: #555;
            margin-bottom: 25px;
            font-style: italic;
            position: relative;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .author-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FEA116;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .author-info {
            margin-left: 15px;
        }

        .author-name {
            font-weight: 600;
            margin-bottom: 0;
            color: #333;
            font-size: 18px;
        }

        .author-title {
            color: #6c757d;
            font-size: 14px;
        }

        .testimonial-rating {
            color: #FEA116;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .btn-delete {
            margin-top: 15px;
            transition: all 0.3s;
            border-radius: 5px;
        }

        .btn-delete:hover {
            transform: scale(1.05);
            background-color: #dc3545;
        }

        .btn-add-testimonial {
            background-color: #FEA116;
            border-color: #FEA116;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-add-testimonial:hover {
            background-color: #e68a00;
            border-color: #e68a00;
            transform: translateY(-2px);
        }

        /* Section Header */
        .section-header {
            position: relative;
            margin-bottom: 50px;
        }

        .section-header h5 {
            color: #FEA116;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .section-header h1 {
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .section-header h1::after {
            content: "";
            position: absolute;
            width: 80px;
            height: 3px;
            background: #FEA116;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Pagination */
        .custom-pagination {
            display: flex;
            justify-content: center;
            margin-top: 40px;
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
            padding: 8px 15px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .custom-pagination a:hover {
            background-color: #f8f9fa;
            color: #FEA116;
            border-color: #FEA116;
        }

        .custom-pagination .active span {
            background-color: #FEA116;
            color: white;
            border-color: #FEA116;
        }

        .custom-pagination .disabled span {
            color: #999;
            border-color: #ddd;
            cursor: not-allowed;
        }

        .custom-pagination .disabled span:hover {
            background-color: transparent;
        }

        /* Alert Messages */
        .alert {
            border-radius: 8px;
            padding: 15px 20px;
        }

        .alert i {
            margin-right: 10px;
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Testimonial</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('welcome')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Testimonial Start (Approved Testimonials) -->
        <div class="container-fluid pt-4 px-4">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="section-header text-center">
                        <h1 class="mb-5">Apa Kata Klien Kami!</h1>
                    </div>
                    <div class="row g-4">
                        <?php if(count($testimonials) > 0): ?>
                            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="testimonial-card">
                                        <div class="testimonial-content">
                                            <p class="testimonial-text"><?php echo e($testimonial->message); ?></p>
                                            <div class="testimonial-author">
                                                <img class="author-img" src="<?php echo e(asset('img/biodata.PNG')); ?>" alt="<?php echo e($testimonial->name); ?>">
                                                <div class="author-info">
                                                    <h5 class="author-name"><?php echo e($testimonial->name); ?></h5>
                                                    <span class="author-title"><?php echo e($testimonial->subject); ?></span>
                                                </div>
                                            </div>

                                            <!-- Tombol hapus hanya muncul jika user sudah login dan memiliki izin -->
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(auth()->user()->id === $testimonial->user_id || auth()->user()->isAdmin()): ?>
                                                    <form action="<?php echo e(route('testimonials.destroy', $testimonial->id)); ?>" method="POST"
                                                        style="display: inline-block;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm btn-delete"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="col-12 text-center">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> Belum ada testimonial yang disetujui.
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Custom Pagination Links -->
                    <div class="custom-pagination">
                        <?php if($testimonials instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
                            <ul>
                                <?php if($testimonials->onFirstPage()): ?>
                                    <li class="disabled"><span><i class="fas fa-chevron-left me-1"></i> Previous</span></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e($testimonials->previousPageUrl()); ?>" rel="prev"><i class="fas fa-chevron-left me-1"></i> Previous</a></li>
                                <?php endif; ?>

                                <?php $__currentLoopData = $testimonials->getUrlRange(max($testimonials->currentPage() - 2, 1), min($testimonials->currentPage() + 2, $testimonials->lastPage())); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($page == $testimonials->currentPage()): ?>
                                        <li class="active"><span><?php echo e($page); ?></span></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($testimonials->hasMorePages()): ?>
                                    <li><a href="<?php echo e($testimonials->nextPageUrl()); ?>" rel="next">Next <i class="fas fa-chevron-right ms-1"></i></a></li>
                                <?php else: ?>
                                    <li class="disabled"><span>Next <i class="fas fa-chevron-right ms-1"></i></span></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Tautan ke formulir pembuatan -->
                    <div class="text-center mt-5">
                        <a href="<?php echo e(route('testimonials.create')); ?>" class="btn btn-primary btn-add-testimonial">
                            <i class="fas fa-plus-circle me-2"></i> Tambahkan Testimonial
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/testimonials/index.blade.php ENDPATH**/ ?>