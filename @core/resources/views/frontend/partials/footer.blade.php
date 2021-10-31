
<!-- Footer - Start -->
<footer class="footer 
        @if((request()->routeIs('homepage')  || request()->routeIs('frontend.homepage.demo') ) && $home_page_variant == '17' &&
        filter_static_option_value('home_page_call_to_action_section_status',$static_field_data))
        has-top-padding
        @endif
        ">

        <div class="text-center footer__socialmedia bg-gradient">
            @php
                $all_social_item = App\SocialIcons::all();
        
            @endphp
            @foreach ($all_social_item as $item)
                <a class="text-decoration-none m-3 h1 text-white" href="{{$item->url}}"><i class="{{$item->icon}} py-3 footer__socialmedia--icon"></i></a>  
            @endforeach
            
            
        </div>
        @if(App\WidgetsBuilder\WidgetBuilderSetup::render_frontend_sidebar('footer',['column' => true]))
        <div class="bg-color-primary footer-top">
            <div class="container">
                <div class="row" id="footer_row">
                    {!! App\WidgetsBuilder\WidgetBuilderSetup::render_frontend_sidebar('footer',['column' => true]) !!}
                </div>
            </div>
       

          <!-- background pics -->
      <img class="bg-pic bg-pic-1"
          src="{{asset('assets/green.svg')}}"
          alt="green logo">
      <img class="bg-pic bg-pic-2"
          src="{{asset('assets/red.svg')}}"
          alt="green logo">
      <img class="bg-pic bg-pic-3"
          src="{{asset('assets/orange.svg')}}" alt="green logo">

    </div>
    @endif
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-item">
                        <div class="copyright-area-inner">
                            {!! get_footer_copyright_text() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer - End -->



<!-- scroll-to-Top - Start -->
<div class="scroll-top">
    <img src="{{asset('assets/arrow-top.svg')}}" alt="scroll top">
</div>
<!-- scroll-to-Top - End -->


<!-- Sidebar - Start -->
<div class="sidebar d-flex flex-column flex-shrink-0 text-white">

    <ul class="nav nav-pills">
       {!! render_frontend_menu($primary_menu) !!}
    </ul>
    
</div>
<!-- Sidebar - End -->

<!-- JavaScripts -->

<!-- Bootstrap 5 bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery 3.6.0 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Slider -->
<script type="text/javascript" src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('assets/frontend/js/script.js')}}"></script>
@include('frontend.partials.inline-script')
<script>
    $('.sidebar .nav-pills > li').addClass('nav-item w-100');
    $('.sidebar .nav-pills li a').addClass('nav-link');
    $('.sidebar .nav-pills li ul').addClass('submenu dropdown-menu');
    $('.sidebar .nav-pills .nav-item ul li').addClass('border-bottom');
    $('.sidebar .nav-pills .nav-item ul li a').addClass('nav-link text-white text-center w-100');
    $('.footer-widget   a').addClass('text-decoration-none text-white fw-lighter h4');
    $('#footer_row >div').addClass('col-6');
    

