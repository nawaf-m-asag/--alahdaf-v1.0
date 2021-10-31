<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
   الخدمات الالكترونية
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> الخدمات الالكترونية</h4>

                        <form action="<?php echo e(route('admin.e-portal.page')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="nav-item nav-link <?php if($key == 0): ?> active <?php endif; ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home-<?php echo e($lang->slug); ?>" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo e($lang->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="nav-home-<?php echo e($lang->slug); ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="about_page_<?php echo e($lang); ?>_about_section_title">العنوان</label>
                                            <input type="text" name="portal_<?php echo e($lang->slug); ?>_head_top" value="<?php echo e(get_static_option('portal_'.$lang->slug.'_head_top')); ?>" class="form-control" id="about_page_<?php echo e($lang->slug); ?>_about_section_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="portal_<?php echo e($lang->slug); ?>_head_body">الوصف</label>
                                            <textarea name="portal_<?php echo e($lang->slug); ?>_head_body" id="portal_<?php echo e($lang->slug); ?>_head_body" class="form-control max-height-150" cols="30" rows="3"><?php echo e(get_static_option('portal_'.$lang->slug.'_head_body')); ?></textarea>

                                
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> العنوان الثاني</label>
                                            <input type="text" name="portal_<?php echo e($lang->slug); ?>_footer_head" value="<?php echo e(get_static_option('portal_'.$lang->slug.'_footer_head')); ?>" class="form-control" id="portal_<?php echo e($lang->slug); ?>_footer_head">
                                        </div>
                                        <div class="form-group">
                                            <label >وصف العنوان الثاني</label>
                                            <textarea name="portal_<?php echo e($lang->slug); ?>_footer_body" id="portal_<?php echo e($lang->slug); ?>_footer_body" class="form-control max-height-150" cols="30" rows="3"><?php echo e(get_static_option('portal_'.$lang->slug.'_footer_body')); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label> رابط الصورة لاولى </label>
                                            <input type="text" name="portal_img1_url" value="<?php echo e(get_static_option('portal_img1_url')); ?>" class="form-control" id="portal_img1_url">
                                        </div>
                                        <div class="form-group">
                                            <label>  رابط الصورة الثانية  </label>
                                            <input type="text" name="portal_img2_url" value="<?php echo e(get_static_option('portal_img2_url')); ?>" class="form-control" id="portal_img2_url">
                                        </div>
                                        <div class="form-group">
                                            <label>  رابط بوابة الخدمات الاكترونية  </label>
                                            <input type="text" name="portal_url" value="<?php echo e(get_static_option('portal_url')); ?>" class="form-control" id="portal_url">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="form-group">
                                <label for="portal_image_one">الصورة لليسار</label>
                                <?php $signature_image_upload_btn_label = 'Upload Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $signature_img = get_attachment_image_by_id(get_static_option('portal_image_one'),null,false);
                                        ?>
                                        <?php if(!empty($signature_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($signature_img['img_url']); ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $signature_image_upload_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="portal_image_one" value="<?php echo e(get_static_option('portal_image_one')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="تحديد" data-modaltitle="رفع صورة" data-imgid="<?php echo e(get_static_option('portal_image_one')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        رفع صورة
                                    </button>
                                </div>
                                <small>حجم الصورة الموصى به هو 360x480 بكسل</small>
                            </div>
                            <div class="form-group">
                                <label for="portal_image_two">الصورة لليمين</label>
                                <?php $signature_image_upload_btn_label = 'Upload Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $signature_img = get_attachment_image_by_id(get_static_option('portal_image_two'),null,false);
                                        ?>
                                        <?php if(!empty($signature_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($signature_img['img_url']); ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $signature_image_upload_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="portal_image_two" value="<?php echo e(get_static_option('portal_image_two')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="تحديد" data-modaltitle="رفع صورة" data-imgid="<?php echo e(get_static_option('portal_image_two')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        رفع صورة
                                    </button>
                                </div>
                                <small>حجم الصورة الموصى به هو 360x480 بكسل</small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <script>
        $(document).ready(function () {
            
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/backend/pages/about-page/e-portal.blade.php ENDPATH**/ ?>