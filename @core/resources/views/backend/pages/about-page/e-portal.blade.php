@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
   الخدمات الالكترونية
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> الخدمات الالكترونية</h4>

                        <form action="{{route('admin.e-portal.page')}}" method="post" enctype="multipart/form-data">
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
                                            <label for="about_page_{{$lang}}_about_section_title">العنوان</label>
                                            <input type="text" name="portal_{{$lang->slug}}_head_top" value="{{get_static_option('portal_'.$lang->slug.'_head_top')}}" class="form-control" id="about_page_{{$lang->slug}}_about_section_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="portal_{{$lang->slug}}_head_body">الوصف</label>
                                            <textarea name="portal_{{$lang->slug}}_head_body" id="portal_{{$lang->slug}}_head_body" class="form-control max-height-150" cols="30" rows="3">{{get_static_option('portal_'.$lang->slug.'_head_body')}}</textarea>

                                
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> العنوان الثاني</label>
                                            <input type="text" name="portal_{{$lang->slug}}_footer_head" value="{{get_static_option('portal_'.$lang->slug.'_footer_head')}}" class="form-control" id="portal_{{$lang->slug}}_footer_head">
                                        </div>
                                        <div class="form-group">
                                            <label >وصف العنوان الثاني</label>
                                            <textarea name="portal_{{$lang->slug}}_footer_body" id="portal_{{$lang->slug}}_footer_body" class="form-control max-height-150" cols="30" rows="3">{{get_static_option('portal_'.$lang->slug.'_footer_body')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label> رابط الصورة لاولى </label>
                                            <input type="text" name="portal_img1_url" value="{{get_static_option('portal_img1_url')}}" class="form-control" id="portal_img1_url">
                                        </div>
                                        <div class="form-group">
                                            <label>  رابط الصورة الثانية  </label>
                                            <input type="text" name="portal_img2_url" value="{{get_static_option('portal_img2_url')}}" class="form-control" id="portal_img2_url">
                                        </div>
                                        <div class="form-group">
                                            <label>  رابط بوابة الخدمات الاكترونية  </label>
                                            <input type="text" name="portal_url" value="{{get_static_option('portal_url')}}" class="form-control" id="portal_url">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="portal_image_one">الصورة لليسار</label>
                                @php $signature_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $signature_img = get_attachment_image_by_id(get_static_option('portal_image_one'),null,false);
                                        @endphp
                                        @if (!empty($signature_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$signature_img['img_url']}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            @php $signature_image_upload_btn_label = 'Change Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" name="portal_image_one" value="{{get_static_option('portal_image_one')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="تحديد" data-modaltitle="رفع صورة" data-imgid="{{get_static_option('portal_image_one')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        رفع صورة
                                    </button>
                                </div>
                                <small>حجم الصورة الموصى به هو 360x480 بكسل</small>
                            </div>
                            <div class="form-group">
                                <label for="portal_image_two">الصورة لليمين</label>
                                @php $signature_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $signature_img = get_attachment_image_by_id(get_static_option('portal_image_two'),null,false);
                                        @endphp
                                        @if (!empty($signature_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$signature_img['img_url']}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            @php $signature_image_upload_btn_label = 'Change Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" name="portal_image_two" value="{{get_static_option('portal_image_two')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="تحديد" data-modaltitle="رفع صورة" data-imgid="{{get_static_option('portal_image_two')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        رفع صورة
                                    </button>
                                </div>
                                <small>حجم الصورة الموصى به هو 360x480 بكسل</small>
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
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
     <script>
        $(document).ready(function () {
            
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }

        });
    </script>
@endsection
