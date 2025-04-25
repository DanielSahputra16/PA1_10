<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Galeri - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo e(asset('img/favicon.ico')); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <style>
        /* Gaya tambahan untuk memastikan gambar responsif dan tidak terpotong */
        .gallery-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            max-height: 200px;
            cursor: pointer; /* Mengubah kursor menjadi pointer saat diarahkan ke gambar */
        }

        .gallery-item {
            margin-bottom: 20px;
        }

        /* Gaya untuk modal */
        .modal {
            display: none; /* Sembunyikan modal secara default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9); /* Latar belakang hitam transparan */
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Gallery</h5>
                <h1 class="mb-5">Explore Our Gallery</h1>
            </div>
            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp gallery-item" data-wow-delay="<?php echo e(($loop->index % 4) * 0.2 + 0.1); ?>s">
                        <div class="service-item rounded pt-3">
                            <img class="img-fluid mb-3" src="<?php echo e(Storage::url('images/Galeri/' . $galeri->image_path)); ?>" alt="<?php echo e($galeri->title); ?>" onclick="openModal('<?php echo e(Storage::url('images/Galeri/' . $galeri->image_path)); ?>')">
                            <div class="p-4">
                                <h5><?php echo e($galeri->title); ?></h5>
                                <p><?php echo e($galeri->description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center">
                        <p>Tidak ada gambar di galeri saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">×</span>
        <img class="modal-content" id="img01">
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

    <script>
        // Fungsi untuk membuka modal
        function openModal(imageSrc) {
            document.getElementById("myModal").style.display = "block";
            document.getElementById("img01").src = imageSrc;
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/galeri/index.blade.php ENDPATH**/ ?>