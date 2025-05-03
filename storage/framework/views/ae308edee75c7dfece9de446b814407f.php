<!-- resources/views/jadwals/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Detail Jadwal</h1>

    <div class="mb-3">
        <strong>Tanggal:</strong>
        <?php echo e($jadwal->tanggal); ?>

    </div>
    <div class="mb-3">
        <strong>Waktu Mulai:</strong>
        <?php echo e($jadwal->waktu_mulai); ?>

    </div>
    <div class="mb-3">
        <strong>Waktu Selesai:</strong>
        <?php echo e($jadwal->waktu_selesai); ?>

    </div>
    <div class="mb-3">
        <strong>Lapangan 1 Tersedia:</strong>
        <?php echo e($jadwal->lapangan_1_tersedia ? 'Ya' : 'Tidak'); ?>

    </div>
     <div class="mb-3">
        <strong>Lapangan 2 Tersedia:</strong>
        <?php echo e($jadwal->lapangan_2_tersedia ? 'Ya' : 'Tidak'); ?>

    </div>

    <a href="<?php echo e(route('admin.jadwals.index')); ?>" class="btn btn-primary">Kembali</a>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/jadwals/show.blade.php ENDPATH**/ ?>