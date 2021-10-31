@extends('backend.admin-master')
@section('site-title')
    تحرير المنتج
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
    <style>
        .nice-select .option {
            min-height: 30px;
            padding: 0px 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus {
            font-weight: 700;
        }

    </style>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-flash-msg/>
                <x-error-msg/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">تحرير المنتج</h4>
                            <a href="{{route('admin.products.all')}}" class="btn btn-primary">المنتجات</a>
                        </div>

                        <form action="{{route('admin.products.update')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="language"><strong>اللغة</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach($all_languages as $lang)
                                                <option @if($product->lang === $lang->slug) selected
                                                        @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{$product->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">العنوان للمتصفح slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                               value="{{$product->slug}}">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="category">التصنيف</label>
                                        <select name="category_id" class="form-control" id="category">
                                            <option value="">حدد</option>
                                            @foreach($all_categories as $category)
                                                <option @if($product->category_id == $category->id) selected
                                                        @endif value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="short_description">الوصف </label>
                                        <textarea name="short_description" id="short_description"
                                                  class="form-control max-height-120" cols="30"
                                                  rows="4">{{$product->short_description}}</textarea>
                                    </div>
                                    
                                    
                                    
                                    
                                   
                                    <div class="form-group">
                                        <label for="is_downloadable"><strong>ملف لتنزيل</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" @if($product->is_downloadable) checked
                                                   @endif name="is_downloadable" id="is_downloadable">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <label for="downloadable_file">ملف التنزيل</label>
                                        <p class="info-text">
                                            @if(file_exists('assets/uploads/downloadable/'.$product->downloadable_file))
                                                <a href="{{route('admin.products.file.download',$product->id)}}"
                                                   target="_blank">{{$product->downloadable_file}}</a>
                                            @endif
                                        </p>
                                        <input type="file" name="downloadable_file" class="form-control"
                                               id="downloadable_file">
                                        <span class="info-text"> الملفات المسموحة doc,docx,jpg,jpeg,png,mp3,mp4,pdf,txt,zip </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">العنوان لسيو</label>
                                        <input type="text" name="meta_tags" class="form-control"
                                               value="{{$product->meta_tags}}" data-role="tagsinput" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">الوصف للسيو</label>
                                        <textarea name="meta_description" class="form-control" rows="5"
                                                  id="meta_description">{{$product->meta_description}}</textarea>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="image">الصورة المميزة</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                @php
                                                    $work_section_img = get_attachment_image_by_id($product->image,null,true);
                                                @endphp
                                                @if (!empty($work_section_img))
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb"
                                                                     src="{{$work_section_img['img_url']}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="hidden" name="image" value="{{$product->image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn"
                                                    data-btntitle="تحديد"
                                                    data-modaltitle="رفع صور للمنتج" data-toggle="modal"
                                                    data-target="#media_upload_modal">
                                                رفع صورة
                                            </button>
                                        </div>
                                        <small>الحجم الموصى به للصورة هو 1920 × 1280</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">الصور</label>
                                        @php
                                            $gallery_images = !empty( $product->gallery) ? explode('|', $product->gallery) : [];
                                        @endphp
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                @foreach($gallery_images as $gl_img)
                                                    @php
                                                        $work_section_img = get_attachment_image_by_id($gl_img,null,true);
                                                    @endphp
                                                    @if (!empty($work_section_img))
                                                        <div class="attachment-preview">
                                                            <div class="thumbnail">
                                                                <div class="centered">
                                                                    <img class="avatar user-thumb"
                                                                         src="{{$work_section_img['img_url']}}" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <input type="hidden" name="gallery" value="{{$product->gallery}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn"
                                                    data-mulitple="true" data-btntitle="تحديد"
                                                    data-modaltitle="رفع صورة" data-toggle="modal"
                                                    data-target="#media_upload_modal">
                                                رفع صورة
                                            </button>
                                        </div>
                                        <small>الحجم الموصى به للصورة هو 1920 × 1280</small>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="status">الحالة</label>
                                        <select name="status" id="status" class="form-control">
                                            <option @if($product->status == 'publish') selected
                                                    @endif value="publish">منشور</option>
                                            <option @if($product->status == 'draft') selected
                                                    @endif  value="draft">مسودة</option>
                                        </select>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary mt-4 pr-4 pl-4">حفظ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery.nice-select.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('body .nice-select').niceSelect();

            $(document).on('click', '#productvariantadd', function () {
                var variant = $('#variant_list').val();
                if (variant != '') {
                    $('#productvariantadd').append('<i class="fas fa-spinner fa-spin"></i>');
                    $('#variant_list option[value="'+variant+'"]').attr('disabled',true)
                    //write ajax call
                    $.ajax({
                        type: 'POST',
                        url: "{{route('admin.products.variants.details')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            id : variant
                        },
                        success: function (data) {
                            $('#productvariantadd').find('i').remove();
                            var terms = JSON.parse(data.terms);
                            var markup = '<div class="variant-terms-selector"> <label for="#">'+data.title+'</label><select name="variant['+data.id+'][]" multiple class="form-control nice-select wide">';
                            $.each(terms,function (index,value){
                                markup += ' <option value="'+value+'">'+value+'</option>';
                            })
                            markup += '</select></div>';

                            $('.dynamic-variant-wrapper').append(markup);
                            $('body .nice-select').niceSelect('destroy');
                            $('body .nice-select').niceSelect();
                        }
                    });
                    //
                }
            });

            $(document).on('change', '#language', function (e) {
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                    url: "{{route('admin.products.category.by.lang')}}",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        lang: selectedLang
                    },
                    success: function (data) {
                        $('#category').html('<option value="">{{__('Select Category')}}</option>');
                        $.each(data, function (index, value) {
                            $('#category').append('<option value="' + value.id + '">' + value.title + '</option>')
                        });
                    }
                });
                $.ajax({
                    url: "{{route('admin.products.variant.by.lang')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        lang : selectedLang
                    },
                    success:function (data) {
                        $('#variant_list').html('<option value="">{{__('Select Variant')}}</option>');
                        $.each(data,function(index,value){
                            $('#variant_list').append('<option value="'+value.id+'">'+value.title+'</option>')
                        });
                    }
                });
            });
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function (contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            $(document).on('change', '#is_downloadable', function (e) {
                e.preventDefault();
                isDownloadableCheck('#is_downloadable');
            });

            $(document).on('click', '.attribute-field-wrapper .add_attributes', function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().append(' <div class="attribute-field-wrapper">\n' +
                    '<input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="{{__('Title')}}">\n' +
                    '<textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="{{__('Value')}}"></textarea>\n' +
                    '<div class="icon-wrapper">\n' +
                    '<span class="add_attributes"><i class="ti-plus"></i></span>\n' +
                    '<span class="remove_attributes"><i class="ti-minus"></i></span>\n' +
                    '</div>\n' +
                    '</div>');

            });
            isDownloadableCheck('#is_downloadable');
            $(document).on('click', '.attribute-field-wrapper .remove_attributes', function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });

            function isDownloadableCheck($selector) {
                var dnFile = $('#downloadable_file');
                var dnFileUrl = $('#downloadable_file_link');
                if ($($selector).is(':checked')) {
                    dnFile.parent().show();
                    dnFileUrl.parent().show();
                } else {
                    dnFile.parent().hide();
                    dnFileUrl.parent().hide();
                }
            }
        });
    </script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
