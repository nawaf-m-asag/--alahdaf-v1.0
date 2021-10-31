@extends('frontend.frontend-page-master')
@php
  $post_img = null;
  $blog_image = get_attachment_image_by_id($last_news_post->image,"full",false);
  $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
 @endphp

@section('og-meta')
    <meta property="og:url"  content="{{route('frontend.blog.single',$last_news_post->slug)}}" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="{{$last_news_post->title}}" />
    <meta property="og:image" content="{{$post_img}}" />
@endsection
@section('page-meta-data')
    <meta name="description" content="{{$last_news_post->meta_description}}">
    <meta name="tags" content="{{$last_news_post->meta_tag}}">
@endsection
@section('site-title')
    {{$last_news_post->title}}
@endsection
@section('page-title')
    {{$last_news_post->title}}
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
@section('content')
      <!-- Single-Page Article - Start -->
      <div class="single-page py-5">
        <div class="container bg-white ">
            <div class="col-md-12">
                <div class="route py-5 h4">
                    <a class="text-decoration-none text-muted fw-lighter" href="{{url('/')}}">{{get_static_option('var_'.$user_select_lang_slug.'_home')}}</a>
                    / <a class="text-decoration-none text-muted fw-lighter" href="{{url('/').'/'.get_static_option('blog_page_slug')}}"> {{get_static_option('home_page_14_' . $user_select_lang_slug . '_news_area_section_title')}}</a>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        @if (!empty($blog_image))
                        <img class="single-page__img rounded shadow-2-strong mb-4" src="{{$blog_image['img_url']}}" alt="{{__($last_news_post->title)}}">
                    @endif
                           <h1 class="border-bottom pb-4">{{$last_news_post->title}}</h1>
                 
                        <!-- avatar -->
                        <div class=" pt-4">
                            <div class="row">
                            <div class="col-6">
                                <ul class="post-meta">
                                    <li><i class="fas fa-calendar-alt"></i> {{ date_format($last_news_post->created_at,'d M Y')}}</li>
                                    <li><i class="fas fa-user"></i> {{ $last_news_post->author}}</li>
                                   
                                </ul> 
                            </div>    
                            <div class="col-6">

                                <ul class="social-share">
                                    <li class="title">{{get_static_option('blog_single_page_'.$user_select_lang_slug.'_share_title')}}</li>
                                    {!! single_post_share(route('frontend.blog.single',$last_news_post->slug),$last_news_post->title,$post_img) !!}
                                </ul>
                            </div>
                            
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="single-page__body">
                            {!! $last_news_post->content !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

