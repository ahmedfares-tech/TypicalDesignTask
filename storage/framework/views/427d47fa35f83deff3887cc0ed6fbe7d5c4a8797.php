
<?php $__env->startSection('content'); ?>
    <div class="row text-center">
        <div class="col-12">
            <h1>Categories</h1>
        </div>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-s-12">
                <a href="<?php echo e(route('category.show', $cat->id)); ?>" style="text-decoration: none;color:black">
                    <div class="card">
                        <img class="card-img-top"
                            src="<?php echo e(filter_var($cat->image, FILTER_VALIDATE_URL) === false ? env('ASSET_URL') . $cat->image : $cat->image); ?>"
                            alt="">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e($cat->name); ?></h4>
                        </div>
                    </div>
                </a style="text-decoration: none;color:black">
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fares\Desktop\task\resources\views/welcome.blade.php ENDPATH**/ ?>