
@extends('backend.admin-master')
@section('site-title')
    الاعدادات
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">الاعدادات</h4>
                        <form action="{{route('admin.products.single.page.settings')}}" method="POST" enctype="multipart/form-data">
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
                                            <label for="product_single_{{$lang->slug}}_add_to_cart_text">نص اضافة الئ السلة</label>
                                            <input type="text" name="product_single_{{$lang->slug}}_add_to_cart_text"  class="form-control" value="{{get_static_option('product_single_'.$lang->slug.'_add_to_cart_text')}}" id="product_single_{{$lang->slug}}_add_to_cart_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_single_{{$lang->slug}}_category_text">نص التصنيف</label>
                                            <input type="text" name="product_single_{{$lang->slug}}_category_text"  class="form-control" value="{{get_static_option('product_single_'.$lang->slug.'_category_text')}}" id="product_single_{{$lang->slug}}_category_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_single_{{$lang->slug}}_sku_text">نص ادارة المخزون</label>
                                            <input type="text" name="product_single_{{$lang->slug}}_sku_text"  class="form-control" value="{{get_static_option('product_single_'.$lang->slug.'_sku_text')}}" id="product_single_{{$lang->slug}}_sku_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_single_{{$lang->slug}}_description_text">نص الوصف</label>
                                            <input type="text" name="product_single_{{$lang->slug}}_description_text"  class="form-control" value="{{get_static_option('product_single_'.$lang->slug.'_description_text')}}" id="product_single_{{$lang->slug}}_description_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_single_{{$lang->slug}}_attributes_text">نص خصائص المنتج</label>
                                            <input type="text" name="product_single_{{$lang->slug}}_attributes_text"  class="form-control" value="{{get_static_option('product_single_'.$lang->slug.'_attributes_text')}}" id="product_single_{{$lang->slug}}_attributes_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_single_{{$lang->slug}}_ratings_text">نص التقييم</label>
                                            <input type="text" name="product_single_{{$lang->slug}}_ratings_text"  class="form-control" value="{{get_static_option('product_single_'.$lang->slug.'_ratings_text')}}" id="product_single_{{$lang->slug}}_ratings_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_single_{{$lang->slug}}_related_product_text">نص تقييم المنتج</label>
                                            <input type="text" name="product_single_{{$lang->slug}}_related_product_text"  class="form-control" value="{{get_static_option('product_single_'.$lang->slug.'_related_product_text')}}" id="product_single_{{$lang->slug}}_related_product_text">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="product_single_related_products_status"><strong>اظهار تقييم المنتجات</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="product_single_related_products_status"  @if(!empty(get_static_option('product_single_related_products_status'))) checked @endif >
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="product_single_products_review_status"><strong>تمكين التقييم</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="product_single_products_review_status"  @if(!empty(get_static_option('product_single_products_review_status'))) checked @endif >
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
