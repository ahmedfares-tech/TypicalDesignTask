<a class="dropdown-item" data-value=<?php echo e($cat->id); ?> name="parent_id" data-level=<?php echo e($count++); ?> href="#"><?php echo e($cat->name); ?></a>
<?php if(count($cat->childrens) > 0): ?>
    <?php $__currentLoopData = $cat->childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('rec',['cat'=>$sub,'count' => $count], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Fares\Desktop\task\resources\views/rec.blade.php ENDPATH**/ ?>