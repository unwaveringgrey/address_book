<?php $__env->startSection('content'); ?>
    <div class="container">
        <form role="form" method="POST" action="<?php echo e(route('contact_save', ['id'=>$contact->id])); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-6">
                Contact Name:<input id="name" type="name" class="form-control" name="name" value="<?php echo e(old('name', $contact->name)); ?>" required>

                <?php if($errors->has('name')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                <?php endif; ?>
                Email Address:<input id="email_address" type="email" class="form-control" name="email_address" value="<?php echo e(old('email_address', $email_address->email_address)); ?>" required>

                <?php if($errors->has('email_address')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('email_address')); ?></strong>
                        </span>
                <?php endif; ?>
                Address:<input id="address" class="form-control" name="address" value="<?php echo e(old('address', $address->address)); ?>" required>

                <?php if($errors->has('address')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('address')); ?></strong>
                        </span>
                <?php endif; ?>
                Phone Number:<input id="number" class="form-control" name="number" value="<?php echo e(old('number', $phone_number->number)); ?>" required>

                <?php if($errors->has('number')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('number')); ?></strong>
                        </span>
                <?php endif; ?>
                Number Type:<input id="number_type" class="form-control" name="number_type" value="<?php echo e(old('number_type', $phone_number->number_type)); ?>" required>

                <?php if($errors->has('number_type')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('number_type')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>

            <button class="btn btn-default" type="submit" value="Save">Submit</button>
        </form>
        <a href="<?php echo e(route('contact_list')); ?>" class="btn btn-default">Cancel</a>

        <?php if($contact->id != 0): ?>
            <form action="<?php echo e(route('contact_delete', ['id'=>$contact->id])); ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <?php echo e(csrf_field()); ?>

                <button class="btn btn-default" value="Delete">Delete</button>
            </form>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>