
<?php
  $post_img = null;
  $blog_image = get_attachment_image_by_id($last_news_post->image,"full",false);
  $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
 ?>

<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url"  content="<?php echo e(route('frontend.blog.single',$last_news_post->slug)); ?>" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="<?php echo e($last_news_post->title); ?>" />
    <meta property="og:image" content="<?php echo e($post_img); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($last_news_post->meta_description); ?>">
    <meta name="tags" content="<?php echo e($last_news_post->meta_tag); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e($last_news_post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($last_news_post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<style>
    .post-meta{
    
        height: 30px;
      
    }
     .post-meta li{
         display: block;
         float: right;
         margin: 10px;
         text-decoration: none;
     }
     .post-meta li a{

         text-decoration: none;
     }
     .social-share{
        height: 30px;
     }
     .social-share li{
        display: block;
         float: right;
         margin: 10px;
         text-decoration: none;
     }
 </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
      <!-- Single-Page Article - Start -->
      <div class="single-page py-5">
        <div class="container bg-white ">
            <div class="col-md-12">
                <div class="route py-5 h4">
                    <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/')); ?>"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_home')); ?></a>
                    / <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/').'/'.get_static_option('blog_page_slug')); ?>"> <?php echo e(get_static_option('home_page_14_' . $user_select_lang_slug . '_news_area_section_title')); ?></a>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?php if(!empty($blog_image)): ?>
                        <img class="single-page__img rounded shadow-2-strong mb-4" src="<?php echo e($blog_image['img_url']); ?>" alt="<?php echo e(__($last_news_post->title)); ?>">
                    <?php endif; ?>
                           <h1 class="border-bottom pb-4"><?php echo e($last_news_post->title); ?></h1>
                 
                        <!-- avatar -->
                        <div class=" pt-4">
                            <div class="row">
                            <div class="col-6">
                                <ul class="post-meta">
                                    <li><i class="fas fa-calendar-alt"></i> <?php echo e(date_format($last_news_post->created_at,'d M Y')); ?></li>
                                    <li><i class="fas fa-user"></i> <?php echo e($last_news_post->author); ?></li>
                                   
                                </ul> 
                            </div>    
                            <div class="col-6">

                                <ul class="social-share">
                                    <li class="title"><?php echo e(get_static_option('blog_single_page_'.$user_select_lang_slug.'_share_title')); ?></li>
                                    <?php echo single_post_share(route('frontend.blog.single',$last_news_post->slug),$last_news_post->title,$post_img); ?>

                                </ul>
                            </div>
                            
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="single-page__body">
                            <?php echo $last_news_post->content; ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/pages/last_news/last_news-single.blade.php ENDPATH**/ ?>