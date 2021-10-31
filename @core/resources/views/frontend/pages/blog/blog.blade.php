@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('blog_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
    {{get_static_option('blog_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('blog_page_'.$user_select_lang_slug.'_meta_description')}}">
    <meta name="tags" content="{{get_static_option('blog_page_'.$user_select_lang_slug.'_meta_tags')}}">
@endsection
@section('style')
<style>
    .post-meta{
    
        height: 30px;
      
    }
     .post-meta li{
         display: block;
         float: right;
         margin: 5px;
         text-decoration: none;
         color: #fff;
     }
     .post-meta li i{
 
         color:var(--color-secondary);
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
@section('main_class')
bg-light
@endsection
@section('content')
<section class="article bg-light pb-5">
<div class="container-fluid">
<div class="route my-5 h4">
  
<a class="text-decoration-none text-muted fw-lighter" href="{{url('/')}}">{{get_static_option('var_'.$user_select_lang_slug.'_home')}}</a>
/ <a class="text-decoration-none text-muted fw-lighter" href="{{url('/').'/'.get_static_option('blog_page_slug')}}"> {{get_static_option('blog_page_' . $user_select_lang_slug . '_name')}}</a>
</div>
<div class="row">
    <div class="right-side col-sm-12 col-md-8 bg-white px-0">

        <ul class="nav nav-tabs"
            id="myTab"
            role="tablist">
            <li class="nav-item"
                role="presentation">
                <button class="tabId nav-link h3 active"
                    id="home-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#home"
                    type="button"
                    role="tab"
                    aria-controls="home"
                    value="all"
                    onclick="blog_ajax(null)"
                    aria-selected="true">{{get_static_option('var_'.$user_select_lang_slug.'_all')}}</button>
            </li>
        @foreach($all_categories as $key =>  $data)
        <li class="nav-item" role="presentation">
        <button  class="tabId nav-link h3"
            onclick="blog_ajax({{$data->id}})"
            id="category-{{$data->blog_categories_id}}-tab"
            data-bs-toggle="tab"
            data-bs-target="#category-{{$data->id}}"
            type="button"
            role="tab"
            value="{{$data->id}}"
            aria-controls="category-{{$data->id}}"
            aria-selected="false">{{$data->name}}</button>
        </li>
            @endforeach
        </ul>
        <div class="tab-content"
            id="myTabContent">
            
            <div class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab">

                <div class="container">
                    <div class="row">
                        <div class="col-3 my-4">
                            <h3 class="text-center text-md-end text-muted fw-bolder">{{get_static_option('blog_page_'.$user_select_lang_slug.'_name')}}</h3>
                        </div>
                        <div class="col-9 my-4">
                            <div class="search-box">
                               <form action="{{route('frontend.blog.search')}}" method="get"> 
                                
                                <input type="text"
                                    id="gsearch"
                                    name="search"
                                    placeholder="{{__('Search')}}">
                                </form>    
                                <div class="search-box-search-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-50 h-75"
                                        viewBox="0 0 29.934 29.932">
                                        <g transform="translate(0)">
                                            <path
                                                d="M23.384,23.384a1.871,1.871,0,0,1,2.647,0l7.2,7.2a1.871,1.871,0,0,1-2.645,2.647l-7.2-7.2a1.871,1.871,0,0,1,0-2.647Z"
                                                transform="translate(-3.849 -3.848)"
                                                fill="#bdbdbd"
                                                fill-rule="evenodd" />
                                            <path
                                                d="M12.16,22.45A10.289,10.289,0,1,0,1.871,12.16,10.289,10.289,0,0,0,12.16,22.45ZM24.32,12.16A12.16,12.16,0,1,1,12.16,0,12.16,12.16,0,0,1,24.32,12.16Z"
                                                transform="translate(0 0)"
                                                fill="#bdbdbd"
                                                fill-rule="evenodd" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="container">
                        <div id="blog"  class="row">
                         
                        </div>
                        
                        <div id="spinner" class="text-center">
                            <div class="spinner-border" role="status">
                              <span class="sr-only">{{__('Loading...')}}</span>
                            </div>
                          </div>
                    </div>
                </div>

            </div>
        
        </div>
    </div>
    <div class="left-side col-sm-12  col-md-4 d-none d-md-block">
        <div class=" col-sm-12 col-md-11 bg-white">
            <div class="container pb-4">
                <h1 class="d-inline-block mb-5 mt-4">{{get_static_option('var_'.$user_select_lang_slug.'_videos')}}</h1>
               
                @foreach ($all_gallery_images as $item)
                    
                
                <div class="card mb-3"
                    style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                          <a href="https://youtube.com/watch?v={{$item->embed_code}}">
                            <img class="img-fluid rounded-start h-100" src="https://i.ytimg.com/vi/{{$item->embed_code}}/hqdefault.jpg"> 
                          </a>  
                        </div>    
                        <div class="col-md-8 card-body">

                            <h5 class="card-title"> {{$item->title}}</h5>
                            <p class="card-text"><small class="text-muted">{{__('Last updated')}} @php
                             echo   time_diff_string($item->updated_at, 'now');
                            @endphp </small></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- Article Section - End -->

</main>

@section('script')

    <script>
$(document).ready(function(){   
    blog_ajax('all');
    $('.footer').hide();
    $(window).on('scroll', function () {
  
        if ($(window).scrollTop() == ( $(document).height() - $(window).height())) {
            console.log($('#myTab .active').val());
            blog_ajax($('#myTab .active').val());
        }

       
    });
    
}); 
function blog_ajax(cat ) {
        var offset=$('.blog-item-'+cat).length;
                $.ajax({
                type: "GET",
                 url: "{{route('frontend.blog.json')}}",
                cache: false,               
                data:'offset='+offset+'&cat='+cat,
                dataType:'json',
                success:function(json){
                   
                if(json.length==0){
                    $('#spinner').hide();
                    $('.footer').show();
                }
                
                
                $.each(json, function(i,row){
                    var html=`<div class="blog-item-`+cat+` col-md-6 col-lg-4 mb-5">
                                    <a href="`+row.slug+`"
                                    class="text-decoration-none ">
                                    <div class="card overlay-card border overflow-hidden shadow">
                                        <div class="">`+row.image+`
                                            
                                    </div>
                                        <div
                                            class="card-body text-light bg-color-primary bg-opacity-75 border-4">
                                                                                                                                                      
                                            <h3 class="card-title mb-4">`+row.title+`</h3>
                                            <ul class="card-text date text-muted post-meta mb-3 w-100 h-30">
                                                
                                                <li><i class="fas fa-calendar-alt"></i>`+row.date+`</li>
                                                <li><i class="fas fa-user"></i> `+row.author+`</li>
                                               
                                         </ul>   
                                        </div>
                                    </div>
                                </a>
                            </div>
               
                            `;
                    if(offset==0 &&i==0){
                        $('#blog').html(html).fadeIn('slow');  
                        $('#spinner').show();
                        $('.footer').hide();     
                    }else{
                        $('#blog').append(html).fadeIn('slow');     
                    }        
                  
                        }); 
                 }
   

    

        }); 
    } 
   
    </script>
 @endsection
<!-- Main Section - End -->

@endsection
