
<?php $__env->startSection('content'); ?>
    <div class="row text-center p-4">
        <div class="col">
            <form action=<?php echo e(route('category.store')); ?> enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">category Arabic name</label>
                    <input type="text" class="form-control" name="name[ar]" id="name" aria-describedby="helpId"
                        placeholder="name">
                </div>
                <div class="form-group">
                    <label for="name">category English name</label>
                    <input type="text" class="form-control" name="name[en]" id="name" aria-describedby="helpId"
                        placeholder="name">
                </div>
                <div class="form-group">
                    <label for="name">category parent</label>
                    <div class="dropdown hierarchy-select" id="example-one" name="parent_id">
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="example-one-button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="example-one-button">
                            <div class="hs-searchbox">
                                <input type="text" class="form-control" autocomplete="off">
                            </div>
                            <div class="hs-menu-inner">

                                <a class="dropdown-item" data-value="" data-level="1" data-default-selected="" href="#">All
                                    categories</a>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('rec',['cat'=>$cat,'count'=>2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <input class="d-none" name="parent_id" readonly="readonly" aria-hidden="true"
                            type="text" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="category image">category image</label>
                    <input type="file" class="form-control-file" name="image" id="image" placeholder="image"
                        aria-describedby="fileHelpId">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#example-one').hierarchySelect({
            width: 'auto'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fares\Desktop\task\resources\views/categories/create.blade.php ENDPATH**/ ?>