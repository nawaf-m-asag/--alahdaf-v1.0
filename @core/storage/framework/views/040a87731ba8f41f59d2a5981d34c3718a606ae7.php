
<?php $__env->startSection('site-title'); ?>
<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="news mb-0 pb-5">
    <div class="container">
        <div class="route py-5 h4">
            <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/')); ?>"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_home')); ?></a>
            / <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/').'/'.get_static_option('blog_page_slug')); ?>"> <?php echo e(get_static_option('home_page_14_' . $user_select_lang_slug . '_news_area_section_title')); ?></a>
        </div>

        <h2 class="news__title pb-2 mb-5 "><?php echo e(get_static_option('home_page_14_' . $user_select_lang_slug . '_news_area_section_title')); ?></h2>
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
         </style>
<div id="last_news_id" class="col-md-12">
     <?php $__currentLoopData = $all_last_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="last_news-item card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 col-sm-12">
                        <?php echo render_image_markup_by_attachment_id($item->image,'card-img img-fluid rounded-start w-100'); ?>

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title h1"><?php echo e($item->title); ?></h5>
                            <div class="w-100">
                                <ul class="card-text date text-muted post-meta mb-3 w-100 h-30">
                                    <li><i class="fas fa-calendar-alt"></i> <?php echo e(date_format($item->created_at,' Y / m / d')); ?></li>
                                    <li><i class="fas fa-user"></i> <?php echo e($item->author); ?></li>
                    
                                </ul>
                            </div>
                            <p class="card-text h5 lead mb-5 text-muted"> <?php echo e($item->excerpt); ?></p>
                            <div class="container my-4">
                                <div style="float:left" class="d-flex justify-content-between align-items-center pt--5">
                                    
                                    <a href="<?php echo e(route('frontend.last_news.single',$item->slug)); ?>"
                                        class=" nav-btn fully-rounded--rose px-5 text-black-50 p-3 h2 text-decoration-none">
                                        <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_more')); ?>

                                    </a>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>  
        <div id="spinner" class="text-center">
            <div class="spinner-border" role="status">
              <span class="sr-only"><?php echo e(__('Loading...')); ?></span>
            </div>
          </div>
    </div>

</section>

</main>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function(){   

    $('.footer').hide();
    $(window).on('scroll', function () {
  
        if ($(window).scrollTop() == ( $(document).height() - $(window).height())) {
            last_news_ajax();
        }

       
    });
    
}); 


function last_news_ajax() {
        var offset=$('.last_news-item').length;
                $.ajax({
                type: "GET",
                 url: "<?php echo e(route('frontend.last_news.json')); ?>",
                cache: false,               
                data:'offset='+offset+'&cat=all',
                dataType:'json',
                success:function(json){
                   
                if(json.length==0){
                    $('#spinner').hide();
                    $('.footer').show();
                }
                
                
                $.each(json, function(i,row){
                    var html=`
            <div class="last_news-item card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 col-sm-12">
                        `+row.image+`
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title h1">`+row.title+`</h5>
                            <div class="w-100">
                                        <ul class="card-text date text-muted post-meta mb-3 w-100 h-30">
                                            <li><i class="fas fa-calendar-alt"></i> `+row.date+` </li>
                                            <li><i class="fas fa-user"></i> `+row.author+ `</li>
                                        </ul>
                                    </div>
                            <p class="card-text h5 lead mb-5 text-muted"> `+row.excerpt+`</p>
                            <div class="container my-4">
                                <div style="float:left" class="d-flex justify-content-between align-items-center pt--5">
                                    
                                    <a href="`+row.slug+`"
                                        class=" nav-btn fully-rounded--rose px-5 text-black-50 p-3 h2 text-decoration-none">
                                        <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_more')); ?>

                                    </a>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
         `;
                    if(offset==0 &&i==0){ 
                        $('#spinner').show();
                        $('.footer').hide();     
                    }else{
                        $('#last_news_id').append(html).fadeIn('slow');     
                    }        
                  
                        }); 
                 }
   

    

        }); 
    } 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/pages/last_news/last_news.blade.php ENDPATH**/ ?>