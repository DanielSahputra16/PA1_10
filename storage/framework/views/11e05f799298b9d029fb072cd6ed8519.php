<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lapangan - Badminton Ramos Center</title>
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
</style>
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
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Nikmati Permainan<br>Terbaik di Lapangan Kami</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Rasakan sensasi smash yang kuat, kelincahan di setiap langkah, dan keseruan tanpa batas. Bermainlah di lapangan terbaik dengan fasilitas yang nyaman dan berkualitas tinggi. Ajak teman-temanmu, tantang lawanmu, dan jadilah juara di setiap pertandingan.</p>
                            <a href="<?php echo e(route('reservasi.index')); ?>" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Pesan Lapangan</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="<?php echo e(URL::asset('/img/upscalemedia-transformed.png')); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-th-large text-primary mb-4"></i>
                                <h5>Lapangan Berkualitas</h5>
                                <p>Lapangan dengan standar internasional, lantai yang nyaman, dan pencahayaan optimal</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-table-tennis text-primary mb-4"></i>
                                <h5>Peralatan & Fasilitas</h5>
                                <p>Tersedia penyewaan raket, shuttlecock, serta fasilitas ruang ganti & parkir</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-calendar-check fa-3x text-primary mb-4"></i>
                                <h5>Pemesanan Online</h5>
                                <p>Pesan lapangan dengan mudah, cek jadwal dan bayar langsung di website</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>Layanan Pelanggan 24/7</h5>
                                <p>Tim kami siap membantu dalam pemesanan & pertanyaan lainnya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo e(URL::asset('img/IMG-20250512-WA0013.jpg')); ?>">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?php echo e(URL::asset('img/IMG-20250512-WA0008.jpg')); ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="<?php echo e(URL::asset('img/IMG-20250512-WA0023.jpg')); ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="<?php echo e(URL::asset('img/IMG-20250512-WA0007.jpg')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to Badminton Ramos Center</h1>
                        <p>Ramos Badminton Center adalah lapangan badminton baru dengan fasilitas modern dan berkualitas tinggi.
                            Dengan 2 lapangan terbaik, kami siap memberikan pengalaman bermain yang nyaman bagi semua pecinta badminton.
                        </p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Month of Experience</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">REGISTERED</p>
                                        <h6 class="text-uppercase mb-0">Players</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo e(route('About.indexPublic')); ?>">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Proyek Akhir1</h5>
                    <h1 class="mb-5">Our Web Development Team</h1>
                </div>
                <div class="row g-4">
                    <!-- Daniel -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4 d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; margin: auto;">
                                <img src="<?php echo e(URL::asset('img/yell-3.jpg')); ?>" alt="" style="width: 200px; height: 200px; object-fit: cover;">
                            </div>
                            <h5 class="mb-0">Daniel Manurung</h5>
                            <small>Full-Stack Developer</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="https://wa.me/628992568028" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Tiara -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4 d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; margin: auto;">
                                <img src="<?php echo e(URL::asset('img/Tiara.jpg')); ?>" alt="" style="width: 200px; height: 200px; object-fit: cover;">
                            </div>
                            <h5 class="mb-0">Tiara Pardosi</h5>
                            <small>Project Manager</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="https://www.facebook.com/tiara.pardosi.37?mibextid=rS40aB7S9Ucbxw6v"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="https://www.instagram.com/tiaraanandaaaa_?igsh=MWlvOGFmZDB1Zm90ag=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Anggi -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4 d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; margin: auto;">
                                <img src="<?php echo e(URL::asset('img/Anggi.jpg')); ?>" alt="" style="width: 200px; height: 200px; object-fit: cover;">
                            </div>
                            <h5 class="mb-0">Anggi Simanjuntak</h5>
                            <small>Developer</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="https://www.instagram.com/nggismjtk/profilecard/?igsh=bnFtb2JyaGFjNmx1"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Debora -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4 d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; margin: auto;">
                                <img src="<?php echo e(URL::asset('img/Debora.jpg')); ?>" alt="" style="width: 200px; height: 200px; object-fit: cover;">
                            </div>
                            <h5 class="mb-0">Debora Tampubolon</h5>
                            <small>Developer</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="https://www.instagram.com/_deboratampubolon/?utm_source=qr&r=nametag"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

                <!-- Testimonial Start -->
<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
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
    </div>
</div>
<!-- Testimonial End -->

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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/welcome.blade.php ENDPATH**/ ?>