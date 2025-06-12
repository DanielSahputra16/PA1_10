<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Buat Reservasi - Ramos Badminton Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <!-- Sebaiknya diisi untuk SEO -->
    <meta content="" name="description">
    <!-- Sebaiknya diisi untuk SEO -->

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

        <!-- Navbar -->
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Navbar -->

        <!-- Hero Header Start -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Buat Reservasi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('reservasi.index')); ?>">Reservasi</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Buat</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

        <!-- Create Reservation Content Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <!-- Menggunakan gaya heading dari halaman tabel -->
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Reservation</h5>
                    <h1 class="mb-5">Formulir Reservasi Lapangan</h1>
                </div>

                <!-- Menggunakan layout row/col dari halaman tabel (tapi mungkin kolom lebih sempit) -->
                <div class="row g-4 justify-content-center">
                    <!-- Kolom dibuat lebih sempit (lg-8) agar form tidak terlalu lebar -->
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">

                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('reservasi.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <!-- Field Nama -->
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e($user->name); ?>" disabled>
                            </div>

                            <!-- Field No. HP -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP:</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control"
                                    value="<?php echo e(old('no_hp')); ?>" required>
                            </div>

                            <!-- Field Lapangan -->
                            <div class="mb-3">
                                <label for="lapangan_id" class="form-label">Lapangan:</label>
                                <select name="lapangan_id" id="lapangan_id" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Lapangan --</option>
                                    <?php $__currentLoopData = $lapangans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lapangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lapangan->id); ?>"
                                        <?php echo e(old('lapangan_id') == $lapangan->id ? 'selected' : ''); ?>>
                                        <?php echo e($lapangan->nama); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Field Tanggal (tidak perlu tanggal_selesai) -->
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal:</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control"
                                    value="<?php echo e(old('tanggal')); ?>" required>
                            </div>

                            <!-- Field Jam Mulai -->
                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai:</label>
                                <select name="jam_mulai" id="jam_mulai" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Jam Mulai --</option>
                                    <?php for($i = 8; $i <= 23; $i++): ?>
                                    <option value="<?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00"
                                        <?php echo e(old('jam_mulai') == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : ''); ?>>
                                        <?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00
                                    </option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <!-- Field Jam Selesai -->
                            <div class="mb-3">
                                <label for="jam_selesai" class="form-label">Jam Selesai:</label>
                                <select name="jam_selesai" id="jam_selesai" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Jam Selesai --</option>
                                    <?php for($i = 8; $i <= 23; $i++): ?>
                                    <option value="<?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00"
                                        <?php echo e(old('jam_selesai') == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : ''); ?>>
                                        <?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00
                                    </option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <!-- Field Upload Gambar -->
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar (Opsional):</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                             <!-- Tampilkan Instruksi Barcode -->
                            <div class="mb-3">
                                <label class="form-label"><b>Tunjukkan Barcode ini Saat Checkin:</b></label><br>
                                <img src="<?php echo e(URL::asset('img/barcode.jpg')); ?>" alt="Contoh Barcode" width="200">
                                <p>Simpan atau screenshot barcode ini untuk ditunjukkan saat checkin.</p>
                            </div>

                            <!-- Tombol Submit (dengan styling dari halaman tabel) -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary py-2 px-4">
                                    <i class="fas fa-calendar-check me-2"></i>Buat Reservasi
                                </button>
                                <a href="<?php echo e(route('reservasi.index')); ?>" class="btn btn-secondary py-2 px-4 ms-2">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Create Reservation Content End -->

        <!-- Footer -->
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Footer -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="Kembali ke atas"><i
                class="bi bi-arrow-up"></i></a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('tanggal');
            const jamMulai = document.getElementById('jam_mulai');
            const jamSelesai = document.getElementById('jam_selesai');

            // Set tanggal minimum dan maksimum
            const today = new Date();
            const todayFormatted = today.toISOString().split('T')[0];
            tanggalInput.min = todayFormatted;

            const maxDate = new Date();
            maxDate.setMonth(maxDate.getMonth() + 2);
            const maxFormatted = maxDate.toISOString().split('T')[0];
            tanggalInput.max = maxFormatted;

            function validateJam() {
                const mulai = jamMulai.value;
                const selesai = jamSelesai.value;

                if (mulai && selesai) {
                    const mulaiDate = new Date(`1970-01-01T${mulai}`);
                    const selesaiDate = new Date(`1970-01-01T${selesai}`);

                    if (selesaiDate <= mulaiDate) {
                        alert("Jam selesai harus setelah jam mulai.");
                        jamSelesai.value = "";
                    }
                }
            }

            jamMulai.addEventListener('change', validateJam);
            jamSelesai.addEventListener('change', validateJam);
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/reservasi/create.blade.php ENDPATH**/ ?>