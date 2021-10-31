@extends('frontend.frontend-page-master')
@section('site-title')
    {{$product->title}}
@endsection
@section('style')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/toastr.css')}}">
@endsection
@section('page-title')
    {{$product->title}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{$product->meta_tags}}">
    <meta name="tags" content="{{$product->meta_description}}">
@endsection
@section('style')
  <style>
    
  </style>
@endsection
@section('og-meta')
    <meta property="og:url" content="{{route('frontend.products.single',$product->slug)}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$product->title}}"/>
    {!! render_og_meta_image_by_attachment_id($product->image) !!}
    @php
        $post_img = null;
        $blog_image = get_attachment_image_by_id($product->image,"full",false);
        $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
    @endphp
@endsection
@section('content')

    <section class="single-product">
        

        <div class="container">
            <div class="row">
                <div class="route py-5 h4">
                    <a class="text-decoration-none text-muted fw-lighter" href="{{url('/')}}">{{get_static_option('var_'.$user_select_lang_slug.'_home')}}</a>
                    / <a class="text-decoration-none text-muted fw-lighter" href="{{url('/').'/'.get_static_option('product_category_')}}"> {{get_static_option('product_category_' . $user_select_lang_slug . '_text')}}</a>
                </div>
                <div class="single-product__right-side col-12 col-lg-6">
                    <div class="slider slider-single">
                    @if(!empty($product->gallery))
                        @php
                            $product_gllery_images = !empty( $product->gallery) ? explode('|', $product->gallery) : [];
                        @endphp    
                        @foreach($product_gllery_images as $gl_img)
                        <div class="img-container">
                            {!! render_image_markup_by_attachment_id($gl_img,'slider-single__img','large') !!}
                        </div>
                         @endforeach

                    </div>
                    <div class="slider slider-nav p-5">
                        @foreach($product_gllery_images as $gl_img)
                        <div>
                            {!! render_image_markup_by_attachment_id($gl_img,'slider-nav__img','thumb') !!}
                        </div>
                         @endforeach
                        
                    </div>
                    @else
                    <div class="img-container">
                        {!! render_image_markup_by_attachment_id($product->image,'','large') !!}
                    </div>
                @endif
                </div>

                <div class="single-product__left-side col-12 col-lg-6">
                    <p class="single-product__left-side--short-description">
                    {{$product->short_description}}
                    </p>

                    <div class="share-wrap">
                        <ul class="single-product__left-side--social-media">
                            <li class="title">{{__('Share')}}:</li>
                            {!! single_post_share(route('frontend.blog.single',$product->slug),$product->title,$post_img) !!}
                        </ul>
                     </div>
                    
                </div>
                
            </div>
        </div>
    </section>
@endsection


