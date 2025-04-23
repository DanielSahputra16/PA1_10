<!-- testimonials.index.blade.php -->
<h1>Testimonials</h1>
<?php if(count($testimonials) > 0): ?>
    <ul>
        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($testimonial->name); ?> - <?php echo e($testimonial->message); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <p>No testimonials found.</p>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/testimonials/index.blade.php ENDPATH**/ ?>