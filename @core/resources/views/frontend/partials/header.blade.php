@php
    $home_page_variant = $home_page ?? filter_static_option_value('home_page_variant',$global_static_field_data);
@endphp
<!DOCTYPE html>
    <html lang="{{$user_select_lang_slug}}"  dir="{{get_user_lang_direction()}}">

<head>
    @if(!empty(filter_static_option_value('site_google_analytics',$global_static_field_data)))
    {!! get_static_option('site_google_analytics') !!}
    @endif
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {!! render_favicon_by_id(filter_static_option_value('site_favicon',$global_static_field_data)) !!}
    {!! load_google_fonts() !!}
    <!-- favicon -->
    <link rel="stylesheet"  href="{{asset('assets/frontend/css/style_all.css')}}" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon_package/apple-touch-icon.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon_package/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/favicon_package/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor"  content="#da532c">
    <meta name="theme-color"  content="#ffffff">
    <!-- Almarai Google Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" />
    <!-- custom style -->

   
    <link rel=preload href="{{asset('assets/frontend/css/fontawesome.min.css')}}" as="style">
    <link rel=preload href="{{asset('assets/frontend/css/flaticon.css')}}" as="style">
    <link rel=preload href="{{asset('assets/frontend/css/nexicon.css')}}" as="style">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/nexicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/helpers.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.ihavecookies.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/toastr.css')}}">
    <link href="{{asset('assets/frontend/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet"  href="{{asset('assets/frontend/css/style.css')}}" />
   @if(!empty(filter_static_option_value('site_rtl_enabled',$global_static_field_data)) || get_user_lang_direction() == 'ltr')
        <link rel="stylesheet" href="{{asset('assets/frontend/css/ltr.css')}}">
    @endif
    @yield('style')
    @include('frontend.partials.og-meta')
</head>

<body>
 
    <!-- Header - Star -->
    <header class="header">
        <!-- navbar - Start -->
        <nav class="navbar navbar-expand-sm position-fixed w-100 pt-3 flex-nowrap">
            <div class="sidebar__icon">
                <span class="sidebar__icon--line"></span>
            </div>
            <div class="container-fluid">
                <a href="{{url('/')}}" class="navbar-brand">
                    @if(!empty(filter_static_option_value('site_white_logo',$global_static_field_data)))
                        {!! render_image_markup_by_attachment_id(filter_static_option_value('site_white_logo',$global_static_field_data),'navbar__logo') !!}
                    @else
                        <h2 class="site-title">{{filter_static_option_value('site_'.$user_select_lang_slug.'_title',$global_static_field_data)}}</h2>
                    @endif
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{get_static_option('portal_url')}}"
                            class="fully-rounded-light-text--rose client-door-text">
                            {{get_static_option('var_'.$user_select_lang_slug.'_portal_name')}}
                        </a>
                        
                        <a href="{{get_static_option('portal_url')}}"
                            class="client-door-icon"> <i class="far fa-user "></i> </a>
                        
                    </li>
                    <li class="nav-item text-center">

                            @if(!empty(get_static_option('language_select_option')))
                                    <select style="font-size:16px"  class="btn fully-rounded text-light" id="langchange">
                                        @foreach($all_language as $lang)
                                            <option style="background: #f69522;" @if($user_select_lang_slug == $lang->slug) selected @endif value="{{$lang->slug}}" class="lang-option">{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                            @endif
                </ul>
            </div>
        </nav>
        <!-- navbar - End -->
    </header>
    <!-- Header - End -->
    <main class="main @yield('main_class')">
        <!-- Hero Content Section - Start -->

    
      
