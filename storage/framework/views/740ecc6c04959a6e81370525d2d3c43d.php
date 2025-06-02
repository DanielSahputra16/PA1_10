<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Tambah Jadwal Lapangan</h1>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada kesalahan input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.jadwal_lapangan.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">
                <!-- Field Nama -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo e(old('nama')); ?>" required>
                    </div>
                </div>

                <!-- Field Tanggal -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tanggal:</strong>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo e(old('tanggal')); ?>" required>
                    </div>
                </div>

                <!-- Field Jam Mulai -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jam Mulai:</strong>
                        <select name="jam_mulai" id="jam_mulai" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Jam Mulai --</option>
                            <?php for($i = 8; $i <= 22; $i++): ?>
                                <option value="<?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00"
                                    <?php echo e(old('jam_mulai') == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : ''); ?>>
                                    <?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <!-- Field Jam Selesai -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jam Selesai:</strong>
                        <select name="jam_selesai" id="jam_selesai" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Jam Selesai --</option>
                            <?php for($i = 8; $i <= 22; $i++): ?>
                                <option value="<?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00"
                                    <?php echo e(old('jam_selesai') == str_pad($i, 2, '0', STR_PAD_LEFT) . ':00' ? 'selected' : ''); ?>>
                                    <?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:00
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <!-- Field Lapangan 1 -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lapangan 1:</strong>
                        <select class="form-control" name="lapangan_1">
                            <option value="0" <?php echo e(old('lapangan_1') == 0 ? 'selected' : ''); ?>>Kosong</option>
                            <option value="1" <?php echo e(old('lapangan_1') == 1 ? 'selected' : ''); ?>>Dipakai</option>
                        </select>
                    </div>
                </div>

                <!-- Field Lapangan 2 -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lapangan 2:</strong>
                        <select class="form-control" name="lapangan_2">
                            <option value="0" <?php echo e(old('lapangan_2') == 0 ? 'selected' : ''); ?>>Kosong</option>
                            <option value="1" <?php echo e(old('lapangan_2') == 1 ? 'selected' : ''); ?>>Dipakai</option>
                        </select>
                    </div>
                </div>

                <!-- Tombol Submit dan Batal -->
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-secondary" href="<?php echo e(route('admin.jadwal_lapangan.index')); ?>">Batal</a>
                </div>
            </div>

        </form>
    </div>

     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('tanggal');

            // Set tanggal minimum (hari ini)
            const today = new Date();
            const todayFormatted = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD
            tanggalInput.min = todayFormatted;

            // Set tanggal maksimum (2 bulan ke depan)
            const maxDate = new Date();
            maxDate.setMonth(maxDate.getMonth() + 2); // Tambah 2 bulan
            const maxDateFormatted = maxDate.toISOString().split('T')[0];
            tanggalInput.max = maxDateFormatted;
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/jadwal_lapangan/create.blade.php ENDPATH**/ ?>