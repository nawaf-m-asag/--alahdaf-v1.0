@extends('backend.admin-master')
@section('site-title')
  التصنيفات
@endsection
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    @include('backend.partials.media-upload.style')
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
               <x-flash-msg/>
                <x-error-msg/>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">التصنيفات</h4>
                        <div class="bulk-delete-wrapper">
                            <div class="select-box-wrap">
                                <select name="bulk_option" id="bulk_option">
                                    <option value="">اجراء جماعي</option>
                                    <option value="delete">حذف</option>
                                </select>
                                <button class="btn btn-primary btn-sm" id="bulk_delete_btn">تطبيق</button>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php $a=0; @endphp
                            @foreach($all_category as $key => $slider)
                                <li class="nav-item">
                                    <a class="nav-link @if($a == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{get_language_by_slug($key)}}</a>
                                </li>
                                @php $a++; @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            @php $b=0; @endphp
                            @foreach($all_category as $key => $category)
                                <div class="tab-pane fade @if($b == 0) show active @endif" id="slider_tab_{{$key}}" role="tabpanel" >
                                    <div class="table-wrap table-responsive">
                                        <table class="table table-default">
                                            <thead>
                                            <th class="no-sort">
                                                <div class="mark-all-checkbox">
                                                    <input type="checkbox" class="all-checkbox">
                                                </div>
                                            </th>
                                            <th>المعرف</th>
                                            <th>الاسم</th>
                                            <th>الحالة</th>
                                            <th>الصورة</th>
                                            <th>العمليات</th>
                                            </thead>
                                            <tbody>
                                            @foreach($category as $data)
                                                <tr>
                                                    <td>
                                                        <div class="bulk-checkbox-wrapper">
                                                            <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                                        </div>
                                                    </td>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->title}}</td>
                                                    <td>
                                                        <div class="img-wrap">
                                                            @php
                                                                $event_img = get_attachment_image_by_id($data->image,'thumbnail',true);
                                                            @endphp
                                                            @if (!empty($event_img))
                                                                <div class="attachment-preview">
                                                                    <div class="thumbnail">
                                                                        <div class="centered">
                                                                            <img class="avatar user-thumb" src="{{$event_img['img_url']}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @php  $img_url = $event_img['img_url']; @endphp
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <x-status-span :status="$data->status"/>
                                                    </td>
                                                    <td>
                                                        <x-delete-popover :url="route('admin.products.category.delete',$data->id)"/>

                                                        <a href="#"
                                                           data-toggle="modal"
                                                           data-target="#category_edit_modal"
                                                           class="btn btn-primary btn-xs mb-3 mr-1 category_edit_btn"
                                                           data-id="{{$data->id}}"
                                                           data-name="{{$data->title}}"
                                                           data-lang="{{$data->lang}}"
                                                           data-status="{{$data->status}}"
                                                           data-imageid="{{$data->image}}"
                                                           data-image="{{$img_url}}"
                                                        >
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @php $b++; @endphp
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">اضافة تصنيف جديد</h4>
                        <form action="{{route('admin.products.category.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="language">اللغة</label>
                                <select name="lang" id="language" class="form-control">
                                    @foreach($all_languages as $language)
                                        <option value="{{$language->slug}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control"  id="name" name="title" placeholder="ادخل الاسم">
                            </div>
                            <x-media-upload :title="__('Image')" :name="'image'" :dimentions="'200x200'"/>
                            <div class="form-group">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="publish">منشور</option>
                                    <option value="draft">مسودة</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">اضافة</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="category_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تحديث التصنيف</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.products.category.update')}}"  method="post">
                    <input type="hidden" name="id" id="category_id">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="edit_language">اللغة</label>
                            <select name="lang" id="edit_language" class="form-control">
                                @foreach($all_languages as $language)
                                    <option value="{{$language->slug}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_name">الاسم</label>
                            <input type="text" class="form-control"  id="edit_name" name="title" placeholder="ادخل الاسم">
                        </div>
                        <x-media-upload :title="__('Image')" :name="'image'" :dimentions="'200x200'"/>
                        <div class="form-group">
                            <label for="edit_status">الحالة</label>
                            <select name="status" class="form-control" id="edit_status">
                                <option value="draft">مسودة</option>
                                <option value="publish">منشور</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.bulk-action',['action' => route('admin.products.category.bulk.action')])
    @include('backend.partials.datatable.script-enqueue')
    @include('backend.partials.media-upload.media-js')
    <script>
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
                modal.find('#edit_language option[value="'+el.data('lang')+'"]').attr('selected',true);
                var image = el.data('image');
                var imageid = el.data('imageid');


                if(imageid != ''){
                    modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    modal.find('.media-upload-btn-wrapper input').val(imageid);
                    modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }

            });
        });
    </script>

@endsection
