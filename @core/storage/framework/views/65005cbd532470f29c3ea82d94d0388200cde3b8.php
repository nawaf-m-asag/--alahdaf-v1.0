<?php $__env->startSection('site-title'); ?>
منتج جديد
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
    <style>
        .nice-select .option {
            min-height: 30px;
            padding: 0px 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus {
            font-weight: 700;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
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
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash-msg','data' => []]); ?>
<?php $component->withName('flash-msg'); ?>
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
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapper d-flex justify-content-between">
                            <h4 class="header-title">اضافة منتج جديد</h4>
                            <a href="<?php echo e(route('admin.products.all')); ?>" class="btn btn-primary">المنتجات</a>
                        </div>

                        <form action="<?php echo e(route('admin.products.new')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="language"><strong>اللغة</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            <option value="">حدد لغة</option>
                                            <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="<?php echo e(old('title')); ?>" placeholder="ادخل العنوان">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">العوان للمتصفح slug</label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="<?php echo e(old('slug')); ?>" placeholder="ادخل العنوان للمتصفح">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="category">التصنيف</label>
                                        <select name="category_id" class="form-control" id="category">
                                            <option value="">حدد تصنيف</option>
                                        </select>
                                        <span class="info-text">حدد اللغة لتحديد التصنيفات الخاصة بها</span>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="short_description"> الوصف</label>
                                        <textarea name="short_description" id="short_description" class="form-control max-height-120" cols="30" rows="4" placeholder="الوصف "></textarea>
                                    </div>
                                   
                                    
                                    
                                    
                                   
                                    <div class="form-group">
                                        <label for="is_downloadable"><strong>ملف لتنزيل</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="is_downloadable" id="is_downloadable">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <label for="downloadable_file">ملف التنزيل</label>
                                        <input type="file" name="downloadable_file"  class="form-control" id="downloadable_file">
                                        <span class="info-text"><?php echo e(__(' الملفات المسموحة doc,docx,jpg,jpeg,png,mp3,mp4,pdf,txt,zip ')); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags"> العنوان سيو</label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">الوصف سيو</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                    
                                    <div class="dynamic-variant-wrapper"> </div>

                                    <div class="form-group">
                                        <label for="image">الصورة المميزة</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="image">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="تحديد" data-modaltitle="رفع الصورة" data-toggle="modal" data-target="#media_upload_modal">
                                              رفع صورة
                                            </button>
                                        </div>
                                        <small>الحجم الموصى به للصورة هو 1920 × 1280</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">الصور</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap"></div>
                                            <input type="hidden" name="gallery">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="تحديد" data-modaltitle="رف صورة" data-toggle="modal" data-target="#media_upload_modal">
                                               رفع الصورة
                                            </button>
                                        </div>
                                        <small>الحجم الموصى به للصورة هو 1920 × 1280</small>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="status">الحالة</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option value="publish">منشور</option>
                                            <option value="draft">مسودة</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">اضافة</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/jquery.nice-select.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('body .nice-select').niceSelect();

            $(document).on('click', '#productvariantadd', function () {
                var variant = $('#variant_list').val();
                if (variant != '') {
                    $('#productvariantadd').append('<i class="fas fa-spinner fa-spin"></i>');
                    $('#variant_list option[value="'+variant+'"]').attr('disabled',true)
                    //write ajax call
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo e(route('admin.products.variants.details')); ?>",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
                            id : variant
                        },
                        success: function (data) {
                            $('#productvariantadd').find('i').remove();
                            var terms = JSON.parse(data.terms);
                            var markup = '<div class="variant-terms-selector"> <label for="#">'+data.title+'</label><select name="variant['+data.id+'][]" multiple class="form-control nice-select wide">';
                            $.each(terms,function (index,value){
                                markup += ' <option value="'+value+'">'+value+'</option>';
                            })
                            markup += '</select></div>';

                            $('.dynamic-variant-wrapper').append(markup);
                            $('body .nice-select').niceSelect('destroy');
                            $('body .nice-select').niceSelect();
                        }
                    });
                    //
                }
            });
            $(document).on('change','#language',function(e){
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                    url: "<?php echo e(route('admin.products.category.by.lang')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang : selectedLang
                    },
                    success:function (data) {
                        $('#category').html('<option value=""><?php echo e(__('Select Category')); ?></option>');
                        $.each(data,function(index,value){
                            $('#category').append('<option value="'+value.id+'">'+value.title+'</option>')
                        });
                    }
                });

                $.ajax({
                    url: "<?php echo e(route('admin.products.variant.by.lang')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        lang : selectedLang
                    },
                    success:function (data) {
                        $('#variant_list').html('<option value=""><?php echo e(__('Select Variant')); ?></option>');
                        $.each(data,function(index,value){
                            $('#variant_list').append('<option value="'+value.id+'">'+value.title+'</option>')
                        });
                    }
                });

            });
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
            $(document).on('change','#is_downloadable',function (e) {
                e.preventDefault();
                isDownloadableCheck('#is_downloadable');
            });

            $(document).on('click','.attribute-field-wrapper .add_attributes',function (e) {
               e.preventDefault();
                $(this).parent().parent().parent().append(' <div class="attribute-field-wrapper">\n' +
                    '<input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="<?php echo e(__('Title')); ?>">\n' +
                    '<textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="<?php echo e(__('Value')); ?>"></textarea>\n' +
                    '<div class="icon-wrapper">\n' +
                    '<span class="add_attributes"><i class="ti-plus"></i></span>\n' +
                    '<span class="remove_attributes"><i class="ti-minus"></i></span>\n' +
                    '</div>\n' +
                    '</div>');

            });
            $(document).on('click','.attribute-field-wrapper .remove_attributes',function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();

            });

            function isDownloadableCheck($selector) {
                var dnFile = $('#downloadable_file');
                var dnFileUrl = $('#downloadable_file_link');
                if($($selector).is(':checked')){
                    dnFile.parent().show();
                    dnFileUrl.parent().show();
                }else{
                    dnFile.parent().hide();
                    dnFileUrl.parent().hide();
                }
            }
        });
    </script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/backend/products/new-product.blade.php ENDPATH**/ ?>