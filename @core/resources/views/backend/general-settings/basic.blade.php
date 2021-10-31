@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    الاعدادات الاساسية
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">الاعدادات الاساسية</h4>
                        <form action="{{route('admin.general.basic.settings')}}" method="POST" enctype="multipart/form-data">
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
                                            <label for="site_{{$lang->slug}}_title">عنوان الموقع</label>
                                            <input type="text" name="site_{{$lang->slug}}_title"  class="form-control" value="{{get_static_option('site_'.$lang->slug.'_title')}}" id="site_{{$lang->slug}}_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_{{$lang->slug}}_tag_line">وصف قصير</label>
                                            <input type="text" name="site_{{$lang->slug}}_tag_line"  class="form-control" value="{{get_static_option('site_'.$lang->slug.'_tag_line')}}" id="site_{{$lang->slug}}_tag_line">
                                        </div>
                                        <div class="form-group">
                                            <label for="site_{{$lang->slug}}_footer_copyright">حقوق النشر</label>
                                            <input type="text" name="site_{{$lang->slug}}_footer_copyright"  class="form-control" value="{{get_static_option('site_'.$lang->slug.'_footer_copyright')}}" id="site_{{$lang->slug}}_footer_copyright">
                                            <small class="form-text text-muted">{copy} سوف تستبدل بـــ &copy; و {year} سوف تستبدل بالسنة الحالية</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <x-media-upload :name="'og_meta_image_for_site'" :dimentions="'1200x900'" :title="__('Image')"/>
                           

                            <div class="form-group">
                                <label for="site_admin_dark_mode"><strong>تمكين /تعطيل الوضع الداكن للوحة التحكم</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_admin_dark_mode"  @if(!empty(get_static_option('site_admin_dark_mode'))) checked @endif id="site_admin_dark_mode">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_maintenance_mode"><strong>وضع الصيانة</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_maintenance_mode"  @if(!empty(get_static_option('site_maintenance_mode'))) checked @endif id="site_maintenance_mode">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="language_select_option"><strong>تمكين /تعطيل اللغة في الموقع</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="language_select_option"  @if(!empty(get_static_option('language_select_option'))) checked @endif id="language_select_option">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                           
                            <div class="form-group">
                                <label for="site_payment_gateway"><strong>تمكين / تعطيل الدفع</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_payment_gateway"  @if(!empty(get_static_option('site_payment_gateway'))) checked @endif id="site_payment_gateway">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                          
                            <div class="form-group">
                                <label for="site_force_ssl_redirection"><strong>تمكين / تعطيل فرض إعادة توجيه SSL</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_force_ssl_redirection"  @if(!empty(get_static_option('site_force_ssl_redirection'))) checked @endif>
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="disable_user_email_verify"><strong>تعطيل التحقق من البريد الإلكتروني للمستخدم</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_user_email_verify"  @if(!empty(get_static_option('disable_user_email_verify'))) checked @endif id="disable_user_email_verify">
                                    <span class="slider onff"></span>
                                </label>
                                <small class="info-text">يعني أنه يجب على المستخدم التحقق من حساب بريده الإلكتروني من أجل الوصول إلى لوحة التحكم الخاصة به.</small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
