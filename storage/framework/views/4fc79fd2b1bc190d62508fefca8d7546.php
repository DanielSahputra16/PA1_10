   <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <div class="d-flex align-items-center">
                                <img src="<?php echo e(asset('img/profileAdmin.jpg')); ?>" class="rounded-circle me-2" width="32" height="32">
                                    <span class="text-light">Admin Ganteng</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <i class="fas fa-sign-out-alt me-2"></i> <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/layouts/navbar.blade.php ENDPATH**/ ?>