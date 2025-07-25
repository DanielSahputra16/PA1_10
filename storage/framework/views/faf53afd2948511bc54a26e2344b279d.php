<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reservasi - Ramos Badminton Center</title>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Reservasi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Reservasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

        <!-- Helper function untuk warna badge status -->
        <?php
        // 1. Pengecekan Keberadaan Fungsi
        if (!function_exists('getStatusBadgeClass')) { // Cek jika fungsi belum ada

            // 2. Definisi Fungsi
            function getStatusBadgeClass($status)
            {

                // 3. Logika Inti (Switch Statement)
                switch (strtolower($status)) { // 3a. Ubah status jadi huruf kecil

                    // 4. Kasus-kasus Status
                    case 'dikonfirmasi': // Jika status 'dikonfirmasi' ATAU 'confirmed'
                    case 'confirmed':
                        return 'bg-success'; // Kembalikan kelas Bootstrap 'bg-success' (hijau)

                    case 'pending': // Jika status 'pending' ATAU 'menunggu pembayaran'
                    case 'menunggu pembayaran':
                        return 'bg-warning text-dark'; // Kembalikan 'bg-warning' (kuning) dan 'text-dark' (teks hitam)

                    case 'dibatalkan': // Jika status 'dibatalkan' ATAU 'cancelled'
                    case 'cancelled':
                        return 'bg-danger'; // Kembalikan 'bg-danger' (merah)

                    case 'selesai': // Jika status 'selesai' ATAU 'completed'
                    case 'completed':
                        return 'bg-info'; // Kembalikan 'bg-info' (biru muda)

                        // 5. Kasus Default (Jika tidak cocok sama sekali)
                    default:
                        return 'bg-secondary'; // Kembalikan 'bg-secondary' (abu-abu)
                } // Akhir dari switch
            } // Akhir dari definisi fungsi
        } // Akhir dari if (!function_exists(...))
        ?>

        <!-- Reservation List Start -->
        <div class="container-xxl py-7 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title ff-secondary text-center text-primary fw-normal">Reservations</h4>
                    <h1 class="mb-5">Daftar Reservasi Lapangan</h1>
                </div>

                <div class="container-fluid px-0">
                    <!-- Gunakan container-fluid agar benar-benar full width -->
                    <div class="row g-4 justify-content-center">
                        <div class="col-12 px-0">

                            <!-- Pesan Sukses dari Session -->
                            <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show wow fadeInUp"
                                data-wow-delay="0.2s" role="alert">
                                <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endif; ?>

                            <!-- Tombol Buat Reservasi Baru -->
                            <div class="text-end mb-4 wow fadeInUp" data-wow-delay="0.3s">
                                <a href="<?php echo e(route('reservasi.create')); ?>" class="btn btn-primary py-2 px-4">
                                    <i class="fas fa-plus me-2"></i>Buat Reservasi Baru
                                </a>
                            </div>

                            <!-- Tabel Daftar Reservasi -->
                            <div class="table-responsive wow fadeInUp" data-wow-delay="0.4s">
                                <table class="table table-striped table-bordered table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama</th>
                                            <!-- Tambahkan kolom nama -->
                                            <th scope="col">No. HP</th>
                                            <!-- Tambahkan kolom no_hp -->
                                            <th scope="col">Lapangan</th>
                                            <th scope="col">Waktu Mulai</th>
                                            <th scope="col">Waktu Selesai</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $reservasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th scope="row"><?php echo e($reservasi->id); ?></th>
                                            <td><?php echo e($reservasi->nama); ?></td>
                                            <td><?php echo e($reservasi->no_hp); ?></td>
                                            <td><?php echo e($reservasi->lapangan->nama ?? 'N/A'); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($reservasi->waktu_mulai)->isoFormat('D MMM YYYY, HH:mm')); ?>

                                            </td>
                                            <td><?php echo e(\Carbon\Carbon::parse($reservasi->waktu_selesai)->isoFormat('D MMM YYYY, HH:mm')); ?>

                                            </td>
                                            <td>
                                                <span
                                                    class="badge <?php echo e(getStatusBadgeClass($reservasi->status)); ?>"><?php echo e($reservasi->status); ?></span>
                                            </td>
                                            <td>
                                                <?php if($reservasi->gambar): ?>
                                                <img src="<?php echo e(asset('storage/gambar/' . $reservasi->gambar)); ?>"
                                                    alt="Gambar Reservasi" width="50">
                                                <?php else: ?>
                                                Tidak ada gambar
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- Tombol Aksi -->
                                                <a href="<?php echo e(route('reservasi.show', $reservasi->id)); ?>"
                                                    class="btn btn-sm btn-info me-1" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Tampilkan tombol Edit dan Delete hanya jika user adalah pemilik atau admin -->
                                                <?php if(auth()->guard()->check()): ?>
                                                <?php if(auth()->user()->id === $reservasi->user_id || auth()->user()->isAdmin()): ?>
                                                <a href="<?php echo e(route('reservasi.edit', $reservasi->id)); ?>"
                                                    class="btn btn-sm btn-warning me-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form
                                                    action="<?php echo e(route('reservasi.destroy', $reservasi->id)); ?>"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin membatalkan reservasi ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        title="Batalkan">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="9" class="text-center py-4">
                                                <i class="fas fa-info-circle me-2"></i> Tidak ada data reservasi
                                                ditemukan.
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation List End -->

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
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/reservasi/index.blade.php ENDPATH**/ ?>