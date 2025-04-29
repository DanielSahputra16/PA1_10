<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Detail Menu</h2>

        <p><strong>Judul:</strong> <?php echo e($menu->judul); ?></p>
        <p><strong>Deskripsi:</strong> <?php echo e($menu->deskripsi); ?></p>
        <p>
            <strong>Gambar:</strong>
            <?php if($menu->gambar): ?>
                <img src="<?php echo e(asset('storage/menus/' . $menu->gambar)); ?>" alt="<?php echo e($menu->judul); ?>" width="200">
            <?php else: ?>
                Tidak ada gambar
            <?php endif; ?>
        </p>

        <a href="<?php echo e(route('admin.Menu.index')); ?>" class="btn btn-secondary">Kembali</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/Menu/show.blade.php ENDPATH**/ ?>