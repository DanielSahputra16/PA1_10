<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About - Badminton Ramos Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(URL::asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(URL::asset('/css/style.css')); ?>" rel="stylesheet">
</head>

<style>

        /* Card Tim yang Disesuaikan */
        .team-item {
            background: #f8f9fa;
            /* Latar belakang abu-abu muda */
            border-radius: 15px;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            /* Tambahkan margin bawah untuk jarak */
        }

        .team-item .rounded-circle {
            width: 180px;
            /* Sesuaikan ukuran sesuai kebutuhan */
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            /* Pastikan tetap lingkaran */
            margin: 15px auto;
            /* Margin atas dan bawah untuk ruang */
            display: block;
        }

        .team-item h5 {
            color: #343a40;
            /* Warna teks untuk nama */
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .team-item small {
            color: #6c757d;
            /* Warna teks untuk peran */
            font-size: 0.9rem;
        }

        /* Mengatur gambar agar responsive */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
         .team-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

</style>

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
        <!-- Navbar & Hero End -->

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

        <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Bagian Gambar -->
                    <?php if(count($abouts) > 0): ?>
                        <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($about->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $about->gambar)); ?>" alt="<?php echo e($about->judul); ?>"
                                     class="img-fluid rounded wow zoomIn about-image" data-wow-delay="0.5s">
                            <?php else: ?>
                                <img src="<?php echo e(URL::asset('/img/default-image.jpg')); ?>" alt="Default Image"
                                     class="img-fluid rounded wow zoomIn about-image" data-wow-delay="0.5s">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <img src="<?php echo e(URL::asset('/img/default-image.jpg')); ?>" alt="Default Image"
                             class="img-fluid rounded wow zoomIn about-image" data-wow-delay="0.5s">
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>

                    <!-- Menampilkan data dari tabel 'abouts' -->
                    <?php if(count($abouts) > 0): ?>
                        <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h1 class="mb-4"><?php echo e($about->judul); ?></h1>
                            <p><?php echo e($about->deskripsi); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <h1 class="mb-4">Welcome to Badminton Ramos Center</h1>
                        <p>Tidak ada informasi tentang kami saat ini.</p>
                    <?php endif; ?>
                    <!-- Sisanya dari konten "About Us" Anda (Visi, Misi, Fasilitas, dll.) -->
                    <!-- Anda bisa menyimpan ini statis atau membuatnya dinamis dari database -->

                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0"
                                    data-toggle="counter-up">5</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Month of Experience</p>
                                    <h6 class="text-uppercase mb-0">Experience</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0"
                                    data-toggle="counter-up">50</h1>
                                <div class="ps-4">
                                    <p class="mb-0">REGISTERED</p>
                                    <h6 class="text-uppercase mb-0">Players</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol -->
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">SEE MORE</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

          <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Manajemen dan Pengelola Lapangan
                </h5>
                <h1 class="mb-5">Tim Pengelola Lapangan</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Anggota 1 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid rounded-circle" src="<?php echo e(URL::asset('/img/audrey.jpg')); ?>" alt=""
                            style="object-fit: cover;">
                        <h5 class="mb-0">Deborah Audrey Simatupang</h5>
                        <small>Owner</small>
                    </div>
                </div>
                <!-- Anggota 2 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid rounded-circle" src="<?php echo e(URL::asset('/img/penjaga.jpg')); ?>" alt=""
                            style="object-fit: cover;">
                        <h5 class="mb-0">Josua</h5>
                        <small>Pengelola lapangan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Footer Start -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/About/index.blade.php ENDPATH**/ ?>