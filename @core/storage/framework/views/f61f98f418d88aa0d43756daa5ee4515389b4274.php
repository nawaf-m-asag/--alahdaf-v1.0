<?php if(!empty(get_static_option('about_page_about_us_section_status'))): ?>
<section class="about-us">
    <div class="section-1">
        <div class="container">

            <div class="route py-5 pt-5 h4">
                <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/')); ?>"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_home')); ?></a>
                / <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/').'/'.get_static_option('about_page_slug')); ?>">  <?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_name')); ?></a>
            </div>

            <div class="col-12 text-center">
                <h1 class="about-us__title pb-2 mb-5"> <?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_about_section_title')); ?></h1>

                <p class="about-us__paragraph mb-5 text-dark"><?php echo get_static_option('about_page_'.$user_select_lang_slug.'_about_section_description'); ?>


                 </p>

                <!-- boxes Section - Start -->
                <?php if(!empty(get_static_option('about_page_key_feature_section_status'))): ?>
                <div class="header-bottom-area padding-bottom-80 padding-top-80">
                    <div class="container">
                        <div class="row no-gutters">
                            <?php $a = 1;?>
                            <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="single-header-bottom-item-02">
                                        <div class="icon style-0<?php echo e($a); ?>">
                                            <i class="<?php echo e($data->icon); ?>"></i>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><?php echo e($data->title); ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php if($a == 4){$a=1;}else{$a++;} ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
                <!-- boxes Section - End -->
            </div>
        </div>
    </div>

    <div class="section-2">
        <div class="row">
            <div class="col-12 col-md-5 section-2__right-side">
                <?php echo render_image_markup_by_attachment_id(get_static_option('about_page_global_network_image','section-2__right-side--img')); ?>

            </div>

            <div class="col-12 col-md-7 section-2__left-side">
                <div class="container">
                    <h2><?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_global_network_title')); ?></h2>
                    <p class="about-us__paragraph mb-5"> <?php echo get_static_option('about_page_'.$user_select_lang_slug.'_global_network_description'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="section-3 my-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 section-3__right-side order-1 order-lg-0">
                    <?php echo render_image_markup_by_attachment_id(get_static_option('about_page_image_one'),'section-3__right-side--img-1'); ?>

                    <?php echo render_image_markup_by_attachment_id(get_static_option('about_page_image_two'),'section-3__right-side--img-2'); ?>

                </div>

                <div class="col-12 col-lg-6 section-3__left-side order-0 order-lg-1">
                    <div class="container text-center">
                        <h1 class="about-us__title pb-2 mb-5"> <?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_team_member_section_title')); ?></h1>
                        <p class="about-us__paragraph mb-5 text-dark"><?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_team_member_section_description')); ?></p>
                        <h1 class="about-us__title pb-2 mb-5"><?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_experience_title')); ?></h1>
                        <p class="about-us__paragraph mb-5 text-dark">
                            <?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_experience_description')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-4 py-4">
        <div class="container text-center text-white">
            <h1 class=" pb-2 mb-5"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us')); ?></h1>
            <p class="about-us__paragraph mb-5">
                <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us_text')); ?>

            </p>

            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4 mt-3 mt-sm-2 mt-md-2 mt-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="pb-2 mb-5 text-dark"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us_card1_head')); ?></h1>
                            <p class="about-us__paragraph text-dark">
                                <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us_card1_body')); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mt-3 mt-sm-2 mt-md-2 mt-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="pb-2 mb-5 text-dark"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us_card2_head')); ?></h1>
                            <p class="about-us__paragraph mb-5 text-dark"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us_card2_body')); ?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mt-3 mt-sm-2 mt-md-2 mt-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="pb-2 mb-5 text-dark"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us_card3_head')); ?></h1>
                            <p class="about-us__paragraph mb-5 text-dark"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_about_us_card3_body')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty(get_static_option('contact_page_contact_section_status'))): ?>
    <div class="section-5">
        <div class="container my-4">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <style>
                        iframe{
                            width:100%;
                            height:450px;
                        }
                    </style>
                        <?php echo render_embed_google_map(get_static_option('contact_page_map_section_location'),get_static_option('contact_page_map_section_zoom')); ?>

          
                </div>
                <div class="col-12 col-lg-5">
                    <div class="container p-5">
                        <h2 class="about-us__title pb-2 mb-5 text-dark"><?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_form_section_title')); ?></h2>
                        <?php if(!empty(get_static_option('contact_page_contact_info_section_status'))): ?>
                        <div class="inner-contact-section">
                            
                            
                                <div class="row">
                                    <?php $a = 1;?>
                                    <?php $__currentLoopData = $all_contact_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-12 col-lg-12 p-1">
                                            <div class="single-contact-item">
                                                <div class="icon style-0<?php echo e($a); ?>">
                                                    <i class="<?php echo e($data->icon); ?>"></i>
                                                </div>
                                                <div class="content p-3">
                                                    <span class="title"><?php echo e($data->title); ?></span>
                                                    <?php
                                                        $info_details = !empty($data->description) ? explode("\n",$data->description) : [];
                                                    ?>
                                                    <?php $__currentLoopData = $info_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="details"><?php echo e($item); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($a == 4){$a =1;}else{$a++;} ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            
                    
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/partials/about-page-content.blade.php ENDPATH**/ ?>