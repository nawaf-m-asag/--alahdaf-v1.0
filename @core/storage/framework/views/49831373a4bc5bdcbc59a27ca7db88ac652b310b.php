
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
<style>
    input,select{
       font-size: 17px !important;
    }
</style>
<?php $__env->startSection('section'); ?>
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrap d-flex justify-content-between">
                        <h4 class="header-title"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_add_article')); ?></h4>
                       
                    </div>

                    <form action="<?php echo e(route('user.home.blog.new')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-8">
                                
                                <div class="form-group">
                                    <label for="title"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_address')); ?></label>
                                    <input type="text" class="form-control"   required value="<?php echo e(old('title')); ?>" name="title" placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_add_address')); ?>">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_content')); ?></label>
                                  
                                    <textarea   required type="hidden" id="blog_content"  name="blog_content"></textarea>
                                    
                                </div>
                            
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="language"><strong><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_language')); ?></strong></label>
                                    <select name="lang" id="language" class="form-control"  required>
                                       
                                        <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="author"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_writer')); ?></label>
                                    <input type="text"  required class="form-control" name="author" id="author" value=""   placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_add_writer')); ?>">
                                </div>
                                <div class="form-group">
                                
                                    <input value="draft" name="status" id="status" type="hidden" class="form-control">
                                </div>
                                <div class="form-group mt-4 pr-4 pl-4">
                                
                                    <input type="file" name="file" class="form-control">
                                </div>
                               
                                <button type="submit" class=" nav-btn fully-rounded--rose px-5 text-muted p-3 h2 text-decoration-none mt-4 pr-4 pl-4 p-3"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


<script>
     
   
  
        CKEDITOR.replace( 'blog_content' );
  

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/user/dashboard/blog/new.blade.php ENDPATH**/ ?>