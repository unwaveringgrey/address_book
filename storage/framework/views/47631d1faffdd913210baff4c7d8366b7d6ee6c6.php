<?php $__env->startSection('content'); ?>
    <a href=<?php echo e(route("contact_create")); ?>>Create New</a>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="content">
                        <?php if($contacts->isEmpty()): ?>
                            <div class="title m-b-md">
                                No Records Found.
                            </div>
                        <?php else: ?>
                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="title m-b-md">
                                    <?php echo e($loop->iteration); ?>. <a href="<?php echo e(route("contact_edit", ['id'=>$contact->id])); ?>"><?php echo e($contact->name); ?></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>