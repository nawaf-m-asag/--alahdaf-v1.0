
<?php $__env->startSection('page-title'); ?>
   <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_forgot_password')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h2><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_forgot_password')); ?></h2>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('user.forget.password')); ?>" method="post" enctype="multipart/form-data" class="account-form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_user_name')); ?>">
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" class=" nav-btn fully-rounded--rose px-5 text-muted p-3 h2 text-decoration-none"><?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_form_submit_btn_text')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/user/forget-password.blade.php ENDPATH**/ ?>