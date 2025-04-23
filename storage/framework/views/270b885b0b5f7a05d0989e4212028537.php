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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Ketersediaan Lapangan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Schedule</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

        <?php $__env->startSection('content'); ?>
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-light rounded h-100 p-4">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="section-title ff-secondary text-center text-primary fw-normal">Schedule</h4>
                        <h1 class="mb-5">Jadwal Ketersediaan Lapangan - <?php echo e($tanggal->isoFormat('dddd, D MMMM YYYY')); ?></h1>
                    </div>

                    <!-- Pilihan Tanggal -->
                    <form action="<?php echo e(route('jadwal.index')); ?>" method="GET" class="mb-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="input-group">
                            <input type="date" class="form-control" name="tanggal" value="<?php echo e($tanggal->toDateString()); ?>">
                            <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </div>
                    </form>

                    <div class="table-responsive wow fadeInUp" data-wow-delay="0.3s">
                        <table class="table table-striped table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Waktu</th>
                                    <?php $__currentLoopData = $lapangans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lapangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo e($lapangan->nama); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($jam = $jamBuka; $jam <= $jamTutup; $jam++): ?>
                                    <tr>
                                        <td><?php echo e(str_pad($jam, 2, '0', STR_PAD_LEFT)); ?>:00 - <?php echo e(str_pad($jam+1, 2, '0', STR_PAD_LEFT)); ?>:00</td>
                                        <?php $__currentLoopData = $lapangans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lapangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $waktuMulai = $tanggal->copy()->hour($jam)->minute(0)->second(0);
                                                $waktuSelesai = $tanggal->copy()->hour($jam + 1)->minute(0)->second(0);
                                                $booked = $lapangan->reservasis()->isBookedBetween($waktuMulai, $waktuSelesai)->exists();
                                            ?>
                                            <td class="text-center">
                                                <?php if($booked): ?>
                                                    <span class="badge bg-danger">Booked</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success">Available</span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/jadwal/index.blade.php ENDPATH**/ ?>