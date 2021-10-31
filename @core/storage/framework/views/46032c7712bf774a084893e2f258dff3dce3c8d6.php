<?php if(!empty(filter_static_option_value('home_page_contact_section_status',$static_field_data))): ?>
<section class="contact-us">

    <div class="container">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="news__title pb-3 my-5 "><?php echo e(filter_static_option_value('home_page_01_'.$user_select_lang_slug.'_contact_area_title',$static_field_data)); ?></h2>
                    </div>
                </div>
            </div>
            <form action="<?php echo e(route('frontend.get.touch')); ?>" id="get_in_touch_form" method="post" enctype="multipart/form-data"
                class="contact-us__form">
                <div class="error-message"></div>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="captcha_token" id="gcaptcha_token">
                <div class="row">
                    <div id="contact_us" class="col-lg-12">
                        <style>
                            #your-phone{
                                height: 40px;
                                font-size: 15px;
                            }
                            input{
                                color: black;
                            }
                        </style>
                        
                        <?php echo render_form_field_for_frontend(filter_static_option_value('get_in_touch_form_fields',$static_field_data)); ?>

                    </div>
                    <div class="col-lg-12">
                        <div class="btn-wrapper">
                            <input type="submit" id="get_in_touch_submit_btn"
                            class="btn"
                            name="signup_submit"
                            value="<?php echo e(filter_static_option_value('home_page_01_'.$user_select_lang_slug.'_contact_area_button_text',$static_field_data)); ?>" />
                            
                            <div class="ajax-loading-wrap hide">
                                <div class="sk-fading-circle">
                                    <div class="sk-circle1 sk-circle"></div>
                                    <div class="sk-circle2 sk-circle"></div>
                                    <div class="sk-circle3 sk-circle"></div>
                                    <div class="sk-circle4 sk-circle"></div>
                                    <div class="sk-circle5 sk-circle"></div>
                                    <div class="sk-circle6 sk-circle"></div>
                                    <div class="sk-circle7 sk-circle"></div>
                                    <div class="sk-circle8 sk-circle"></div>
                                    <div class="sk-circle9 sk-circle"></div>
                                    <div class="sk-circle10 sk-circle"></div>
                                    <div class="sk-circle11 sk-circle"></div>
                                    <div class="sk-circle12 sk-circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>  
</section>   
<?php endif; ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('#contact_us input').addClass('mb-2');
            $(document).on('click', '#get_in_touch_submit_btn', function (e) {
                e.preventDefault();
                var myForm = document.getElementById('get_in_touch_form');
                var formData = new FormData(myForm);

                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('frontend.get.touch')); ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap').removeClass('hide').addClass('show');
                    },
                    success: function (data) {
                        var errMsgContainer = $('#get_in_touch_form').find('.error-message');
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        errMsgContainer.html('');

                        if(data.status == '400'){
                            errMsgContainer.append('<span class="text-danger">'+data.msg+'</span>');
                        }else{
                            errMsgContainer.append('<span class="text-success">'+data.msg+'</span>');
                        }
                    },
                    error: function (data) {
                        var error = data.responseJSON;
                        var errMsgContainer = $('#get_in_touch_form').find('.error-message');
                        errMsgContainer.html('');
                        $.each(error.errors,function (index,value) {
                            errMsgContainer.append('<span class="text-danger">'+value+'</span>');
                        });
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/partials/contact-section.blade.php ENDPATH**/ ?>