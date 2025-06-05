<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?php echo e(route('admin.dashboard')); ?>">
            <span class="align-middle">Admin</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages</li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.About.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.About.index')); ?>">
                    <i class="align-middle" data-feather="info"></i> <span class="align-middle">About</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.Menu.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.Menu.index')); ?>">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Fasilitas</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.jadwal_lapangan.index') ? 'active' : ''); ?>">
            <a class="sidebar-link" href="<?php echo e(route('admin.jadwal_lapangan.index')); ?>">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Ketersediaan Lapangan</span>
            </a>
        </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.reservasi.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.reservasi.index')); ?>">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Reservasi</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.testimonials.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.testimonials.index')); ?>">
                    <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Testimonial</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.Galeri.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.Galeri.index')); ?>">
                    <i class="align-middle" data-feather="image"></i> <span class="align-middle">Galeri</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.contact.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.contact.index')); ?>">
                    <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Contact</span>
                </a>
            </li>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>