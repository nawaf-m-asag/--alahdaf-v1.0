@extends('frontend.frontend-page-master')
@php
  $post_img = null;
  $blog_image = get_attachment_image_by_id($blog_post->image,"full",false);
  $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
 @endphp

@section('og-meta')
    <meta property="og:url"  content="{{route('frontend.blog.single',$blog_post->slug)}}" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="{{$blog_post->title}}" />
    <meta property="og:image" content="{{$post_img}}" />
@endsection
@section('page-meta-data')
    <meta name="description" content="{{$blog_post->meta_description}}">
    <meta name="tags" content="{{$blog_post->meta_tag}}">
@endsection
@section('site-title')
    {{$blog_post->title}}
@endsection
@section('page-title')
    {{$blog_post->title}}
@endsection
@section('style')
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
@endsection
@section('write_blog')
<div class="col-12 bg-primary bg-opacity-50 position-absolute bottom-0 d-flex justify-content-center gap-5 p-3 text-light">
    <h1 class="fw-bolder">{{get_static_option('var_'.$user_select_lang_slug.'_write_article_now')}}</h1>
    <a href="{{route('user.home.blog.new')}}"
        class="fully-rounded-bg--rose h3 text-light text-decoration-none px-5 py-2 me-5">
        {{get_static_option('var_'.$user_select_lang_slug.'_write')}}
    </a>
    </div>
@endsection

@section('content')
      <!-- Single-Page Article - Start -->
      <div class="single-page py-5">
        <div class="container bg-white ">
            <div class="col-md-12">
                <div class="route py-5 h4">
                    <a class="text-decoration-none text-muted fw-lighter" href="{{url('/')}}">{{get_static_option('var_'.$user_select_lang_slug.'_home')}}</a>
                    / <a class="text-decoration-none text-muted fw-lighter" href="{{url('/').'/'.get_static_option('blog_page_slug')}}"> {{get_static_option('blog_page_' . $user_select_lang_slug . '_name')}}</a>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        @if (!empty($blog_image))
                        <img class="single-page__img rounded shadow-2-strong mb-4" src="{{$blog_image['img_url']}}" alt="{{__($blog_post->title)}}">
                    @endif
                           <h1 class="border-bottom pb-4">{{$blog_post->title}}</h1>
                        <!-- avatar -->
                        <div class=" pt-4">
                            <div class="row">
                            <div class="col-6">
                                <ul class="post-meta">
                                    <li><i class="fas fa-calendar-alt"></i> {{ date_format($blog_post->created_at,'d M Y')}}</li>
                                    <li><i class="fas fa-user"></i> {{ $blog_post->author}}</li>
                                    <li>
                                        <div class="cats">
                                            <i class="fas fa-folder"></i>
                                            {!! get_blog_category_by_id($blog_post->blog_categories_id,'link') !!}
                                        </div>
                                    </li>
                                </ul> 
                            </div>    
                            <div class="col-6">

                                <ul class="social-share">
                                    <li class="title">{{get_static_option('blog_single_page_'.$user_select_lang_slug.'_share_title')}}</li>
                                    {!! single_post_share(route('frontend.blog.single',$blog_post->slug),$blog_post->title,$post_img) !!}
                                </ul>
                            </div>
                            
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="single-page__body">
                            {!! $blog_post->content !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(!empty(get_static_option('site_disqus_key')))
    <script>
        var disqus_config = function () {
        this.page.url = "{{route('frontend.blog.single',$blog_post->slug)}}";
        this.page.identifier = "{{$blog_post->id}}";
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = "https://{{get_static_option('site_disqus_key')}}.disqus.com/embed.js";
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    @endif
@endsection
