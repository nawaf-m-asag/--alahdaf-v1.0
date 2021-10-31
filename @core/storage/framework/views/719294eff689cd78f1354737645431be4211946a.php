
<?php $__env->startSection('page-title'); ?>
    <?php echo e($search_term); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
 .post-meta{
    
    height: 30px;
  
}
 .post-meta li{
     display: block;
     float: right;
     margin: 5px;
     text-decoration: none;

 }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-top-100 padding-bottom-80">
        <div class="container">
            <div class="row">
                
                    <div class="route my-5 h4">
  
                        <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/')); ?>"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_home')); ?></a>
                        / <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/').'/'.get_static_option('blog_page_slug')); ?>"> <?php echo e(get_static_option('blog_page_' . $user_select_lang_slug . '_name')); ?></a>
                        </div>
                        <?php if(count($all_blogs) < 1): ?>
                            <div class="alert alert-danger">
                                <?php echo e(__('Nothing found related to').' '.$search_term); ?>

                            </div>
                        <?php endif; ?>
                        <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-item col-md-6 col-lg-4 mb-5">
                            <a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"
                                class="text-decoration-none ">
                                <div class="card border overflow-hidden shadow bg-light bg-gradient">
                                    <div class="overlay position-relative">
                                        <?php echo render_image_markup_by_attachment_id($data->image,'card-img-top'); ?>

                                        <div class="content w-100 h-100 bg-opacity-50 bg-dark position-absolute top-0">
                                            <div class="transform">
                                                <h1 class="text-light d-inline ms"><?php echo e(get_static_option('blog_page_'.$user_select_lang_slug.'_read_more_btn_text')); ?></h1>
                                                <svg class="mb-2 me-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="10"
                                                    height="25.783"
                                                    viewBox="0 0 12.972 25.783">
                                                    <path class="arrow"
                                                        d="M24.628,33.236a1.837,1.837,0,0,0,1.415-3.014l-8.232-9.849,7.938-9.868A1.878,1.878,0,1,0,22.791,8.19L13.915,19.215a1.838,1.838,0,0,0,0,2.334L23.1,32.574a1.838,1.838,0,0,0,1.525.662Z"
                                                        transform="translate(-13.497 -7.456)" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                  
                                         
        
                                        
        
                                        <h4 class="title text-right text-dark mb-4">
                                            <?php echo e($data->title); ?>

                                        </h4>
                                        <ul class="card-text date text-muted post-meta mb-3 w-100 h-30">
                                            <li><i class="fas fa-calendar-alt"></i> <?php echo e(date_format($data->created_at,' Y / m / d')); ?></li>
                                            <li><i class="fas fa-user"></i> <?php echo e($data->author); ?></li>
                                            <li>
                                                <div class="cats">
                                                    <i class="fas fa-folder"></i>
                                                    <?php echo get_blog_category_by_id($data->blog_categories_id,'name'); ?>

                                                </div>
                                            </li>
                                        </ul>
                                        <p class="card-text text-muted content pb-5 fw-lighter" id="content">
                                            <?php if(strlen($data->excerpt) > 200): ?>
                                                <?php echo e(mb_substr($data->excerpt, 0, 200, 'utf-8')); ?><span style="display: none;"><?php echo e(mb_substr($data->excerpt, 200, null, 'utf-8')); ?></span> ...</span>
                                            <?php else: ?>
                                                <?php echo e($data->excerpt); ?>

                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                    </div>
                   
               
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/pages/blog/blog-search.blade.php ENDPATH**/ ?>