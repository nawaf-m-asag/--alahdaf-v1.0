@extends('backend.admin-master')
@section('site-title')
  اعدادات الكوكيز
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">اعدادات الكوكيز</h4>
                        <form action="{{route('admin.general.gdpr.settings')}}" method="POST" enctype="multipart/form-data">
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
                                            <label for="site_gdpr_cookie_{{$lang->slug}}_title">العنوان</label>
                                            <input type="text" name="site_gdpr_cookie_{{$lang->slug}}_title"  class="form-control" value="{{get_static_option('site_gdpr_cookie_'.$lang->slug.'_title')}}" id="site_gdpr_cookie_{{$lang->slug}}_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_gdpr_cookie_{{$lang->slug}}_message">الرسالة</label>
                                            <textarea name="site_gdpr_cookie_{{$lang->slug}}_message"  class="form-control" rows="5" id="site_gdpr_cookie_{{$lang->slug}}_message">{{get_static_option('site_gdpr_cookie_'.$lang->slug.'_message')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="site_gdpr_cookie_{{$lang->slug}}_more_info_label">نص رابط معرفة المزيد</label>
                                            <input type="text" name="site_gdpr_cookie_{{$lang->slug}}_more_info_label"  class="form-control" value="{{get_static_option('site_gdpr_cookie_'.$lang->slug.'_more_info_label')}}" id="site_gdpr_cookie_{{$lang->slug}}_more_info_label">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_gdpr_cookie_{{$lang->slug}}_more_info_link">رابط معرفة المزيد</label>
                                            <input type="text" name="site_gdpr_cookie_{{$lang->slug}}_more_info_link"  class="form-control" value="{{get_static_option('site_gdpr_cookie_'.$lang->slug.'_more_info_link')}}" id="site_gdpr_cookie_{{$lang->slug}}_more_info_link">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_gdpr_cookie_{{$lang->slug}}_accept_button_label">نص زر الموافقة</label>
                                            <input type="text" name="site_gdpr_cookie_{{$lang->slug}}_accept_button_label"  class="form-control" value="{{get_static_option('site_gdpr_cookie_'.$lang->slug.'_accept_button_label')}}" id="site_gdpr_cookie_{{$lang->slug}}_accept_button_label">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_gdpr_cookie_{{$lang->slug}}_decline_button_label">نص زر الرفض</label>
                                            <input type="text" name="site_gdpr_cookie_{{$lang->slug}}_decline_button_label"  class="form-control" value="{{get_static_option('site_gdpr_cookie_'.$lang->slug.'_decline_button_label')}}" id="site_gdpr_cookie_{{$lang->slug}}_decline_button_label">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="site_gdpr_cookie_enabled"><strong>تمكين / تعطيل الكوكيز</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_gdpr_cookie_enabled"  @if(!empty(get_static_option('site_gdpr_cookie_enabled'))) checked @endif id="site_gdpr_cookie_enabled">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_gdpr_cookie_expire">انتهاء  الكوكيز</label>
                                <input type="text" name="site_gdpr_cookie_expire"  class="form-control" value="{{get_static_option('site_gdpr_cookie_expire')}}" id="site_gdpr_cookie_expire">
                                <small class="form-text text-muted">تعيين وقت انتهاء الكوكيز ، على سبيل المثال: 30 ، يعني 30 يومًا</small>
                            </div>
                            <div class="form-group">
                                <label for="site_gdpr_cookie_delay">مدة تاخير الظهور</label>
                                <input type="text" name="site_gdpr_cookie_delay"  class="form-control" value="{{get_static_option('site_gdpr_cookie_delay')}}" id="site_gdpr_cookie_delay">
                                <small class="form-text text-muted">تعيين وقت ظهور الكوكيز  فهذا يعني أن نافذة الكوكيزستظهر بعد هذا الوقت. والوقت يحسب با لملي ثانية. على سبيل المثال: 5000 ، يعني 5ثواني</small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
