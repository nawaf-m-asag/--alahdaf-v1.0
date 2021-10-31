@extends('backend.admin-master')
@section('site-title')
   الاعدادت
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">الاعدادات</h4>
                        <form action="{{route('admin.gallery.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="site_image_gallery_post_items">عدد الصور المعروضة</label>
                                <input type="number" class="form-control" name="site_image_gallery_post_items" value="{{get_static_option('site_image_gallery_post_items')}}">
                            </div>
                            <div class="form-group">
                                <label for="site_image_gallery_order_by">ترتيب حسب</label>
                                <select name="site_image_gallery_order_by"  class="form-control">
                                    <option @if(get_static_option('site_image_gallery_order_by') === 'id') selected @endif value="id">المعرف</option>
                                    <option @if(get_static_option('site_image_gallery_order_by') === 'title') selected @endif value="title">العنوان</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_image_gallery_order">ترتيب</label>
                                <select name="site_image_gallery_order"  class="form-control">
                                    <option @if(get_static_option('site_image_gallery_order') === 'ASC') selected @endif value="ASC">تصاعدي</option>
                                    <option @if(get_static_option('site_image_gallery_order') === 'DESC') selected @endif value="DESC">تنازلي</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
