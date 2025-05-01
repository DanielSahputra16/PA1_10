<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Daftar Menu</h2>
        <a href="<?php echo e(route('admin.Menu.create')); ?>" class="btn btn-primary">Tambah Menu</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($menu->id); ?></td>
                        <td><?php echo e($menu->judul); ?></td>
                        <td><?php echo e($menu->deskripsi); ?></td>
                        <td>
                            <?php if($menu->gambar): ?>
                                <img src="<?php echo e(asset('storage/menus/' . $menu->gambar)); ?>" alt="<?php echo e($menu->judul); ?>" width="100">
                            <?php else: ?>
                                Tidak ada gambar
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.Menu.show', $menu->id)); ?>" class="btn btn-info">Lihat</a>
                            <a href="<?php echo e(route('admin.Menu.edit', $menu->id)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('admin.Menu.destroy', $menu->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/menu/index.blade.php ENDPATH**/ ?>