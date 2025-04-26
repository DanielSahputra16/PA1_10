<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Daftar About</h2>
        <a href="<?php echo e(route('admin.about.create')); ?>" class="btn btn-primary mb-3">Tambah About</a>

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $About; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($about->judul); ?></td>
                        <td><?php echo e($about->deskripsi); ?></td>
                        <td>
                            <?php if($about->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $about->gambar)); ?>" alt="<?php echo e($about->judul); ?>" width="100">
                            <?php else: ?>
                                Tidak Ada Gambar
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.About.show', $about->id)); ?>" class="btn btn-info btn-sm">Lihat</a>
                            <a href="<?php echo e(route('admin.About.edit', $about->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <form action="<?php echo e(route('admin.About.destroy', $about->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/about/index.blade.php ENDPATH**/ ?>