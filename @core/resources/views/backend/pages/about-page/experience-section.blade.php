@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
    الخبرات
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
                        <h4 class="header-title">الخبرات</h4>

                        <form action="{{route('admin.about.experience')}}" method="post" enctype="multipart/form-data">
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
                                            <label for="about_page_{{$lang}}_experience_title">العنوان</label>
                                            <input type="text" name="about_page_{{$lang->slug}}_experience_title" value="{{get_static_option('about_page_'.$lang->slug.'_experience_title')}}" class="form-control" id="about_page_{{$lang->slug}}_experience_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="about_page_{{$lang->slug}}_experience_description">الوصف</label>
                                            <input type="hidden" name="about_page_{{$lang->slug}}_experience_description" >
                                            <div class="summernote" data-content='{{get_static_option('about_page_'.$lang->slug.'_experience_description')}}'></div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="about_page_{{$lang->slug}}_quote_text">نص اضافي</label>
                                            <textarea name="about_page_{{$lang->slug}}_quote_text" id="about_page_{{$lang->slug}}_quote_text" class="form-control max-height-150" cols="30" rows="10">{{get_static_option('about_page_'.$lang->slug.'_quote_text')}}</textarea>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="about_page_{{$lang->slug}}_experience_video_url">{{__('Video URL')}}</label>
                                            <input type="text" name="about_page_{{$lang->slug}}_experience_video_url" id="about_page_{{$lang->slug}}_experience_video_url" class="form-control" value="{{get_static_option('about_page_'.$lang->slug.'_experience_video_url')}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="about_page_image_one">{{__('Video Background Image')}}</label>
                                @php $signature_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $signature_img = get_attachment_image_by_id(get_static_option('about_page_experience_video_background_image'),null,false);
                                        @endphp
                                        @if (!empty($signature_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$signature_img['img_url']}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            @php $signature_image_upload_btn_label = 'Change Background Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" name="about_page_experience_video_background_image" value="{{get_static_option('about_page_experience_video_background_image')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{get_static_option('about_page_experience_video_background_image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($signature_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 640x700 pixel')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="about_page_image_one">{{__('Signature Image')}}</label>
                                @php $signature_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $signature_img = get_attachment_image_by_id(get_static_option('about_page_experience_signature_image'),null,false);
                                        @endphp
                                        @if (!empty($signature_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$signature_img['img_url']}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            @php $signature_image_upload_btn_label = 'Change Signature Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" name="about_page_experience_signature_image" value="{{get_static_option('about_page_experience_signature_image')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{get_static_option('about_page_experience_signature_image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($signature_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 100x50 pixel')}}</small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
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
