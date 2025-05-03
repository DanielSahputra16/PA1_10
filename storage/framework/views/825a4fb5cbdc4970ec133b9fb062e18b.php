<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lapangan - Ramos Badminton Center</title>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Ketersediaan Peralatan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- Navbar & Hero End -->


        <!-- Menu Start -->
            <div class="container-fluid">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Field Service</h5>
                    <h1 class="mb-5">Popular Rental Packages</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-table-tennis fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">List of</small>
                                    <h6 class="mt-n1 mb-0">Badminton Court Types</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-calendar-alt fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Field Rental</small>
                                    <h6 class="mt-n1 mb-0">Packages</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-plus-square fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">List of</small>
                                    <h6 class="mt-n1 mb-0">Additional Facilities</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <!-- Tab Badminton Court Types (Static Data) -->
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/download.jpeg')); ?>" alt="Lapangan 1" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Lapangan 1</span>
                                                <span class="text-primary">25k</span>
                                            </h5>
                                            <small class="fst-italic">Lapangan indoor dengan pencahayaan maksimal dan lantai Beton standar nasional. Cocok untuk latihan dan turnamen.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/bg.lapangan1.jpg')); ?>" alt="Lapangan 2" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Lapangan 2</span>
                                                <span class="text-primary">25k</span>
                                            </h5>
                                            <small class="fst-italic">Lapangan indoor dengan permukaan berkualitas tinggi dan garis lapangan yang jelas. Cocok untuk latihan dan turnamen.</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tambahkan data lapangan lainnya di sini -->
                            </div>
                        </div>

                        <!-- Tab Field Rental Packages (Static Data) -->
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/raket1.jpeg')); ?>" alt="Paket Hemat" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Raket1</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Sewa Raket perjam.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/raket2.jpeg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Raket2</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Sewa Raket perjam.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/raket3.jpeg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Raket3</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Sewa Raket perjam.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/raket4.jpeg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Raket4</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Sewa Raket perjam.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/raket5.jpeg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Raket5</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Sewa Raket perjam.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/raket6.jpeg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Raket6</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Sewa Raket perjam.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/bola1.png')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Shuttlecock</span>
                                                <span class="text-primary">15k</span>
                                            </h5>
                                            <small class="fst-italic">Rasakan pengalaman bermain badminton yang lebih maksimal dengan shuttlecock berkualitas.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/bola2.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Shuttlecock</span>
                                                <span class="text-primary">15k</span>
                                            </h5>
                                            <small class="fst-italic">Rasakan pengalaman bermain badminton yang lebih maksimal dengan shuttlecock berkualitas.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/bola3.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Shuttlecock</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Rasakan pengalaman bermain badminton yang lebih maksimal dengan shuttlecock berkualitas.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/bola4.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Shuttlecock</span>
                                                <span class="text-primary">10k</span>
                                            </h5>
                                            <small class="fst-italic">Rasakan pengalaman bermain badminton yang lebih maksimal dengan shuttlecock berkualitas.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/bola6.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Shuttlecock</span>
                                                <span class="text-primary">8k</span>
                                            </h5>
                                            <small class="fst-italic">Rasakan pengalaman bermain badminton yang lebih maksimal dengan shuttlecock berkualitas.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/bola5.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Shuttlecock</span>
                                                <span class="text-primary">8k</span>
                                            </h5>
                                            <small class="fst-italic">Rasakan pengalaman bermain badminton yang lebih maksimal dengan shuttlecock berkualitas.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/jersey1.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marchandise</span>
                                                <span class="text-primary">140k</span>
                                            </h5>
                                            <small class="fst-italic">Dapatkan jersey favorit Anda dengan harga terjangkau dan rasakan pengalaman bermain yang lebih optimal.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/jersey2.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marchandise</span>
                                                <span class="text-primary">140k</span>
                                            </h5>
                                            <small class="fst-italic">Dapatkan jersey favorit Anda dengan harga terjangkau dan rasakan pengalaman bermain yang lebih optimal.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/jersey3.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>SMarchandise</span>
                                                <span class="text-primary">150k</span>
                                            </h5>
                                            <small class="fst-italic">Dapatkan jersey favorit Anda dengan harga terjangkau dan rasakan pengalaman bermain yang lebih optimal.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/jersey4.jpg')); ?>" alt="Paket Lengkap" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Marchandise</span>
                                                <span class="text-primary">150k</span>
                                            </h5>
                                            <small class="fst-italic">Dapatkan jersey favorit Anda dengan harga terjangkau dan rasakan pengalaman bermain yang lebih optimal.</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tambahkan data paket rental lainnya di sini -->
                            </div>
                        </div>

                        <!-- Tab Additional Facilities (Static Data) -->
                        <div id="tab-3" class="tab-pane fade">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="<?php echo e(asset('img/wifi.jpg')); ?>" alt="Wi-Fi" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Wi-Fi</span>
                                                <span class="text-primary">Gratis</span>
                                            </h5>
                                            <small class="fst-italic">Akses internet cepat dan stabil.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/toilet.jpg')); ?>" alt="Kamar Mandi" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Kamar Mandi</span>
                                                <span class="text-primary">Gratis</span>
                                            </h5>
                                            <small class="fst-italic">Kamar mandi bersih dan terawat.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/AREA PARKIR.jpg')); ?>" alt="Kamar Mandi" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Area Parkir</span>
                                                <span class="text-primary">Gratis</span>
                                            </h5>
                                            <small class="fst-italic">Area parkir yang aman dan memadai untuk motor dan mobil.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/area istirahat.jpg')); ?>" alt="Kamar Mandi" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Area Tunggu/Istirahat</span>
                                                <span class="text-primary">Gratis</span>
                                            </h5>
                                            <small class="fst-italic">Kursi yang nyaman.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo e(asset('img/kantin.jpg')); ?>" alt="Kamar Mandi" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Minuman & Snack</span>
                                                <span class="text-primary">Berbayar</span>
                                            </h5>
                                            <small class="fst-italic">Area penjualan snack ringan.</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tambahkan lebih banyak fasilitas di sini -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Menu End -->


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
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/menu/index.blade.php ENDPATH**/ ?>