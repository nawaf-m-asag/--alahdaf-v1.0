<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
   صلاحيات المستخدمين
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php
    $all_permission_list = array(
       
        "Admin Manage",
        "About Page Manage",
        "Users Manage",
       
       
        
       
      
        "Menus Manage",
        "Widgets Manage",
       
       
        "Blogs Manage",
       
       
        "Products Manage",
       
        
        
        "Topbar Settings",
        "Home Page Manage",
        "Contact Page Manage",
        
        "Services",
       
        "Gallery Page",
        "404 Page Manage",
       
      
        
        
        "Testimonial",
       
        "General Settings",
       
        
       
        
        "Email Templates",
    );
?>

    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">صلاحيات المستخدمين</h4>
                        <div class="data-tables datatable-primary">
                            <table id="all_user_table" class="table table-default">
                                <thead class="text-capitalize">
                                <tr>
                                    <th><?php echo e(__('المعرف')); ?></th>
                                    <th><?php echo e(__('الصلاحية')); ?></th>
                                    <th><?php echo e(__('الاذونات')); ?></th>
                                    <th><?php echo e(__('العمليات')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $all_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->id); ?></td>
                                            <td><?php echo e($data->name); ?></td>
                                            <td>
                                               <div class="permission-show">
                                                   <?php $all_per = json_decode($data->permission); ?>
                                                   <?php $__currentLoopData = $all_per; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <span class="text text-success"><?php echo e(ucwords(str_replace('_',' ',$per))); ?></span>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               </div>
                                            </td>
                                            <td>
                                                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-popover','data' => ['url' => route('admin.user.role.delete',$data->id)]]); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.user.role.delete',$data->id))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                                <a href="#"
                                                   data-id="<?php echo e($data->id); ?>"
                                                   data-name="<?php echo e($data->name); ?>"
                                                   data-permission="<?php echo e($data->permission); ?>"
                                                   data-toggle="modal"
                                                   data-target="#user_edit_modal"
                                                   class="btn btn-lg btn-primary btn-sm mb-3 mr-1 user_edit_btn"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6  mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">اضافة صلاحية جديدة</h4>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('admin.all.user.role')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name">اسم الصلاحية</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="ادخل اسم الصلاحية">
                            </div>
                            <div class="form-group">
                                <label for="permission">الاذونات</label>
                                <select name="permission[]" multiple id="permission" class="form-control nice-select wide">
                                    <?php $__currentLoopData = $all_permission_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(strtolower(str_replace(' ','_',$per))); ?>"><?php echo e($per); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="info-text">حدد اي صفحة يمكن ان يراها صاحب هذه الصلاحية</div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">اضافة صلاحية</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تحرير الصلاحية</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.user.role.edit')); ?>" id="user_edit_modal_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="admin_role_id" id="admin_role_id">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="edit_name">اسم الصلاحية</label>
                            <input type="text" class="form-control"  id="edit_name" name="name" placeholder="ادخل اسم الصلاحية">
                        </div>
                        <div class="form-group">
                            <label for="edit_permission">الاذونات</label>
                            <select name="permission[]" multiple id="edit_permission" class="form-control nice-select wide">
                                <?php $__currentLoopData = $all_permission_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(strtolower(str_replace(' ','_',$per))); ?>"><?php echo e($per); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="info-text">حدد اي صفحة يمكن ان يراها صاحب هذة الصلاحية</div>
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

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/jquery.nice-select.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click','.user_edit_btn',function(){
                var el = $(this);
                var form = $('#user_edit_modal_form');
                var permission = el.data('permission');
                form.find('#admin_role_id').val(el.data('id'));
                form.find('#edit_name').val(el.data('name'));
                $.each(permission,function (index,value) {
                form.find('#edit_permission option[value="'+value+'"]').attr('selected',true);
                });
                $('#edit_permission').niceSelect('update');
            });

            if($('.nice-select').length > 0){
                $('.nice-select').niceSelect();
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/backend/user-role-manage/admin-role.blade.php ENDPATH**/ ?>