<?php $__env->startSection('site-title'); ?>
 اعدادات SMTP
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
           <div class="col-lg-12">
               <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-msg','data' => []]); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
           </div>
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">اعدادات SMTP</h4>
                        <form action="<?php echo e(route('admin.general.smtp.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="site_smtp_mail_mailer">نوع SMTP</label>
                                <select name="site_smtp_mail_mailer" class="form-control">
                                    <option value="smtp" <?php if(get_static_option('site_smtp_mail_mailer') == 'smtp'): ?> selected <?php endif; ?>><?php echo e(__('SMTP')); ?></option>
                                    <option value="sendmail" <?php if(get_static_option('site_smtp_mail_mailer') == 'sendmail'): ?> selected <?php endif; ?>><?php echo e(__('SendMail')); ?></option>
                                    <option value="mailgun" <?php if(get_static_option('site_smtp_mail_mailer') == 'mailgun'): ?> selected <?php endif; ?>><?php echo e(__('Mailgun')); ?></option>
                                    <option value="postmark" <?php if(get_static_option('site_smtp_mail_mailer') == 'postmark'): ?> selected <?php endif; ?>><?php echo e(__('Postmark')); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_host">مضيف SMTP</label>
                                <input type="text" name="site_smtp_mail_host"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_host')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_port">المنفذ SMTP </label>
                                 <select name="site_smtp_mail_port" class="form-control">
                                    <option value="587" <?php if(get_static_option('site_smtp_mail_port') == '587'): ?> selected <?php endif; ?>><?php echo e(__('587')); ?></option>
                                    <option value="465" <?php if(get_static_option('site_smtp_mail_port') == '465'): ?> selected <?php endif; ?>><?php echo e(__('465')); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_username">اسم المستخدم SMTP</label>
                                <input type="text" name="site_smtp_mail_username"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_username')); ?>" id="site_smtp_mail_username">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_password">كلمة المرور SMTP</label>
                                <input type="password" name="site_smtp_mail_password"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_password')); ?>" id="site_smtp_mail_password">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_encryption">التشفير SMTP</label>
                                 <select name="site_smtp_mail_encryption" class="form-control">
                                    <option value="ssl" <?php if(get_static_option('site_smtp_mail_encryption') == 'ssl'): ?> selected <?php endif; ?>><?php echo e(__('SSL')); ?></option>
                                    <option value="tls" <?php if(get_static_option('site_smtp_mail_encryption') == 'tls'): ?> selected <?php endif; ?>><?php echo e(__('TLS')); ?></option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> بريد تجريبي</h4>
                        <form action="<?php echo e(route('admin.general.smtp.settings.test')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="email">البريد الالكتروني</label>
                                <input type="email" name="email"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="subject">الموضوع</label>
                                <input type="text" name="subject"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="message">الرسالة</label>
                                <textarea name="message" class="form-control"  cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/backend/general-settings/smtp-settings.blade.php ENDPATH**/ ?>