@extends('frontend.frontend-page-master')
@section('page-title')
    لوحة تحكم المستخدم
@endsection
@section('content')
    <section class="login-page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="user-dashboard-wrapper">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="mobile_nav">
                                <i class="fas fa-cogs"></i>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home')) active @endif" href="{{route('user.home')}}">{{get_static_option('var_'.$user_select_lang_slug.'_dashboard')}}</a>
                            </li>
                           
                          
                            
                            @if(!empty(get_static_option('donations_module_status')))
                                <li class="nav-item">
                                    <a class="nav-link @if(request()->routeIs('user.home.donations')) active @endif" href="{{route('user.home.donations')}}" >{{__('All ')}} {{get_static_option('donation_page_'.$user_select_lang_slug.'_name')}}</a>
                                </li>
                            @endif
                            @if(!empty(get_static_option('appointment_module_status')))
                                <li class="nav-item">
                                    <a class="nav-link @if(request()->routeIs('user.home.appointment.booking')) active @endif" href="{{route('user.home.appointment.booking')}}" >{{__('Booked')}} {{get_static_option('appointment_page_'.$user_select_lang_slug.'_name')}}</a>
                                </li>
                            @endif
                            @if(!empty(get_static_option('course_module_status')))
                                <li class="nav-item">
                                    <a class="nav-link @if(request()->routeIs('user.home.course.enroll')) active @endif" href="{{route('user.home.course.enroll')}}" >{{get_static_option('courses_page_'.$user_select_lang_slug.'_name')}} {{__("Enrolled")}}</a>
                                </li>
                            @endif
                            @if(!empty(get_static_option('support_ticket_module_status')))
                                <li class="nav-item">
                                    <a class="nav-link @if(request()->routeIs('user.home.support.tickets')) active @endif" href="{{route('user.home.support.tickets')}}" >{{__('All')}} {{get_static_option('support_ticket_page_'.$user_select_lang_slug.'_name')}}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home.edit.profile')) active @endif " href="{{route('user.home.edit.profile')}}">{{get_static_option('var_'.$user_select_lang_slug.'_edit_profile')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home.change.password')) active @endif " href="{{route('user.home.change.password')}}">{{get_static_option('var_'.$user_select_lang_slug.'_change_password')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home.blog.new')) active @endif" href="{{route('user.home.blog.new')}}">ا{{get_static_option('var_'.$user_select_lang_slug.'_add_article')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{ route('user.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   {{get_static_option('var_'.$user_select_lang_slug.'_logout')}}</a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel">
                                <div class="message-show margin-top-10">
                                    <x-flash-msg/>
                                    <x-error-msg/>
                                </div>
                                @yield('section')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
@section('script')
@yield('script')
@endsection
