
<?php $__env->startSection('content'); ?>

    <div class="row text-center p-4">
        <div class="col-12">
            <h1>Parent Category: <?php echo e($parent->name); ?></h1>
        </div>

    </div>
    <div class="row w-100">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12">
                <a href="<?php echo e(route('category.show', $cat->id)); ?>" style="text-decoration: none;color:blue">
                    <div class="card" style="width:50%">
                        <img src="<?php echo e(filter_var($cat->image, FILTER_VALIDATE_URL) === false ? env('ASSET_URL') . $cat->image : $cat->image); ?>"
                            style="height:250px;" />
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e($cat->name); ?></h4>
                            <p>Children of :<?php echo e($parent->name); ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row text-center p-4">
                <?php $__currentLoopData = $cat->childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <a href="<?php echo e(route('category.show', $item->id)); ?>" style="text-decoration: none;color:red">
                            <div class="card text-center" style="align-content: center;align-items:center">
                                <img class="card-img-top" 
                                src="<?php echo e(filter_var($item->image, FILTER_VALIDATE_URL) === false ? env('ASSET_URL') . $item->image : $item->image); ?>"
                                alt="" style="height:250px;">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo e($item->name); ?></h4>
                                    <p>Children of :<?php echo e($cat->name); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fares\Desktop\task\resources\views/categories/subCategories.blade.php ENDPATH**/ ?>