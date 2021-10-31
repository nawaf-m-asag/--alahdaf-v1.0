<section class="hero">
    <!-- Carousel - Start -->
    @php
        $all_testimonial=App\Testimonial::where('lang', $user_select_lang_slug)->orderBy('id', 'desc')->take(get_static_option('about_page_testimonial_item'))->get();
    @endphp 

    <div class="carousel slide h-100" id="slider" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($all_testimonial as $i=> $data)
            <button type="button"
            data-bs-target="#slider"
            data-bs-slide-to="{{$i}}"
            class="active slide__btn"
            aria-label="Slide {{$i+1}}"
            @if ($i==0)
            aria-current="true"
            @else
            class=" slide__btn"
            @endif
         
            
            >
        </button>
        @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($all_testimonial as $key=> $data)
            <div class="carousel-item @if ($key==0) active  @endif">
                {!! render_image_markup_by_attachment_id($data->image,'slide__img d-block w-100') !!}
                <div class="hero-content carousel-caption  container col-sm-12">
                    <div class="col-lg-9 col-md-10 text-start text-light">
                        <h1 class="hero-content__title text-end mb-5 fw-bolder">                                    {{$data->name}}
                        </h1>
                        <p class=" col-lg-12 hero-content__body text-end h3 mb-4">
                            {{$data->description}}
                        </p>
                        <a href="{{$data->designation}}" 
                            class=" nav-btn fully-rounded--rose px-5 text-light p-3 h2 text-decoration-none">{{get_static_option('var_'.$user_select_lang_slug.'_more')}}</a>
                    </div>
                </div>
            </div>
            @endforeach
          
        </div>
    </div>
    @yield('write_blog')
</section>
@section('script')
<script>
$('.sidebar .nav-pills > li').addClass('nav-item w-100');
$('.sidebar .nav-pills li a').addClass('nav-link');
$('.sidebar .nav-pills li ul').addClass('submenu dropdown-menu');
$('.sidebar .nav-pills .nav-item ul li').addClass('border-bottom');
$('.sidebar .nav-pills .nav-item ul li a').addClass('nav-link text-white text-center w-100');
$('.footer-widget   a').addClass('text-decoration-none text-white fw-lighter text-light');
</script>
@endsection