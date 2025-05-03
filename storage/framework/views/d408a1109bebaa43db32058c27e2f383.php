<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Daftar Jadwal</h1>

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>

        <div class="mb-3">
            <a href="<?php echo e(route('admin.jadwals.create')); ?>" class="btn btn-success">Tambah Jadwal</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Lapangan 1 Tersedia</th>
                        <th>Lapangan 2 Tersedia</th>
                        <th width="280px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($jadwal->tanggal); ?></td>
                            <td><?php echo e($jadwal->waktu_mulai); ?></td>
                            <td><?php echo e($jadwal->waktu_selesai); ?></td>
                            <td><?php echo e($jadwal->lapangan_1_tersedia ? 'Ya' : 'Tidak'); ?></td>
                            <td><?php echo e($jadwal->lapangan_2_tersedia ? 'Ya' : 'Tidak'); ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.jadwals.show',$jadwal->id)); ?>">Lihat</a>
                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.jadwals.edit',$jadwal->id)); ?>">Edit</a>

                                    <form action="<?php echo e(route('admin.jadwals.destroy',$jadwal->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/jadwals/index.blade.php ENDPATH**/ ?>