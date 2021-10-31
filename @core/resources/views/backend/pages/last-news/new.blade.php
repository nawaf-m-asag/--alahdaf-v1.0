@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
   
@endsection
@section('site-title')
   اضافة خبر
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-flash-msg/>
                <x-error-msg/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">اضافة خبر جديد</h4>
                            <a href="{{route('admin.last-news')}}" class="btn btn-primary">الاخبار</a>
                        </div>

                        <form action="{{route('admin.last-news.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="language"><strong>اللغة</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            <option value="">حدد اللغة</option>
                                            @foreach($all_languages as $lang)
                                            <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input type="text" class="form-control"  value="{{old('title')}}" name="title" placeholder="ادخل العنوان">
                                    </div>
                                    <div class="form-group">
                                        <label>المحتوئ</label>
                                      
                                        <textarea type="hidden"  name="blog_content"></textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">العنوان سيو</label>
                                        <input type="text" name="meta_tags"  class="form-control" value="{{old('meta_tags')}}" data-role="tagsinput" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">الوصف سيو</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">العنوان علئ المتصفح</label>
                                        <input type="text" class="form-control"  id="slug"  value="{{old('slug')}}"  name="slug" placeholder="العنوان في المتصفح">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">وصف قصير</label>
                                        <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">التصنيف</label>
                                        <select name="category" class="form-control" id="category">
                                            <option value="">حدد تصنيف</option>
                                        </select>
                                        <span class="info-text">حدد اللغة حتئ تحصل علئ التصنيفات الخاصة باللغة  المحددة</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">الوسوم</label>
                                        <input type="text" class="form-control" name="tags" value="{{old('tags')}}" data-role="tagsinput">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">الكاتب</label>
                                        <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">الحالة</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="publish">منشور</option>
                                            <option value="draft">مسودة</option>
                                        </select>
                                    </div>
                                    <x-media-upload :id="''" :name="'image'" :dimentions="'1920x1280'" :title="__('Image')"/>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">اضافة </button>
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    {{-- <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script> --}}
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        CKEDITOR.replace( 'blog_content' );
        $(document).ready(function () {
            $(document).on('click','.category_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var name = el.data('name');
                var status = el.data('status');
                var modal = $('#category_edit_modal');
                modal.find('#category_id').val(id);
                modal.find('#edit_status option[value="'+status+'"]').attr('selected',true);
                modal.find('#edit_name').val(name);
            });
            // $('.summernote').summernote({
            //     height: 400,   //set editable area's height
            //     codemirror: { // codemirror options
            //         theme: 'monokai'
            //     },
            //     callbacks: {
            //         onChange: function(contents, $editable) {
            //             $(this).prev('input').val(contents);
            //         }
            //     }
            // });
            // if($('.summernote').length > 1){
            //     $('.summernote').each(function(index,value){
            //         $(this).summernote('code', $(this).data('content'));
            //     });
            // }

            $(document).on('change','#language',function(e){
               e.preventDefault();
               var selectedLang = $(this).val();
               $.ajax({
                  url: "{{route('admin.last-news.lang.cat')}}",
                  type: "POST",
                  data: {
                      _token : "{{csrf_token()}}",
                      lang : selectedLang
                  },
                  success:function (data) {
                      $('#category').html('<option value="">Select Category</option>');
                      $.each(data,function(index,value){
                          $('#category').append('<option value="'+value.id+'">'+value.name+'</option>')
                      });
                  }
               });
            });
        });
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
