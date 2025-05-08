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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Waktu Mulai:</strong>
                    <input type="time" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Waktu Selesai:</strong>
                    <input type="time" name="waktu_selesai" class="form-control" placeholder="Waktu Selesai">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lapangan 1:</strong>
                     <select class="form-control" name="lapangan_1">
                         <option value="0" <?php echo e(old('lapangan_1') == 0 ? 'selected' : ''); ?>>Kosong</option>
                         <option value="1" <?php echo e(old('lapangan_1') == 1 ? 'selected' : ''); ?>>Dipakai</option>
                     </select>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lapangan 2:</strong>
                     <select class="form-control" name="lapangan_2">
                         <option value="0" <?php echo e(old('lapangan_2') == 0 ? 'selected' : ''); ?>>Kosong</option>
                         <option value="1" <?php echo e(old('lapangan_2') == 1 ? 'selected' : ''); ?>>Dipakai</option>
                     </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-secondary" href="<?php echo e(route('admin.jadwal_lapangan.index')); ?>">Batal</a>
            </div>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/jadwal_lapangan/create.blade.php ENDPATH**/ ?>