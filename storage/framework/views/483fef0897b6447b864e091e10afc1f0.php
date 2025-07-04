<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Edit Informasi Kontak - Admin</title>

    <link href="<?php echo e(URL::asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/yss.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main">
         <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <main class="content">
                 <div class="container-fluid p-0">
                     <div class="container-fluid pt-4 px-4">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="container-fluid pt-4 px-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-xl-12">
                                    <div class="bg-light rounded h-100 p-4">
                                        <h6 class="mb-4">Edit Informasi Kontak</h6>

                                        <?php if($errors->any()): ?>
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                        <form action="<?php echo e(route('admin.contact.update', $contact->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>

                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor Telepon" value="<?php echo e($contact->phone_number); ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="operating_hours" class="form-label">Jam Operasi</label>
                                                <input type="text" class="form-control" id="operating_hours" name="operating_hours" placeholder="Jam Operasi" value="<?php echo e($contact->operating_hours); ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="whatsapp_link" class="form-label">Link WhatsApp</label>
                                                <input type="text" class="form-control" id="whatsapp_link" name="whatsapp_link" placeholder="Link WhatsApp" value="<?php echo e($contact->whatsapp_link); ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="instagram_username" class="form-label">Username Instagram</label>
                                                <input type="text" class="form-control" id="instagram_username" name="instagram_username" placeholder="Username Instagram" value="<?php echo e($contact->instagram_username); ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="embed_code" class="form-label">Embed Code</label>
                                                <textarea class="form-control" id="embed_code" name="embed_code" rows="3" placeholder="Embed Code"><?php echo e($contact->embed_code); ?></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="<?php echo e(route('admin.contact.index')); ?>" class="btn btn-secondary">Batal</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <script src="<?php echo e(URL::asset('js/app.js')); ?>"></script>
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace()
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/contact/edit.blade.php ENDPATH**/ ?>