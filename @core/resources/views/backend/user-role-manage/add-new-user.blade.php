@extends('backend.admin-master')
@section('site-title')
    اضافة مستخدم جديد
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
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
                           <a href="{{route('admin.all.user')}}" class="btn btn-primary">كل المستخدمين</a>
                       </div>
                       <x-flash-msg/>
                        <x-error-msg/>
                        <form action="{{route('admin.new.user')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="ادخل الاسم">
                            </div>
                            <div class="form-group">
                                <label for="username">اسم المستخدم</label>
                                <input type="text" class="form-control"  id="username" name="username" placeholder="ادخل اسم المستخدم">
                                <small class="text text-danger">تذكر اسم المستخدم لانك سوف تستخدمة لتسجل الدخول</small>
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الالكتروني</label>
                                <input type="text" class="form-control"  id="email" name="email" placeholder="ادخل البريد الالكتروني">
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة المرور</label>
                                <input type="password" class="form-control"  id="password" name="password" placeholder="ادخل كلمة المرور">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">تاكيد كلمة المرور</label>
                                <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation" placeholder="ادخل تاكيد كلمة المرور">
                            </div>
                            <div class="form-group">
                                <label for="role">الصلاحية</label>
                                <select name="role" id="role" class="form-control">
                                    @foreach( $all_admin_role as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">الصورة</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="تحديد" data-modaltitle="رفع صورة الملف الشخصي" data-toggle="modal" data-target="#media_upload_modal">
                                        رفع صورة
                                    </button>
                                </div>
                                <small>يفضل ان يكون حجم الصورة 200*200 </small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">اضافة مستخدم</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('backend.partials.media-upload.media-upload-markup')
@section('script')
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
