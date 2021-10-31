@extends('backend.admin-master')
@section('site-title')
   اعدادات المنتجات
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-flash-msg/>
                <x-error-msg/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">اعدادات المنتجات</h4>
                        <form action="{{route('admin.products.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="disable_guest_mode_for_product_module"><strong>تمكين الزائر من الدفع</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_guest_mode_for_product_module"  @if(!empty(get_static_option('disable_guest_mode_for_product_module'))) checked @endif >
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="display_price_only_for_logged_user"><strong>تمكين / تعطيل عرض السعر للمستخدم الذي قام بتسجيل الدخول فقط</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="display_price_only_for_logged_user"  @if(!empty(get_static_option('display_price_only_for_logged_user'))) checked @endif >
                                    <span class="slider onff"></span>
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
