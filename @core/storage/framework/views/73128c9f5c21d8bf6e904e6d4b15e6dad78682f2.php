
<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('product_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('product_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('product_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('product_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_class'); ?>
bg-light
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .card-img-products{
        width:100%;
        height:180px;
    }
</style>
<section class="products mb-0 pb-5">
    <div class="container bg-light">
        <div class="route py-5 h4">
            <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/')); ?>"><?php echo e(get_static_option('var_'.$user_select_lang_slug.'_home')); ?></a>
            / <a class="text-decoration-none text-muted fw-lighter" href="<?php echo e(url('/').'/'.get_static_option('product_category_')); ?>"> <?php echo e(get_static_option('product_category_' . $user_select_lang_slug . '_text')); ?></a>
        </div>
        

        <h2 class="products__title pb-2 mb-5 "><?php echo e(get_static_option('product_category_'.$user_select_lang_slug.'_text')); ?> </h2>

        <?php
            $id=isset($_GET['id'])?$_GET['id']:'';
        ?>
        <div class="accordion" id="accordionExample">
            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             
           
            <div class="accordion-item">
                <h2 class="accordion-header"
                    id="heading<?php echo e($item->id); ?>">
                    <button class="accordion-button text-muted fw-lighter 
                        <?php if($item->id!=$id): ?>
                        collapsed
                        <?php endif; ?>"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo e($item->id); ?>"   
                        aria-expanded="true"
                      
                        aria-controls="collapse<?php echo e($item->id); ?>">
                        <?php echo e($item->title); ?>

                    </button>
                </h2>
                <div id="collapse<?php echo e($item->id); ?>"
                    
                    class="accordion-collapse collapse 
                    <?php if($item->id==$id): ?>
                       show
                    <?php endif; ?>"
                    aria-labelledby="heading<?php echo e($item->id); ?>"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            
                            <?php $__currentLoopData = $all_products->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                             <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                 <?php if($data->category_id==$item->id): ?>
                                    <div class="col-lg-3 col-sm-6 col-md-4 border-bottom  border-start  p-md-3 p-lg-5 p-sm-1 p-1">
                                                <?php echo render_image_markup_by_attachment_id($data->image,'card-img-products','grid'); ?>

                                        <h3 class="px-4 py-1"><?php echo e($data->title); ?></h3>
                                        <a href="<?php echo e(route('frontend.products.single',$data->slug)); ?>"
                                            class="fully-rounded--rose text-decoration-none text-muted px-4 py-1 mb-3 ">
                                            <?php echo e(get_static_option('var_'.$user_select_lang_slug.'_details')); ?>

                                        </a>
                                        <?php if($data->downloadable_file!=null): ?>
                                        <a href="<?php echo e(route('products.file.download',$data->id)); ?>"
                                            class="fully-rounded-bg--rose text-decoration-none text-light px-4 py-1 ">
                                            PDF
                                        </a>    
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </div>
    </div>
</section>
</main>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alahdaf/public_html/@core/resources/views/frontend/pages/products/products.blade.php ENDPATH**/ ?>