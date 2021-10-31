<?php $__env->startSection('content'); ?>
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="login-form-head">
                        <div class="logo-wrapper" style="margin-bottom: 40px;">
                            <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                        </div>
                        <h4>تسجيل دخول إلى لوحة التحكم</h4>
                        
                    </div>
                    <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <div class="error-message"></div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">اسم المستخدم</label>
                            <input type="text" id="username" name="username">
                            <i class="ti-email"></i>
                        </div>

                        <div class="form-gp">
                            <label for="password">كلمة المرور</label>
                            <input type="password" id="password" name="password" >
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                    <label class="custom-control-label" for="remember">تذكرني</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="<?php echo e(route('admin.forget.password')); ?>">هل نسيت كلمة المرور</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">تسجيل دخول <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function ($){
            $(document).on('click','#form_submit',function (e){
                e.preventDefault();
                var el = $(this);
                var erContainer = $(".error-message");
                erContainer.html('');
                el.text('Please Wait..');
                $.ajax({
                   url: "<?php echo e(route('admin.login')); ?>",
                   type: "POST",
                   data: {
                       _token : "<?php echo e(csrf_token()); ?>",
                       username : $('#username').val(),
                       password : $('#password').val(),
                       remember : $('#remember').val(),
                   },
                   error:function(data){
                       var errors = data.responseJSON;
                       erContainer.html('<div class="alert alert-danger"></div>');
                       $.each(errors.errors, function(index,value){
                           erContainer.find('.alert.alert-danger').append('<p>'+value+'</p>');
                       });
                       el.text('Login');
                   },
                   success:function (data){
                       $('.alert.alert-danger').remove();
                       if (data.status == 'ok'){
                           el.text('Redirecting..');
                           erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                           location.reload();
                       }else{
                           erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                           el.text('Login');
                       }
                   }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.login-screens', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/auth/admin/login.blade.php ENDPATH**/ ?>