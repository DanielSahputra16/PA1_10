<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Detail About</h2>
        <p><strong>Judul:</strong> <?php echo e($about->judul); ?></p>
        <p><strong>Deskripsi:</strong> <?php echo e($about->deskripsi); ?></p>
        <p>
            <strong>Gambar:</strong>
            <?php if($about->gambar): ?>
                <img src="<?php echo e(asset('storage/' . $about->gambar)); ?>" alt="<?php echo e($about->judul); ?>" width="200">
            <?php else: ?>
                Tidak Ada Gambar
            <?php endif; ?>
        </p>
        <a href="<?php echo e(route('admin.abouts.index')); ?>" class="btn btn-secondary">Kembali</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/About/show.blade.php ENDPATH**/ ?>