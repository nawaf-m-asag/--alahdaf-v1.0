    
    <!-- Forms Section - Start -->
    <section class="forms">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 forms__container">
                    <div class="form-box col-lg-12">
                        <h4 class="form-box__title">
                            <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_login')); ?>

                        </h4>
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
                        <form class="form-box__form" action="<?php echo e(route('user.login')); ?>" method="post" enctype="multipart/form-data" id="login_form_order_page">
                            <?php echo csrf_field(); ?>
                            <input type="text"
                                name="username"
                                placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_user_name')); ?>" />
                            <i class="fas fa-user fa-3x form-box__form--icon-1"></i>
                            <input type="password"
                                name="password"
                                placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_password')); ?>" />
                            <i class="fas fa-lock fa-3x form-box__form--icon-2"></i>
                            <div class="form-row d-flex justify-content-between">
                                <div> <a class="text-decoration-none"
                                    href="<?php echo e(route('user.forget.password')); ?>"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_forgot_password')); ?></a> </div>
                                <div>
                                    <input type="checkbox"
                                        class="form-check-input ms-2 h4 mt-0"
                                        id="check">
                                    <label class="form-check-label h5"
                                        for="check1"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_remember_me')); ?></label>
                                </div>
                            </div>
                            <input type="submit"
                                name="signup_submit"
                                value="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_login_ptn')); ?>"
                                />
                                 <a href="<?php echo e(route('user.register')); ?>"
                                class=" btn border me-3 bg-light text-dark shadow"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_singup_ptn')); ?></a>
                        </form>
                    </div>

                </div>
                <div class="col-lg-4 forms__container">
                    <div class="form-box form-box__search col-lg-12 ">
                        <h4 class="form-box__title"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_search')); ?></h4>
                        <form class="form-box__form " action="<?php echo e(route('frontend.blog.search')); ?>" method="get">
                            <input type="search"
                                name="search"
                                placeholder="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_search_text')); ?>" />
                            <button type="submit"
                                class="form-box__form--icon-1">
                                <i class="fas fa-search"></i>
                            </button>

                            <input type="submit"
                                class="form-box__form--btn"
                                name="search_submit"
                                value="<?php echo e(get_static_option('var_'.$user_select_lang_slug.'_search_input')); ?>" />
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 forms__container">
                    
                    <div class="form-box col-lg-12 p-0">
                        <h4 class="form-box__title"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_chat')); ?></h4>
                                                <script id="__init-script-inline-widget__">(function(d,t,u,s,e){e=d.getElementsByTagName(t)[0];s=d.createElement(t);s.src=u;s.async=1;e.parentNode.insertBefore(s,e);})(document,'script','//alahdaf.co/chat/php/app.php?widget-init-inline.js');</script>



                        
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Forms Section -- End -->

    <!-- Product Section - Start -->
    <section class="products"
        id="products">
        <div class=" container">
            <h2 class="products__title pb-2 my-5 "> <?php echo e(get_static_option('product_category_'.$user_select_lang_slug.'_text')); ?></h2>

            <div class="slider-container">
                <svg class="prev-arrow"
                    xmlns="http://www.w3.org/2000/svg"
                    width="25.685"
                    height="67.412"
                    viewBox="0 0 35.685 67.412">
                    <g transform="translate(1.5 2.121)">
                        <path d="M0,0,32.19,32.064,63.17,0"
                            transform="translate(32.064) rotate(90)"
                            fill="none"
                            stroke="#323131"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="3" />
                    </g>
                </svg>
                <div class="product-slider" id="product-slider">
                   
                  
                <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slider-item col-lg-3 px-3">
                        <a href="<?php echo e(route('frontend.products','id='.$item->id)); ?>"
                            class="text-decoration-none">
                            <div class="card border overflow-hidden">
                                <div class="overlay position-relative">
                                    <?php echo render_image_markup_by_attachment_id($item->image,'card-img-top  fixed-small-size'); ?>

                                    <div class="content w-100 h-100 bg-opacity-50 bg-dark position-absolute top-0">
                                        <div class="transform">
                                            <h1 class="text-light d-inline ms"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_more')); ?></h1>
                                            <svg class="mb-2 me-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="10"
                                                height="25.783"
                                                viewBox="0 0 12.972 25.783">
                                                <defs>
                                                    <style>
                                                        .arrow {
                                                            fill: #fff;
                                                        }

                                                    </style>
                                                </defs>
                                                <path class="arrow"
                                                    d="M24.628,33.236a1.837,1.837,0,0,0,1.415-3.014l-8.232-9.849,7.938-9.868A1.878,1.878,0,1,0,22.791,8.19L13.915,19.215a1.838,1.838,0,0,0,0,2.334L23.1,32.574a1.838,1.838,0,0,0,1.525.662Z"
                                                    transform="translate(-13.497 -7.456)" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title h2 text-dark"><?php echo e($item->title); ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </div>
                <svg class="next-arrow"
                    xmlns="http://www.w3.org/2000/svg"
                    width="25.685"
                    height="67.412"
                    viewBox="0 0 35.685 67.412">
                    <g transform="translate(2.121 2.121)">
                        <path d="M0,32.063,32.19,0,63.17,32.063"
                            transform="translate(32.063) rotate(90)"
                            fill="none"
                            stroke="#323131"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="3" />
                    </g>
                </svg>
            </div>

        </div>

    </section>
    <!-- Product Section - End -->

    <!-- Client Entry Section - Start  -->
    <section style="background-image:url(<?php echo e(asset('assets/bg-section--2-img-2.png')); ?>);" class="client-entry col-12 col-lg-12 col-xl-12" id="clinet-entry">
        <img class="client-entry__bg-img-1"
        src="<?php echo e(asset('assets/bg.svg')); ?>"
        
        alt="background screen wavy">
        <div class="container client-entry__content">
            <div class="col-lg-5 col-md-6 col-sm-8 text-end text-light">
                <h2 class="client-entry__title"><?php echo e(get_static_option('portal_'.$user_select_lang_slug.'_head_top')); ?> </h2>
                <p class=" col-lg-10 client-entry__body text-end mt-3">
                    <?php echo e(get_static_option('portal_'.$user_select_lang_slug.'_head_body')); ?>

                </p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-5 col-md-7">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-6 col-sm-6 col-md-6 ">
                            <a href="<?php echo e(get_static_option('portal_img1_url')); ?>"
                                target="blank"
                                class="w-50 ">
                                <?php echo render_image_markup_by_attachment_id(get_static_option('portal_image_one'),'client-entry__store'); ?>


                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 my-md-0">
                            <a href="<?php echo e(get_static_option('portal_img2_url')); ?>"
                                class="w-50 ">
                                <?php echo render_image_markup_by_attachment_id(get_static_option('portal_image_two'),'client-entry__store'); ?>

                              
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" my-5">
                <div class="col-lg-12 col-md-10 col-sm-8 text-end text-light">
                    <h2 class="client-entry__title"><?php echo e(get_static_option('portal_'.$user_select_lang_slug.'_footer_head')); ?></h2>
                    <p class=" col-lg-8 client-entry__body text-end h3 my-5">
                        <?php echo e(get_static_option('portal_'.$user_select_lang_slug.'_footer_body')); ?>

                    </p>
                </div>
            </div>
            <!-- boxes Section - Start -->
            <div class="boxes"
                id="boxes">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row boxes__box">
                                <?php $__currentLoopData = $all_service_category->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="text-decoration-none text-light col-6 col-lg-3 col-md-3 col-sm-6 mb-4 box-container text-center">
                                                    <?php if($data->icon_type == 'icon' || $data->icon_type == ''): ?>
                                                        <div class="circular">
                                                            <i  class="fa-4x boxes__box--icon <?php echo e($data->icon); ?>"></i>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="circular">
                                                                <?php echo render_image_markup_by_attachment_id($data->img_icon,'w-50'); ?>

                                                        </div> 
                                                    <?php endif; ?>
                                                    <div class="content">
                                                        <h2 class="boxes__box--title text-center">
                                                          <?php echo e($data->name); ?>

                                                        </h2>
                                                    </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- boxes Section - End -->
        </div>
    </section>
    <!-- Entry Section - End -->

    <!-- Article Section - Start -->
    <section class="article d-flex flex-column align-items-center mb-5 bg-white "
        id="article">
        <div class="container">
            <h2 class="article__title pb-3 my-5 ">  <?php echo e(get_static_option('blog_page_'.$user_select_lang_slug.'_name')); ?> </h2>
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
            <div class="row" id="blog_ajax_id">
            <?php $__currentLoopData = $all_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <a href="<?php echo e(route('frontend.blog')); ?>"
            class=" nav-btn fully-rounded--rose px-5 text-muted p-3 h2 text-decoration-none">
            <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_more')); ?>

        </a>
    </section>
    <!-- Article Section - End -->

    <!-- News Section - Start -->
    <section class="news d-flex flex-column align-items-center pb-5 bg-light bg-gradient"
        id="news">
        <div class="container">
            <h2 class="news__title pb-3 my-5 "><?php echo e(filter_static_option_value('home_page_01_'.$user_select_lang_slug.'_latest_news_title',$static_field_data)); ?></h2>

            <div class="row" id="last_news_ajax_id">
                <?php $__currentLoopData = $all_Last_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="last_news-item col-md-6 col-lg-4 mb-5">
                    <a href="<?php echo e(route('frontend.last_news.single',$data->slug)); ?>"
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
        <a href="<?php echo e(route('frontend.last_news')); ?>"
            class=" nav-btn fully-rounded--rose px-5 text-black-50 p-3 h2 text-decoration-none">
            <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_more')); ?>

        </a>
    </section>
    <!-- News Section - End -->
<span id="contactus">
    <!-- Contact-us - Start -->
    <?php echo $__env->make('frontend.partials.contact-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </span>
</main>


<?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/home-pages/home-01.blade.php ENDPATH**/ ?>