<?php $__env->startSection('site-title'); ?>
    إعدادات خريطة الموقع
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">إعدادات خريطة الموقع</h4>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 margin-bottom-40"
                                    data-toggle="modal"
                                    data-target="#user_change_password_modal"
                            >انشاء خريطة الموقع</button>
                        <table class="table table-default">
                            <thead>
                            <th><?php echo e(__('الاسم')); ?></th>
                            <th><?php echo e(__('التاريخ')); ?></th>
                            <th><?php echo e(__('الحجم')); ?></th>
                            <th><?php echo e(__('اجراءات')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $all_sitemap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(basename($data)); ?></td>
                                    <td><?php echo e(date('j F Y - h:m:s',filectime($data))); ?></td>
                                    <td><?php if(trim(formatBytes(filesize($data))) === 'NAN'): ?> <?php echo e(__('0 Byte')); ?> <?php else: ?> <?php echo e(formatBytes(filesize($data))); ?> <?php endif; ?></td>
                                    <td>
                                        <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
                                           role="button"
                                           data-toggle="popover"
                                           data-trigger="focus"
                                           data-html="true"
                                           title=""
                                           data-content="
                                               <h6>هل تريد الحذف</h6>
                                               <form method='post' action='<?php echo e(route("admin.general.sitemap.settings.delete")); ?>'>
                                               <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                               <input type='hidden' name='sitemap_name' value='<?php echo e($data); ?>'>
                                               <br>
                                                <input type='submit' class='btn btn-danger btn-sm' value='نعم'>
                                                </form>
                                                ">
                                            <i class="ti-trash"></i>
                                        </a>
                                        <a href="<?php echo e(asset('sitemap')); ?>/<?php echo e(basename($data)); ?>" download class="btn btn-primary btn-sm mb-3 mr-1"> <i class="fa fa-download"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_change_password_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">انشاء</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.general.sitemap.settings')); ?>" id="user_password_change_modal_form" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">العنوان</label>
                            <input type="text" class="form-control" name="title" placeholder="ادخل العنوان">
                        </div>
                        <div class="form-group">
                            <label for="site_url">الرابط</label>
                            <input type="text" class="form-control" name="site_url" placeholder="ادخل الرابط">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/backend/general-settings/sitemap-settings.blade.php ENDPATH**/ ?>