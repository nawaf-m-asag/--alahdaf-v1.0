<?php $__env->startSection('site-title'); ?>
    لوحة التحكم
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.new.user')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($total_admin); ?></span>
                                    <h4 class="title">الادارة </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.blog.new')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-layout-width-default"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($blog_count); ?></span>
                                    <h4 class="title">الاخبار</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   
                  
                    <?php if(!empty(get_static_option('product_module_status'))): ?>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.products.new')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-package"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($total_products); ?></span>
                                    <h4 class="title">المنتجات</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <?php endif; ?>
                   
                  
                </div>
            </div>
        </div>
     
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/backend/admin-home.blade.php ENDPATH**/ ?>