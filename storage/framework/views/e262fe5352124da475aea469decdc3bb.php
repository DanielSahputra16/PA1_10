<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="navbar-brand p-0">
            <h2 class="text-primary"><i class="fas fa-shuttlecock"></i><img src="/img/shuttelcock2.png" alt="Shuttlecock" width="30">Ramos Badminton Center</h2>
            <!-- <img src="img/logo.png" alt="Restoran Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                    <div class="dropdown-menu">
                        <a href="<?php echo e(route('admin.About.index')); ?>" class="dropdown-item">Informasi Lapangan</a>
                        <a href="<?php echo e(route('admin.Menu.index')); ?>" class="dropdown-item">Menu</a>
                        <a href="<?php echo e(route('admin.jadwal_lapangan.index')); ?>" class="dropdown-item">Lapangan</a>
                    </div>
                </div>
                <a href="<?php echo e(route('admin.Galeri.index')); ?>" class="nav-item nav-link">Galeri</a>
                <a href="<?php echo e(route('admin.reservasi.index')); ?>" class="nav-item nav-link">Reservasi</a>
                <a href="/testimonialspublic" class="nav-item nav-link">Testimonial</a>
                <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-item nav-link">Contact</a>
            </div>
        </div>

            <!-- Authentication Links -->
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('showLoginForm')); ?>" class="nav-item nav-link">Login</a>
                <?php if(Route::has('register')): ?>
                    <a class="nav-item nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                <?php endif; ?>
            <?php else: ?>
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->name); ?>

                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</div>

<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/navbar.blade.php ENDPATH**/ ?>