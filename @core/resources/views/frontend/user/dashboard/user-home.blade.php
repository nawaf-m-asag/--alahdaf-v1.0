@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="row">
        @if(!empty(get_static_option('events_module_status')))
            <div class="col-lg-6">
                <div class="user-dashboard-card margin-bottom-30">
                    <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                    <div class="content">
                        <h4 class="title">{{get_static_option('events_page_'.$user_select_lang_slug.'_name')}} {{__('Booking')}}</h4>
                        <span class="number">{{$event_attendances}}</span>
                    </div>
                </div>
            </div>
        @endif
        
        @if(!empty(get_static_option('product_module_status')))
            
        @endif
        @if(get_static_option('donations_module_status'))
           
        @endif
        @if(get_static_option('appointment_module_status'))
           
        @endif
        @if(get_static_option('course_module_status'))
          
        @endif
        @if(get_static_option('support_ticket_module_status'))
            <div class="col-lg-6">
                <div class="user-dashboard-card style-01">
                    <div class="icon"><i class="fas fa-calendar"></i></div>
                    <div class="content">
                        <h4 class="title">{{__('All')}} {{get_static_option('support_ticket_page_'.$user_select_lang_slug.'_name')}}</h4>
                        <span class="number">{{$support_tickets}}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection