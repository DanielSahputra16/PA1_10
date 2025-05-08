<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detail Jadwal Lapangan</h1>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <?php echo e($jadwalLapangan->nama); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Waktu Mulai:</strong>
                <?php echo e($jadwalLapangan->waktu); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Waktu Selesai:</strong>
                <?php echo e($jadwalLapangan->waktu_selesai); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lapangan 1:</strong>
                <?php echo e($jadwalLapangan->lapangan_1 ? 'Dipakai' : 'Kosong'); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lapangan 2:</strong>
                <?php echo e($jadwalLapangan->lapangan_2 ? 'Dipakai' : 'Kosong'); ?>

            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
             <a class="btn btn-secondary" href="<?php echo e(route('admin.jadwal_lapangan.index')); ?>">Kembali</a>
         </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/jadwal_lapangan/show.blade.php ENDPATH**/ ?>