<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Edit About</h2>
        <form action="<?php echo e(route('admin.abouts.update', $about->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo e($about->judul); ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo e($about->deskripsi); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <?php if($about->gambar): ?>
                    <img src="<?php echo e(asset('storage/' . $about->gambar)); ?>" alt="<?php echo e($about->judul); ?>" width="100">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo e(route('admin.abouts.index')); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/About/edit.blade.php ENDPATH**/ ?>