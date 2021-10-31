@extends('backend.admin-master')
@section('site-title')
  اعدادات رسائل البريد
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">رسال البريد</h4>
                        <x-error-msg/>
                        <x-flash-msg/>
                        <form action="{{route('admin.general.email.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach($all_languages as $key => $lang)
                                        <a class="nav-item nav-link @if($key == 0) active @endif" id="nav-home-tab" data-toggle="tab" href="#nav-home-{{$lang->slug}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$lang->name}}</a>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                @foreach($all_languages as $key => $lang)
                                    <div class="tab-pane fade @if($key == 0) show active @endif" id="nav-home-{{$lang->slug}}" role="tabpanel" aria-labelledby="nav-home-tab">
                                        
                                       
                                       
                                        <div class="form-group">
                                            <label for="order_mail_{{$lang->slug}}_success_message">رسالة نجاح الطلب</label>
                                            <input type="text" name="order_mail_{{$lang->slug}}_success_message"  class="form-control" value="{{get_static_option('order_mail_'.$lang->slug.'_success_message')}}" id="order_mail_{{$lang->slug}}_success_message">
                                            <small class="form-text text-muted">سوف تظهر هذه الرسالة عند اتمام الطلب</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_mail_{{$lang->slug}}_success_message">تواصل معنا</label>
                                            <input type="text" name="contact_mail_{{$lang->slug}}_success_message"  class="form-control" value="{{get_static_option('contact_mail_'.$lang->slug.'_success_message')}}" id="contact_mail_{{$lang->slug}}_success_message">
                                            <small class="form-text text-muted">ستظهر هذه الرسالة عندما يتواصل بك أي شخص عبر نموذج صفحة الاتصال</small>
                                        </div>
                                       
                                       
                                        
                                       
                                       
                                       
                                        
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
