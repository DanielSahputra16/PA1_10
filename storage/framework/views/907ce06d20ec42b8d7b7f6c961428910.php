<form action="<?php echo e(route('admin.Menu.update', $menu)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo e($menu->judul); ?>" required>
        <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo e($menu->deskripsi); ?></textarea>
        <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <label for="gambar">Gambar:</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
        <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <?php if($menu->gambar): ?>
            <img src="<?php echo e(asset('storage/menus/' . $menu->gambar)); ?>" alt="<?php echo e($menu->judul); ?>" width="100">
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?php echo e(route('admin.Menu.index')); ?>" class="btn btn-secondary">Batal</a>
</form>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/Menu/edit.blade.php ENDPATH**/ ?>