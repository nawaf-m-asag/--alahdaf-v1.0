<?php $__env->startSection('section'); ?>
    <div class="dashboard-form-wrapper">
        <h2 class="title"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_change_password')); ?></h2>
        <form action="<?php echo e(route('user.password.change')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="old_password"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_old_password')); ?></label></label>
                <input type="password" class="form-control p-3" id="old_password" name="old_password"
                       placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_old_password')); ?>">
            </div>
            <div class="form-group">
                <label for="password"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_new_password')); ?></label>
                <input type="password" class="form-control p-3" id="password" name="password"
                       placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_new_password')); ?>">
            </div>
            <div class="form-group">
                <label for="password_confirmation"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_confirm_password')); ?></label>
                <input type="password" class="form-control p-3" id="password_confirmation"
                       name="password_confirmation" placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_confirm_password')); ?> ">
            </div>
            <button type="submit" class="nav-btn fully-rounded--rose px-5 text-muted p-3 mt-3 h2 text-decoration-none">حفظ</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/user/dashboard/change-password.blade.php ENDPATH**/ ?>