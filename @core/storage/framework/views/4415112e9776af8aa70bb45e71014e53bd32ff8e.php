
<?php $__env->startSection('site-title'); ?>
    <?php echo e($product->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/toastr.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($product->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($product->meta_tags); ?>">
    <meta name="tags" content="<?php echo e($product->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <style>
    
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url" content="<?php echo e(route('frontend.products.single',$product->slug)); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php echo e($product->title); ?>"/>
    <?php echo render_og_meta_image_by_attachment_id($product->image); ?>

    <?php
        $post_img = null;
        $blog_image = get_attachment_image_by_id($product->image,"full",false);
        $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="single-product">
        

        <div class="container">
            <div class="row">
                <div class="route py-5 h4">
                    <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/')); ?>"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_home')); ?></a>
                    / <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/').'/'.get_static_option('product_category_')); ?>"> <?php echo e(get_static_option('product_category_' . $user_select_lang_slug . '_text')); ?></a>
                </div>
                <div class="single-product__right-side col-12 col-lg-6">
                    <div class="slider slider-single">
                    <?php if(!empty($product->gallery)): ?>
                        <?php
                            $product_gllery_images = !empty( $product->gallery) ? explode('|', $product->gallery) : [];
                        ?>    
                        <?php $__currentLoopData = $product_gllery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="img-container">
                            <?php echo render_image_markup_by_attachment_id($gl_img,'slider-single__img','large'); ?>

                        </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="slider slider-nav p-5">
                        <?php $__currentLoopData = $product_gllery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php echo render_image_markup_by_attachment_id($gl_img,'slider-nav__img','thumb'); ?>

                        </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <?php else: ?>
                    <div class="img-container">
                        <?php echo render_image_markup_by_attachment_id($product->image,'','large'); ?>

                    </div>
                <?php endif; ?>
                </div>

                <div class="single-product__left-side col-12 col-lg-6">
                    <p class="single-product__left-side--short-description">
                    <?php echo e($product->short_description); ?>

                    </p>

                    <div class="share-wrap">
                        <ul class="single-product__left-side--social-media">
                            <li class="title"><?php echo e(__('Share')); ?>:</li>
                            <?php echo single_post_share(route('frontend.blog.single',$product->slug),$product->title,$post_img); ?>

                        </ul>
                     </div>
                    
                </div>
                
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/pages/products/product-single.blade.php ENDPATH**/ ?>