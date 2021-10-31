@extends('backend.admin-master')
@section('site-title')
   اضافة مستخدم جديد
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                      <div class="header-wrap d-flex justify-content-between">
                          <h4 class="header-title">مستخدم جديد</h4>
                          <a href="{{route('admin.all.frontend.user')}}" class="btn btn-primary">كل المستخدمين</a>
                      </div>
                        <x-error-msg/>
                        <x-flash-msg/>
                        <form action="{{route('admin.frontend.new.user')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="الاسم">
                            </div>
                            <div class="form-group">
                                <label for="username">اسم المستخدم</label>
                                <input type="text" class="form-control"  id="username" name="username" placeholder="اسم المستخدم">
                                <small class="text text-danger">تذكر اسم المتخدم لانك سوف تستخدمة في تسجيل الدخول</small>
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الالكتروني</label>
                                <input type="text" class="form-control"  id="email" name="email" placeholder="ادخل البريد الالكتروني">
                            </div>
                            <div class="form-group">
                                <label for="phone">الهاتف</label>
                                <input type="text" class="form-control"  id="phone" name="phone" placeholder="ادخل الهاتف">
                            </div>
                            <div class="form-group">
                                <label for="country">البلد</label>
                                {!! get_country_field('country','country','form-control') !!}
                            </div>
                            <div class="form-group">
                                <label for="state"> المنطقة</label>
                                <input type="text" class="form-control"  id="state" name="state" placeholder="ادخل المنطقة">
                            </div>
                            <div class="form-group">
                                <label for="city">المحافظة</label>
                                <input type="text" class="form-control"  id="city" name="city" placeholder="ادخل المحافظة">
                            </div>
                            <div class="form-group">
                                <label for="zipcode">الرمز البريدي</label>
                                <input type="text" class="form-control"  id="zipcode" name="zipcode" placeholder=" ادخل الرمز البريدي">
                            </div>
                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <input type="text" class="form-control"  id="address" name="address" placeholder="ادخل العنوان">
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة المرور</label>
                                <input type="password" class="form-control"  id="password" name="password" placeholder="ادخل كلمة المرور">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">تاكيد كلمة المرور</label>
                                <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation" placeholder="ادخل تاكيد كلمة المرور">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">اضافة مستخدم</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