$(document).ready(function(){
    var offset=0;
    $("#blog_btn").on("click", function(){
       
                $("#blog_btn").html(`<div id="spinner" class="text-center">
                                <div class="spinner-border" role="status">
                                <span class="sr-only">{{__('Loading...')}}</span>
                            </div>
                        </div>`);
                    
                     if($('.blog-item').length>offset)
                     offset=$('.blog-item').length;
                   
                     console.log(offset);
                    $.ajax({
                        
                                type: "GET",
                                url: "{{route('frontend.blog.json')}}",
                                cache: false,               
                                data:'offset='+offset+'&cat=all',
                                dataType:'json',
                                success:function(json){
                                    if(json.length==0){
                                        $("#blog_btn").hide();
                                    }
                                     $.each(json, function(i,row){
                                        offset++;
                                        var html=`<div class="blog-item col-md-6 col-lg-4 mb-5">
                                                <a href="`+row.slug+`"
                                                    class="text-decoration-none ">
                                                    <div class="card border overflow-hidden shadow bg-light bg-gradient">
                                                        <div class="overlay position-relative">
                                                        `+row.image+`
                                                            <div class="content w-100 h-100 bg-opacity-50 bg-dark position-absolute top-0">
                                                                <div class="transform">
                                                                    <h1 class="text-light d-inline ms">{{get_static_option('blog_page_'.$user_select_lang_slug.'_read_more_btn_text')}}</h1>
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
                                                                `+row.title+`
                                                            </h4>
                                                            <ul class="card-text date text-muted post-meta mb-3 w-100 h-30">
                                                                    <li><i class="fas fa-calendar-alt"></i>`+row.date+`</li>
                                                                    <li><i class="fas fa-user"></i> `+row.author+`</li>
                                                                    <li>
                                                                        <div class="cats">
                                                                            <i class="fas fa-folder"></i>
                                                                            `+row.category_name+`
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            <p class="card-text text-muted content pb-5 fw-lighter" id="content">
                                                                `+row.excerpt+`
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>`; 
                                                        
                                        $('#blog_ajax_id').append(html).fadeIn('slow');

                                     }); 

                                     
                                }
                              
                        
                                             
            }).done(function(){ $("#blog_btn").html(`{{get_static_option('var_'.$user_select_lang_slug.'_more')}}`)});  
             
     });




     $("#last_news_btn").on("click", function(){
      
        $("#last_news_btn").html(`<div id="spinner" class="text-center">
                                <div class="spinner-border" role="status">
                                <span class="sr-only">{{__('Loading...')}}</span>
                            </div>
                        </div>`);
          var offset=$('.last_news-item').length;
                  $.ajax({
                              type: "GET",
                              url: "{{route('frontend.last_news.json')}}",
                              cache: false,               
                              data:'offset='+offset+'&cat=all',
                              dataType:'json',
                              success:function(json){
                                  if(json.length==0){
                                      $("#last_news_btn").hide();
                                  }
                                   $.each(json, function(i,row){

                                      var html=`<div class="last_news-item col-md-6 col-lg-4 mb-5">
                                              <a href="`+row.slug+`"
                                                  class="text-decoration-none ">
                                                  <div class="card border overflow-hidden shadow bg-light bg-gradient">
                                                      <div class="overlay position-relative">
                                                      `+row.image+`
                                                          <div class="content w-100 h-100 bg-opacity-50 bg-dark position-absolute top-0">
                                                              <div class="transform">
                                                                  <h1 class="text-light d-inline ms">{{get_static_option('blog_page_'.$user_select_lang_slug.'_read_more_btn_text')}}</h1>
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
                                                              `+row.title+`
                                                          </h4>
                                                          <ul class="card-text date text-muted post-meta mb-3 w-100 h-30">
                                                                  <li><i class="fas fa-calendar-alt"></i>`+row.date+`</li>
                                                                  <li><i class="fas fa-user"></i> `+row.author+`</li>
                                                              </ul>
                                                          <p class="card-text text-muted content pb-5 fw-lighter" id="content">
                                                              `+row.excerpt+`
                                                          </p>
                                                      </div>
                                                  </div>
                                              </a>
                                          </div>`; 
                                                      
                                  $('#last_news_ajax_id').append(html).fadeIn('slow');

                                   }); 
                                  
                              }
                }).done(function(){ $("#last_news_btn").html(`{{get_static_option('var_'.$user_select_lang_slug.'_more')}}`)});  ;    
   });

 
});  

</script>
@if(request()->routeIs('homepage') || request()->routeIs('frontend.homepage.demo'))
    @include('frontend.partials.google-captcha')
    @include('frontend.partials.gdpr-cookie')
  
   
@endif

@include('frontend.partials.inline-script')

@yield('script')

</body>
</html>
