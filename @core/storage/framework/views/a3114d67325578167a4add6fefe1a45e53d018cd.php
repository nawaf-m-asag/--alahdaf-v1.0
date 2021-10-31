<section class="hero">
    <!-- Carousel - Start -->
    <?php
        $all_testimonial=App\Testimonial::where('lang', $user_select_lang_slug)->orderBy('id', 'desc')->take(get_static_option('about_page_testimonial_item'))->get();
    ?> 

    <div class="carousel slide h-100" id="slider" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button type="button"
            data-bs-target="#slider"
            data-bs-slide-to="<?php echo e($i); ?>"
            class="active slide__btn"
            aria-label="Slide <?php echo e($i+1); ?>"
            <?php if($i==0): ?>
            aria-current="true"
            <?php else: ?>
            class=" slide__btn"
            <?php endif; ?>
         
            
            >
        </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="carousel-inner">
            <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php if($key==0): ?> active  <?php endif; ?>">
                <?php echo render_image_markup_by_attachment_id($data->image,'slide__img d-block w-100'); ?>

                <div class="hero-content carousel-caption  container col-sm-12">
                    <div class="col-lg-9 col-md-10 text-start text-light">
                        <h1 class="hero-content__title text-end mb-5 fw-bolder">                                    <?php echo e($data->name); ?>

                        </h1>
                        <p class=" col-lg-12 hero-content__body text-end h3 mb-4">
                            <?php echo e($data->description); ?>

                        </p>
                        <a href="<?php echo e($data->designation); ?>" 
                            class=" nav-btn fully-rounded--rose px-5 text-light p-3 h2 text-decoration-none"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_more')); ?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </div>
    </div>
    <?php echo $__env->yieldContent('write_blog'); ?>
</section>
<?php $__env->startSection('script'); ?>
<script>
$('.sidebar .nav-pills > li').addClass('nav-item w-100');
$('.sidebar .nav-pills li a').addClass('nav-link');
$('.sidebar .nav-pills li ul').addClass('submenu dropdown-menu');
$('.sidebar .nav-pills .nav-item ul li').addClass('border-bottom');
$('.sidebar .nav-pills .nav-item ul li a').addClass('nav-link text-white text-center w-100');
$('.footer-widget   a').addClass('text-decoration-none text-white fw-lighter text-light');
</script>
<?php $__env->stopSection(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/partials/slider.blade.php ENDPATH**/ ?>