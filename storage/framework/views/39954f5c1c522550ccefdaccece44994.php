<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact - Ramos Badminton Center</title>
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
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Hubungi kami</h5>
                    <h1 class="mb-5">Hubungi Untuk Pertanyaan Apa Pun</h1>
                </div>

                <!-- START: Corrected Structure -->
                <div class="row g-4">  <!-- Main row for contact content -->
                    <!-- Column for Contact Details -->
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="0.1s"> <!-- Added wow wrapper -->
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary mb-3">Hubungi Kami</h5> <!-- Optional Subtitle -->
                            <div class="row gy-4">
                                <?php if($contacts->isNotEmpty()): ?>
                                    <div class="col-12"> <!-- Phone -->
                                        <h6 class="text-primary">Telepon</h6>
                                        <p class="mb-2"><i class="fa fa-phone-alt text-primary me-2"></i><a href="tel:<?php echo e($contacts->first()->phone_number); ?>"><?php echo e($contacts->first()->phone_number); ?></a></p>
                                    </div>
                                    <div class="col-12"> <!-- Operating Hours -->
                                        <h6 class="text-primary">Jam Operasional</h6>
                                        <p class="mb-2"><i class="fa fa-clock text-primary me-2"></i><?php echo e($contacts->first()->operating_hours); ?></p>
                                    </div>
                                    <div class="col-12"> <!-- WhatsApp -->
                                        <h6 class="text-primary">WhatsApp</h6>
                                        <p class="mb-2"><i class="fab fa-whatsapp text-primary me-2"></i><a href="<?php echo e($contacts->first()->whatsapp_link); ?>" target="_blank">Reservasi via WhatsApp</a></p>
                                    </div>
                                    <div class="col-12"> <!-- Instagram -->
                                        <h6 class="text-primary">Instagram</h6>
                                        <p class="mb-0"><i class="fab fa-instagram text-primary me-2"></i><a href="https://instagram.com/<?php echo e($contacts->first()->instagram_username); ?>" target="_blank">@ramos_badmintoncenter</a></p>
                                    </div>
                                <?php else: ?>
                                    <div class="col-12">
                                        <p class="text-muted">Tidak ada informasi kontak yang tersedia.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Column for Map -->
                    <div class="col-lg-6"> <!-- Use col-lg-6 to match the details column -->
                        <div class="wow fadeIn" data-wow-delay="0.3s"> <!-- Adjusted delay -->
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary mb-3">Lokasi Kami</h5> <!-- Optional Subtitle -->
                            <?php if($contacts->isNotEmpty()): ?>
                                <iframe class="position-relative rounded w-100 h-100"
                                    src="<?php echo e(htmlspecialchars($contacts->first()->embed_code)); ?>"
                                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                                    tabindex="0"></iframe>
                            <?php else: ?>
                                <p class="text-muted">Tidak ada peta lokasi yang tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- Penutup untuk row g-4 utama -->
            </div> <!-- Penutup untuk container -->
        </div> <!-- Penutup untuk container-xxl py-5 -->
        <!-- Contact End -->

        <!-- Footer Start -->
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div> <!-- Penutup untuk container-xxl bg-white p-0 -->

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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/contact/index.blade.php ENDPATH**/ ?>