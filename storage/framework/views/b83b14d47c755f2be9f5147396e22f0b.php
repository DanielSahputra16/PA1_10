<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="section-title ff-secondary text-start text-primary fw-normal mb-0">Gambar Galeri</h6>
                    <a href="<?php echo e(route('admin.galeri.create')); ?>" class="btn btn-primary mb-3">Tambah Gambar Baru</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($galeri->id); ?></th>
                                        <td><?php echo e($galeri->title); ?></td>
                                        <td><?php echo e($galeri->description); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset('images/galeri/' . $galeri->image_path)); ?>" alt="<?php echo e($galeri->title); ?>" width="100">
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.galeri.edit', $galeri->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="<?php echo e(route('admin.galeri.destroy', $galeri->id)); ?>" method="POST" style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/galeri/index.blade.php ENDPATH**/ ?>